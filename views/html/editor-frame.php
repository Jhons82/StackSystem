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

        *, *::before, *::after {
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        
        .stacks-editor__wrapper {
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
    (function () {
        const sendHeight = () => {
            const height = document.documentElement.scrollHeight + 2;
            window.parent.postMessage({type: 'editorHeight', height}, '*')
        };

        window.addEventListener("load", () => {
            const container = document.getElementById("editor-container");
            const { StacksEditor } = window.stacksEditor ?? {};

            if (!container || !StacksEditor) {
                console.error("Editor o dependencias no disponibles.");
                return;
            }

            try {
                const editor = new StacksEditor(container, "");

                editor.on?.("change", () => {
                    const html = editor.getContent({ format:"html" });
                    window.parent.postMessage({ type:"editorContent", html },"*");
                    sendHeight();
                });

                // Observa cualquier cambio visual del DOM
                new ResizeObserver(sendHeight).observe(document.documentElement);

                // Medida inicial
                sendHeight();

            } catch (err) {
                console.error("Error al crear el editor:", err);
            }
        });
    })();
</script>

</body>
</html>