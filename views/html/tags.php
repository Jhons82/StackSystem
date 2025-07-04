<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
require_once __DIR__ . '/../../models/Tag.php';         // 5. Modelo Tags (opcional aquí si no se usa)

$tag = new Tag();
$tags = $tag->getAllTags();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'head.php' ?>

    <title>Tags - J-GOD</title>
</head>

<body>

    <!-- start cssload-loader -->
    <?php include_once 'preloader.php' ?>
    <!-- end cssload-loader -->

    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- START QUESTION AREA -->
    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="filters pb-3">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                    <div class="pe-3">
                        <h3 class="fs-22 fw-medium">Etiquetas</h3>
                        <p class="fs-15 lh-22 my-2">Una etiqueta es una palabra clave o etiqueta que categoriza tu pregunta junto con otras similares.
                            <br> Usar las etiquetas correctas facilita que otros encuentren y respondan tu pregunta.
                        </p>
                    </div>
                    <a href="askquestion" class="btn theme-btn theme-btn-sm">Hacer una pregunta</a>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <form method="post" class="me-3 w-25">
                        <div class="form-group">
                            <input class="form-control form--control form-control-sm h-auto lh-34 pe-4" type="text" id="search-tag" name="search-tag" placeholder="Filtrar por nombre de etiqueta">
                            <i class="fa fa-search position-absolute end-0 top-50 translate-middle-y me-2 text-muted"></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php foreach ($tags as $index => $tag): ?>
                    <div class="col-lg-3 responsive-column-half tag-card <?php echo $index >= 24 ? 'd-none' : ''; ?>">
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="tags pb-1">
                                    <a href="#" class="tag-link tag-link-md tag-link-blue"><?php echo htmlspecialchars($tag['name']); ?></a>
                                </div>
                                <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                    <?php echo htmlspecialchars($tag['description'] ?? "Sin descripción."); ?>
                                </p>
                                <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                    <p class="pe-1 lh-18"><?php echo $tag['question_count'] ?? 0; ?> preguntas</p>
                                    <p class="lh-18"><?php echo $tag['today_count'] ?> hoy, <?php echo $tag['week_count'] ?> esta semana</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <button id="btn-show-more" class="btn btn-outline-primary">Mostrar más</button>
            </div>
        </div><!-- end container -->
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

    <script type="text/javascript" src="<?php echo BASE_URL; ?>views/js/tags.js"></script>
</body>

</html>