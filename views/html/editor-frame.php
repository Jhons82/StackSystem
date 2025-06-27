<?php
require_once __DIR__ . '/../../includes/config.php'; // Asegúrate que BASE_URL esté definido
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Stack Editor Frame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stacks CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>includes/node_modules/@stackoverflow/stacks/dist/css/stacks.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>includes/node_modules/@stackoverflow/stacks-editor/dist/styles.css">

    <!-- highlight.js (para sintaxis de código) -->
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.8.0/highlight.min.js"></script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: auto;
            background-color: #fff;
            box-sizing: border-box;
        }

        #editor-container {
            min-height: 300px;
            height: auto;
        }

        .stacks-editor__wrapper {
            min-height: 300px !important;
            height: auto !important;
        }
    </style>
</head>
<body>

<div id="editor-container"></div>

<!-- Scripts -->
<script src="<?php echo BASE_URL; ?>includes/node_modules/@stackoverflow/stacks/dist/js/stacks.min.js"></script>
<script src="<?php echo BASE_URL; ?>includes/node_modules/@stackoverflow/stacks-editor/dist/app.bundle.js"></script>

<script>
    let lastHeight = 0;

    function sendEditorHeight() {
        // Espera 50ms para que el editor termine de colapsar antes de medir
        setTimeout(() => {
            const height = Math.max(300, document.body.scrollHeight);
            if (height !== lastHeight) {
                lastHeight = height;
                window.parent.postMessage({ type: "editorHeight", height }, "*");
            }
        }, 50);
    }

    window.addEventListener("load", () => {
        const container = document.querySelector("#editor-container");

        if (!container || !window.stacksEditor?.StacksEditor) {
            console.error("❌ Editor o dependencias no disponibles.");
            return;
        }

        try {
            const editor = new window.stacksEditor.StacksEditor(container, "");

            if (editor && typeof editor.on === "function") {
                editor.on("change", () => {
                    const content = editor.getContent();
                    window.parent.postMessage({ type: "editorContent", content }, "*");
                    sendEditorHeight();
                });
            }

            // Observa cualquier cambio visual del DOM
            new MutationObserver(sendEditorHeight).observe(document.body, {
                childList: true,
                attributes: true,
                subtree: true
            });

            // Refuerzo automático
            setInterval(sendEditorHeight, 300);

            // Medida inicial
            sendEditorHeight();

        } catch (e) {
            console.error("❌ Error al crear el editor:", e);
        }
    });
</script>


</body>
</html>