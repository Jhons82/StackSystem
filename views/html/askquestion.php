<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
require_once __DIR__ . '/../../models/Category.php';
$categoria = new Category();
$cats = $categoria->getCategory();
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>

    <title>New Question - J-GOD</title>
</head>

<body>
    <?php include('preloader.php') ?>

    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- START HERO -->
    <section class="hero-area bg-white shadow-sm overflow-hidden">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="hero-content pt-80px pb-80px">
                <h2 class="section-title">Haz una pregunta pública</h2>
                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 550 125">
                    <defs>
                        <style>
                            .cls-3,
                            .cls-6,
                            .cls-7 {
                                fill: none;
                                stroke-miterlimit: 10
                            }

                            .cls-3 {
                                stroke: #3cb1c6
                            }

                            .cls-4 {
                                fill: #fff
                            }

                            .cls-5 {
                                fill: #f9b851
                            }

                            .cls-6 {
                                stroke: #f48024
                            }

                            .cls-7 {
                                stroke: #bbc0c4;
                                stroke-dasharray: 5
                            }
                        </style>
                    </defs>
                    <g opacity=".5">
                        <path fill="#cceaff" d="M232.73 73L217.5 92.89V73h-16V26h64v47H232.73z"></path>
                        <path class="cls-3" d="M205 47V20.5h14.5M255.5 66.5h-18.51L221 86.06V66.5h-16V58M231.5 20.5H270v46h-6.5"></path>
                        <path class="cls-4" d="M222.5 40.79v7.3l8.16 7.29 15.84-14.21V33.3l-15.84 14.31-8.16-6.82z"></path>
                        <path class="cls-5" d="M374.36 76l-9.29 11.42-.26-11.42h-5.31V49h45v27h-30.14z"></path>
                        <path class="cls-6" d="M379.5 46.5H402V55M402 62v11.5H372.02L363 84.92V73.5h-6v-27h11.5"></path>
                        <path class="cls-4" d="M377.5 59h5v5h-5zM367.5 59h5v5h-5zM387.5 59h5v5h-5z"></path>
                        <path class="cls-5" d="M180.25 67l5.16 6.77.14-6.77h2.95V51h-25v16h16.75z"></path>
                        <path class="cls-6" d="M170.5 65.5h10.73l5.77 6.72V65.5h4V59M170.5 49.5H165V65M191 53v-3.5h-15.5"></path>
                        <path class="cls-4" transform="rotate(-180 177 58.5)" d="M175.5 57h3v3h-3z"></path>
                        <path class="cls-4" transform="rotate(-180 183 58.5)" d="M181.5 57h3v3h-3z"></path>
                        <path class="cls-4" transform="rotate(-180 171 58.5)" d="M169.5 57h3v3h-3z"></path>
                        <path class="cls-5" d="M486.95 77l15.55 19.89V77h16V30h-65v47H486.95z"></path>
                        <path class="cls-6" d="M515 51V24.5h-14.5M464.5 70.5h18.51L499 90.06V70.5h16V62M488.5 24.5H450v46h6.5"></path>
                        <path class="cls-4" d="M470.5 44.71V52l8.16 7.3 15.84-14.21v-7.87l-15.84 14.3-8.16-6.81z"></path>
                        <path class="cls-3" d="M533.5 34.5h-2.14L527 40.34V34.5h-3v-12h4.5M545 30v5.5h-7.5M533.5 22.5H545V26M534 28.5h2v2h-2z"></path>
                        <path class="cls-3" d="M529 28.5h2v2h-2zM539 28.5h2v2h-2zM280 30V16.5h7.5M305.5 39.5H296l-8 10v-10h-8V35M293.5 15.5H313v24h-3.5"></path>
                        <path class="cls-3" d="M289 26.52v3.65l4.08 3.65 7.92-7.11v-3.93l-7.92 7.15-4.08-3.41z"></path>
                        <path class="cls-6" d="M124.5 27.5h1.41l3.09 4.23V27.5h2v-10h-2.5M115 23v4.5h6.5M124.5 17.5H115V21"></path>
                        <path class="cls-6" transform="rotate(-180 123 22.5)" d="M122 21.5h2v2h-2z"></path>
                        <path class="cls-6" transform="rotate(-180 127 22.5)" d="M126 21.5h2v2h-2z"></path>
                        <path class="cls-6" transform="rotate(-180 119 22.5)" d="M118 21.5h2v2h-2z"></path>
                        <path class="cls-7" d="M188.5 78.19s4.69 18.91 27.5 16.28M131 32.67s21.64-2 33 15M271.12 69.19c23.92 31.24 55.21 35.18 90.64 19.3M402 43.5c.68-6.28 19.53-30.13 45.26-21M503.45 98.26c5.25.1 37.8-10.84 23.09-54.76M272.34 66.5s10.51 0 15.16-13.88"></path>
                        <path class="cls-7" d="M97.22 79.67c14.33-2.39 42.51-3.18 55.87 12.65s58.91 20.93 64.49 3"></path>
                    </g>
                    <path class="cls-3" d="M59.15 84.6v-1.04M71.6 84.81v3.73M53.39 82.51l-3.96-.54 2.96-21.6 27.37 3.75-2.96 21.6-20.05-2.75"></path>
                    <path class="cls-3" d="M50.22 76.21l-2.31-.32a2 2 0 01-1.73-2.28l.63-4.61a2 2 0 012.3-1.74l2.3.31zM79.88 80.27L77.59 80l1.18-8.64 2.32.32a2 2 0 011.73 2.27l-.64 4.62a2 2 0 01-2.3 1.7zM66.6 79.11l-.2 1.44M69.48 79.5l-.2 1.44M63.72 78.71l-.2 1.44M60.84 78.32l-.2 1.44M57.96 77.93l-.2 1.44"></path>
                    <ellipse class="cls-3" cx="66.45" cy="70.5" rx="2.87" ry="2.94" transform="rotate(-82.2 66.45 70.504)"></ellipse>
                    <ellipse class="cls-3" cx="56.76" cy="69.18" rx="2.87" ry="2.94" transform="rotate(-82.2 56.758 69.175)"></ellipse>
                    <path class="cls-3" d="M55.42 105.96v7.46M72.84 105.96v7.46M76.57 96.01v1.24M66.62 96.01v1.24M54.18 95.38h7.47v4.98h-7.47z"></path>
                    <path class="cls-3" d="M81.55 100.98v4.36H46.71V87.92h5.28M57.43 79.39l-1.98 3"></path>
                    <path class="cls-3" d="M54.31 90.61c-2.34-1.55-3.17-4.43-1.85-6.43l1.8-2.73 8.49 5.61L61 89.78c-1.37 2.01-4.34 2.38-6.69.83zM62.27 87.92h19.28v9.33"></path>
                    <path class="cls-3" d="M88.32 96.44l1.28-4.17a4.4 4.4 0 00-4.45-4.35h-5.47M79.29 104.84l2.68-3.44M82.72 107.53l2.69-3.44M88.32 96.83c2.22 1.73 2.81 4.67 1.33 6.56l-2 2.57-8-6.27 2-2.57c1.47-1.89 4.46-2.02 6.67-.29zM55.3 91.15a6.72 6.72 0 01-1.74.35H46.5"></path>
                    <path class="cls-5" d="M40.82 46.24l7.96 10 .23-10h4.55V22.6H14.98v23.64h25.84z"></path>
                    <path class="cls-6" d="M28.67 43.13h14.69l8.33 10.53V43.13h6.22V33.8M26.18 19.49H18.1v24.26M56.67 25.09v-5.6H33.65"></path>
                    <path class="cls-4" d="M34.17 33.8a5.9 5.9 0 01.34-2.23 4.5 4.5 0 011.24-1.64A6.41 6.41 0 0037 28.62a2.06 2.06 0 00.3-1.07c0-1.12-.52-1.69-1.56-1.69a1.56 1.56 0 00-1.18.46 1.74 1.74 0 00-.46 1.25h-2.9a3.84 3.84 0 011.23-3 4.82 4.82 0 013.31-1.08 4.84 4.84 0 013.29 1 3.64 3.64 0 011.17 2.89 3.57 3.57 0 01-.43 1.62 6.57 6.57 0 01-1.33 1.68l-.81.77a2.78 2.78 0 00-.87 1.71v.61zM34 36.85a1.34 1.34 0 01.43-1 1.64 1.64 0 012.17 0 1.34 1.34 0 01.43 1 1.32 1.32 0 01-.42 1 1.7 1.7 0 01-2.19 0 1.32 1.32 0 01-.42-1z"></path>
                    <path class="cls-3" d="M79.06 124H66.62v-4.21a6.45 6.45 0 015-6.42 6.29 6.29 0 017.47 6.33zM75.33 122.13v1.25M70.35 122.13v1.25M61.64 124H49.2v-4.21a6.47 6.47 0 015-6.42 6.29 6.29 0 017.47 6.33zM57.91 122.13v1.25M52.93 122.13v1.25"></path>
                </svg>
            </div><!-- end hero-content -->
        </div>
    </section>
    <!-- END HERO -->

    <!-- QUESTION AREA -->
    <section class="question-area pt-80px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-item">
                        <form method="post" id="formQuestion" class="card-body" enctype="multipart/form-data">
                            <div class="input-box">
                                <label for="title" class="fs-14 text-black fw-medium mb-0">Título de la pregunta</label>
                                <p class="fs-13 pb-3 lh-20">Sé específico e imagina que le estás haciendo una pregunta a otra persona</p>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" id="title" name="title" placeholder="Ej: ¿Existe una función en R para encontrar el índice de un elemento en un vector?">
                                </div>
                            </div>
                            <div class="input-box">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <label class="fs-14 text-black fw-medium mb-0">Etiquetas</label>
                                        <p class="fs-13 pb-3 lh-20">Agrega hasta 5 etiquetas que describan sobre qué trata tu pregunta:</p>
                                    </div>
                                    <button type="button" class="popover-trigger btn border border-gray py-1 lh-18 px-2" data-container="body" data-bs-toggle="popover" data-placement="top">
                                        <svg aria-hidden="true" class="svg-icon-color-gray" width="14" height="14">
                                            <path d="M7 1a6 6 0 100 12A6 6 0 007 1zm1.06 9.06c-.02.63-.48 1.02-1.1 1-.57-.02-1.03-.43-1.01-1.06.02-.63.5-1.04 1.08-1.02.6.02 1.05.45 1.03 1.08zm.73-3.07l-.47.3c-.2.15-.36.36-.44.6a3.6 3.6 0 00-.08.65c0 .04-.03.14-.16.14h-1.4c-.14 0-.16-.09-.16-.13-.01-.5.11-.99.36-1.42A4.6 4.6 0 017.7 6.07c.15-.1.21-.21.3-.33a1.14 1.14 0 00.02-1.48c-.22-.26-.46-.4-.92-.4-.45 0-.83.23-1.02.52-.19.3-.16.63-.16.94H4.2c0-1.17.31-1.92.98-2.36a3.5 3.5 0 011.83-.44c.88 0 1.58.16 2.2.62.58.42.88 1.02.88 1.82 0 .5-.17.9-.43 1.24-.15.2-.44.47-.86.79h-.01z"></path>
                                        </svg>
                                    </button>
                                    <div class="generic-popover d-none">
                                        <h4 class="fs-16 pb-1">Cómo etiquetar</h4>
                                        <p class="pb-2 fs-14">Las etiquetas ayudan a que las personas adecuadas encuentren y respondan tu pregunta.</p>
                                        <ul class="generic-list-item generic-list-item-bullet">
                                            <li class="lh-18 text-black-50">Incluye solo etiquetas esenciales para tu pregunta, como <div class="tag-link">c#</div>
                                            </li>
                                            <li class="lh-18 text-black-50">"No encuentra la etiqueta", puede crear una nueva junto con las demás etiquetas.</li>
                                            <li class="lh-18 text-black-50">Incluye números de versión, como <div class="tag-link">c#-4.0</div>, solo si es absolutamente necesario</li>
                                            <li class="lh-18 text-black-50">Usa <a href="#" class="d-inline-block text-color hover-underline" target="_blank">etiquetas populares existentes</a></li>
                                        </ul>
                                        <p class="pb-1 fs-14">Si no encuentras una etiqueta:</p>
                                        <p class="fs-14 text-black-50"><a href="#" class="text-color hover-underline" target="_blank">Crea nuevas etiquetas</a> o publica sin ella y <a href="#" class="text-color hover-underline" target="_blank">pide a la comunidad</a> que cree una por ti.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="tagInput" name="tags" placeholder="Ej: javascript" />
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="categorySelect" class="fs-14 text-black fw-medium mb-0">Categoría</label>
                                <p class="fs-13 pb-3 lh-20">Por favor, elige la sección adecuada para que la pregunta se pueda encontrar fácilmente.</p>
                                <div class="form-group">
                                    <select id="categorySelect" name="category_id" class="select-container select--container">
                                        <option selected='' value=''>Seleccionar Categoría</option>
                                        <?php foreach ($cats as $cat) : ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="fs-14 text-black fw-medium mb-0">Detalles</label>
                                <p class="fs-13 pb-3 lh-20">Incluye toda la información que alguien necesitaría para responder tu pregunta</p>
                                <div class="form-group">
                                    <iframe id="stackEditorFrame" src="<?php echo BASE_URL; ?>views/html/editor-frame.php" style="width: 100%; border: none;" scrolling="no"></iframe>
                                    <script>
                                        window.addEventListener("message", function (event) {
                                            if (event.data?.type === "editorHeight" && typeof event.data.height === "number") {
                                                const iframe = document.getElementById("stackEditorFrame");
                                                if (iframe) {
                                                    iframe.style.height = event.data.height + "px";
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div id="preview-panel" class="s-card mt16 p16 d-none">
                                <p id="preview-excerpt" class="fc-black-600 mb12"></p>
                                <div id="preview-content" class="s-prose s-card p16 mb16"></div>
                            </div>
                            <input type="hidden" name="body_html" id="body_html">
                            <div class="input-box pt-2">
                                <div class="form-group">
                                    <div class="form-check custom-checkbox mb-1">
                                        <label class="form-check-label" for="notifications_enabled">
                                            <input class="form-check-input" type="checkbox" value="1" id="notifications_enabled" name="notifications_enabled">
                                            Recibir notificaciones por correo cuando alguien responda esta pregunta.
                                        </label>
                                    </div>
                                    <div class="form-check custom-checkbox mb-1">
                                        <input class="form-check-input" type="checkbox" value="" id="AgreeCheckBox">
                                        <label class="form-check-label" for="AgreeCheckBox">
                                            Al hacer tu pregunta, aceptas la <a href="" class="text-color hover-underline">Política de Privacidad.</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="btn btn-primary" id="btnpublish" disabled>Publicar tu pregunta</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="card card-item p-4">
                            <h3 class="fs-17 pb-3">Paso 1: Redacta tu pregunta</h3>
                            <div class="divider"><span></span></div>
                            <p class="fs-14 lh-22 pb-2 pt-3">La comunidad está aquí para ayudarte con problemas específicos de programación, algoritmos o lenguajes.</p>
                            <p class="fs-14 lh-22">Evita hacer preguntas basadas en opiniones.</p>
                            <div id="accordion" class="generic-accordion pt-4">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn btn-link fs-15" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span><span class="text-color pe-2 fs-16">1.</span> Resume el problema</span>
                                            <i class="la la-angle-down collapse-icon"></i>
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet-2 fs-14">
                                                <li class="lh-18 text-black-50">Incluye detalles sobre tu objetivo</li>
                                                <li class="lh-18 text-black-50">Describe los resultados esperados y los reales</li>
                                                <li class="lh-18 text-black-50 mb-0">Incluye cualquier mensaje de error</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <button class="btn btn-link collapsed fs-15" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span><span class="text-color pe-2 fs-16">2.</span> Describe lo que has intentado</span>
                                            <i class="la la-angle-down collapse-icon"></i>
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <p class="fs-14 lh-22 text-black-50">
                                                Muestra lo que has intentado y cuéntanos qué encontraste (en este sitio o en otro lugar) y por qué no cumplió con tus necesidades. Puedes obtener mejores respuestas si incluyes tu investigación.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <button class="btn btn-link collapsed fs-15" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span><span class="text-color pe-2 fs-16">3.</span> Muestra algo de código</span>
                                            <i class="la la-angle-down collapse-icon"></i>
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <p class="fs-14 lh-22 text-black-50">
                                                Cuando sea apropiado, comparte la mínima cantidad de código necesaria para que otros puedan reproducir tu problema (también llamado un
                                                <a class="text-color hover-underline">ejemplo mínimo</a>, <a class="text-color hover-underline">reproducible</a>)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end accordion -->
                        </div>

                        <div id="accordion-two" class="generic-accordion">
                            <div class="card mb-3">
                                <div class="card-header" id="headingFour">
                                    <button class="btn btn-link collapsed fs-15" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>¿Tienes una pregunta que no es de programación?</span>
                                        <i class="la la-angle-down collapse-icon"></i>
                                    </button>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion-two">
                                    <div class="card-body">
                                        <p class="fs-14 lh-22 text-black-50 pb-2">
                                            <a class="text-color hover-underline d-block">Super User</a>
                                            Resolución de problemas de hardware y software
                                        </p>
                                        <p class="fs-14 lh-22 text-black-50 pb-2">
                                            <a class="text-color hover-underline d-block">Ingeniería de software</a>
                                            Para preguntas sobre métodos y procesos de desarrollo de software
                                        </p>
                                        <p class="fs-14 lh-22 text-black-50 pb-2">
                                            <a class="text-color hover-underline d-block">Recomendaciones de hardware</a>
                                        </p>
                                        <p class="fs-14 lh-22 text-black-50 pb-2">
                                            <a class="text-color hover-underline d-block">Recomendaciones de software</a>
                                        </p>
                                        <p class="fs-14 lh-22 text-black-50">Haz preguntas sobre el sitio en <a class="text-color hover-underline">meta</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <button class="btn btn-link collapsed fs-15" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <span>Más enlaces útiles</span>
                                        <i class="la la-angle-down collapse-icon"></i>
                                    </button>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion-two">
                                    <div class="card-body">
                                        <p class="fs-14 lh-22 text-black-50 pb-2">
                                            Encuentra más información sobre <a class="text-color hover-underline">cómo hacer una buena pregunta aquí</a>
                                        </p>
                                        <p class="fs-14 lh-22 text-black-50">
                                            Visita el <a class="text-color hover-underline"">centro de ayuda</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end accordion -->
                    </div><!-- end sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- END QUESTION AREA -->

    <!-- CTA -->
    <?php include('cta.php') ?>
    <!-- END CTA -->

    <!-- FOOTER -->
    <?php include('footer.php') ?>
    <!-- END FOOTER -->

    <!-- start back to top -->
    <?php include('backtotop.php') ?>
    <!-- end back to top -->

    <!-- Modal Login -->
    <?php include('loginModal.php') ?>
    <!-- End Modal Login -->

    <!-- Modal Register -->
    <?php include('signupmodal.php') ?>
    <!-- End Modal Register -->

    <!-- Modal Recover -->
    <?php include('recoverModal.php') ?>
    <!-- End Modal Recover -->

    <!-- template js files -->
    <?php include('js.php'); ?>

    <script>
        const BASE_URL = " <?php echo BASE_URL; ?>";
    </script>
    <script>
    window.addEventListener("message", function (event) {
        // Ajustar altura del iframe
        if (event.data?.type === "editorHeight") {
            document.getElementById("stackEditorFrame").style.height = event.data.height + "px";
        }

        // Obtener contenido del editor
        if (event.data?.type === "editorContent") {
            console.log("Contenido:", event.data.content);

            // Aquí puedes guardar en una variable o enviarlo en un form oculto si lo deseas
            // document.getElementById("contenidoEditor").value = event.data.content;
        }
    });
    </script>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>views/js/askquestion.js"></script>
</body>

</html>