<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
require_once __DIR__ . '/../../models/Usuario.php';         // 5. Modelo Tags (opcional aquí si no se usa)

$user = new Usuario();
$users = $user->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'head.php' ?>
    <title>Users - J-GOD</title>
</head>

<body>

    <!-- start cssload-loader -->
    <?php include_once 'preloader.php' ?>
    <!-- end cssload-loader -->

    <!-- START HEADER AREA -->
    <?php include_once 'header.php' ?>
    <!-- END HEADER AREA -->

    <!-- START QUESTION AREA -->
    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="filters pb-3">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                    <h3 class="fs-22 fw-medium">Usuarios</h3>
                    <a href="askquestion" class="btn theme-btn theme-btn-sm">Hacer una pregunta</a>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <form method="post" class="me-3 w-25">
                        <div class="form-group">
                            <input class="form-control form--control form-control-sm h-auto lh-34" type="text" id="search-user" name="search-user" placeholder="Filtrar por usuario">
                            <button class="form-btn" type="button"><i class="la la-search"></i></button>
                        </div>
                    </form>
                    <div class="btn-group btn--group mb-3 flex-wrap flex-md-nowrap overflow-auto mb-3">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
                        <label class="btn btn-outline-primary" for="btnradio1">Reputación</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                        <label class="btn btn-outline-primary" for="btnradio2">Nuevos Usuarios</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                        <label class="btn btn-outline-primary" for="btnradio3">Votos</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4">
                        <label class="btn btn-outline-primary" for="btnradio4">Editores</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5">
                        <label class="btn btn-outline-primary" for="btnradio5">Moderadores</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($users as $index => $user): ?>
                    <div class="col-lg-3 responsive-column-half user-card <?php echo $index >= 24 ? 'd-none' : '' ?>">
                        <div class="media media-card p-3">
                            <div class="media-img d-inline-block flex-shrink-0 user-avatar-wrapper">
                                <?php
                                    if (!empty($user['image'])) {
                                        echo '<img class="user-avatar" src="' . BASE_URL . $user['image'] . '" alt="Logo Usuario">';
                                    } else {
                                        echo 'Sin imagen';
                                    }
                                ?>
                                <div class="user-tooltip">
                                    <!-- Bloque superior -->
                                    <div class="tooltip-top">
                                        <div class="tooltip-avatar">
                                            <img src="<?php echo BASE_URL . $user['image']; ?>" alt="Foto">
                                        </div>
                                        <div class="toltip-details">
                                            <h4 class="tooltip-name"><?php echo htmlspecialchars($user['username']); ?></h4>
                                            <p class="tooltip-reputation">Reputación: <?php echo $user['reputation'] ?? 0; ?></p>
                                            <?php
                                                if (!empty($user['country'])) {
                                                    echo '<p class="tooltip-country">País: ' . htmlspecialchars($user['country']) . '</p>';
                                                }
                                                if (!empty($user['website'])) {
                                                $website = trim($user['website']);
                                                if (!preg_match('#^https?://#i', $website)) {
                                                    $website = 'https://' . $website;
                                                }
                                                echo '<p class="tooltip-website">Sitio web: <a href="' . htmlspecialchars($website) . '" target="_blank" rel="noopener">' . parse_url($website, PHP_URL_HOST) . '</a></p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Bloque inferior -->
                                    <div class="tooltip-description">
                                        <?php echo htmlspecialchars($user['description'] ?? 'Sin Descripción.') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <h5 class="fs-16 fw-medium user-link"><a href="<?php echo BASE_URL . 'profile/' . $user['id'] . '/' . $user['slug']; ?>"><?php echo htmlspecialchars($user['username']) ?></a></h5>
                                <small class="meta d-block lh-24 pb-1"><span><?php echo htmlspecialchars($user['country'] ?? 'Sin nombrar ciudad.'); ?></span></small>
                                <p class="fw-medium fs-15 text-black-50 lh-18"><?php echo !empty($user['reputation']) ? $user['reputation'] : 0; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="text-center mt-4">
                <button id="btn-show-more" class="btn btn-outline-primary">Mostrar más</button>
            </div>
        </div>
    </section>
    <!-- END QUESTION AREA -->

    <!-- END FOOTER AREA -->
    <?php include_once 'footer.php' ?>
    <!-- END FOOTER AREA -->

    <!-- start back to top -->
    <?php include_once 'backtotop.php' ?>
    <!-- end back to top -->

    <!-- template js files -->
    <?php include_once 'js.php' ?>

    <script>
        const BASE_URL = " <?php echo BASE_URL; ?>";
    </script>

    <script type="text/javascript" src="<?php echo BASE_URL; ?>views/js/users.js"></script>
</body>

</html>