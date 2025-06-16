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
                <form method="post" id="signup-form">
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18" for="username">Nombre</label>
                        <input class="form-control form--control" type="text" id="username" name="username" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18" for="emailRegister">Correo electrónico</label>
                        <input class="form-control form--control" type="email" id="emailRegister" name="emailRegister" placeholder="Dirección de correo electrónico" autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Contraseña</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field" type="password" id="passwordRegister" name="passwordRegister" placeholder="Ingresa la contraseña" autocomplete="new-password" required>
                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <!-- Iconos de ojo (mostrar/ocultar contraseña) -->
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
                        </div>
                        <p class="fs-14 lh-20">Tu contraseña debe tener al menos 6 caracteres, contener letras, números y caracteres especiales. No puede contener espacios en blanco.</p>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox fs-14">
                            <label class="custom-control-label custom--control-label" for="agreeCheckBox">Al registrarte, aceptas nuestros <a href="" class="text-color">términos de servicio</a> y ha leído nuestra <a href="privacy-policy.html" class="text-color hover-underline">Política de Privacidad.</a></label>
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
                    <div class="shadow-sm border-bottom border-bottom-gray mt-2 mb-3"></div>
                    <div class="text-center">
                        <button class="btn theme-btn google-btn d-flex align-items-center justify-content-center w-100 mb-2" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 488 512">
                                    <path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                                </svg></span>
                            <span class="flex-grow-1">Regístrate con Google</span>
                        </button>
                        <!-- <button class="btn theme-btn facebook-btn d-flex align-items-center justify-content-center w-100 mb-2" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 320 512">
                                    <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                                </svg></span>
                            <span class="flex-grow-1">Regístrate con Facebook</span>
                        </button>
                        <button class="btn theme-btn twitter-btn d-flex align-items-center justify-content-center w-100" type="button">
                            <span class="btn-icon"><svg focusable="false" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512">
                                    <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                                </svg></span>
                            <span class="flex-grow-1">Regístrate con Twitter</span>
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>