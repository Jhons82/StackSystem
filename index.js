$(document).ready(function () {
  init(); // Asegura que el init se llame cuando el DOM ya cargó
});

function init() {
  $("#signup-form").on("submit", function (e) {
    e.preventDefault(); // Previene que se recargue la página
    signup(e); // Llama a la función signup
  });
}

document.getElementById("login").addEventListener("submit", function (e) {
  e.preventDefault();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!email || !password) {
    Swal.fire({
      icon: "warning",
      title: "Campos incompletos",
      text: "Por favor, completa todos los campos para iniciar sesión.",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#f39c12",
      background: "#fffef0",
      color: "#333",
      timer: 5000,
      timerProgressBar: true,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      backdrop: `rgba(0,0,0,0.4) left top no-repeat`,
    });
    return;
  }

  const formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);

  fetch("controllers/usuario.php?op=login", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      try {
        switch (data.status) {
          case "success":
            Swal.fire({
              icon: "success",
              title: "Bienvenido",
              text: data.message,
              showConfirmButton: false
            });
            setTimeout(() => {
              window.location.href = "views/html/home.php";
            }, 1500);
            break;

          case "wrong_password":
              Swal.fire({
                icon: "error",
                title: "¡Ups! Algo salió mal",
                text: data.message,
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
                backdrop: `rgba(0,0,0,0.4) left top no-repeat`,
              });
            break;

          case "deleted":
          case "not_found":
            Swal.fire({
              icon: "error",
              title: "¡Ups! Algo salió mal",
              text: data.message,
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
              backdrop: `rgba(0,0,0,0.4) left top no-repeat`,
            });
            break;
          default:
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message || "Ocurrió un error al iniciar sesión.",
            });
        }
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "Error inesperado",
          text: "No se pudo procesar la respuesta del servidor",
        });
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
      Swal.fire({
        icon: "error",
        title: "Error de red",
        text: "No se pudo conectar con el servidor.",
        background: "#fff0f0",
      });
    });
});

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
    processData: false,
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
    },
  });
}

init();
