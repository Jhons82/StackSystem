<div class="modal fade modal-container login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="loginModalTitle">¡Qué bueno verte de nuevo!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group" id="login">
                        <label class="fs-14 text-black fw-medium lh-18" for="email">Correo electrónico</label>
                        <input class="form-control form--control" type="email" name="email" id="email" placeholder="Dirección de correo">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18" for="password">Contraseña</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field" type="password" name="password" id="password" placeholder="Introduce la contraseña">
                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <!-- Iconos de ojo para mostrar/ocultar contraseña -->
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="custom-control custom-checkbox fs-14">
                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label custom--control-label" for="rememberMe">¡Recuérdame!</label>
                        </div>
                        <a href="javascript:void(0)" class="lost-pass-btn fs-14 hover-underline">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                            Iniciar sesión <i class="la la-arrow-right icon ms-1"></i>
                        </button>
                    </div>
                    <p class="create-account-text text-end fs-14 pt-1">
                        ¿Nuevo en J-GOD? <a class="signup-btn text-color hover-underline" href="javascript:void(0)">Crear cuenta</a>
                    </p>
                    <div class="icon-element my-4 mx-auto shadow-sm fs-25">O</div>
                    <div class="text-center">
                        <p class="fs-15 pb-3">Inicia sesión con tu red social</p>
                        <button class="btn theme-btn bg-8 mb-2 me-2"><i class="la la-facebook me-1"></i> Facebook</button>
                        <button class="btn theme-btn bg-9 mb-2 me-2"><i class="la la-twitter me-1"></i> Twitter</button>
                        <button class="btn theme-btn bg-10 mb-2 me-2"><i class="la la-google me-1"></i> Google</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>