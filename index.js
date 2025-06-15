$(document).ready(function () {
  init(); // Asegura que el init se llame cuando el DOM ya cargó
});

function init() {
  $("#login").on("submit", function (e) {
    e.preventDefault(); // Previene que se recargue la página
    login(e); // Llama a la función login
  });
}

function login() {
  const formData = new FormData($("#login")[0]);
  $.ajax({
    url: "controllers/usuario.php?op=login",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      let response = typeof datos === "string" ? JSON.parse(datos) : datos;

      if (response.status === "success") {
        window.location.replace("views/html/home.php"); // redirige a donde quieras
      } else {
        Swal.fire({
          icon: "error",
          title: "¡Ups! Algo salió mal",
          text: response.message || "Error al iniciar sesión",
          footer:
            '<a href="#" onClick="cerrarSwalYAbrirModal(); return false;" style="text-decoration:underline; color:#0056b3;">¿Olvidaste tu contraseña?</a>',
          confirmButtonText: "Intentar de nuevo",
          confirmButtonColor: "#e74c3c",
          background: "#fff0f0",
          color: "#333",
          timer: 5000,
          timerProgressBar: true,
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          backdrop: `
    rgba(0,0,0,0.4)
    left top
    no-repeat
  `,
        });
      }
    },
  });
}

function cerrarSwalYAbrirModal() {
  Swal.close(); // Cierra el SweetAlert
  // Que el modal exista en el DOM
  const modalEl = document.getElementById("loginModal");

  if (modalEl && modalEl.classList.contains("show")) {
    const modalInstance = bootstrap.Modal.getInstance(modalEl);
    if (modalInstance) {
      modalInstance.hide();
    }
  }

  // Espera un momento a que se cierre el SweetAlert y luego muestra el modal
  setTimeout(() => {
    const modal = new bootstrap.Modal(document.getElementById("recoverModal"));
    modal.show();
  }, 300); // 300ms para la animación de cierre
}

init();
