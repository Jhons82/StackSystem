<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config/conexion.php';
require_once 'config/session.php';
/* echo '<pre>';
print_r($_SESSION);
echo '</pre>'; */
?>
<?php
require_once 'includes/config.php'; // Carga BASE_URL 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/html/head.php'; // Carga los estilos con BASE_URL 
    ?>
</head>

<body>

    <!-- start cssload-loader -->
    <?php include 'views/html/preloader.php' ?>
    <!-- end cssload-loader -->

    <!-- START HEADER AREA -->
    <header class="header-area bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo-box">
                        <a href="home.php" class="logo"><img src="<?php echo BASE_URL; ?>assets/images/logo_light.png" alt="logo" style="width: 140px; height: 33px;"></a>
                        <div class="user-action">
                            <div class="search-menu-toggle icon-element icon-element-xs shadow-sm me-1" data-bs-toggle="tooltip" data-placement="top" title="Search">
                                <i class="la la-search"></i>
                            </div>
                            <div class="off-canvas-menu-toggle icon-element icon-element-xs shadow-sm" data-bs-toggle="tooltip" data-placement="top" title="Main menu">
                                <i class="la la-bars"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-lg-2 -->
                <div class="col-lg-10">
                    <div class="menu-wrapper border-left border-left-gray ps-4 justify-content-end p-3">
                        <form method="post" class="me-4">
                            <div class="form-group mb-0">
                                <input class="form-control form--control form--control-bg-gray" type="text" name="search" placeholder="Escribe las palabras de búsqueda...">
                                <button class="form-btn" type="button"><i class="la la-search"></i></button>
                            </div>
                        </form>
                        <div class="nav-right-button">
                            <a href="#" class="btn theme-btn theme-btn-outline theme-btn-outline-white me-2" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="la la-sign-in me-1"></i> Iniciar Sesión</a>
                            <a href="#" class="btn theme-btn theme-btn-white" data-bs-toggle="modal" data-bs-target="#signUpModal"><i class="la la-user me-1"></i> inscribirse</a>
                        </div><!-- end nav-right-button -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-10 -->
            </div>
        </div>
        <div class="off-canvas-menu custom-scrollbar-styled">
            <div class="off-canvas-menu-close icon-element icon-element-sm shadow-sm" data-bs-toggle="tooltip" data-placement="left" title="Close menu">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
            <div class="off-canvas-btn-box px-4 pt-5 text-center">
                <a href="#" class="btn theme-btn theme-btn-sm theme-btn-outline" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="la la-sign-in me-1"></i> Login</a>
                <span class="fs-15 fw-medium d-inline-block mx-2">Or</span>
                <a href="#" class="btn theme-btn theme-btn-sm" data-bs-toggle="modal" data-bs-target="#signUpModal"><i class="la la-plus me-1"></i> Sign up</a>
            </div>
        </div><!-- end off-canvas-menu -->
        <div class="mobile-search-form">
            <div class="d-flex align-items-center">
                <form method="post" class="flex-grow-1 me-3">
                    <div class="form-group mb-0">
                        <input class="form-control form--control pl-40px" type="text" name="search" placeholder="Escribe las palabras de búsqueda...">
                        <span class="la la-search input-icon"></span>
                    </div>
                </form>
                <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                    <i class="la la-times"></i>
                </div><!-- end off-canvas-menu-close -->
            </div>
        </div><!-- end mobile-search-form -->
        <div class="body-overlay"></div>
    </header>
    <!-- END HEADER AREA -->

    <!-- START HERO AREA -->
    <section class="hero-area bg-dark overflow-hidden section-padding">
        <span class="stroke-shape stroke-shape-1 stroke-shape-white"></span>
        <span class="stroke-shape stroke-shape-2 stroke-shape-white"></span>
        <span class="stroke-shape stroke-shape-3 stroke-shape-white"></span>
        <span class="stroke-shape stroke-shape-4 stroke-shape-white"></span>
        <span class="stroke-shape stroke-shape-5 stroke-shape-white"></span>
        <span class="stroke-shape stroke-shape-6 stroke-shape-white"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mr-auto">
                    <div class="hero-content">
                        <h2 class="section-title fs-50 pb-3 text-white lh-65">¡Únete a la red de preguntas y respuestas más grande del mundo!</h2>
                        <p class="lh-26 text-white">Este es solo un texto de ejemplo creado para esta plantilla única y asombrosa; puedes reemplazarlo con cualquier otro texto.</p>
                        <div class="hero-btn-box pt-30px">
                            <a href="#for-developers" class="btn theme-btn me-2 page-scroll">Para desarrolladores <i class="la la-angle-down icon ms-1"></i></a>
                            <a href="#for-businesses" class="btn theme-btn bg-3 page-scroll">Para empresas <i class="la la-angle-down icon ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="generic-img-box generic-img-box-layout-2">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img1.jpg" alt="imagen">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img2.jpg" alt="imagen">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="imagen">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img4.jpg" alt="imagen">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img4.jpg" alt="imagen">
            <img class="lazy" src="<?php echo BASE_URL; ?>assets/images/img-loading.png" data-src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="imagen">
        </div>
    </section>
    <!-- END HERO AREA -->

    <!-- START FUNFACT AREA -->
    <section class="funfact-area">
        <div class="container">
            <div class="counter-box bg-white shadow-md rounded-rounded px-4">
                <div class="row">
                    <div class="col responsive-column-half border-right border-right-gray">
                        <div class="media media-card text-center px-0 py-4 shadow-none rounded-0 bg-transparent counter-item mb-0">
                            <div class="media-body">
                                <h5 class="fw-semi-bold pb-2">80+ millones</h5>
                                <p class="lh-20">Visitantes mensuales a nuestra red</p>
                            </div>
                        </div>
                    </div>
                    <div class="col responsive-column-half border-right border-right-gray">
                        <div class="media media-card text-center px-0 py-4 shadow-none rounded-0 bg-transparent counter-item mb-0">
                            <div class="media-body">
                                <h5 class="fw-semi-bold pb-2">25+ millones</h5>
                                <p class="lh-20">Preguntas realizadas hasta la fecha</p>
                            </div>
                        </div>
                    </div>
                    <div class="col responsive-column-half border-right border-right-gray">
                        <div class="media media-card text-center px-0 py-4 shadow-none rounded-0 bg-transparent counter-item mb-0">
                            <div class="media-body">
                                <h5 class="fw-semi-bold pb-2">14.7 segundos</h5>
                                <p class="lh-20">Tiempo promedio entre nuevas preguntas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col responsive-column-half border-right border-right-gray">
                        <div class="media media-card text-center px-0 py-4 shadow-none rounded-0 bg-transparent counter-item mb-0">
                            <div class="media-body">
                                <h5 class="fw-semi-bold pb-2">40+ mil millones</h5>
                                <p class="lh-20">Veces que un desarrollador recibió ayuda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col responsive-column-half">
                        <div class="media media-card text-center px-0 py-4 shadow-none rounded-0 bg-transparent counter-item mb-0">
                            <div class="media-body">
                                <h5 class="fw-semi-bold pb-2">10,000+</h5>
                                <p class="lh-20">Empresas clientes de todos los productos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end counter-box -->
        </div>
    </section>
    <!-- END FUNFACT AREA -->

    <!-- START GET START AREA -->
    <section class="get-started-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 responsive-column-half">
                    <div class="media media-card align-items-center">
                        <div class="icon-element icon-element-lg me-4 shadow-sm rounded-rounded border border-gray">
                            <svg aria-hidden="true" class="svg-icon-color-1" width="45" height="45" viewbox="0 0 48 48">
                                <path opacity=".2" d="M29.22 38.1a3.4 3.4 0 014.81-4.82l8.81 8.81a3.4 3.4 0 01-4.81 4.81l-8.81-8.8z"></path>
                                <path d="M18.5 5a1 1 0 100 2c.63 0 1.24.05 1.84.15a1 1 0 00.32-1.98A13.6 13.6 0 0018.5 5zm7.02 1.97a1 1 0 10-1.04 1.7 11.5 11.5 0 015.44 8.45 1 1 0 001.98-.24 13.5 13.5 0 00-6.38-9.91zM18.5 0a18.5 18.5 0 1010.76 33.55c.16.57.46 1.12.9 1.57L40 44.94A3.5 3.5 0 1044.94 40l-9.82-9.82c-.45-.45-1-.75-1.57-.9A18.5 18.5 0 0018.5 0zM2 18.5a16.5 16.5 0 1133 0 16.5 16.5 0 01-33 0zm29.58 15.2a1.5 1.5 0 112.12-2.12l9.83 9.83a1.5 1.5 0 11-2.12 2.12l-9.83-9.83z"></path>
                            </svg>
                        </div>
                        <div class="media-body">
                            <p class="pb-3 fs-18">Encuentra la mejor respuesta para tu pregunta técnica, <br> ayuda a otros a responder las suyas</p>
                            <a href="home-2.html" class="btn theme-btn theme-btn-white">Explorar preguntas <i class="la la-arrow-right icon ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="media media-card align-items-center">
                        <div class="icon-element icon-element-lg me-4 shadow-sm rounded-rounded border border-gray">
                            <svg aria-hidden="true" class="svg-icon-color-2" width="45" height="45" viewbox="0 0 48 48">
                                <path opacity=".2" d="M12 22a2 2 0 00-2 2v19a4 4 0 004 4h24a4 4 0 004-4V26a4 4 0 00-4-4H12zm6 7a5 5 0 117.67 4.23l.05.35c.15.84.36 1.8.61 2.86A2.06 2.06 0 0124.35 39h-2.7a2.06 2.06 0 01-1.98-2.56c.29-1.2.52-2.3.66-3.2l-.19-.14A5 5 0 0118 29z"></path>
                                <path d="M23 24a5 5 0 00-2.86 9.1l.2.13c-.15.91-.38 2-.67 3.21A2.06 2.06 0 0021.65 39h2.7c1.32 0 2.3-1.26 1.98-2.56a46.74 46.74 0 01-.6-2.86l-.06-.35A5 5 0 0023 24zm0 2a3 3 0 011.76 5.43l-.16.11a2 2 0 00-.91 2c.16.98.4 2.12.7 3.37.01.05-.02.09-.04.09h-2.7c-.02 0-.05-.04-.04-.09.3-1.25.54-2.4.7-3.36a2 2 0 00-.78-1.92l-.13-.09A3 3 0 0123 26zM12 12.44V18H9a3 3 0 00-3 3v21a3 3 0 003 3h28a3 3 0 003-3V21a3 3 0 00-3-3h-3v-5.56C34 6.2 29.36 1 23 1S12 6.19 12 12.44zM23 3c5.14 0 9 4.18 9 9.44V18H14v-5.56C14 7.18 17.86 3 23 3zM9 20h28a1 1 0 011 1v21a1 1 0 01-1 1H9a1 1 0 01-1-1V21a1 1 0 011-1z"></path>
                            </svg>
                        </div>
                        <div class="media-body">
                            <p class="pb-3 fs-18">¿Quieres un espacio seguro y privado para tu <br> conocimiento técnico?</p>
                            <a href="free-demo.html" class="btn theme-btn theme-btn-white">Crear un equipo gratis <i class="la la-arrow-right icon ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END GET START AREA -->

    <!-- START CLIENT LOGO AREA -->
    <section class="client-logo-area section--padding bg-radial-gradient-gray">
        <div class="container">
            <div class="client-logo-box">
                <h3 class="fs-21 text-center text-gray">Miles de organizaciones en todo el mundo usan J-GOD para Equipos</h3>
                <div class="row justify-content-center text-center pt-50px">
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                    <div class="col-lg-3 responsive-column-half">
                        <div class="client-logo-item mb-30px bg-white shadow-sm p-3 rounded-rounded hover-y">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo_onai.png" alt="logo del cliente">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END CLIENT LOGO AREA -->

    <!-- START CTA AREA -->
    <section class="get-started-area section--padding pattern-bg" id="for-developers">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title pb-3">Para desarrolladores, por desarrolladores</h2>
                <p class="section-desc w-50 mx-auto"> J-GOD es una comunidad abierta para cualquier persona que programe. Te ayudamos a obtener respuestas a tus preguntas más difíciles sobre programación, compartir conocimiento con tus colegas en privado
                    y encontrar tu próximo trabajo soñado.
                </p>
            </div>
            <div class="row pt-50px">
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-y text-center">
                        <div class="card-body">
                            <svg width="70" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewbox="0 0 64 64" xml:space="preserve">
                                <g>
                                    <g>
                                        <polygon style="fill:#F0BC5E;" points="18,36 18,24 11,24 11,41 47,41 47,36   "></polygon>
                                    </g>
                                    <g>
                                        <g>
                                            <path style="fill:#F0BC5E;" d="M23,21H11v-8h12V21z"></path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path style="fill:#F0BC5E;" d="M38,21H26v-8h12V21z"></path>
                                        </g>
                                    </g>
                                    <g>
                                        <path d="M58,17h-7V1H7v16H6c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h13v4h-4v2h34v-2h-4v-4h13c2.757,0,5-2.243,5-5V22    C63,19.243,60.757,17,58,17z M49,25h2v6h-2V25z M47,27H29v-2h18V27z M27,30.557l-5.713-2.142C21.115,28.35,21,28.184,21,28    s0.115-0.35,0.288-0.415L27,25.443V30.557z M29,29h18v2H29V29z M53,25h1c1.654,0,3,1.346,3,3s-1.346,3-3,3h-1V25z M27.818,23    l-7.232,2.712C19.638,26.067,19,26.987,19,28s0.638,1.933,1.585,2.288L27.818,33H49v10H9V11h40v12H27.818z M49,3v6H9V3H49z M6,19    h1v26h44V33h3c2.757,0,5-2.243,5-5s-2.243-5-5-5h-3v-4h7c1.654,0,3,1.346,3,3v27H3V22C3,20.346,4.346,19,6,19z M43,61H21v-4h22V61    z M58,55H6c-1.654,0-3-1.346-3-3v-1h58v1C61,53.654,59.654,55,58,55z"></path>
                                        <rect x="11" y="5" width="2" height="2"></rect>
                                        <rect x="15" y="5" width="2" height="2"></rect>
                                        <rect x="19" y="5" width="2" height="2"></rect>
                                        <rect x="11" y="23" width="7" height="2"></rect>
                                        <rect x="11" y="27" width="6" height="2"></rect>
                                        <rect x="11" y="31" width="7" height="2"></rect>
                                        <rect x="11" y="35" width="36" height="2"></rect>
                                        <rect x="45" y="39" width="2" height="2"></rect>
                                        <rect x="11" y="39" width="32" height="2"></rect>
                                    </g>
                                </g>
                            </svg>
                            <h5 class="card-title pt-4 pb-2">Preguntas y respuestas públicas</h5>
                            <p class="card-text pb-4">Explora una comunidad abierta donde puedes hacer preguntas, compartir conocimientos y aprender junto a otros desarrolladores.</p>
                            <a href="home-2.html" class="btn theme-btn">Ver preguntas <i class="la la-arrow-right icon ms-1"></i></a>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-y text-center">
                        <div class="card-body">
                            <svg width="70" viewbox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                                <path d="m18.393 38.405c-.055-.674-.09-1.353-.09-2.041a24.887 24.887 0 0 1 43.171-16.888 22.577 22.577 0 0 1 30.826 6.882 18.466 18.466 0 0 1 25.4 23.657 18.459 18.459 0 0 1 -18.184 32.132 18.453 18.453 0 0 1 -25.566 3.314 19.9 19.9 0 0 1 -35.15-2.028 24.895 24.895 0 1 1 -20.4-45.028z" fill="#f0f5f9"></path>
                                <path d="m1 62.146a24.91 24.91 0 0 0 37.8 21.291 19.892 19.892 0 0 0 35.15 2.02 18.442 18.442 0 0 0 25.565-3.31 18.467 18.467 0 0 0 26.975-20.417 18.461 18.461 0 0 1 -26.976 11.808 18.445 18.445 0 0 1 -25.565 3.31 19.882 19.882 0 0 1 -17.049 9.625c-8.041 0-11.776-2.155-11.509-9.358-3.765 2.285-13.42 4.268-18.141 4.268-12.285 0-23.844-11.866-25.874-23.562a25.252 25.252 0 0 0 -.376 4.325z" fill="#d9e2e9"></path>
                                <g fill="#2f3a5a">
                                    <path d="m56.906 96.09a20.952 20.952 0 0 1 -18.536-11.255 25.9 25.9 0 1 1 -21.028-47.135c-.027-.467-.039-.909-.039-1.336a25.887 25.887 0 0 1 44.344-18.156 23.577 23.577 0 0 1 30.992 6.874 19.222 19.222 0 0 1 8.061-1.749 19.47 19.47 0 0 1 18.238 26.267 19.459 19.459 0 0 1 -19.172 33.814 19.456 19.456 0 0 1 -25.539 3.471 20.733 20.733 0 0 1 -17.321 9.205zm-18.106-13.657a1 1 0 0 1 .91.585 18.9 18.9 0 0 0 33.386 1.926 1 1 0 0 1 1.457-.282 17.453 17.453 0 0 0 24.18-3.135 1 1 0 0 1 1.274-.252 17.46 17.46 0 0 0 17.193-30.393 1 1 0 0 1 -.423-1.259 17.461 17.461 0 0 0 -24.024-22.374 1 1 0 0 1 -1.294-.345 21.575 21.575 0 0 0 -29.459-6.578 1 1 0 0 1 -1.262-.171 23.887 23.887 0 0 0 -41.438 16.209c0 .6.028 1.244.087 1.959a1 1 0 0 1 -.7 1.035 23.894 23.894 0 1 0 19.585 43.22 1 1 0 0 1 .528-.145z"></path>
                                    <path d="m25.9 88.034a25.921 25.921 0 0 1 -25.9-25.891 1 1 0 0 1 2 0 23.895 23.895 0 0 0 44.876 11.43 1 1 0 0 1 1.756.958 25.9 25.9 0 0 1 -22.732 13.503z"></path>
                                    <path d="m95.953 39.672a1 1 0 0 1 -1-1 21.584 21.584 0 0 0 -39.182-12.5 1 1 0 0 1 -1.63-1.159 23.584 23.584 0 0 1 42.812 13.659 1 1 0 0 1 -1 1z"></path>
                                    <path d="m113.436 57.16a1 1 0 0 1 -.69-1.724 17.461 17.461 0 0 0 -12.046-30.1 1 1 0 0 1 0-2 19.46 19.46 0 0 1 13.425 33.55.992.992 0 0 1 -.689.274z"></path>
                                </g>
                                <path d="m64 39.039a20.832 20.832 0 0 0 -20.832 20.832v19.3h5.9v-19.3a14.93 14.93 0 1 1 29.859 0v19.3h5.9v-19.3a20.832 20.832 0 0 0 -20.827-20.832z" fill="#84879c"></path>
                                <path d="m84.831 80.172h-5.9a1 1 0 0 1 -1-1v-19.3a13.93 13.93 0 1 0 -27.859 0v19.3a1 1 0 0 1 -1 1h-5.9a1 1 0 0 1 -1-1v-19.3a21.832 21.832 0 1 1 43.663 0v19.3a1 1 0 0 1 -1.004 1zm-4.9-2h3.9v-18.3a19.832 19.832 0 1 0 -39.663 0v18.3h3.9v-18.3a15.93 15.93 0 1 1 31.859 0z" fill="#2f3a5a"></path>
                                <rect fill="#fac77c" height="43.593" rx="8.123" width="53.599" x="37.2" y="72.934"></rect>
                                <path d="m90.8 81.053v27.354a8.126 8.126 0 0 1 -8.13 8.119h-37.348a8.091 8.091 0 0 1 -6.61-3.408 7.862 7.862 0 0 0 2.576.421h37.352a8.135 8.135 0 0 0 8.13-8.129v-27.344a8.166 8.166 0 0 0 -1.509-4.722 8.154 8.154 0 0 1 5.539 7.709z" fill="#e5ae5c"></path>
                                <path d="m82.676 117.527h-37.353a9.133 9.133 0 0 1 -9.123-9.127v-27.342a9.133 9.133 0 0 1 9.123-9.123h37.353a9.133 9.133 0 0 1 9.124 9.123v27.342a9.133 9.133 0 0 1 -9.124 9.127zm-37.353-43.592a7.131 7.131 0 0 0 -7.123 7.123v27.342a7.131 7.131 0 0 0 7.123 7.123h37.353a7.131 7.131 0 0 0 7.124-7.123v-27.342a7.131 7.131 0 0 0 -7.123-7.123z" fill="#2f3a5a"></path>
                                <path d="m69.3 90.8a5.3 5.3 0 1 0 -7.564 4.782v8.385h4.519v-8.386a5.293 5.293 0 0 0 3.045-4.781z" fill="#84879c"></path>
                                <path d="m66.259 104.966h-4.519a1 1 0 0 1 -1-1v-7.789a6.3 6.3 0 1 1 6.519 0v7.789a1 1 0 0 1 -1 1zm-3.519-2h2.519v-7.385a1 1 0 0 1 .572-.9 4.264 4.264 0 0 0 2.469-3.881 4.3 4.3 0 0 0 -8.609 0 4.264 4.264 0 0 0 2.473 3.878 1 1 0 0 1 .572.9z" fill="#2f3a5a"></path>
                            </svg>
                            <h5 class="card-title pt-4 pb-2">Preguntas y respuestas privadas</h5>
                            <p class="card-text pb-4">Comparte y responde preguntas de forma segura, en espacios privados ideales para equipos o uso profesional.</p>
                            <a href="free-demo.html" class="btn theme-btn bg-3">Ir a <i class="la la-arrow-right icon ms-1"></i></a>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item hover-y text-center">
                        <div class="card-body">
                            <svg width="70" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <g>
                                            <path d="m395.058 7.5h-254.439c-16.351 0-29.606 13.255-29.606 29.606v437.789c0 16.351 13.255 29.606 29.606 29.606h331.762c16.351 0 29.606-13.255 29.606-29.606v-360.466c0-7.852-3.119-15.383-8.672-20.935l-77.323-77.323c-5.551-5.552-13.082-8.671-20.934-8.671z" fill="#f4fbff"></path>
                                            <g>
                                                <path d="m493.316 93.494-54.421-54.421v435.822c0 16.351-13.255 29.606-29.606 29.606h63.092c16.351 0 29.606-13.255 29.606-29.606v-360.466c0-7.852-3.119-15.383-8.671-20.935z" fill="#e4f6ff"></path>
                                            </g>
                                            <path d="m493.316 93.494-77.323-77.323c-2.532-2.532-5.475-4.557-8.672-6.012v73.652c0 10.137 8.218 18.355 18.355 18.355h73.651c-1.454-3.197-3.48-6.14-6.011-8.672z" fill="#e28086"></path>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m238.156 355.206h32.205v67.458h-32.205z" fill="#4a80aa" transform="matrix(.707 -.707 .707 .707 -200.548 293.704)"></path>
                                                <path d="m362.134 459.681-68.185-68.185c-3.907-3.907-10.242-3.907-14.149 0l-22.981 22.981c-3.907 3.907-3.907 10.242 0 14.149l68.185 68.185c10.253 10.253 26.877 10.253 37.13 0 10.254-10.253 10.254-26.877 0-37.13z" fill="#cc9675"></path>
                                                <circle cx="147.949" cy="282.625" fill="#bed8fb" r="138.005"></circle>
                                                <circle cx="147.949" cy="282.625" fill="#f4fbff" r="108.098"></circle>
                                            </g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <path d="m171.088 333.057c-2.719-.341-4.764-2.645-4.776-5.385l-.105-24.931-38.093.161.105 24.931c.012 2.741-2.014 5.061-4.73 5.426 0 0-7.034 24.04 23.9 23.91 30.935-.132 23.699-24.112 23.699-24.112z" fill="#ffcbbe"></path>
                                                                        <path d="m204.404 340.347c-8.728-3.842-25.205-6.273-33.316-7.291l-.049.061c-12.168 15.221-35.292 15.289-47.55.14-8.102 1.086-24.559 3.656-33.253 7.571-9.038 4.072-14.24 12.968-14.429 22.303 40.774 36.602 102.669 36.788 143.657.558.162-10.334-5.578-19.168-15.06-23.342z" fill="#365e7d"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="m176.889 224.928c0-6.01-4.872-10.883-10.883-10.883h-36.203c-14.551 0-26.347 11.796-26.347 26.347v19.609l8.999 6.899h70.36l8.999-15.154v-12.26c0-6.01-4.872-10.883-10.883-10.883h-.367c-2.03.001-3.675-1.645-3.675-3.675z" fill="#4a80aa"></path>
                                                        <g>
                                                            <path d="m191.814 251.747-17.265-1.619c-7.326-.687-14.677 1.019-20.952 4.862-5.35 3.277-11.501 5.011-17.775 5.011h-32.366v15.634c0 3.164 2.565 5.729 5.729 5.729.984 0 1.81.758 1.871 1.74 1.189 19.173 17.106 34.357 36.578 34.357 19.49 0 35.418-15.211 36.536-34.408.055-.952.855-1.688 1.808-1.688h.094c3.218 0 5.821-2.609 5.799-5.82-.057-8.626-.057-23.798-.057-23.798z" fill="#ffddce"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <path d="m315.371 102.166h-148.786c-4.766 0-8.63-3.864-8.63-8.63v-28.744c0-4.766 3.864-8.63 8.63-8.63h148.787c4.766 0 8.63 3.864 8.63 8.63v28.743c0 4.767-3.864 8.631-8.631 8.631z" fill="#ffe07d"></path>
                                    </g>
                                    <g>
                                        <path d="m453.324 194.709h-129.322c-4.142 0-7.499 3.358-7.499 7.499s3.358 7.499 7.499 7.499h129.323c4.142 0 7.499-3.358 7.499-7.499s-3.358-7.499-7.5-7.499z"></path>
                                        <path d="m453.324 239.922h-129.322c-4.142 0-7.499 3.358-7.499 7.499s3.358 7.499 7.499 7.499h129.323c4.142 0 7.499-3.358 7.499-7.499s-3.358-7.499-7.5-7.499z"></path>
                                        <path d="m460.824 292.634c0-4.142-3.358-7.499-7.499-7.499h-129.323c-4.142 0-7.499 3.358-7.499 7.499s3.358 7.499 7.499 7.499h129.323c4.141.001 7.499-3.357 7.499-7.499z"></path>
                                        <path d="m324.002 330.348c-4.142 0-7.499 3.358-7.499 7.499s3.358 7.499 7.499 7.499h64.661c4.142 0 7.499-3.358 7.499-7.499s-3.358-7.499-7.499-7.499z"></path>
                                        <path d="m498.619 88.191-77.321-77.321c-6.87-6.875-16.283-10.87-26.24-10.87h-254.439c-20.46 0-37.105 16.646-37.105 37.106v76.781c0 4.142 3.358 7.499 7.499 7.499s7.499-3.358 7.499-7.499v-76.781c0-12.19 9.917-22.107 22.107-22.107h254.439c1.618 0 3.209.173 4.764.516v68.296c0 14.256 11.598 25.854 25.854 25.854h68.288c.346 1.565.523 3.168.523 4.764v360.466c0 12.189-9.917 22.107-22.107 22.107h-100.748c8.769-13.111 7.373-31.055-4.195-42.623l-68.185-68.185c-4.966-4.966-12.195-6.3-18.396-4.038l-14.68-14.68c41.416-57.512 35.309-137.086-15.341-187.737-56.213-56.212-148.443-57.332-205.774 0-56.732 56.732-56.732 149.042 0 205.774 50.606 50.607 130.256 56.622 187.732 15.336l14.685 14.685c-2.262 6.201-.928 13.43 4.039 18.396l63.072 63.072h-173.97c-12.189 0-22.107-9.917-22.107-22.107v-24.035c0-4.142-3.358-7.499-7.499-7.499s-7.499 3.358-7.499 7.499v24.035c0 20.46 16.646 37.105 37.105 37.105h331.762c20.46 0 37.106-16.646 37.106-37.105v-360.466c0-9.732-3.862-19.237-10.868-26.238zm-442.951 286.716c-50.884-50.884-50.884-133.678 0-184.563 51.532-51.532 134.24-50.322 184.563 0 46.854 46.855 51.219 121.3 10.152 173.166-6.304 7.961-13.579 15.239-21.549 21.549-51.535 40.803-126.163 36.851-173.166-10.152zm188.936 16.484c4.241-3.775 8.286-7.812 12.137-12.139l12.35 12.35-12.167 12.167-12.349-12.35c.01-.01.019-.02.029-.028zm85.703 100.117-68.184-68.184c-.977-.977-.979-2.564 0-3.544l.099-.099c.002-.002.004-.003.005-.005l22.877-22.877c.976-.977 2.567-.977 3.544 0l68.184 68.185c7.312 7.313 7.312 19.211 0 26.524-7.331 7.33-19.194 7.33-26.525 0zm84.514-407.697v-58.207l69.062 69.062h-58.206c-5.987 0-10.856-4.87-10.856-10.855z"></path>
                                        <path d="m315.372 48.663h-148.787c-8.894 0-16.13 7.236-16.13 16.13v28.743c0 8.894 7.236 16.13 16.13 16.13h148.787c8.894 0 16.13-7.236 16.13-16.13v-28.743c-.001-8.894-7.237-16.13-16.13-16.13zm1.13 44.872c0 .623-.507 1.131-1.131 1.131h-148.786c-.623 0-1.131-.507-1.131-1.131v-28.742c0-.623.507-1.131 1.131-1.131h148.787c.624 0 1.131.507 1.131 1.131v28.742z"></path>
                                        <path d="m229.688 364.365c45.072-45.071 45.072-118.408 0-163.479-45.072-45.072-118.407-45.072-163.479 0-17.536 17.537-28.782 39.726-32.522 64.17-.626 4.094 2.184 7.921 6.279 8.547 4.096.629 7.921-2.184 8.547-6.279 3.254-21.264 13.04-40.571 28.301-55.833 39.223-39.223 103.044-39.223 142.268 0 37.634 37.634 39.152 97.91 4.567 137.379-3.294-6.703-8.897-12.161-16.225-15.387-8.884-3.911-24.2-6.397-33.621-7.639l-.04-9.47c9.104-6.703 15.566-16.819 17.423-28.523 1.601-.665 3.07-1.648 4.328-2.915 2.511-2.528 3.88-5.881 3.857-9.442-.067-9.939-.058-26.412-.058-36.008 0-9.075-6.612-16.636-15.271-18.119-1.662-8.438-9.117-14.822-18.036-14.822h-36.203c-18.663 0-33.847 15.183-33.847 33.846v35.243c0 5.471 3.339 10.177 8.086 12.188 1.815 11.347 7.956 21.207 16.627 27.912l.044 10.333c-9.41 1.321-24.704 3.936-33.557 7.922-6.732 3.033-11.993 8.176-15.231 14.509-11.99-13.802-19.929-30.441-23.077-48.535-.71-4.08-4.594-6.813-8.674-6.103-4.081.71-6.813 4.594-6.103 8.674 4.092 23.514 15.205 44.894 32.139 61.829 45.269 45.272 118.606 44.876 163.478.002zm-99.885-142.82h36.203c1.866 0 3.384 1.518 3.384 3.384 0 6.162 5.013 11.175 11.175 11.175h.367c1.866 0 3.384 1.518 3.384 3.384v4.025l-9.065-.85c-8.88-.831-17.962 1.275-25.57 5.934-4.173 2.555-8.965 3.906-13.858 3.906h-24.867v-12.109c-.001-10.394 8.454-18.849 18.847-18.849zm-18.848 52.488v-6.533h24.867c7.66 0 15.16-2.115 21.692-6.115 4.86-2.977 10.662-4.323 16.335-3.791l10.47.982c.006 4.619.018 10.713.044 15.429-4.175.733-7.424 4.252-7.679 8.612-.893 15.334-13.653 27.345-29.049 27.345-15.364 0-28.143-12.001-29.094-27.323-.268-4.318-3.467-7.815-7.586-8.606zm36.68 50.928c3.851 0 7.59-.506 11.16-1.439l.018 4.182c.008 1.94.453 3.791 1.241 5.455-3.729 2.516-8.146 3.904-12.777 3.918-.023 0-.046 0-.069 0-4.588 0-8.972-1.351-12.688-3.814.774-1.671 1.208-3.523 1.2-5.463l-.019-4.484c3.802 1.071 7.806 1.645 11.934 1.645zm-63.967 35.043c1.089-5.487 4.592-10.06 9.646-12.338 5.102-2.297 14.929-4.604 27.305-6.432 7.07 6.939 16.537 10.841 26.586 10.841h.114c10.124-.03 19.642-4.016 26.704-11.066 12.392 1.724 22.238 3.947 27.359 6.202 5.739 2.526 9.449 7.338 10.358 13.202-37.113 30.482-91.109 30.343-128.072-.409z"></path>
                                    </g>
                                </g>
                            </svg>
                            <h5 class="card-title pt-4 pb-2">Explorar trabajos</h5>
                            <p class="card-text pb-4">Descubre oportunidades laborales acordes a tu perfil profesional, habilidades y aspiraciones de desarrollo.</p>
                            <a href="careers.html" class="btn theme-btn">Encontrar el trabajo <i class="la la-arrow-right icon ms-1"></i></a>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-4 -->
            </div>
        </div>
    </section>
    <!-- END CTA AREA -->

    <!-- START CTA AREA -->
    <section class="get-started-area section--padding bg-gray" id="for-businesses">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title pb-3">Para empresas, por desarrolladores</h2>
                <p class="section-desc w-50 mx-auto">Soluciones creadas por desarrolladores, pensadas para potenciar el crecimiento y la innovación en tu empresa.
                </p>
            </div>
            <div class="row pt-50px">
                <div class="col-lg-4 responsive-column-half">
                    <div class="media media-card align-items-center hover-s">
                        <div class="icon-element me-3 bg-1">
                            <svg class="svg-icon-color-white" width="32" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 480 480" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M240,0c-26.51,0-48,21.49-48,48s21.49,48,48,48c26.499-0.026,47.974-21.501,48-48C288,21.49,266.51,0,240,0z M240,80
                                            c-17.673,0-32-14.327-32-32s14.327-32,32-32c17.673,0,32,14.327,32,32S257.673,80,240,80z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M272,104h-1.888l-1.688,0.84c-17.901,8.913-38.947,8.913-56.848,0l-1.688-0.84H208c-22.08,0.026-39.974,17.92-40,40v48
                                            c0,13.255,10.745,24,24,24h96c13.255,0,24-10.745,24-24v-48C311.974,121.92,294.08,104.026,272,104z M296,192c0,4.418-3.582,8-8,8
                                            h-96c-4.418,0-8-3.582-8-8v-48c0.002-12.592,9.735-23.042,22.296-23.936c21.375,9.92,46.034,9.92,67.408,0
                                            c12.56,0.894,22.294,11.344,22.296,23.936V192z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M408,264c-26.51,0-48,21.49-48,48c0,26.51,21.49,48,48,48c26.51,0,48-21.49,48-48
                                            C455.974,285.501,434.499,264.026,408,264z M408,344c-17.673,0-32-14.327-32-32c0-17.673,14.327-32,32-32
                                            c17.673,0,32,14.327,32,32C440,329.673,425.673,344,408,344z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M440,368h-1.888l-1.688,0.8c-17.901,8.912-38.947,8.912-56.848,0l-1.688-0.8H376c-22.08,0.026-39.974,17.92-40,40v48
                                            c0,13.255,10.745,24,24,24h96c13.255,0,24-10.745,24-24v-48C479.974,385.92,462.08,368.026,440,368z M464,456c0,4.418-3.582,8-8,8
                                            h-96c-4.418,0-8-3.582-8-8v-48c0.002-12.592,9.735-23.042,22.296-23.936c21.375,9.92,46.033,9.92,67.408,0
                                            C454.265,384.958,463.998,395.408,464,408V456z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M72,264c-26.51,0-48,21.49-48,48c0,26.51,21.49,48,48,48s48-21.49,48-48C119.974,285.501,98.499,264.026,72,264z M72,344
                                            c-17.673,0-32-14.327-32-32c0-17.673,14.327-32,32-32s32,14.327,32,32C104,329.673,89.673,344,72,344z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M104,368h-1.888l-1.688,0.8c-17.901,8.912-38.947,8.912-56.848,0l-1.688-0.8H40c-22.08,0.026-39.974,17.92-40,40v48
                                            c0,13.255,10.745,24,24,24h96c13.255,0,24-10.745,24-24v-48C143.974,385.92,126.08,368.026,104,368z M128,456c0,4.418-3.582,8-8,8
                                            H24c-4.418,0-8-3.582-8-8v-48c0.002-12.592,9.735-23.042,22.296-23.936c21.375,9.92,46.033,9.92,67.408,0
                                            C118.265,384.958,127.998,395.408,128,408V456z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M319.372,406.276c-0.004-0.009-0.008-0.018-0.012-0.028c-1.732-4.065-6.431-5.956-10.495-4.224c0,0,0,0,0,0
                                            c-36.125,15.14-76.245,17.902-114.104,7.856l7.488-2.2c4.242-1.242,6.674-5.686,5.432-9.928s-5.686-6.674-9.928-5.432l-32,9.384
                                            c-0.12,0-0.208,0.136-0.32,0.176c-0.741,0.276-1.437,0.662-2.064,1.144c-0.278,0.15-0.545,0.318-0.8,0.504
                                            c-0.844,0.753-1.513,1.681-1.96,2.72c-0.434,1.046-0.641,2.172-0.608,3.304c0.195,1.083,0.462,2.152,0.8,3.2
                                            c0.048,0.112,0,0.24,0.088,0.352l16,30.616c2.046,3.919,6.881,5.438,10.8,3.392s5.438-6.881,3.392-10.8l-6.512-12.448
                                            c43.014,12.93,89.195,10.417,130.552-7.104C319.189,415.039,321.093,410.345,319.372,406.276z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M453.656,210.344c-3.124-3.123-8.188-3.123-11.312,0l-11.32,11.32c-6.624-70.07-51.111-130.876-115.888-158.4
                                            c-4.065-1.732-8.764,0.159-10.496,4.224c-1.732,4.065,0.159,8.764,4.224,10.496c58.11,24.697,98.504,78.669,105.816,141.384
                                            l-9.024-9.024c-3.178-3.07-8.242-2.982-11.312,0.196c-2.994,3.1-2.994,8.015,0,11.116l24,24c3.12,3.128,8.186,3.135,11.314,0.014
                                            c0.005-0.005,0.01-0.01,0.014-0.014l24-24C456.791,218.528,456.784,213.464,453.656,210.344z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M175.768,69.272c-0.026-0.467-0.095-0.93-0.208-1.384c0-0.072-0.088-0.12-0.12-0.2c-0.032-0.08,0-0.136,0-0.2
                                            c-0.218-0.389-0.47-0.759-0.752-1.104c-0.259-0.469-0.565-0.911-0.912-1.32c-0.473-0.419-0.997-0.776-1.56-1.064
                                            c-0.281-0.239-0.581-0.456-0.896-0.648l-32-14.616c-4.087-1.678-8.761,0.275-10.439,4.362c-1.587,3.865,0.068,8.301,3.799,10.182
                                            l16.568,7.576C86.875,104.237,47.955,169.256,48,240c0,4.418,3.582,8,8,8s8-3.582,8-8c-0.04-62.293,32.901-119.952,86.584-151.552
                                            l-5.784,12.088c-1.907,3.977-0.236,8.747,3.736,10.664c1.079,0.527,2.263,0.801,3.464,0.8c3.072-0.004,5.87-1.767,7.2-4.536
                                            l16-33.384c0-0.08,0-0.168,0.064-0.248c0.208-0.547,0.353-1.116,0.432-1.696c0.137-0.431,0.239-0.872,0.304-1.32
                                            C175.973,70.295,175.896,69.778,175.768,69.272z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <h5 class="pb-2"><a href="free-demo.html">Q&A privadas para tu equipo</a></h5>
                            <p>Intercambio de conocimiento interno con un entorno seguro de preguntas y respuestas privadas, exclusivo para tu organización.</p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="media media-card align-items-center hover-s">
                        <div class="icon-element me-3 bg-2">
                            <svg class="svg-icon-color-white" width="32" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M500.71,446.149l-92.7-92.7c2.548-3.879,2.118-9.141-1.293-12.552c-3.41-3.41-8.674-3.841-12.552-1.293l-24.737-24.737
                                        c18.489-27.447,30.128-59.238,33.495-92.395c4.611-45.412-6.37-91.445-30.92-129.622c-2.987-4.645-9.174-5.988-13.818-3.002
                                        c-4.644,2.987-5.988,9.174-3.002,13.818c45.911,71.392,35.6,166.844-24.517,226.961c-70.95,70.95-186.394,70.95-257.345,0
                                        c-70.95-70.949-70.95-186.393,0-257.344c60.181-60.181,152.594-70.842,224.73-25.931c4.686,2.917,10.853,1.485,13.772-3.203
                                        c2.919-4.687,1.484-10.853-3.203-13.772C270.552,6.677,224.901-3.693,180.068,1.174C134.551,6.117,91.62,26.705,59.18,59.143
                                        c-78.746,78.747-78.746,206.878,0,285.624c39.374,39.374,91.093,59.06,142.813,59.06c39.403,0,78.798-11.44,112.741-34.292
                                        l24.613,24.613c-3.698,3.918-3.639,10.089,0.195,13.924c1.953,1.953,4.511,2.929,7.07,2.929c2.468,0,4.93-0.917,6.854-2.733
                                        l92.563,92.563c7.45,7.45,17.244,11.169,27.065,11.169c9.911,0,19.85-3.791,27.423-11.364
                                        C515.591,485.56,515.679,461.117,500.71,446.149z M335.366,361.889l26.402-26.402l18.11,18.11l-26.402,26.402L335.366,361.889z
                                         M486.376,486.496c-7.28,7.279-19.036,7.367-26.207,0.194l-92.553-92.553l26.402-26.402l92.552,92.553
                                        C493.742,467.461,493.655,479.217,486.376,486.496z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M345.044,59.381l-0.217-0.217c-3.892-3.916-10.223-3.935-14.14-0.043c-3.916,3.892-3.936,10.223-0.043,14.14l0.26,0.261
                                        c1.953,1.953,4.511,2.929,7.07,2.929s5.118-0.976,7.07-2.929C348.948,69.618,348.948,63.287,345.044,59.381z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M201.993,47.981c-84.902,0-153.975,69.073-153.975,153.975s69.073,153.975,153.975,153.975
                                        s153.975-69.073,153.975-153.975S286.895,47.981,201.993,47.981z M201.993,335.934c-73.876,0-133.978-60.102-133.978-133.978
                                        S128.117,67.978,201.993,67.978s133.978,60.102,133.978,133.978S275.869,335.934,201.993,335.934z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M240.041,188.963c6.228-8.096,9.944-18.22,9.944-29.201v-13.096c0-26.463-21.529-47.992-47.992-47.992
                                        s-47.992,21.529-47.992,47.992v13.096c0,10.981,3.715,21.106,9.944,29.201c-31.8,5.997-55.937,33.966-55.937,67.484v5.166
                                        c0,5.522,4.476,9.998,9.998,9.998h167.972c5.522,0,9.998-4.476,9.998-9.998v-5.166
                                        C295.978,222.93,271.841,194.961,240.041,188.963z M173.998,146.666c0-15.436,12.559-27.995,27.995-27.995
                                        s27.995,12.559,27.995,27.995v13.096c0,15.436-12.559,27.995-27.995,27.995s-27.995-12.559-27.995-27.995V146.666z
                                         M128.243,251.614c2.434-24.589,23.236-43.86,48.455-43.86h50.591c25.219,0,46.021,19.271,48.455,43.86H128.243z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M442.305,11.987c-5.522,0-9.998,4.476-9.998,9.998v12.428c0,5.521,4.476,9.998,9.998,9.998s9.998-4.476,9.998-9.998
                                        V21.986C452.303,16.463,447.827,11.987,442.305,11.987z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M442.305,71.547c-5.522,0-9.998,4.476-9.998,9.998v12.428c0,5.522,4.476,9.998,9.998,9.998s9.998-4.476,9.998-9.998
                                        V81.546C452.303,76.024,447.827,71.547,442.305,71.547z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M478.299,47.981h-12.428c-5.522,0-9.998,4.476-9.998,9.998s4.476,9.998,9.998,9.998h12.428
                                        c5.522,0,9.998-4.476,9.998-9.998S483.821,47.981,478.299,47.981z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M418.738,47.981H406.31c-5.522,0-9.998,4.476-9.998,9.998s4.476,9.998,9.998,9.998h12.428
                                        c5.522,0,9.998-4.476,9.998-9.998S424.261,47.981,418.738,47.981z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M61.937,412.008c-5.522,0-9.998,4.476-9.998,9.998v12.428c0,5.522,4.476,9.998,9.998,9.998s9.998-4.476,9.998-9.998
                                        v-12.428C71.935,416.484,67.459,412.008,61.937,412.008z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M61.937,471.568c-5.522,0-9.998,4.476-9.998,9.998v12.428c0,5.522,4.476,9.998,9.998,9.998s9.998-4.476,9.998-9.998
                                        v-12.428C71.935,476.044,67.459,471.568,61.937,471.568z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M97.931,448.002H85.503c-5.522,0-9.998,4.476-9.998,9.998s4.476,9.998,9.998,9.998h12.428
                                        c5.522,0,9.998-4.476,9.998-9.998S103.453,448.002,97.931,448.002z"></path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M38.371,448.002H25.943c-5.522,0-9.998,4.476-9.998,9.998s4.476,9.998,9.998,9.998h12.428
                                        c5.522,0,9.998-4.476,9.998-9.998S43.893,448.002,38.371,448.002z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <h5 class="pb-2"><a href="talent.html">Soluciones de talento</a></h5>
                            <p>Conecta con desarrolladores calificados mediante soluciones para atraer, evaluar y seleccionar el perfil ideal.
                            </p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="media media-card align-items-center hover-s">
                        <div class="icon-element me-3 bg-3">
                            <svg class="svg-icon-color-white" width="32" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 396.821 396.821" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M394.583,8.054c-0.422-3.413-3.11-6.101-6.522-6.523c-30.748-3.803-62.477-0.488-91.767,9.583
                                                c-29.293,10.072-56.355,26.973-78.258,48.876l-49.983,49.983l-72.149,9.305c-1.645,0.212-3.172,0.963-4.345,2.135l-69.563,69.563
                                                c-1.969,1.969-2.685,4.868-1.858,7.528c0.825,2.66,3.058,4.643,5.796,5.15l52.597,9.742l10.335,10.335l-22.003,11.915
                                                c-2.082,1.127-3.51,3.172-3.851,5.515s0.444,4.709,2.118,6.383l83.438,83.438c1.417,1.417,3.329,2.197,5.304,2.197
                                                c0.358,0,0.72-0.026,1.08-0.078c2.343-0.341,4.388-1.769,5.515-3.851l11.916-22.003l10.335,10.335l9.742,52.597
                                                c0.508,2.739,2.49,4.971,5.15,5.797c0.731,0.227,1.48,0.337,2.224,0.337c1.96,0,3.876-0.769,5.305-2.197l69.563-69.563
                                                c1.172-1.172,1.923-2.7,2.135-4.344l9.306-72.15l49.983-49.984c21.903-21.903,38.804-48.964,48.876-78.257
                                                C395.072,70.528,398.385,38.795,394.583,8.054z M79.674,198.355l-36.989-6.851l57.673-57.675l50.332-6.491L79.674,198.355z
                                                 M152.065,313.268L82.846,244.05l17.085-9.252l61.385,61.386L152.065,313.268z M262.285,295.756l-57.674,57.674l-6.852-36.988
                                                l71.017-71.017L262.285,295.756z M325.517,167.471l-135.85,135.85l-96.874-96.874l135.85-135.851
                                                c19.738-19.739,44.002-35.076,70.287-44.49c3.395,17.492,11.948,33.719,24.654,46.424c12.705,12.706,28.931,21.259,46.424,24.655
                                                C360.593,123.468,345.255,147.732,325.517,167.471z M374.523,82.774c-15.203-2.593-29.345-9.863-40.333-20.85
                                                c-10.988-10.987-18.257-25.13-20.85-40.333c21.741-5.859,44.579-7.857,66.99-5.807C382.381,38.195,380.382,61.033,374.523,82.774
                                                z"></path>
                                            <path d="M221.325,110.443c-17.74,17.741-17.74,46.606,0,64.347c8.871,8.871,20.521,13.305,32.174,13.305
                                                c11.649,0,23.304-4.436,32.173-13.305h0.001c17.74-17.74,17.74-46.606-0.001-64.347
                                                C267.931,92.703,239.065,92.704,221.325,110.443z M275.066,164.183c-11.894,11.893-31.244,11.891-43.134,0
                                                c-11.893-11.892-11.893-31.242,0-43.134c5.945-5.946,13.756-8.918,21.566-8.918c7.811,0,15.621,2.973,21.566,8.918
                                                C286.957,132.941,286.957,152.291,275.066,164.183z"></path>
                                            <path d="M98.365,299.165c-2.93-2.929-7.678-2.929-10.607,0L23.41,363.512c-2.929,2.929-2.929,7.678,0,10.606
                                                c1.465,1.464,3.385,2.197,5.304,2.197s3.839-0.732,5.304-2.197l64.347-64.347C101.293,306.843,101.293,302.094,98.365,299.165z"></path>
                                            <path d="M108.263,319.671l-28.991,28.991c-2.929,2.929-2.929,7.678,0,10.606c1.465,1.464,3.385,2.197,5.304,2.197
                                                s3.839-0.732,5.304-2.197l28.991-28.991c2.929-2.929,2.929-7.678,0-10.606C115.941,316.742,111.193,316.742,108.263,319.671z"></path>
                                            <path d="M69.123,361.919c-3.138,0-6.002,2.024-7.062,4.973c-1.078,2.998-0.075,6.441,2.416,8.416
                                                c2.547,2.02,6.266,2.13,8.928,0.265c2.84-1.99,3.992-5.81,2.639-9.024C74.931,363.774,72.099,361.919,69.123,361.919z"></path>
                                            <path d="M76.044,366.549C76.234,367,75.864,366.099,76.044,366.549L76.044,366.549z"></path>
                                            <path d="M47.91,380.025l-3.992,3.992c-2.93,2.929-2.93,7.678-0.001,10.607c1.465,1.464,3.384,2.197,5.304,2.197
                                                c1.919,0,3.839-0.732,5.303-2.196l3.992-3.992c2.93-2.929,2.93-7.678,0.001-10.606C55.588,377.099,50.838,377.096,47.91,380.025z
                                                "></path>
                                            <path d="M42.502,314.014c-2.93-2.929-7.678-2.929-10.607,0L2.904,343.005c-2.929,2.929-2.929,7.678,0,10.606
                                                c1.465,1.464,3.385,2.197,5.304,2.197s3.839-0.732,5.304-2.197l28.991-28.991C45.431,321.692,45.431,316.943,42.502,314.014z"></path>
                                            <path d="M54.472,311.136c3.043-0.765,5.327-3.417,5.644-6.537c0.311-3.055-1.369-6.049-4.096-7.427
                                                c-2.895-1.464-6.523-0.853-8.769,1.494c-2.405,2.513-2.752,6.426-0.852,9.335c-0.06-0.09-0.106-0.156,0.015,0.029
                                                c0.126,0.185,0.083,0.118,0.023,0.029C48.204,310.626,51.429,311.901,54.472,311.136z"></path>
                                            <path d="M73.867,293.257l3.991-3.992c2.929-2.929,2.929-7.678-0.001-10.606c-2.932-2.93-7.681-2.929-10.606,0.001l-3.991,3.992
                                                c-2.929,2.929-2.929,7.678,0.001,10.606c1.465,1.464,3.384,2.196,5.303,2.196C70.483,295.454,72.403,294.722,73.867,293.257z"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <h5 class="pb-2"><a href="advertising.html">Colaboración técnica</a></h5>
                            <p>Facilita el trabajo en equipo con herramientas que promueven el intercambio ágil de conocimiento entre desarrolladores.
                            </p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
            </div>
        </div>
    </section>
    <!-- END CTA AREA -->

    <!-- START INFO AREA -->
    <section class="info-area section--padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title lh-50 pb-35px">Capture el conocimiento y el contexto de su empresa en un
                    <br> formato fácil de descubrir para desbloquear a su equipo
                </h2>
                <a href="free-demo.html" class="btn theme-btn">Crear un equipo</a>
            </div>
            <div class="row pt-60px">
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box px-2 text-center">
                        <div class="icon-element mb-4 shadow-sm mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewbox="0 0 24 24" width="28px" fill="#48a868">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Aumentar la productividad</h3>
                            <p>Optimiza procesos y reduce tiempos con soluciones que impulsan la eficiencia del equipo de desarrollo.</p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box px-2 text-center">
                        <div class="icon-element mb-4 shadow-sm mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewbox="0 0 24 24" width="28px" fill="#48a868">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Acelerar el tiempo de comercialización</h3>
                            <p>Lleva tus productos al mercado más rápido con herramientas y colaboración técnica que reducen ciclos de desarrollo.</p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box px-2 text-center">
                        <div class="icon-element mb-4 shadow-sm mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewbox="0 0 24 24" width="28px" fill="#48a868">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Proteger el conocimiento institucional</h3>
                            <p>Preserva el saber técnico de tu equipo con una base organizada y segura de preguntas y respuestas internas.</p>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
            </div>
        </div>
    </section>
    <!-- END INFO AREA -->

    <hr class="border-top-gray">

    <!-- START INFO AREA -->
    <section class="info-area section--padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title pb-3">Asegúrese de que su empresa mantenga el rumbo </h2>
                <p class="section-desc">Estos son solo algunos tipos de tecnólogos a los que ayudamos.</p>
            </div>
            <div class="row pt-60px align-items-center">
                <div class="col responsive-column-half card card-item case-card text-center">
                    <div class="card-body">
                        <svg aria-hidden="true" width="96" height="96" viewbox="0 0 96 96">
                            <path d="M78.2 14.36a1.73 1.73 0 011.27-1.85 37.5 37.5 0 017.66-1.5c1.09-.09 1.98.8 1.9 1.89-.21 2.6-.79 5.19-1.56 7.8a1.71 1.71 0 01-1.66 1.28c-4.27-.16-7.08-3.56-7.62-7.62zM34.55 77.77l3.55-2.84-10-11-3.36 2.69c-.89.7-1 2.02-.23 2.86l7.34 8.08c.7.77 1.88.86 2.7.21zM70.1 37.93a7 7 0 100-14 7 7 0 000 14zm-7 7a7 7 0 11-14 0 7 7 0 0114 0z" opacity=".2"></path>
                            <path d="M75.5 27a7 7 0 11-14 0 7 7 0 0114 0zm-7 4a4 4 0 100-8 4 4 0 000 8zm-14 17a7 7 0 100-14 7 7 0 000 14zm4-7a4 4 0 11-8 0 4 4 0 018 0zM27.21 70.41l2.93 3.23a3.47 3.47 0 004.74.37l2.82-2.25c.95.34 2.03.25 2.95-.33.8-.51 1.95-1.26 3.35-2.2v8.29c0 3.02 3.6 4.6 5.82 2.56l8.25-7.56a3.5 3.5 0 001.03-1.77l3.84-16.33c1.7-1.53 3.4-3.13 5.08-4.8 11.26-11.2 22.04-25.83 22.92-41.56a3.32 3.32 0 00-3.5-3.5c-15.71.86-30.38 11.47-41.59 22.54a161.7 161.7 0 00-5.19 5.4 1.5 1.5 0 00-.54.05l-18.35 4.83c-.74.2-1.4.63-1.87 1.25l-5.18 6.8A3.47 3.47 0 0017.48 51H26c-.83 1.21-1.5 2.2-1.95 2.92a3.42 3.42 0 00.38 4.2l.4.43-2.06 2.06a3.47 3.47 0 00-.11 4.79l2.53 2.79-.75.75a1.5 1.5 0 002.12 2.12l.65-.65zM87.95 7.9c-.17 2.9-.7 5.78-1.53 8.61a9.21 9.21 0 01-5.8-2.27 7.13 7.13 0 01-2.6-4.88 39.23 39.23 0 019.59-1.8c.2 0 .35.15.34.34zM47.96 29.24c7.87-7.77 17.2-15.02 27.15-18.87a10.32 10.32 0 003.54 6.13 12.33 12.33 0 006.8 2.95c-3.8 10.29-11.39 19.93-19.54 28.03A169.1 169.1 0 0139.04 68.9c-.15.1-.37.08-.53-.09l-4.68-5.02 10.73-10.73a1.5 1.5 0 00-2.12-2.12L31.78 61.6l-5.16-5.53a.42.42 0 01-.06-.52 167.03 167.03 0 0121.4-26.31zm-18.3 34.48l-2.35 2.35-2.43-2.69a.47.47 0 01.01-.65l1.99-1.99 2.78 2.98zm-.33 4.57l2.37-2.37 3.64 3.89L33 71.67a.47.47 0 01-.65-.05l-3.03-3.33zM47 67.15c3.38-2.4 7.6-5.56 12.06-9.34l-2.88 12.25a.47.47 0 01-.14.24l-8.25 7.56a.47.47 0 01-.79-.34V67.15zm-9.8-30.73A177.28 177.28 0 0028.11 48H17.48a.47.47 0 01-.37-.76l5.17-6.8a.47.47 0 01.26-.16l14.67-3.86zM14.06 81.44a1.5 1.5 0 010 2.12l-7 7a1.5 1.5 0 01-2.12-2.12l7-7a1.5 1.5 0 012.12 0zm9-6.88a1.5 1.5 0 00-2.12-2.12l-5 5a1.5 1.5 0 002.12 2.12l5-5zm-7-4.12a1.5 1.5 0 010 2.12l-7 7a1.5 1.5 0 01-2.12-2.12l7-7a1.5 1.5 0 012.12 0zm9 12.12a1.5 1.5 0 00-2.12-2.12l-5 5a1.5 1.5 0 002.12 2.12l5-5z"></path>
                        </svg>
                        <h5 class="card-title pt-4 pb-2">Ingenieros de DevOps</h5>
                        <p class="card-text">Impulsa tus operaciones con expertos en automatización, integración continua y despliegue eficiente.</p>
                    </div><!-- end card-body -->
                </div>
                <div class="col responsive-column-half card card-item case-card text-center">
                    <div class="card-body">
                        <svg aria-hidden="true" width="96" height="96" viewbox="0 0 96 96">
                            <path d="M86 26.5a6.5 6.5 0 100-13 6.5 6.5 0 000 13zm-52 25a6.5 6.5 0 100-13 6.5 6.5 0 000 13zm-15 40a6.5 6.5 0 100-13 6.5 6.5 0 000 13zM72.5 60a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" opacity=".2"></path>
                            <path d="M75 17a8 8 0 116.49 7.86L68.04 50.79A7.98 7.98 0 0163 65a8 8 0 01-7.85-9.55l-17-9.84a8 8 0 01-8.56 4.27L20.21 75.2a8 8 0 11-2.8-1.08l9.38-25.32a8 8 0 1112.19-6.18l17.3 10.02a8 8 0 019.12-3.27l13.29-25.63A8 8 0 0175 17zm8-5a5 5 0 100 10 5 5 0 000-10zM31 37a5 5 0 100 10 5 5 0 000-10zM16 77a5 5 0 100 10 5 5 0 000-10zm42-20a5 5 0 1010 0 5 5 0 00-10 0z"></path>
                        </svg>
                        <h5 class="card-title pt-4 pb-2">científicos de datos</h5>
                        <p class="card-text">Convierte datos en decisiones estratégicas con expertos en análisis, modelado predictivo y machine learning.</p>
                    </div><!-- end card-body -->
                </div>
                <div class="col responsive-column-half card card-item case-card text-center case-card-is-active">
                    <div class="card-body">
                        <svg aria-hidden="true" width="96" height="96" viewbox="0 0 96 96">
                            <path d="M33.3 60.21a1 1 0 01-.04-1.46l41.1-40.1a1 1 0 01.33-.22l10.83-4.17a1 1 0 011.31 1.25l-3.26 9.78a1 1 0 01-.22.37L43.17 67.8a1 1 0 01-1.4.05l-8.48-7.64zm-9.19 19.02a1 1 0 00.38.98l2.12 1.61a1 1 0 01.11 1.49l-9.1 9.48a3 3 0 01-4.29.04l-5.1-5.1a3 3 0 01.11-4.35l12.5-11.28a1 1 0 011.33-.01l2.38 2.08a1 1 0 01.33.94l-.77 4.12z" opacity=".2"></path>
                            <path d="M91.4 5.56a1.5 1.5 0 00-1.87-1.98l-15 5c-.24.07-.44.2-.61.38l-9.2 9.6.26-1.85a1.5 1.5 0 00-.86-1.58l-11-5a1.5 1.5 0 00-1.93.64l-4.51 8.12c-2.16-.21-4.27-.2-6.35 0l-4.52-8.12a1.5 1.5 0 00-1.93-.64l-11 5a1.5 1.5 0 00-.84 1.73l1.77 7.06c-.9.76-1.6 1.62-2.22 2.46-.32.44-.63.9-.93 1.33v.01a245.75 245.75 0 01-.71 1.01l-7.98-2.65a1.5 1.5 0 00-1.85.84l-5 12a1.5 1.5 0 00.77 1.95l8 3.56c-.2 2.27-.2 4.93 0 7.14l-8 3.56a1.5 1.5 0 00-.77 1.95l5 12a1.5 1.5 0 001.85.84l2.58-.86-9.57 8.84a1.5 1.5 0 00-.04 2.16l9 9a1.5 1.5 0 002.12 0l7.77-7.76 10.05 4.57c.73.33 1.6.02 1.96-.7l3.53-7.06c2.19.22 4.34.2 6.45-.02l5.48 7.31c.4.54 1.13.74 1.76.5l10-4c.62-.26 1-.9.93-1.57l-.9-8.13a21 21 0 003.99-4.01l7.06 1.77a1.5 1.5 0 001.73-.84l5-11a1.5 1.5 0 00-.5-1.84L74.1 51.8c.24-2.24.22-4.44 0-6.6l6.28-4.48c.57-.4.78-1.15.52-1.8l-3.59-8.64a1.5 1.5 0 00-.58-.7l8.35-8.53c.14-.14.25-.3.32-.5l6-15zM20.01 68.1c.1-.09.18-.19.25-.3 1 1.46 2.1 2.94 3.55 4.24l-1.67 6.7-.65.64-5.94-5.94a1.5 1.5 0 00-.86-.43l5.32-4.9zM13 74.58c.02.36.17.7.44.98l5.94 5.94L15 85.88l-6.84-6.84L13 74.58zm12.34 3.74l1.62-6.46a1.5 1.5 0 00-.53-1.54c-1.7-1.33-2.8-2.93-4.13-4.86l-.57-.82a1.5 1.5 0 00-1.7-.56l-7.68 2.56-3.9-9.36 7.66-3.4c.6-.28.96-.91.88-1.57a37.6 37.6 0 010-8.61 1.5 1.5 0 00-.88-1.57l-7.66-3.4 3.9-9.37 7.68 2.56c.6.2 1.26 0 1.65-.5.45-.57.86-1.15 1.24-1.7l.22-.32.87-1.24a10.1 10.1 0 012.35-2.43c.5-.36.75-.99.6-1.6l-1.7-6.78 8.6-3.91 4.33 7.79c.3.53.89.84 1.5.76a29.4 29.4 0 017.61 0 1.5 1.5 0 001.51-.76l4.33-7.8 8.72 3.97-.7 4.87-6.23 6.5a14.06 14.06 0 00-4.86-2.61A21.77 21.77 0 0043.5 25C31.49 25 23 34.69 23 46.5c0 11.76 8.53 22.1 20.6 22.1C55.47 68.6 66 58.44 66 46.5a10.2 10.2 0 00-1.14-4.65l-.02-.02a4.72 4.72 0 00-.03-.06l9.84-10.06 3 7.26-6.02 4.3A1.5 1.5 0 0071 44.7c.32 2.5.35 5.04 0 7.61-.07.55.17 1.1.62 1.42l6 4.28-3.98 8.74-6.79-1.7a1.5 1.5 0 00-1.54.53c-1.66 2.12-2.65 3.29-4.68 4.7-.45.31-.7.85-.63 1.4l.87 7.86L53 82.69l-5.31-7.08a1.5 1.5 0 00-1.39-.59c-2.5.32-5.04.35-7.61 0a1.5 1.5 0 00-1.54.82l-3.36 6.7-8.32-3.78a1.5 1.5 0 00-.14-.43zm37.38-53.34a1.5 1.5 0 001.26-1.27l.01-.06 10.54-11 7.36 7.36-43.73 44.7a17.18 17.18 0 01-8-5.76l32.56-33.97zM49.1 29c1.62.55 2.93 1.23 3.74 1.94L28.47 56.38A20.59 20.59 0 0126 46.5C26 36.14 33.34 28 43.5 28c1.58 0 3.68.35 5.61 1zm-5.52 36.6c-.67 0-1.34-.04-1.99-.11l20.96-21.43.02.04v.02c.21.59.42 1.42.42 2.38 0 10.23-9.12 19.1-19.4 19.1zm39.86-48.27l-6.42-6.42L87.4 7.45l-3.96 9.88z"></path>
                        </svg>
                        <h5 class="card-title pt-4 pb-2">Ingenieros de software</h5>
                        <p class="card-text">Diseña, desarrolla y optimiza sistemas escalables con profesionales expertos en crear soluciones eficientes y sostenibles.</p>
                    </div><!-- end card-body -->
                </div>
                <div class="col responsive-column-half card card-item case-card text-center">
                    <div class="card-body">
                        <svg aria-hidden="true" width="96" height="96" viewbox="0 0 96 96">
                            <path d="M67.37 12.9A38.67 38.67 0 0050.8 9a38.02 38.02 0 00-16.47 3.9c-.38.3-.44.74-.19 1.2l4.74 7.49c.24.35.79.61 1.29.6.1-.01.21-.04.32-.07 1.01-.29 6.76-1.88 10.4-1.88 3.7 0 9.6 1.65 10.45 1.9.07.02.14.04.22.04.44.05 1-.15 1.25-.6l4.73-7.49c.26-.44.2-.9-.18-1.18zM19 77.5a7.84 7.84 0 007.79 7.88 3.98 3.98 0 003.93-3.9v-18.5A4 4 0 0026.8 59a7.84 7.84 0 00-7.8 7.89v10.6zm57.94 6.88c4.3 0 7.78-3.54 7.78-7.89V65.9a7.84 7.84 0 00-7.78-7.9A4 4 0 0073 61.99v18.5a3.98 3.98 0 003.94 3.89zM49 92h6a3 3 0 000-6h-6a3 3 0 000 6z" opacity=".2"></path>
                            <path d="M54.5 12a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM50 10.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM42.5 12a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM11 43.69a37.1 37.1 0 0119.3-32.54l1.99 2.93C20.7 19.81 13.95 30.6 13.95 44.57a1.5 1.5 0 003 0c0-13 6.27-22.8 17-27.96l.05-.02 1.66 2.44c.38.57 1.1.8 1.74.57a34.63 34.63 0 0111.47-1.97c4.03 0 7.94.63 11.45 1.96.66.25 1.4 0 1.79-.58l1.33-2.06c10.35 5.35 16.59 14.92 16.59 27.62a1.5 1.5 0 003 0c0-13.74-6.78-24.26-17.95-30.14l1.99-3.06A37.8 37.8 0 0175 17.41a36.77 36.77 0 0111 26.28V64h-3v-1.23c0-5.26-4.7-9.27-10.13-9.27-3.06 0-5.87 2.31-5.87 5.43v18.23c0 3.05 2.83 5.34 5.87 5.34.2 0 .4 0 .59-.02-.07.39-.21.77-.4 1.06-.28.43-.5.46-.56.46H54.74a4.5 4.5 0 00-4.24-3h-6a4.5 4.5 0 000 9h6a4.5 4.5 0 004.24-3H72.5a3.7 3.7 0 003.07-1.83c.6-.92.93-2.08.93-3.17v-.03a1.78 1.78 0 000-.09c3.74-1.32 6.5-4.62 6.5-8.65V73h4.33c2.46 0 4.17-2.19 4.17-4.5 0-1.74-.97-3.41-2.5-4.13V43.69c0-11.12-4.5-21.1-11.88-28.41A40.39 40.39 0 0048.5 3.5C26.1 3.5 8 21.45 8 43.69v20.48a4.5 4.5 0 00-3 4.33C5 70.81 6.7 73 9.17 73H13v.23c0 5.26 4.7 9.27 10.13 9.27 3.04 0 5.87-2.3 5.87-5.34V58.93c0-3.12-2.8-5.43-5.87-5.43C17.7 53.5 13 57.51 13 62.77V64h-2V43.69zM37.5 16.4L33 9.8a37.72 37.72 0 0115.5-3.3 37.5 37.5 0 0115.89 3.49l-4.16 6.39a37.63 37.63 0 00-22.73.03zm14.25 68.26a1.5 1.5 0 000 1.66c-.27.4-.73.67-1.25.67h-6a1.5 1.5 0 010-3h6c.52 0 .98.27 1.25.67zM23.13 56.5c1.7 0 2.87 1.26 2.87 2.43v18.23c0 1.06-1.14 2.34-2.87 2.34-4.08 0-7.13-2.96-7.13-6.27V62.77c0-3.31 3.05-6.27 7.13-6.27zM9.17 67H13v3H9.17C8.69 70 8 69.5 8 68.5S8.69 67 9.17 67zM70 58.93c0-1.17 1.16-2.43 2.87-2.43 4.08 0 7.13 2.96 7.13 6.27v10.46c0 3.31-3.05 6.27-7.13 6.27-1.73 0-2.87-1.28-2.87-2.34V58.93zM83.5 70v-3h3.83c.48 0 1.17.5 1.17 1.5s-.69 1.5-1.17 1.5H83.5z"></path>
                        </svg>
                        <h5 class="card-title pt-4 pb-2">Equipos de soporte</h5>
                        <p class="card-text">Brinda asistencia técnica confiable con equipos especializados en resolver incidencias y mantener la continuidad operativa.</p>
                    </div><!-- end card-body -->
                </div>
                <div class="col responsive-column-half card card-item case-card text-center">
                    <div class="card-body">
                        <svg aria-hidden="true" width="96" height="96" viewbox="0 0 96 96">
                            <path opacity=".2" d="M36 47.5a9.48 9.48 0 01-3.67 7.5h5.76a1 1 0 01.7.29l1.39 1.36A9.5 9.5 0 0157.87 54h7.7a9.5 9.5 0 1113.86 0H83a4 4 0 014 4v23a2 2 0 01-2 2H64v10a1 1 0 01-1 1H36a1 1 0 01-1-1V83H16a1 1 0 01-1-1V59a4 4 0 014-4h1.67a9.48 9.48 0 015.83-17 9.5 9.5 0 019.5 9.5z"></path>
                            <path d="M13 44.5A11 11 0 1130.98 53h.52a1.5 1.5 0 010 3H15.54C13.5 56 12 57.54 12 59.21V78h4.38a1.5 1.5 0 01-.38-1V63a1.5 1.5 0 013 0v14c0 .38-.14.73-.38 1h9.06a1.5 1.5 0 010 3H10.5A1.5 1.5 0 019 79.5V59.21c0-3.5 3.03-6.21 6.54-6.21h1.48A10.98 10.98 0 0113 44.5zm11-8a8 8 0 100 16 8 8 0 000-16zm23 8A11 11 0 0040.02 64h-1.33C35.12 64 32 66.73 32 70.3v20.2c0 .83.67 1.5 1.5 1.5h27c.83 0 1.5-.67 1.5-1.5V70.3c0-3.57-3.12-6.3-6.7-6.3h-1.32A11 11 0 0047 44.5zm-8 11a8 8 0 1116 0 8 8 0 01-16 0zm-4 14.8c0-1.7 1.55-3.3 3.7-3.3h16.6c2.15 0 3.7 1.6 3.7 3.3V89h-4V75a1.5 1.5 0 00-3 0v14H42V75a1.5 1.5 0 00-3 0v14h-4V70.3zm35-36.8A11 11 0 0176.98 53h1.7A6.28 6.28 0 0185 59.21V79.5c0 .83-.67 1.5-1.5 1.5H66.32a1.5 1.5 0 010-3h8.06a1.5 1.5 0 01-.38-1V63a1.5 1.5 0 013 0v14c0 .38-.14.73-.38 1H82V59.21A3.28 3.28 0 0078.68 56H62.5a1.5 1.5 0 010-3h.52A11 11 0 0170 33.5zm8 11a8 8 0 10-16 0 8 8 0 0016 0z"></path>
                            <path d="M12.5 11a1.5 1.5 0 000 3h13a1.5 1.5 0 000-3h-13zM11 17.5c0-.83.67-1.5 1.5-1.5h9a1.5 1.5 0 010 3h-9a1.5 1.5 0 01-1.5-1.5zm-5-10C6 6.67 6.67 6 7.5 6h25c.83 0 1.5.67 1.5 1.5v15c0 .83-.67 1.5-1.5 1.5H29v6a1.5 1.5 0 01-2.4 1.2L17 24H7.5A1.5 1.5 0 016 22.5v-15zM9 9v12h8.5c.32 0 .64.1.9.3L26 27v-6h5V9H9zm60.5 3a1.5 1.5 0 000 3h13a1.5 1.5 0 000-3h-13zM68 18.5c0-.83.67-1.5 1.5-1.5h8a1.5 1.5 0 010 3h-8a1.5 1.5 0 01-1.5-1.5zM87.5 7c.83 0 1.5.67 1.5 1.5v16c0 .83-.67 1.5-1.5 1.5H76.42l-7.15 4.29A1.5 1.5 0 0167 29v-3h-2.5a1.5 1.5 0 01-1.5-1.5v-16c0-.83.67-1.5 1.5-1.5h23zM86 23V10H66v13h4v3.35l5.23-3.14c.23-.14.5-.21.77-.21h10zm-42.5 4a1.5 1.5 0 000 3h9a1.5 1.5 0 000-3h-9zM59 22.5c0-.83-.67-1.5-1.5-1.5h-19c-.83 0-1.5.67-1.5 1.5v12c0 .83.67 1.5 1.5 1.5H41v4.5a1.5 1.5 0 002.56 1.06L49.12 36h8.38c.83 0 1.5-.67 1.5-1.5v-12zM40 24h16v9h-8.12L44 36.88V33h-4v-9z" opacity=".35"></path>
                        </svg>
                        <h5 class="card-title pt-4 pb-2">Líderes de ingeniería</h5>
                        <p class="card-text">Impulsa la innovación y guía equipos técnicos con líderes que combinan visión estratégica y experiencia en desarrollo.</p>
                    </div><!-- end card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- END INFO AREA -->

    <hr class="border-top-gray">

    <!-- START TESTIMONIAL AREA -->
    <section class="testimonial-area section--padding">
        <div class="container">
            <div class="testimonial-carousel owl-carousel owl-theme owl-action-styled">
                <div class="carousel-card text-center">
                    <p class="section-desc w-75 mx-auto">
                        “Gracias a esta plataforma, nuestro equipo pudo resolver desafíos técnicos complejos de forma más ágil y colaborativa. La calidad de las respuestas y la participación activa de la comunidad marcaron una gran diferencia en nuestros proyectos.”
                    </p>
                    <div class="divider bg-transparent my-4"><span class="mx-auto"></span></div>
                    <h3 class="pb-1 fs-17">Director of Product Management</h3>
                    <span>Microsoft</span>
                </div>

                <div class="carousel-card text-center">
                    <p class="section-desc w-75 mx-auto">
                        “Implementar esta solución dentro de nuestro equipo técnico mejoró notablemente la productividad y redujo el tiempo de resolución de problemas. Es una herramienta clave para fomentar la colaboración entre ingenieros.”
                    </p>
                    <div class="divider bg-transparent my-4"><span class="mx-auto"></span></div>
                    <h3 class="pb-1 fs-17">Director of Engineering</h3>
                    <span>Elastic Cloud</span>
                </div>
            </div><!-- end owl-carousel -->
        </div>
    </section>
    <!-- END TESTIMONIAL AREA -->

    <hr class="border-top-gray">

    <!--  START CTA AREA -->
    <section class="get-started-area section--padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Aprende y crece con J-GOD</h2>
            </div>
            <div class="row pt-50px">
                <div class="col-lg-3 responsive-column-half">
                    <div class="info-box px-2">
                        <div class="icon-element icon-element-lg mb-4 shadow-sm">
                            <svg class="svg-icon-color-1" width="40" viewbox="0 -25 424 424" xmlns="http://www.w3.org/2000/svg">
                                <path d="m167.289062 272.132812c-1.601562 0-3.214843-.550781-4.53125-1.671874l-45.296874-38.570313c-1.5625-1.332031-2.460938-3.277344-2.460938-5.332031 0-2.050782.902344-3.996094 2.460938-5.328125l45.296874-38.570313c2.941407-2.507812 7.359376-2.152344 9.867188.789063 2.503906 2.945312 2.152344 7.363281-.792969 9.867187l-39.035156 33.242188 39.035156 33.242187c2.945313 2.507813 3.296875 6.925781.792969 9.867188-1.386719 1.628906-3.355469 2.464843-5.335938 2.464843zm0 0"></path>
                                <path d="m256.710938 272.132812c-1.980469 0-3.949219-.835937-5.332032-2.464843-2.507812-2.941407-2.152344-7.359375.789063-9.867188l39.035156-33.242187-39.035156-33.242188c-2.941407-2.503906-3.296875-6.921875-.789063-9.867187 2.503906-2.941407 6.925782-3.296875 9.863282-.789063l45.296874 38.570313c1.5625 1.332031 2.460938 3.277343 2.460938 5.328125 0 2.054687-.898438 4-2.460938 5.332031l-45.296874 38.570313c-1.316407 1.121093-2.929688 1.671874-4.53125 1.671874zm0 0"></path>
                                <path d="m195.964844 301.0625c-.480469 0-.964844-.050781-1.453125-.152344-3.78125-.796875-6.203125-4.511718-5.40625-8.292968l28.230469-134.035157c.796874-3.78125 4.507812-6.203125 8.292968-5.40625 3.78125.796875 6.203125 4.507813 5.40625 8.292969l-28.230468 134.035156c-.695313 3.296875-3.601563 5.558594-6.839844 5.558594zm0 0"></path>
                                <path d="m377 374.085938h-330c-25.914062 0-47-21.082032-47-47v-280.085938c0-25.914062 21.085938-47 47-47h330c25.914062 0 47 21.085938 47 47v280.085938c0 25.917968-21.085938 47-47 47zm-330-360.085938c-18.195312 0-33 14.804688-33 33v280.085938c0 18.195312 14.804688 33 33 33h330c18.195312 0 33-14.804688 33-33v-280.085938c0-18.195312-14.804688-33-33-33zm0 0"></path>
                                <path d="m417 112.089844h-410c-3.867188 0-7-3.132813-7-7 0-3.863282 3.132812-7 7-7h410c3.867188 0 7 3.136718 7 7 0 3.867187-3.132812 7-7 7zm0 0"></path>
                                <path d="m119.601562 78.59375c-12.210937 0-22.152343-9.941406-22.152343-22.152344 0-12.214844 9.941406-22.152344 22.152343-22.152344 12.214844 0 22.152344 9.9375 22.152344 22.152344 0 12.210938-9.9375 22.152344-22.152344 22.152344zm0-30.304688c-4.492187 0-8.152343 3.65625-8.152343 8.152344s3.660156 8.152344 8.152343 8.152344c4.496094 0 8.152344-3.65625 8.152344-8.152344s-3.65625-8.152344-8.152344-8.152344zm0 0"></path>
                                <path d="m51.539062 78.378906c-12.214843 0-22.152343-9.9375-22.152343-22.152344 0-12.214843 9.9375-22.152343 22.152343-22.152343 12.214844 0 22.152344 9.9375 22.152344 22.152343 0 12.214844-9.9375 22.152344-22.152344 22.152344zm0-30.304687c-4.492187 0-8.152343 3.660156-8.152343 8.152343 0 4.496094 3.660156 8.152344 8.152343 8.152344 4.496094 0 8.152344-3.65625 8.152344-8.152344 0-4.492187-3.65625-8.152343-8.152344-8.152343zm0 0"></path>
                                <path d="m187.664062 78.804688c-12.210937 0-22.148437-9.9375-22.148437-22.152344 0-12.210938 9.9375-22.148438 22.148437-22.148438 12.214844 0 22.152344 9.9375 22.152344 22.148438 0 12.214844-9.9375 22.152344-22.152344 22.152344zm0-30.304688c-4.492187 0-8.148437 3.65625-8.148437 8.152344s3.65625 8.152344 8.148437 8.152344c4.496094 0 8.152344-3.65625 8.152344-8.152344s-3.65625-8.152344-8.152344-8.152344zm0 0"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Escribe el script del futuro</h3>
                            <p>Transforma ideas en soluciones con impacto real. Colabora, innova y comparte conocimiento técnico que impulsa el desarrollo de tecnología para el mañana.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="info-box px-2">
                        <div class="icon-element icon-element-lg mb-4 shadow-sm">
                            <svg class="svg-icon-color-2" width="40" viewbox="0 0 569 569.54905" xmlns="http://www.w3.org/2000/svg">
                                <path d="m1.527344 52.246094 37.984375 66.46875c1.28125 2.246094 3.425781 3.871094 5.933593 4.5l35.4375 8.859375 121.542969 121.542969 13.429688-13.425782-123.445313-123.441406c-1.214844-1.21875-2.738281-2.082031-4.40625-2.5l-34.050781-8.542969-32.339844-56.625 27.726563-27.726562 56.648437 32.371093 8.546875 34.050782c.414063 1.671875 1.28125 3.199218 2.496094 4.414062l123.445312 123.445313 13.425782-13.429688-121.542969-121.542969-8.859375-35.417968c-.628906-2.511719-2.253906-4.660156-4.5-5.945313l-66.472656-37.980469c-3.707032-2.109374-8.371094-1.484374-11.394532 1.527344l-37.980468 37.984375c-3.0546878 3.003907-3.71875 7.675781-1.625 11.414063zm0 0"></path>
                                <path d="m396.3125 187.144531-208.902344 208.90625-13.429687-13.429687 208.90625-208.902344zm0 0"></path>
                                <path d="m150.847656 403.441406c-1.71875-2.859375-4.804687-4.605468-8.140625-4.605468h-56.972656c-3.332031 0-6.421875 1.746093-8.136719 4.605468l-28.488281 47.476563c-1.808594 3.007812-1.808594 6.769531 0 9.78125l28.488281 47.476562c1.714844 2.855469 4.804688 4.605469 8.136719 4.605469h56.972656c3.335938 0 6.421875-1.75 8.140625-4.605469l28.484375-47.476562c1.808594-3.011719 1.808594-6.773438 0-9.78125zm-13.511718 90.347656h-46.226563l-22.789063-37.980468 22.789063-37.984375h46.226563l22.789062 37.984375zm0 0"></path>
                                <path d="m456.0625 227.914062c62.714844.210938 113.730469-50.460937 113.941406-113.175781.03125-9.546875-1.140625-19.054687-3.488281-28.308593-1.265625-5.089844-6.417969-8.1875-11.507813-6.921876-1.671874.417969-3.195312 1.28125-4.414062 2.496094l-59.109375 59.070313-46.898437-15.628907-15.640626-46.886718 59.109376-59.121094c3.707031-3.710938 3.703124-9.722656-.007813-13.429688-1.222656-1.222656-2.761719-2.089843-4.445313-2.503906-60.820312-15.402344-122.605468 21.414063-138.007812 82.230469-2.339844 9.226563-3.507812 18.710937-3.476562 28.230469.023437 7.476562.792968 14.929687 2.308593 22.25l-207.957031 207.953125c-7.320312-1.511719-14.773438-2.28125-22.246094-2.308594-62.933594 0-113.949218 51.015625-113.949218 113.949219 0 62.929687 51.015624 113.945312 113.949218 113.945312 62.929688 0 113.945313-51.015625 113.945313-113.945312-.023438-7.476563-.796875-14.929688-2.308594-22.25l49.785156-49.785156 21.773438 21.773437c3.710937 3.707031 9.71875 3.707031 13.429687 0l4.746094-4.75c4.164062-4.136719 10.894531-4.136719 15.058594 0 4.160156 4.148437 4.167968 10.882813.019531 15.042969-.003906.003906-.011719.011718-.019531.019531l-4.746094 4.746094c-3.707031 3.707031-3.707031 9.71875 0 13.425781l113.273438 113.273438c29.792968 30.066406 78.316406 30.285156 108.382812.492187 30.0625-29.792969 30.28125-78.320313.488281-108.382813-.160156-.164062-.324219-.328124-.488281-.492187l-113.273438-113.269531c-3.707031-3.707032-9.71875-3.707032-13.425781 0l-4.746093 4.746094c-4.167969 4.140624-10.894532 4.140624-15.0625 0-4.15625-4.148438-4.167969-10.882813-.019532-15.039063.007813-.007813.015625-.011719.019532-.019531l4.75-4.75c3.707031-3.707032 3.707031-9.71875 0-13.425782l-21.773438-21.773437 49.785156-49.785156c7.320313 1.511719 14.773438 2.285156 22.246094 2.308593zm37.308594 322.851563c-6.898438-.011719-13.738282-1.257813-20.195313-3.683594l74.160157-74.164062c11.191406 29.769531-3.867188 62.972656-33.636719 74.164062-6.496094 2.441407-13.382813 3.691407-20.328125 3.683594zm-107.574219-246.792969c-10.515625 12.542969-8.867187 31.238282 3.675781 41.75 11.023438 9.238282 27.089844 9.230469 38.101563-.027344l106.5625 106.65625c1.15625 1.160157 2.238281 2.382813 3.285156 3.625l-81.1875 81.1875c-1.246094-1.042968-2.46875-2.125-3.628906-3.285156l-106.644531-106.652344c10.515624-12.542968 8.867187-31.238281-3.675782-41.75-11.023437-9.242187-27.09375-9.230468-38.105468.023438l-15.191407-15.191406 81.613281-81.492188zm38.34375-95.503906-215.410156 215.367188c-2.363281 2.359374-3.3125 5.785156-2.507813 9.023437 13.027344 51.160156-17.886718 103.195313-69.050781 116.21875-51.160156 13.027344-103.195313-17.886719-116.222656-69.050781-13.023438-51.160156 17.890625-103.195313 69.054687-116.222656 15.476563-3.9375 31.691406-3.9375 47.167969 0 3.238281.792968 6.65625-.15625 9.023437-2.503907l215.359376-215.371093c2.359374-2.359376 3.308593-5.785157 2.496093-9.019532-12.9375-50.5625 17.5625-102.039062 68.125-114.980468 9.554688-2.441407 19.4375-3.378907 29.28125-2.765626l-50.089843 50.109376c-2.542969 2.539062-3.433594 6.300781-2.296876 9.710937l18.988282 56.976563c.949218 2.832031 3.175781 5.058593 6.011718 6l56.976563 18.992187c3.40625 1.136719 7.167969.25 9.710937-2.289063l50.089844-50.089843c.113282 1.8125.171875 3.605469.171875 5.390625.265625 52.175781-41.8125 94.6875-93.988281 94.957031-8.066406.039063-16.105469-.953125-23.917969-2.953125-3.238281-.808594-6.664062.136719-9.023437 2.496094h.050781zm0 0"></path>
                                <path d="m491.273438 477.578125-13.429688 13.429687-94.953125-94.953124 13.425781-13.429688zm0 0"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Apoya el código abierto</h3>
                            <p>Contribuye al crecimiento de la comunidad tecnológica impulsando proyectos abiertos que fomentan la colaboración, la innovación y el acceso libre al conocimiento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="info-box px-2">
                        <div class="icon-element icon-element-lg mb-4 shadow-sm">
                            <svg class="svg-icon-color-3" width="40" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <path d="M346,319c-5.522,0-10,4.477-10,10v69c0,27.57-22.43,50-50,50H178.032c-5.521,0-9.996,4.473-10,9.993l-0.014,19.882
                                        l-23.868-23.867c-1.545-3.547-5.081-6.008-9.171-6.008H70c-27.57,0-50-22.43-50-50V244c0-27.57,22.43-50,50-50h101
                                        c5.522,0,10-4.477,10-10s-4.478-10-10-10H70c-38.598,0-70,31.402-70,70v154c0,38.598,31.402,70,70,70h59.858l41.071,41.071
                                        c1.913,1.913,4.47,2.929,7.073,2.929c1.287,0,2.586-0.249,3.821-0.76c3.737-1.546,6.174-5.19,6.177-9.233L188.024,468H286
                                        c38.598,0,70-31.402,70-70v-69C356,323.477,351.522,319,346,319z"></path>
                                </g>
                                <g>
                                    <path d="M366.655,0h-25.309C261.202,0,196,65.202,196,145.346s65.202,145.345,145.345,145.345h25.309
                                        c12.509,0,24.89-1.589,36.89-4.729l37.387,37.366c1.913,1.911,4.469,2.927,7.071,2.927c1.289,0,2.589-0.249,3.826-0.762
                                        c3.736-1.548,6.172-5.194,6.172-9.238v-57.856c15.829-12.819,28.978-29.012,38.206-47.102
                                        C506.687,190.751,512,168.562,512,145.346C512,65.202,446.798,0,366.655,0z M441.983,245.535
                                        c-2.507,1.889-3.983,4.847-3.983,7.988v38.6l-24.471-24.458c-1.904-1.902-4.458-2.927-7.07-2.927c-0.98,0-1.97,0.145-2.936,0.442
                                        c-11.903,3.658-24.307,5.512-36.868,5.512h-25.309c-69.117,0-125.346-56.23-125.346-125.346S272.23,20,341.346,20h25.309
                                        C435.771,20,492,76.23,492,145.346C492,185.077,473.77,221.595,441.983,245.535z"></path>
                                </g>
                                <g>
                                    <path d="M399.033,109.421c-1.443-20.935-18.319-37.811-39.255-39.254c-11.868-0.815-23.194,3.188-31.863,11.281
                                        c-8.55,7.981-13.453,19.263-13.453,30.954c0,5.523,4.478,10,10,10c5.522,0,10-4.477,10-10c0-6.259,2.522-12.06,7.1-16.333
                                        c4.574-4.269,10.552-6.382,16.842-5.948c11.028,0.76,19.917,9.649,20.677,20.676c0.768,11.137-6.539,20.979-17.373,23.403
                                        c-8.778,1.964-14.908,9.592-14.908,18.549v24.025c0,5.523,4.478,10,10,10c5.523,0,10-4.477,9.999-10v-23.226
                                        C386.949,148.68,400.468,130.242,399.033,109.421z"></path>
                                </g>
                                <g>
                                    <path d="M363.87,209.26c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93c-1.86,1.86-2.93,4.44-2.93,7.07
                                        c0,2.64,1.071,5.22,2.93,7.08c1.86,1.86,4.44,2.92,7.07,2.92s5.21-1.06,7.07-2.92c1.86-1.87,2.93-4.44,2.93-7.08
                                        C366.8,213.7,365.729,211.12,363.87,209.26z"></path>
                                </g>
                                <g>
                                    <path d="M275,310H64c-5.522,0-10,4.477-10,10s4.478,10,10,10h211c5.523,0,10-4.477,10-10S280.522,310,275,310z"></path>
                                </g>
                                <g>
                                    <path d="M282.069,368.93C280.21,367.07,277.63,366,275,366s-5.21,1.07-7.07,2.93c-1.861,1.86-2.93,4.44-2.93,7.07
                                        s1.07,5.21,2.93,7.07c1.86,1.86,4.44,2.93,7.07,2.93s5.21-1.07,7.069-2.93c1.861-1.86,2.931-4.43,2.931-7.07
                                        C285,373.37,283.929,370.79,282.069,368.93z"></path>
                                </g>
                                <g>
                                    <path d="M235.667,366H64c-5.522,0-10,4.477-10,10s4.478,10,10,10h171.667c5.523,0,10-4.477,10-10S241.189,366,235.667,366z"></path>
                                </g>
                                <g>
                                    <path d="M210,254H64c-5.522,0-10,4.477-10,10s4.478,10,10,10h146c5.523,0,10-4.477,10-10S215.522,254,210,254z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Adquirir y compartir conocimientos</h3>
                            <p>Aprende de otros desarrolladores, resuelve desafíos reales y comparte tu experiencia para fortalecer una comunidad técnica en constante crecimiento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="info-box px-2">
                        <div class="icon-element icon-element-lg mb-4 shadow-sm">
                            <svg class="svg-icon-color-4" width="40" viewbox="-26 0 512 512.001" xmlns="http://www.w3.org/2000/svg">
                                <path d="m457.085938 68.828125-21.878907-19.265625 21.878907-19.261719c3.402343-3 4.566406-7.675781 2.96875-11.917969-1.605469-4.246093-5.570313-6.988281-10.105469-6.988281h-90.539063v-3.890625c0-4.144531-3.359375-7.503906-7.503906-7.503906s-7.503906 3.359375-7.503906 7.503906v101.203125l-61.628906 33.464844c-.339844-2.710937-1.152344-5.375-2.4375-7.882813l-8.683594-16.953124c-5.960938-11.640626-20.28125-16.253907-31.914063-10.296876l-6.714843 3.4375c-5.640626 2.890626-9.816407 7.796876-11.761719 13.828126-1.945313 6.027343-1.425781 12.453124 1.464843 18.089843l8.683594 16.957031c2.027344 3.957032 5.023438 7.089844 8.546875 9.285157-4.609375 6.207031-6.796875 13.839843-9.046875 21.769531l-1.617187 5.726562c-1.128907 3.988282 1.191406 8.136719 5.179687 9.261719.679688.195313 1.367188.285157 2.042969.285157 3.273437 0 6.28125-2.15625 7.21875-5.464844l1.617187-5.714844c3.289063-11.597656 5.308594-17.808594 11.738282-21.300781l11.527344-6.261719 1.421874-.726562c.472657-.242188.914063-.515626 1.363282-.785157l82.15625-44.613281c-.519532 10.269531-6.046875 19.972656-15.148438 25.5l-53.425781 32.460938c-.0625.035156-.125.070312-.183594.109374l-16.628906 10.101563c-3.539063 2.152344-4.667969 6.769531-2.515625 10.3125 2.027344 3.339844 6.246094 4.527344 9.6875 2.851563l-12.617188 38.140624-9.222656 3.78125-25.078125 10.277344 7.226563-25.546875c1.125-3.988281-1.191406-8.136719-5.179688-9.265625-3.992187-1.132812-8.136718 1.191406-9.265625 5.179688l-11.417969 40.378906c-.148437.519531-.246093 1.089844-.269531 1.632812l-2.988281 54.890626c-.089844 2.09375.355469 6.050781-.613281 8.09375l-33.1875 69.820312h-24.117188c-14.128906 0-25.621093 11.492188-25.621093 25.617188v21.660156c-3.234376-1.480469-6.824219-2.308594-10.609376-2.308594h-61.246093c-14.125 0-25.617188 11.488281-25.617188 25.617188v26.875h-18.015625c-4.144531 0-7.503906 3.359374-7.503906 7.503906 0 4.144531 3.359375 7.503906 7.503906 7.503906h442.4375c4.144532 0 7.503906-3.359375 7.503906-7.503906 0-4.144532-3.359374-7.503906-7.503906-7.503906h-19.515625v-193.417969c0-14.125-11.492187-25.617188-25.617187-25.617188h-45.398438v-130.910156c8.320313-11.277344 11.402344-26.058594 7.539063-40.105469-.605469-2.207031-2.1875-4.019531-4.296875-4.914062-1.035156-.441406-2.144532-.636719-3.242188-.59375v-13.699219h90.535156c4.539063 0 8.503907-2.742187 10.105469-6.984375 1.601563-4.242188.4375-8.921875-2.964843-11.921875zm-221.539063 60.085937c.714844-2.214843 2.246094-4.019531 4.316406-5.078124l6.714844-3.4375c1.265625-.648438 2.617187-.957032 3.953125-.957032 3.164062 0 6.222656 1.730469 7.761719 4.734375l8.6875 16.957031c2.027343 3.960938.714843 8.761719-2.890625 11.1875l-2.445313 1.324219-5.160156 2.644531c-4.269531 2.1875-9.527344.492188-11.714844-3.78125l-8.6875-16.953124c-1.058593-2.070313-1.25-4.429688-.535156-6.640626zm-15.078125 272.925782c-2.550781-1.164063-5.324219-1.925782-8.238281-2.195313l8.238281-10.941406zm35.628906-60.464844c3.609375-4.324219 4.605469-9.375 5.410156-13.445312.203126-.96875 3.90625-21.195313 3.90625-21.195313s3.503907 2.183594 3.871094 2.339844c.253906.113281.433594.363281.460938.65625l4.082031 41.496093h-25.148437zm44.375-41.417969-6.335937 51.234375h-5.230469l-4.222656-42.929687c-.539063-5.5-3.90625-10.300781-8.839844-12.6875l-7.546875-4.785157 5.027344-27.863281s21.179687 25.160157 21.671875 25.800781c4.382812 5.699219 5.882812 7.980469 5.476562 11.230469zm-81.054687 36.316407c1.515625-4.5625 2.21875-9.207032 2.101562-13.929688l2.726563-50.0625 34.707031-14.222656-6.308594 34.945312c-.019531.09375-.039062.191406-.050781.285156l-5.21875 28.894532c-.679688 2.992187-1.273438 7.53125-3.140625 9.996094l-50.707031 67.351562h-4.179688zm-178.890625 133.839843c0-5.847656 4.757812-10.605469 10.609375-10.605469h61.246093c5.851563 0 10.613282 4.757813 10.613282 10.605469v26.878907h-82.46875zm97.472656 0v-44.964843c0-5.851563 4.761719-10.609376 10.613281-10.609376h61.246094c5.851563 0 10.609375 4.757813 10.609375 10.609376v71.84375h-82.464844v-26.878907zm277.417969-166.539062v193.417969h-82.464844v-44.992188c0-4.144531-3.359375-7.503906-7.503906-7.503906-4.148438 0-7.507813 3.359375-7.507813 7.503906v44.992188h-82.464844v-120.152344c0-5.847656 4.757813-10.605469 10.609376-10.605469h61.246093c5.851563 0 10.609375 4.757813 10.609375 10.605469v37.617187c0 4.144531 3.359375 7.503907 7.503906 7.503907 4.148438 0 7.503907-3.359376 7.503907-7.503907v-110.882812c0-5.851563 4.761719-10.609375 10.613281-10.609375h8.265625c.023437 0 .050781.003906.078125.003906.023438 0 .050781-.003906.074219-.003906h52.824219c5.851562 0 10.613281 4.761718 10.613281 10.609375zm-71.855469-25.617188c-14.125 0-25.617188 11.492188-25.617188 25.617188v49.960937c-2.6875-1.226562-5.617187-2.003906-8.699218-2.230468l6.121094-49.5c1.203124-9.648438-3.71875-16.042969-8.476563-22.230469-.503906-.65625-29.671875-35.289063-29.671875-35.289063l17.894531-54.101562 49.289063-29.945313v117.71875zm15.847656-205.234375v-46.316406h79.386719l-17.097656 15.054688c-2.328125 2.050781-3.664063 5.003906-3.664063 8.105468 0 3.101563 1.335938 6.054688 3.664063 8.105469l17.097656 15.054687h-79.386719zm0 0"></path>
                            </svg>
                        </div>
                        <div class="info-body">
                            <h3 class="fs-18 pb-3 fw-bold">Encuentra oportunidades profesionales</h3>
                            <p>Descubre trabajos relevantes para tu perfil, conecta con empresas innovadoras y haz crecer tu carrera en tecnología desde donde estés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CTA AREA -->

    <!-- FOOTER AREA-->
    <?php include 'views/html/footer.php' ?>
    <!-- END FOOTER AREA -->

    <!-- start back to top -->
    <?php include 'views/html/backtotop.php' ?> 
    <!-- end back to top -->

    <!-- Modal -->
    <?php include 'views/html/loginmodal.php' ?>

    <!-- Modal -->
    <?php include 'views/html/signupmodal.php' ?>

    <!-- Modal -->
    <?php include 'views/html/recovermodal.php' ?>

    <!-- template js files -->
    <?php include 'views/html/js.php' ?>

    <script>
        const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>index.js"></script>
</body>

</html>