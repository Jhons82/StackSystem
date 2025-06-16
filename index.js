$(document).ready(function () {
  init(); // Asegura que el init se llame cuando el DOM ya cargó
});

function init() {
  $("#login").on("submit", function (e) {
    e.preventDefault(); // Previene que se recargue la página
    login(e); // Llama a la función login
  });

  $("#signup-form").on("submit", function (e) {
    e.preventDefault(); // Previene que se recargue la página
    signup(e); // Llama a la función signup
  })
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

let isSubmitting = false;

function signup() {
  if (isSubmitting) return; // Evita que se dispare nuevamente
  isSubmitting = true;

  const formData = new FormData($("#signup-form")[0]);

  $.ajax({
    url: "controllers/usuario.php?op=insertUser",
    type: "POST",
    data: formData,
    contentType: false,
    processData:  false,
    dataType: "json",
    success: function (response) {
      isSubmitting = false;

      if (typeof response !== "object") {
        try {
          response = JSON.parse(response);
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Error de formato",
            text: "La respuesta del servidor no es válida.",
            confirmButtonText: "Intentar de nuevo",
            confirmButtonColor: "#e74c3c",
            background: "#fff0f0",
            color: "#333",
            timer: 3000,
            timerProgressBar: true,
            showClass: {
              popup: "animate__animated animate__fadeInDown",
            },
            hideClass: {
              popup: "animate__animated animate__fadeOutUp",
            },
          });
          return;
        }
      }
      console.log("Respuesta cruda del servidor:", response);
      
      if (response.status === "success") {
        Swal.fire({
          icon: "success",
          title: "¡Registro exitoso!",
          text: response.message || "Usuario registrado correctamente",
          confirmButtonText: "Iniciar sesión",
          confirmButtonColor: "#28a745",
          background: "#e6ffe6",
          color: "#333",
          timer: 3000,
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
        }).then((result) => {
          /* console.log("Redirigiendo a:", response.redirect); */
          if (result.isConfirmed) {
            const redirectTo = response.redirect || "views/html/home.php";
            window.location.href = redirectTo;
          }
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "¡Ups! Algo salió mal",
          text: response.message || "No se pudo registrar el usuario",
          confirmButtonText: "Intentar de nuevo",
          confirmButtonColor: "#e74c3c",
          background: "#fff0f0",
          color: "#333",
          timer: 3000,
          timerProgressBar: true,
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
        });
      }
    },
    error: function (xhr, status, error) {
      isSubmitting = false;
      console.error("AJAX Error:", status, error);
      Swal.fire({
        icon: "error",
        title: "Error de conexión",
        text: "Ocurrió un problema al registrar el usuario. Intenta más tarde.",
        confirmButtonText: "Intentar de nuevo",
        confirmButtonColor: "#e74c3c",
        background: "#fff0f0",
        color: "#333",
        timer: 3000,
        timerProgressBar: true,
        showClass: {
          popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
          popup: "animate__animated animate__fadeOutUp",
        },
      });
    }
  })
}

init();
