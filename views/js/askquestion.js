function init() {}

/* Extraer la primera <p> del editor */
function firstParagraph(html) {
    const doc = new DOMParser().parseFromString(html, "text/html");
    const pTags = [...doc.querySelectorAll("p")].filter(p => {
        const text = p.textContent.trim();
        return text && !p.closest("pre");
    });
    return pTags[0]?.textContent.trim() || "";
}

document.addEventListener("DOMContentLoaded", function () {

    /* ------------ Tagify ------------------ */
    const tagInput = document.getElementById("tagInput");
    const tagify   = new Tagify(tagInput, {
        maxTags: 5,
        dropdown: { enabled: 1, maxItems: 10, classname: "custom-tag-dropdown", closeOnSelect: false }
    });
    tagify.on("input", e => {
        fetch(`${BASE_URL}controllers/question.php?op=search&term=${encodeURIComponent(e.detail.value)}`)
            .then(r => r.json())
            .then(s => { tagify.settings.whitelist = s; tagify.dropdown.show.call(tagify, e.detail.value); });
    });

    const checkbox  = document.getElementById("AgreeCheckBox");
    const btnpublish = document.getElementById("btnpublish");
    checkbox.addEventListener("change", () => { btnpublish.disabled = !checkbox.checked; });

    /*  FUNCIÓN ÚNICA que obtiene el HTML limpio del editor */
    function getCleanContent() {
        const iFrame = document.getElementById("stackEditorFrame");
        const doc    = iFrame.contentDocument || iFrame.contentWindow.document;
        const editor = doc.querySelector(".js-editor.ProseMirror");
        if (!editor) return "";

        const cloned = editor.cloneNode(true);

        const basura = [
            '.js-language-input','.js-language-dropdown-container','.s-input-icon','.v-visible-sr',
            'label','input','button','.js-language-selector','.ps-absolute','.s-card','.ps-relative.mb8','.js-code-view'
        ];
        basura.forEach(sel => {
            cloned.querySelectorAll(sel).forEach(el => { if (!el.closest("pre")) el.remove(); });
        });

        cloned.querySelectorAll("p").forEach(p => {
            if ((!p.closest("pre") && (p.innerHTML.trim()==='<br>' || p.innerHTML.trim()===''))) p.remove();
        });

        return cloned.innerHTML.trim();
    }

    /* VISTA PREVIA EN TIEMPO REAL (cada 400 ms) */
    const previewPanel   = document.getElementById("preview-panel");
    const previewContent = document.getElementById("preview-content");
    /* const previewExcerpt = document.getElementById("preview-excerpt"); */

    setInterval(() => {
        const html = getCleanContent();

        const visible = html
            .replace(/<br\s*\/?>/gi, '')             // quita <br>
            .replace(/&nbsp;/gi, '')                 // quita &nbsp;
            .replace(/<\/?[^>]+>/g, '')              // quita TODAS las etiquetas
            .trim().length > 0;

        if (!visible) {
            previewPanel.classList.add("d-none");
            previewContent.innerHTML = "";
            lastHtml = "";
            return;
        }

        if (html !== lastHtml) {
            previewPanel.classList.remove("d-none");
            previewContent.innerHTML = html;
            if (typeof hljs !== 'undefined') {
                previewContent.querySelectorAll("pre code").forEach(c => hljs.highlightElement(c));
            }
            lastHtml = html;
        }
        /* previewExcerpt.textContent = firstParagraph(html); */
    }, 400);   // refresca 2‑3 veces por segundo

    /* ENVÍO del formulario */
    document.getElementById("formQuestion").addEventListener("submit", function (e) {
        e.preventDefault();

        /* Reutilizamos la MISMA función */
        const content = getCleanContent();
        if (!content) {
            Swal.fire("Oops", "La pregunta está vacía.", "warning");
            return;
        }
        const excerpt = firstParagraph(content);

        const formData = new FormData(this);
        formData.append("tags", JSON.stringify(tagify.value.map(t => t.value)));
        formData.append("content", content);
        formData.append("excerpt", excerpt);

        console.log("CONTENIDO A GUARDAR:", content);

        fetch(`${BASE_URL}controllers/question.php?op=insert_question`, { method: 'POST', body: formData })
            .then(r => r.json())
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
                            popup: "animate__animated animate__fadeOutUp"
                        },
                        backdrop: `
                        rgba(0, 0, 0, 0.4) left top no-repeat`,
                    }).then(() => {
                        location.reload();
                        tagify.removeAllTags();
                    });
                } else if (data.status === 'error') {
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
                            popup: "animate__animated animate__fadeOutUp"
                        },
                        backdrop: `
                        rgba(0, 0, 0, 0.4) left top no-repeat`,
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
                            popup: "animate__animated animate__fadeOutUp"
                        },
                        backdrop: `
                        rgba(0, 0, 0, 0.4) left top no-repeat`,
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error de red',
                    text: 'Ocurrió un problema al enviar la solicitud',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#e74c3c',
                    background: '#fff0f0',
                    color: '#333'
                });
            });
    });

});

init();
