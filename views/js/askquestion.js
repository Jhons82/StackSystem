function init() {
    
}

document.addEventListener("DOMContentLoaded", function() {
    const tagInput = document.getElementById("tagInput");
    //Activar Tagify
    const tagify = new Tagify(tagInput, {
        maxTags: 5,
        dropdown: {
            enabled: 1,
            maxItems: 10,
            classname: "custom-tag-dropdown",
            closeOnSelect: false
        }
    });

    tagify.on('input', function(e){
        let value = e.detail.value;

        fetch(BASE_URL + 'controllers/question.php?op=search&term=' + encodeURIComponent(value))
            .then(res => res.json())
            .then(function (suggestions) {
                tagify.settings.whitelist = suggestions;
                tagify.dropdown.show.call(tagify, value);
            })
    })

    // Activar btnpublish si AgreeCheckBox está activo
    const checkbox = document.getElementById("AgreeCheckBox");
    const btnpublish = document.getElementById("btnpublish");

    checkbox.addEventListener("change", () => {
        btnpublish.disabled = !checkbox.checked;
    });

    document.getElementById('formQuestion').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = e.target;
        const iFrame = document.getElementById('stackEditorFrame');
        const iFrameDoc = iFrame.contentDocument || iFrame.contentWindow.document;
        const editor = iFrameDoc.querySelector('.js-editor.ProseMirror');

        if (!editor) {
            console.error("No se encontró el editor ProseMirror.");
            return;
        }
        // Clonar el editor sin modificar el original
        const cleanContent = editor.cloneNode(true);

        const selectorsBasura = [
            '.js-language-input',
            '.js-language-dropdown-container',
            '.s-input-icon',
            '.v-visible-sr',
            'label',
            'input',
            'button',
            '.js-language-selector',
            '.ps-absolute',
            '.s-card',
            '.ps-relative.mb8'
        ];

        selectorsBasura.forEach(selector => {
            cleanContent.querySelectorAll(selector).forEach(el => {
                if (!el.closest('pre')) {
                    el.remove();
                }
            });
        });

        cleanContent.querySelectorAll('p').forEach(p => {
            if (!p.closest('pre') && (p.innerHTML.trim() === '<br>') || p.innerHTML.trim() === '') {
                p.remove();
            }
        });

        const content = cleanContent.innerHTML;
        console.log("Contenido capturado:", content);
        const formData = new FormData(form);
        const tags = tagify.value.map(tag => tag.value); // Extrae valores de los tags
        formData.append("tags", JSON.stringify(tags));
        formData.append('content', content);

        fetch( BASE_URL + 'controllers/question.php?op=insert_question', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: '¡Pregunta enviada!',
                    text: data.message,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#28a745',
                    background: '#e6ffe6',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown"
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4)
                    left top
                    no-repeat
                    `,
                })
                .then(() => {
                    location.reload();
                    tagify.removeAllTags();
                });
            } else if(data.status === 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'No pudimos publicar tu pregunta',
                    text: data.message,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#e74c3c',
                    background: '#fff0f0',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown"
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4)
                    left top
                    no-repeat
                    `,
                });
                
            } else if(data.status === 'info') {
                Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: data.message,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3498db',
                    background: '#f0f8ff',
                    color: '#333',
                    timer: 3000,
                    timerProgressBar: true,
                    showClass: {
                        popup: "animate__animated animate__fadeInDown"
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    backdrop: `
                    rgba(0, 0, 0, 0.4)
                    left top
                    no-repeat
                    `,
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error de red',
                text: 'Ocurrió un problema al enviar la solicitud',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#e74c3c',
                background: '#fff0f0',
                color: '#333'
            });
            console.error('Error:', error);
        });
    });

});

init();