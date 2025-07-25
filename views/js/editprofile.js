

function init() {

}

let originalImageSrc = '';

$(document).ready(function () {
    $.ajax({
        url: BASE_URL +  'controllers/usuario.php?op=show_user',
        type: 'GET',
        contentType: false,
        proccessData: false,
        success: function (response) {
            try {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    $('#usernameprofile').val(data.data.username);
                    $('#emailprofile').val(data.data.email);
                    $('#viewImage').attr('src', data.data.image);
                    $('#country'). val(data.data.country);
                    document.getElementById('description').value = data.data.description || '';
                    $('#website').val(data.data.website);
                    $('#twitter').val(data.data.twitter);
                    $('#facebook').val(data.data.facebook);
                    $('#instagram').val(data.data.instagram);
                    $('#youtube').val(data.data.youtube);
                    $('#vimeo').val(data.data.vimeo);
                    $('#github').val(data.data.github);
                } else {
                    alert('Error: ' + data.message);
                }
            } catch (e) {
                alert('Error parsing response: ' + e.message);
            }
        },
        error: function (xhr, status, error) {
            alert('Error: ' + error);
        }

    });
});

// Vista previa de la imagen al seleccionar un archivo
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.querySelector('input[type="file"][name="image"]');
    const imagePreview = document.getElementById('viewImage');

    imagePreview.addEventListener('load', function() {
        originalImageSrc =imagePreview.src; // Guardar la imagen original al cargar
    })

    imageInput.addEventListener('change', function (e) {
        const file = e.target.files[0];

        // Si no se seleccionó archivo, salir
        if (!file) {
            imagePreview.src = originalImageSrc;
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

        // Validar tipo
        if (!allowedTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Tipo de imagen inválido',
                text: 'Solo se permiten imágenes JPG o PNG.',
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
                no-repeat
                `,
            });
            imageInput.value = '';                  // ← Vaciar input
            imagePreview.src = originalImageSrc;    // ← Restaurar imagen original
            return;
        }

        // Validar tamaño
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: 'warning',
                title: 'Imagen demasiado grande',
                text: 'La imagen no debe superar los 2 MB.',
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
                no-repeat
                `,
            });
            imageInput.value = '';                  // ← Vaciar input
            imagePreview.src = originalImageSrc;    // ← Restaurar imagen original
            return;
        }

        // Si es válida, mostrar vista previa
        const reader = new FileReader();
        reader.onload = function (event) {
            imagePreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
});


document.getElementById('formEditProfile').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    fetch( BASE_URL + 'controllers/usuario.php?op=update_user', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Perfil actualizado',
                text: data.message,
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
        } else if (data.status === 'info') {
            Swal.fire({
                icon: 'info',
                title: 'Sin cambios detectados',
                text: data.message,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3498db',
                background: '#f0f8ff',
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
                const inputFile = document.querySelector('input[name="image"]');
                const imagePreview = document.getElementById('viewImage');

                // Restaurar imagen original en vista previa
                if (!inputFile.files.length) {
                    imagePreview.src = originalImageSrc; // Restaurar imagen original
                }
                console.log('Imagen restaurada:', originalImageSrc);
            });
            
        } else {
            // Solo mostrar errores, como ID vacío o error al subir imagen
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
            });
        }
    })
    .catch(error => {
        console.error('Error en envio de datos:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error de conexión',
            text: 'No se pudo actualizar el perfil. Por favor, inténtelo de nuevo más tarde.'
        });
    });

});

document.getElementById('formEditEmail').addEventListener('submit', function (e){
    e.preventDefault();
    const form = new FormData(this);

    fetch( BASE_URL + 'controllers/usuario.php?op=update_email',
        {
            method: 'POST',
            body: form
        }
    ).then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Correo electrónico actualizado',
                text: data.message,
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
            });
            // Actualizar el campo de correo electrónico en el perfil
            document.querySelector('#emailprofile').value = data.email;
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
});

document.getElementById('formEditPassword').addEventListener("submit", function (e) {
    e.preventDefault();

    const current_password = document.getElementById("current_password").value.trim();
    const new_password = document.getElementById("new_password").value.trim();
    const confirm_password = document.getElementById("confirm_password").value.trim();

    if (!current_password || !new_password || !confirm_password) {
        Swal.fire({
            icon: 'warning',
            title: 'Campos vacíos',
            text: 'Todos los campos son obligatorios.',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#f1c40f',
            background: '#fff8e1',
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
            rgba(0, 0, 0, 0.4)
            left top
            no-repeat
            `,
        });
        return;
    }

    if (new_password !== confirm_password) {
        Swal.fire({
            icon: 'warning',
            title: 'Las contraseñas no coinciden',
            text: 'Asegúrate de que la nueva contraseña y su confirmación sean iguales.',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#f1c40f',
            background: '#fff8e1',
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
            rgba(0, 0, 0, 0.4)
            left top
            no-repeat
            `,
        });
        return;
    }

    const formData = new FormData();
    formData.append("current_password", current_password);
    formData.append("new_password", new_password);

    fetch( BASE_URL + "controllers/usuario.php?op=update_password", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Contraseña actualizada',
                text: data.message,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#28a745',
                background: '#e6ffe6',
                color: '#333',
                timer: 3000,
                timerProgressBar: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                backdrop: `
                rgba(0, 0, 0, 0.4)
                left top
                no-repeat
                `,
            });
            document.getElementById("formEditPassword").reset();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña incorrecta',
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
                    popup: "animate__animated animate__fadeOutUp"
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
            title: 'Error inesperado',
            text: 'Ocurrió un problema en el servidor: ' + error.message,
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
                popup: "animate__animated animate__fadeOutUp"
            },
            backdrop: `
            rgba(0, 0, 0, 0.4)
            left top
            no-repeat
            `,
        });
    });
})

document.getElementById("delete-button").addEventListener("click", function() {
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "Esta acción eliminará tu cuenta y cerrará tu sesión.",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        confirmButtonColor: '#f1c40f',
        background: '#fff8e1',
        color: '#333',
        cancelButtonText: "Cancelar",
        timer: 5000,
        timerProgressBar: true,
        showClass: {
            popup: "animate__animated animate__fadeInDown"
        },
        hideClass: {
            popup: "animate__animated animate__fadeOutUp"
        },
        backdrop: `
        rgba(0, 0, 0, 0.4)
        left top
        no-repeat
        `,
    }).then((result) => {
        if (result.isConfirmed) {
            fetch( BASE_URL + 'controllers/usuario.php?op=delete_user', {
                method: "POST"
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    icon: data.status === 'success' ? 'success' : 'error',
                    title: data.message,
                    timer: 2000,
                    showConfirmButton: false
                });

                if (data.status === "success" && data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                }
            })
        }
    })
});
init();