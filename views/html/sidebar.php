<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
?>
<div class="sidebar">
    <div class="card card-item">
        <div class="card-body">
            <h3 class="fs-17 pb-3">Logros Numéricos</h3>
            <div class="divider"><span></span></div>
            <div class="row no-gutters text-center">
                <div class="col-lg-6 responsive-column-half">
                    <div class="icon-box pt-3">
                        <span class="fs-20 fw-bold text-color">980k</span>
                        <p class="fs-14">Preguntas</p>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="icon-box pt-3">
                        <span class="fs-20 fw-bold text-color-2">610k</span>
                        <p class="fs-14">Respuestas</p>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="icon-box pt-3">
                        <span class="fs-20 fw-bold text-color-3">650k</span>
                        <p class="fs-14">Respuestas aceptadas</p>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="icon-box pt-3">
                        <span class="fs-20 fw-bold text-color-4">320k</span>
                        <p class="fs-14">Usuarios</p>
                    </div>
                </div>
                <div class="col-lg-12 pt-3">
                    <p class="fs-14">Para obtener respuestas a tus preguntas <a href="signup.html" class="text-color hover-underline">Únete<i class="la la-arrow-right ms-1"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-item">
        <div class="card-body">
            <h3 class="fs-17 pb-3">Preguntas Relacionadas</h3>
            <div class="divider"><span></span></div>
            <div class="sidebar-questions pt-3">
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">Usando web3 para llamar a un contrato precompilado</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 2 minutos</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">Sudhir Kumbhare</a>
                        </small>
                    </div>
                </div>
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">¿Es cierto al calcular la complejidad temporal del algoritmo? [cerrado]</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 48 minutos</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">wimax</a>
                        </small>
                    </div>
                </div>
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">Seleccionar imágenes y guardarlas en Firebase con Flutter</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 1 hora</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">Antonin Gavrel</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-item">
        <div class="card-body">
            <h3 class="fs-17 pb-3">Preguntas en Tendencia</h3>
            <div class="divider"><span></span></div>
            <div class="sidebar-questions pt-3">
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">¿Cómo obtuvo su nombre la varicela?</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 2 minutos</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">Sudhir Kumbhare</a>
                        </small>
                    </div>
                </div>
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">¿Cómo puedes cortar una cebolla sin llorar?</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 48 minutos</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">wimax</a>
                        </small>
                    </div>
                </div>
                <div class="media media-card media--card media--card-2">
                    <div class="media-body">
                        <h5><a href="question-details.html">¿La vacuna contra la gripe protege contra el coronavirus?</a></h5>
                        <small class="meta">
                            <span class="pe-1">hace 1 hora</span>
                            <span class="pe-1">. por</span>
                            <a href="#" class="author">Antonin Gavrel</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-item">
        <div class="card-body">
            <h3 class="fs-17 pb-3">Etiquetas en Tendencia</h3>
            <div class="divider"><span></span></div>
            <div class="tags pt-4" id="top-tags-container">
                
            </div>
        </div>
    </div>
</div>