document.addEventListener("DOMContentLoaded", function(){
    loadComments();
});

function loadComments() {
    document.querySelectorAll('.comments-wrap').forEach(container => {
        const targetId = container.getAttribute('data-target-id');
        const targetType = container.getAttribute('data-target-type');

        const formData = new FormData;
        formData.append('target_id', targetId);
        formData.append('target_type', targetType);

        fetch(BASE_URL + 'controllers/comment.php?op=get_comments',{
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === 'success') {
                const list = container.querySelector('.comments-list');
                list.innerHTML = '';

                res.data.forEach(comment => {
                    const li = document.createElement('li');

                    const commentDate = new Date(comment.created_at_raw.replace(' ', 'T')); // ahora sí válido
                    const now = new Date();
                    const diffMinutes = Math.floor((now - commentDate) / 60000);
                    const canEdit = diffMinutes < 5;

                    li.innerHTML = `
                        <div class="comment-actions">
                            <span class="comment-score">1</span>
                        </div>
                        <div class="comment-body"">
                            <span class="comment-copy">${comment.content}</span>
                            <span class="comment-separated">-</span>
                            <a href="${BASE_URL}profile/${comment.user_id}/${comment.slug}" class="comment-user">${comment.username}</a>
                            <span class="comment-separated">-</span>
                            <a href="#" class="comment-date">${comment.comment_date}</a>
                        </div>
                        ${canEdit ? `
                        <div class="mt-1 d-flex justify-content-end">
                            <button class="btn text-primary btn-sm edit-comment-btn" 
                                data-id="${comment.comment_id}" 
                                data-content="${comment.content}">
                                Editar
                            </button>
                        </div>` : ''}
                    `;
                    list.appendChild(li);
                });
            } else {
                console.error("No se pudieron cargar los comentarios");
            }
        })
        .catch(error => {
            console.error('Error al cargar comentarios:', error);
        });
    });
}

document.querySelectorAll(".formComment").forEach(form => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const targetType = this.dataset.type;
        const targetId = this.dataset.id;
        const content = this.querySelector("textarea").value;

        if (!content.trim()) {
            Swal.fire({
                icon: 'error',
                title: 'Error en el registro',
                text: 'El comentario no puede estar vacío.',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#e74c3c',
                background: '#fff0f0',
                color: '#333',
                timer: 3000,
                timerProgressBar: true,
                showClass: {
                    popup: "animate__animated animate__fadeInDown",
                },
                hideClass: {
                    popup: "animate__animated animate__fadeOutUp",
                },
                backdrop: `
                rgba(0, 0, 0, 0.4)
                left top
                no-repeat`
            });
            return;
        }

        const formData = new FormData();
        formData.append("content", content);
        formData.append("target_type", targetType);
        formData.append("target_id", targetId);

        fetch(BASE_URL + "controllers/comment.php?op=insertComment", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Confirmado',
                    text: "Comentario registrado correctamente",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#28a745',
                    background: '#e6ffe6',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown",
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4)
                    left top
                    no-repeat
                    `,
                }).then(() => {
                    form.querySelector("textarea").value = '';
                    loadComments();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error para comentar',
                    text: data.message,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#e74c3c',
                    background: '#fff0f0',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown",
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4)
                    left top
                    no-repeat`
                });
            }
        });
    })
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('edit-comment-btn')) {
        e.preventDefault();
        const button = e.target;
        const commentId = button.dataset.id;
        const originalContent = button.dataset.content;

        const li = button.closest('li');
        const body = li.querySelector('.comment-body');
        const actions = button.closest('.mt-1');

        document.querySelectorAll('.edit-comment-form').forEach(form => {
            const parentLi = form.closest('li');
            form.remove();

            // Restaurar el contenido y botón de ese comentario
            if (parentLi) {
                const previousBody = parentLi.querySelector('.comment-body');
                const previousButton = parentLi.querySelector('.edit-comment-btn');
                if (previousBody) previousBody.style.display = '';
                if (previousButton) previousButton.style.display = '';
            }
        });

        if (li.querySelector('.edit-comment-form')) return; // Evita duplicar

        body.style.display = 'none';
        button.style.display = 'none';

        // Formulario
        const form = document.createElement('form');
        form.classList.add('edit-comment-form', 'mt-2', 'w-100', 'd-block', 'mb-2');
        form.innerHTML = `
            <div class="edit-box p-3 border rounded w-100" style="background-color: #f9f9f9;">
                <label for="editComment_${commentId}" class="form-label fw-bold mb-2">Editar Comentario</label>
                <textarea id="editComment_${commentId}" class="form-control" rows="4" style="resize: vertical; width: 100%;">${originalContent}</textarea>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    <button type="button" class="btn btn-sm btn-secondary cancel-edit-comment">Cancelar</button>
                </div>
            </div>
        `;

        li.appendChild(form);

        // Cancelar edición
        form.querySelector('.cancel-edit-comment').addEventListener('click', () => {
            form.remove();
            body.style.display = '';
            button.style.display = '';
        });

        // Guardar cambios
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const newContent = form.querySelector('textarea').value.trim();

            if (!newContent || newContent === originalContent) {
                Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'No se ha modificado el comentario.',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3498db',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown"
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp"
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4) left top no-repeat`,
                });
                return;
            }

            const formData = new FormData();
            formData.append('id', commentId);
            formData.append('content', newContent);

            fetch(BASE_URL + 'controllers/comment.php?op=update_comment', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    loadComments();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo actualizar',
                        text: data.message || 'Error al actualizar el comentario.',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#e74c3c',
                        background: '#fff0f0',
                        color: '#333',
                        timer: 3000,
                        timerProgressBar: true,
                        showClass: {
                            popup: "animate__animated animate__fadeInDown",
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOutUp",
                        },
                        backdrop: `
                        rgba(0, 0, 0, 0.4)
                        left top
                        no-repeat`
                    });
                }
            })
            .catch(err => {
                console.error('Error en la petición:', err);
            });
        });
    }
});