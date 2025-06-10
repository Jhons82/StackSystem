<header class="header-area bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo-box">
                    <a href="/StackSystem" class="logo"><img src="<?php echo BASE_URL; ?>assets/images/logo_dark.png" alt="logo" style="width: 140px; height: 33px;"></a>
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
                        <a href="#" class="btn theme-btn theme-btn-outline me-2" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="la la-sign-in me-1"></i> Iniciar Sesión</a>
                        <a href="#" class="btn theme-btn" data-bs-toggle="modal" data-bs-target="#signUpModal"><i class="la la-user me-1"></i> inscribirse</a>
                    </div><!-- end nav-right-button -->
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
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
</header><!-- end header-area -->