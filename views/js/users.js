document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("search-user");
    const cards = document.querySelectorAll(".user-card");
    const btn = document.getElementById("btn-show-more");

    let visibleCount = 24;
    const step = 24;

    if (btn) {
        btn.addEventListener("click", function () {
            let mostrados = 0;

            for (let i = visibleCount; i < cards.length && mostrados < step; i++) {
                cards[i].classList.remove("d-none");
                cards[i].style.display = "block";
                mostrados++;
            }

            visibleCount += mostrados;

            if (visibleCount >= cards.length) {
                btn.style.display = "none";
            }
        });
    }

    input.addEventListener("input", function () {
        const filtro = input.value.toLowerCase();

        // Mostrar todos los usuarios ocultos antes de filtrar
        cards.forEach(card => card.classList.remove("d-none"));

        // Ocultar el botón "Mostrar más" durante la búsqueda
        if (btn) btn.style.display = "none";

        let existeCoincidencia = false;

        cards.forEach(card => {
            const userLink = card.querySelector(".user-link");
            if (!userLink) return;

            const nombre = userLink.textContent.toLowerCase();
            const coincide = nombre.includes(filtro);

            if (coincide) {
                card.style.display = "block";
                existeCoincidencia = true;
            } else {
                card.style.display = "none";
            }
        });

        // Si el filtro está vacío, restablecer vista original
        if (filtro === "") {
            // Ocultar los tags que van después del 24
            cards.forEach((card, index) => {
                card.style.display = "block";
                if (index >= 24) {
                    card.classList.add("d-none");
                }
            });

            visibleCount = 24;
            // Volver a mostrar el botón
            if (btn) btn.style.display = "inline-block";
        }
    });
});