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
        window.location.replace("views/html/home.php"); // O redirige a donde quieras
      } else {
        alert(response.message);
      }
    },
  });
}

init();
