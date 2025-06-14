<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'head.php'; ?>

    <title>Questions & Answers - J-GOD</title>
</head>

<body>
    <?php include('preloader.php') ?>

    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- START HERO -->
    <?php include('heroarea.php') ?>
    <!-- END HERO -->

    <!-- START QUESTION -->
    <section class="question-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 pr-0">
                    <div class="sidebar position-sticky top-0 pt-40px">
                        <ul class="generic-list-item generic-list-item-highlight fs-15">
                            <li class="lh-26"><a href="index.html"><i class="la la-home me-1 text-black"></i> Inicio</a></li>
                            <li class="lh-26 active"><a href="home-3.html"><i class="la la-globe me-1 text-black"></i> Preguntas</a></li>
                            <li class="lh-26"><a href="tags-list.html"><i class="la la-tags me-1 text-black"></i> Etiquetas</a></li>
                            <li class="lh-26"><a href="user-list.html"><i class="la la-user me-1 text-black"></i> Usuarios</a></li>
                            <li class="lh-26"><a href="badges-list.html"><i class="la la-id-badge me-1 text-black"></i> Insignias</a></li>
                            <li class="lh-26"><a href="category-list.html"><i class="la la-sort me-1 text-black"></i> Categorías</a></li>
                            <li class="lh-26"><a href="job-list.html"><i class="la la-mouse me-1 text-black"></i> Empleos</a></li>
                            <li class="lh-26"><a href="companies.html"><i class="la la-briefcase me-1 text-black"></i> Empresas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 px-0">
                    <div class="question-main-bar border-left border-left-gray pt-40px pb-40px">
                        <div class="filters pb-4 ps-3">
                            <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                                <h3 class="fs-22 fw-medium">Todas las preguntas</h3>
                                <a href="askquestion.php" class="btn theme-btn theme-btn-sm">Hacer una pregunta</a>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="pt-1 fs-15 fw-medium lh-20">21.287 preguntas</p>
                                <div class="filter-option-box w-20">
                                    <select class="form-select">
                                        <option value="newest" selected="selected">El más nuevo </option>
                                        <option value="featured">Favorito (390)</option>
                                        <option value="frequent">Frecuente </option>
                                        <option value="votes">Votos </option>
                                        <option value="active">Activo </option>
                                        <option value="unanswered">Sin respuesta </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="questions-snippet border-top border-top-gray">
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block answered my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">3</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block answered-accepted my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">3</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">0</span>
                                        <span class="answer-text d-block fs-14 lh-18">answer</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block answered my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">3</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><span class="badge bg-success me-2 text-white fs-13">+100</span><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">0</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">0</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">0</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">0</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">0</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">0</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">0</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block answered my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">3</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                                <div class="votes text-center votes-2">
                                    <div class="vote-block">
                                        <span class="vote-counts d-block text-center pr-0 lh-20 fw-medium">3</span>
                                        <span class="vote-text d-block fs-13 lh-18">votes</span>
                                    </div>
                                    <div class="answer-block answered my-2">
                                        <span class="answer-counts d-block lh-20 fw-medium">3</span>
                                        <span class="answer-text d-block fs-13 lh-18">answers</span>
                                    </div>
                                    <div class="view-block">
                                        <span class="view-counts d-block lh-20 fw-medium">12</span>
                                        <span class="view-text d-block fs-13 lh-18">views</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-2 fw-medium"><a href="question-details.html">Bootstrap select pass value with disabled</a></h5>
                                    <p class="mb-2 truncate lh-20 fs-15">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">bootstrap-4</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">select</a>
                                    </div>
                                    <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2" title="Reputation score">224</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Gold badge"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Silver badge"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center" title="Bronze badge"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end media -->
                        </div><!-- end questions-snippet -->
                        <div class="pager pt-30px px-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination generic-pagination pe-1">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <p class="fs-13 pt-2">Showing 1-10 results of 50,577 questions</p>
                        </div>
                    </div><!-- end question-main-bar -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-3">
                    <?php require_once(__DIR__ . "/sidebar.php") ?>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end question-area -->
    <!-- END QUESTION -->

    <!-- CTA -->
    <?php include('cta.php') ?>
    <!-- END CTA -->

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