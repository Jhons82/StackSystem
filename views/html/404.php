<?php
require_once(__DIR__ . '/../../includes/config.php');
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>

    <title>-Error 404 - J-GOD</title>
</head>

<body>
    <?php include('preloader.php') ?>

    <!-- HEADER -->
    <?php include('header.php') ?>
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
                <a class="btn theme-btn" href="<?php echo BASE_URL; ?>"> Ir a la página de inicio </a>
            </div>
        </div><!-- end container -->
    </section>
    <!-- END START ERROR AREA -->

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
</body>

</html>