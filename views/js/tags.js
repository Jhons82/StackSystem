document.addEventListener("DOMContentLoaded", () => {
    const topTagsContainer = document.getElementById("top-tags-container");
    // Solo ejecuta si el contenedor existe en home.php
    if (topTagsContainer) {
        fetchTopTags();
    }
    
    const input = document.getElementById("search-tag");
    const cards = document.querySelectorAll(".tag-card");
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

    if (input) {
        input.addEventListener("input", function () {
            const filtro = input.value.toLowerCase();

            // Mostrar todos los tags ocultos antes de filtrar
            cards.forEach(card => card.classList.remove("d-none"));

            // Ocultar el botón "Mostrar más" durante la búsqueda
            if (btn) btn.style.display = "none";

            let existeCoincidencia = false;

            cards.forEach(card => {
                const tagLink = card.querySelector(".tag-link");
                if (!tagLink) return;

                const nombre = tagLink.textContent.toLowerCase();
                const coincide = nombre.includes(filtro);

                if (coincide) {
                    card.style.display = "block";
                    existeCoincidencia = true;
                } else {
                    card.style.display = "none";
                }
            });

            // Si el input está vacío, restablecer vista original
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
    }
});

// Petición al backend para obtener listado de tags más usadas
function fetchTopTags() {
    const container = document.getElementById('top-tags-container');
    if (!container) {
        console.warn('#top-tags-container no encontrado al iniciar fetchTopTags');
        return;
    }

    fetch(BASE_URL + 'controllers/tag.php?op=top_tags')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                renderTopTags(data.data);
            } else {
                container.innerHTML = '<p>Error al cargar etiquetas.</p>';
            }
        })
        .catch(error => {
            console.error('Error al obtener tags:', error);
            container.innerHTML = '<p>Error de conexión.</p>';
        });
}

// Recibe tags y renderiza dinámicamente el HTML
function renderTopTags(tags) {
    const container = document.getElementById('top-tags-container');

    if (!container) {
        console.warn('#top-tags-container no encontrado');
        return;
    }

    if (!tags.length) {
        container.innerHTML = '<p>No hay etiquetas aún.</p>';
        return;
    }

    let visibleCount = 10; // cantidad de tags que se muestran inicialmente
    let html = '';

    tags.forEach((tag, index) => {
        const collapsedClass = index >= visibleCount ? 'collapse showMoreTagItems' : '';
        html += `
            <div class="tag-item ${collapsedClass}">
                <a href="tags" class="tag-link tag-link-md">${tag.name}</a>
                <span class="item-multiplier fs-13">
                    <span>×</span>
                    <span>${tag.total_tag}</span>
                </span>
            </div>`;
    });

    // Solo mostrar el botón si hay más de visibleCount tags
    if (tags.length > visibleCount) {
        html += `
            <a class="collapse-btn fs-13" data-bs-toggle="collapse" href=".showMoreTagItems" role="button" aria-expanded="false">
                <span class="collapse-btn-hide">Mostrar más<i class="la la-angle-down ms-1 fs-11"></i></span>
                <span class="collapse-btn-show">Mostrar menos<i class="la la-angle-up ms-1 fs-11"></i></span>
            </a>`;
    }

    document.getElementById('top-tags-container').innerHTML = html;
}