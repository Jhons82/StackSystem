<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>

    <title>Edit Profile - J-GOD</title>
</head>

<body>
    <?php include('preloader.php') ?>

    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- START HERO AREA -->
    <section class="hero-area bg-white shadow-sm overflow-hidden pt-60px">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-content d-flex align-items-center">
                        <div class="icon-element shadow-sm flex-shrink-0 me-3 border border-gray lh-55">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewbox="0 0 24 24" width="32px" fill="#2d86eb">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"></path>
                            </svg>
                        </div>
                        <h2 class="section-title fs-30">Ajustes</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hero-btn-box text-end py-3">
                        <a href="<?php echo BASE_URL; ?>profile/<?php echo $_SESSION['id']; ?>/<?php echo $_SESSION['slug'] ?>" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i class="la la-user me-1"></i>Ver Perfil</a>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs generic-tabs generic--tabs generic--tabs-2 mt-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="edit-profile-tab" data-bs-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="true">Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">Cambiar la contraseña</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="email-settings-tab" data-bs-toggle="tab" href="#email-settings" role="tab" aria-controls="email-settings" aria-selected="false">Configuración de correo electrónico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="delete-account-tab" data-bs-toggle="tab" href="#delete-account" role="tab" aria-controls="delete-account" aria-selected="false">Eliminar cuenta</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- END START HERO AREA -->

    <!-- START USER DETAILS AREA -->
    <section class="user-details-area pt-40px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="tab-content mb-50px" id="myTabContent">
                        <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                            <div class="user-panel-main-bar">
                                <div class="user-panel">
                                    <div class="bg-gray p-3 rounded-rounded">
                                        <h3 class="fs-17">Editar tu perfil</h3>
                                    </div>
                                    <form method="post" id="formEditProfile" class="pt-35px" enctype="multipart/form-data">
                                        <div class="settings-item mb-10px">
                                            <h4 class="fs-14 pb-2 text-gray text-uppercase">Información pública</h4>
                                            <div class="divider"><span></span></div>
                                            <div class="row pt-4 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="edit-profile-photo d-flex flex-wrap align-items-center">
                                                        <img id="viewImage" src="" alt="Imagen de Perfil" class="profile-img me-4">
                                                        <div>
                                                            <div class="file-upload-wrap file--upload-wrap">
                                                                <input type="file" name="image" class="file-upload-input">
                                                                <span class="file-upload-text"><i class="la la-photo me-2"></i>Subir Foto</span>
                                                            </div>
                                                            <p class="fs-14">Tamaño máximo de archivo: 1 a 2 MB.</p>
                                                        </div>
                                                    </div><!-- end edit-profile-photo -->
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="usernameprofile">Nombre para mostrar</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control" type="text" id="usernameprofile" name="usernameprofile">
                                                        </div>
                                                    </div>
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="country">Ubicación</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control" type="text" id="country" name="country">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-15 text-black lh-20 fw-medium" for="description">Acerca de mí</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control form--control user-text-editor" id="description" name="description" rows="10" cols="40"></textarea>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </div>
                                        </div>
                                        <div class="settings-item">
                                            <h4 class="fs-14 pb-2 text-gray text-uppercase">Presencia en la web</h4>
                                            <div class="divider"><span></span></div>
                                            <div class="row pt-4">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="website">Enlace del sitio web</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="website" name="website">
                                                            <span class="la la-link input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="twitter">Enlace de Twitter</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="twitter" name="twitter">
                                                            <span class="la la-twitter input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="facebook">Enlace de Facebook</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="facebook" name="facebook">
                                                            <span class="la la-facebook input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="instagram">Enlace de Instagram</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="instagram" name="instagram">
                                                            <span class="la la-instagram input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="youtube">Enlace de Youtube</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="youtube" name="youtube">
                                                            <span class="la la-youtube input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="vimeo">Enlace de Vimeo</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="vimeo" name="vimeo">
                                                            <span class="la la-vimeo input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20 fw-medium" for="github">Enlace de GitHub</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control pl-40px" type="text" id="github" name="github">
                                                            <span class="la la-github input-icon"></span>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="submit-btn-box pt-3">
                                                        <button class="btn theme-btn" type="submit">Guardar Cambios</button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                            <div class="user-panel-main-bar">
                                <div class="user-panel">
                                    <div class="bg-gray p-3 rounded-rounded">
                                        <h3 class="fs-17">Cambiar la contraseña</h3>
                                    </div>
                                    <form method="post" id="formEditPassword" class="pt-20px">
                                        <div class="settings-item mb-30px">
                                            <input type="text" name="username" autocomplete="username" value="usuario" hidden>
                                            <div class="form-group">
                                                <label class="fs-13 text-black lh-20 fw-medium">Contraseña actual</label>
                                                <input class="form-control form--control password-field" type="password" id="current_password" name="current_password" placeholder="Contraseña actual" autocomplete="current-password">
                                            </div>
                                            <div class="form-group">
                                                <label class="fs-13 text-black lh-20 fw-medium">Nueva contraseña</label>
                                                <input class="form-control form--control password-field" type="password" id="new_password" name="new_password" placeholder="Nueva contraseña" autocomplete="current-password">
                                            </div>
                                            <div class="form-group">
                                                <label class="fs-13 text-black lh-20 fw-medium">Confirma nueva contraseña</label>
                                                <input class="form-control form--control password-field" type="password" id="confirm_password" name="confirm_password" placeholder="Confirma nueva contraseña" autocomplete="current-password">
                                                <p class="fs-14 lh-18 py-2">Las contraseñas deben contener al menos ocho caracteres, incluida al menos 1 letra y 1 número.</p>
                                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button" data-bs-toggle="tooltip" data-placement="right" title="Show/hide password">
                                                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewbox="0 0 24 24" width="22px" fill="currentColor">
                                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                        <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"></path>
                                                    </svg>
                                                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewbox="0 0 24 24" width="22px" fill="currentColor">
                                                        <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                                                        <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="submit-btn-box pt-3">
                                                <button class="btn theme-btn" type="submit">Cambiar la contraseña</button>
                                            </div>
                                        </div>
                                        <div class="border border-gray p-4">
                                            <h4 class="fs-18 mb-2">Olvidaste tu contraseña</h4>
                                            <p class="pb-3">No te preocupes, a todos nos pasa. Te ayudamos a recuperar tu contraseña.</p>
                                            <a href="recover-password.html" class="btn theme-btn theme-btn-sm theme-btn-white">Recuperar Contraseña <i class="la la-arrow-right ms-1"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="email-settings" role="tabpanel" aria-labelledby="email-settings-tab">
                            <div class="user-panel-main-bar">
                                <div class="user-panel">
                                    <div class="bg-gray p-3 rounded-rounded">
                                        <h3 class="fs-17">Configuración de correo electrónico</h3>
                                    </div>
                                    <form method="post" id="formEditEmail" class="pt-20px">
                                        <div class="settings-item mb-30px border-bottom border-bottom-gray pb-30px">
                                            <label class="fs-13 text-black lh-20 fw-medium mb-2" for="emailprofile">Dirección de correo electrónico</label>
                                            <div class="input-group mb-3">
                                                <input class="form-control form--control" type="email" id="emailprofile" name="emailprofile" placeholder="Tu correo electrónico">
                                                <button type="submit" class="btn theme-btn">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delete-account" role="tabpanel" aria-labelledby="delete-account-tab">
                            <div class="user-panel-main-bar">
                                <div class="user-panel">
                                    <div class="delete-account-info card card-item border border-danger">
                                        <div class="card-body">
                                            <h3 class="fs-22 text-danger fw-bold">Eliminar cuenta</h3>
                                            <p class="pb-3 pt-2 lh-22 fs-15">Antes de confirmar que desea eliminar su perfil, nos gustaría tomarnos un momento para explicarle las implicaciones de la eliminación:</p>
                                            <ul class="generic-list-item generic-list-item-bullet fs-15">
                                                <li>La eliminación es irreversible y no tendrás forma de recuperar ninguno de tu contenido original si se lleva a cabo esta eliminación y cambias de opinión más adelante.</li>
                                                <li>Sus preguntas y respuestas permanecerán en el sitio, pero estarán disociadas y anonimizadas (el autor aparecerá como "usuario15319675") y no indicarán su autoría incluso si luego regresa al sitio.</li>
                                            </ul>
                                            <p class="pb-3 pt-2 lh-22 fs-15">Una vez que elimines tu cuenta, no hay vuelta atrás. Por favor, asegúrate.</p>
                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="checkbox" id="delete-terms">
                                                <label class="form-check-label" for="delete-terms">
                                                    He leído la información anterior y comprendo las consecuencias de la eliminación de mi perfil. Deseo proceder con la eliminación de mi perfil.
                                                </label>
                                            </div>

                                            <button type="button" class="btn btn-danger fw-medium" id="delete-button" disabled=""><i class="la la-trash me-1"></i> Eliminar tu cuenta</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <?php require_once(__DIR__ . "/sidebar.php") ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END USER DETAILS AREA -->

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
        const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>views/js/editprofile.js"></script>
</body>

</html>