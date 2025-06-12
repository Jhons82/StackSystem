<?php
require_once(__DIR__ . '/../../includes/config.php');
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once(__DIR__ . '/head.php'); ?>

    <title>-Error 404 - J-GOD</title>
</head>

<body>
    <?php require_once(__DIR__ . '/preloader.php') ?>

    <!-- HEADER -->
    <?php require_once(__DIR__ . '/header.php') ?>
    <!-- END HEADER -->

    <!-- START ERROR AREA -->
    <section class="error-area section-padding position-relative">
        <span class="icon-shape icon-shape-1"></span>
        <span class="icon-shape icon-shape-2"></span>
        <span class="icon-shape icon-shape-3"></span>
        <span class="icon-shape icon-shape-4"></span>
        <span class="icon-shape icon-shape-5"></span>
        <span class="icon-shape icon-shape-6"></span>
        <span class="icon-shape icon-shape-7"></span>
        <div class="container">
            <div class="text-center">
                <img src="<?php echo BASE_URL; ?>assets/images/error-img.png" alt="error-image" class="img-fluid mb-40px">
                <h2 class="section-title pb-3">¡Ups! ¡Página no encontrada!</h2>
                <p class="section-desc pb-4">Lo sentimos, no pudimos encontrar la página solicitada.</p>
                <a class="btn theme-btn" href="home.php"> Ir a la página de inicio </a>
            </div>
        </div><!-- end container -->
    </section>
    <!-- END START ERROR AREA -->

    <!-- FOOTER -->
    <?php require_once(__DIR__ . '/footer.php') ?>
    <!-- END FOOTER -->

    <!-- start back to top -->
    <?php require_once(__DIR__ . '/backtotop.php') ?>
    <!-- end back to top -->

    <!-- Modal Login -->
    <?php require_once(__DIR__ . '/loginModal.php') ?>
    <!-- End Modal Login -->

    <!-- Modal Register -->
    <?php require_once(__DIR__ . '/signupmodal.php') ?>
    <!-- End Modal Register -->

    <!-- Modal Recover -->
    <?php require_once(__DIR__ . '/recoverModal.php') ?>
    <!-- End Modal Recover -->

    <!-- template js files -->
    <?php require_once(__DIR__ . '/js.php'); ?>
</body>

</html>