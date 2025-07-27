document.querySelectorAll(".formComment").forEach(form => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const targetType = this.dataset.type;
        const targetId = this.dataset.id;
        const content = this.querySelector("textarea").value;

        if (!content.trim()) {
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar correo',
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
                    title: 'Perfil actualizado',
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
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar correo',
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