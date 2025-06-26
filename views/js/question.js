function init() {

}

document.getElementById('formQuestion').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

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

init();