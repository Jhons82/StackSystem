<div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="signUpModalTitle">¡Bienvenido! Crea tu cuenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Nombre</label>
                        <input class="form-control form--control" type="text" name="text" placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Correo electrónico</label>
                        <input class="form-control form--control" type="email" name="email" placeholder="Dirección de correo electrónico">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Contraseña</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field" type="password" name="password" placeholder="Ingresa la contraseña">
                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <!-- Iconos de ojo (mostrar/ocultar contraseña) -->
                                    ...
                                </button>
                            </div>
                        </div>
                        <p class="fs-14 lh-20">Tu contraseña debe tener al menos 6 caracteres, contener letras, números y caracteres especiales. No puede contener espacios en blanco.</p>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox fs-14">
                            <input type="checkbox" class="custom-control-input" id="agreeCheckBox">
                            <label class="custom-control-label custom--control-label" for="agreeCheckBox">Al registrarte, aceptas nuestra <a href="privacy-policy.html" class="text-color hover-underline">Política de Privacidad.</a></label>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                            Registrar cuenta <i class="la la-arrow-right icon ms-1"></i>
                        </button>
                    </div>
                    <p class="create-account-text text-end fs-14">
                        ¿Ya tienes una cuenta en J-GOD? <a class="login-btn text-color hover-underline" href="javascript:void(0)">Iniciar sesión</a>
                    </p>
                    <div class="icon-element my-4 mx-auto shadow-sm fs-25">O</div>
                    <div class="text-center">
                        <p class="fs-15 pb-3">Crea una cuenta con tu red social</p>
                        <button class="btn theme-btn bg-8 mb-2 me-2"><i class="la la-facebook me-1"></i> Facebook</button>
                        <button class="btn theme-btn bg-9 mb-2 me-2"><i class="la la-twitter me-1"></i> Twitter</button>
                        <button class="btn theme-btn bg-10 mb-2 me-2"><i class="la la-google me-1"></i> Google</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>