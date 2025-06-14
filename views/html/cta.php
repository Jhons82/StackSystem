<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
?>
<section class="get-started-area pt-80px pb-50px pattern-bg bg-gray">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Las comunidades de preguntas y respuestas son distintas. <br> Te explicamos cómo.</h2>
        </div>
        <div class="row pt-50px">
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item hover-y text-center">
                    <div class="card-body">
                        <img src="<?php echo BASE_URL; ?>assets/images/bubble.png" alt="bubble">
                        <h5 class="card-title pt-4 pb-2">Comunidades de expertos.</h5>
                        <p class="card-text">Espacios donde profesionales comparten conocimiento, resuelven dudas y colaboran para crecer juntos. Únete y aporta tu experiencia mientras aprendes de otros especialistas.</p>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item hover-y text-center">
                    <div class="card-body">
                        <img src="<?php echo BASE_URL; ?>assets/images/vote.png" alt="vote">
                        <h5 class="card-title pt-4 pb-2">La respuesta correcta. Justo al principio.</h5>
                        <p class="card-text">Aquí encontrarás las soluciones más precisas y confiables, siempre destacadas para que accedas a ellas rápido y sin perder tiempo.</p>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item hover-y text-center">
                    <div class="card-body">
                        <img src="<?php echo BASE_URL; ?>assets/images/check.png" alt="check">
                        <h5 class="card-title pt-4 pb-2">Comparte conocimiento. Gana confianza.</h5>
                        <p class="card-text">Al aportar tus ideas y experiencias, construyes reputación y fortaleces la comunidad. Cuanto más compartes, más creces junto a otros.</p>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>