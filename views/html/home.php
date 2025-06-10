<?php
require_once(__DIR__ . '/../../includes/config.php');
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once(__DIR__ . '/head.php'); ?>

    <title>J-GOD - Questions & Answers</title>
</head>

<body>
    <?php require_once(__DIR__ . '/preloader.php') ?>

    <!-- HEADER -->
    <?php require_once(__DIR__ . '/header.php') ?>
    <!-- END HEADER -->

    <!-- START HERO -->
    <?php require_once(__DIR__ . '/heroarea.php') ?>
    <!-- END HERO -->

    <!-- START QUESTION -->
    <section class="question-area pt-80px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="sidebar pb-45px position-sticky top-0 mt-2">
                        <ul class="generic-list-item generic-list-item-highlight fs-15">
                            <li class="lh-26 active"><a href="home-2.html"><i class="la la-home me-1 text-black"></i> Home</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-flask me-1 text-black"></i> Science</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-pencil me-1 text-black"></i> Math</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-globe me-1 text-black"></i> History</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-book-open me-1 text-black"></i> Literature</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-laptop me-1 text-black"></i> Technology</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-dumbbell me-1 text-black"></i> Health</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-gavel me-1 text-black"></i> Law</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-briefcase me-1 text-black"></i> Business</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-file-text me-1 text-black"></i> All Topics</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-puzzle-piece me-1 text-black"></i> Random</a></li>
                            <li class="lh-26"><a href="category.html"><i class="la la-check me-1 text-black"></i> Unanswered</a></li>
                        </ul>
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-2 -->
                <div class="col-lg-7">
                    <div class="question-tabs mb-50px">
                        <ul class="nav nav-tabs generic-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div class="anim-bar"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="questions-tab" data-bs-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="true">Preguntas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tags-tab" data-bs-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="false">Etiquetas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="badges-tab" data-bs-toggle="tab" href="#badges" role="tab" aria-controls="badges" aria-selected="false">Insignias</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-40px" id="myTabContent">
                            <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                                <div class="filters d-flex align-items-center justify-content-between pb-4">
                                    <h3 class="fs-17 fw-medium">Todas las preguntas</h3>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option value="newest" selected="selected">Más recientes </option>
                                            <option value="featured">Favoritos</option>
                                            <option value="frequent">Frecuentes </option>
                                            <option value="votes">Votos </option>
                                            <option value="active">Activo </option>
                                            <option value="unanswered">Sin respuesta </option>
                                        </select>
                                    </div><!-- end filter-option-box -->
                                </div><!-- end filters -->
                                <div class="question-main-bar">
                                    <div class="questions-snippet">
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">0</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">0</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">css resizeable div position different sizes</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">1 hour ago</span>
                                                    <a href="user-profile.html" class="author">edublog</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes answered-accepted">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">How can i change the order of nodes in a list</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">1 min ago</span>
                                                    <a href="user-profile.html" class="author">Epsi95</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">About Create a User Defined Funtion that return a value</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">3 mins ago</span>
                                                    <a href="user-profile.html" class="author">mstdmstd</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">How to switch to postman mode to debug requests</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">41 secs ago</span>
                                                    <a href="user-profile.html" class="author">Pratik Singh</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">What is the name of this figure?</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">55 mins ago</span>
                                                    <a href="user-profile.html" class="author">javabeginner</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">Using web3 to call precompile contract</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">1 day ago</span>
                                                    <a href="user-profile.html" class="author">Meow Meow</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes answered-accepted">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">ViewErrorBag Empty - Validation is not passing errors</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">2 days ago</span>
                                                    <a href="user-profile.html" class="author">DumBot</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">python: how to change python-config into my current python version</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">4 days ago</span>
                                                    <a href="user-profile.html" class="author">hgwd</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">How to calculate running average on tuples being streamed in SQL</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">Dec 2 '19 at 17:23 </span>
                                                    <a href="user-profile.html" class="author">Braiam</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes answered-accepted">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">-3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">Identity Server 4 with .net Core 3.1 -- Identity Server returning token as null</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">Jan 2 '20 at 7:23</span>
                                                    <a href="user-profile.html" class="author">Ajay Patidar</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">Using web3 to call precompile contract</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">1 day ago</span>
                                                    <a href="#" class="author">Meow Meow</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes answered-accepted">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">ViewErrorBag Empty - Validation is not passing errors</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">2 days ago</span>
                                                    <a href="#" class="author">DumBot</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">python: how to change python-config into my current python version</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">4 days ago</span>
                                                    <a href="#" class="author">hgwd</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">How to calculate running average on tuples being streamed in SQL</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">Dec 2 '19 at 17:23 </span>
                                                    <a href="#" class="author">Braiam</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                        <div class="media media-card media--card align-items-center">
                                            <div class="votes answered-accepted">
                                                <div class="vote-block d-flex align-items-center justify-content-between" title="Votes">
                                                    <span class="vote-counts">-3</span>
                                                    <span class="vote-icon"></span>
                                                </div>
                                                <div class="answer-block d-flex align-items-center justify-content-between" title="Answers">
                                                    <span class="vote-counts">1</span>
                                                    <span class="answer-icon"></span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5><a href="question-details.html">Identity Server 4 with .net Core 3.1 -- Identity Server returning token as null</a></h5>
                                                <small class="meta">
                                                    <span class="pe-1">Jan 2 '20 at 7:23</span>
                                                    <a href="#" class="author">Ajay Patidar</a>
                                                </small>
                                                <div class="tags">
                                                    <a href="#" class="tag-link">css</a>
                                                    <a href="#" class="tag-link">bootstrap-4</a>
                                                    <a href="#" class="tag-link">grid</a>
                                                    <a href="#" class="tag-link">resize</a>
                                                </div>
                                            </div>
                                        </div><!-- end media -->
                                    </div><!-- end questions-snippet -->
                                    <div class="pager d-flex flex-wrap align-items-center justify-content-between pt-30px">
                                        <div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination generic-pagination pe-1">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
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
                                            <p class="fs-13 pt-3">Showing 1-15 results of 50,577 questions</p>
                                        </div>
                                        <div class="filter-option-box w-20">
                                            <select class="select-container">
                                                <option value="10">10 per page</option>
                                                <option selected="" value="15">15 per page</option>
                                                <option value="20">20 per page</option>
                                                <option value="30">30 per page</option>
                                                <option value="40">40 per page</option>
                                                <option value="50">50 per page</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end question-main-bar -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                                <div class="filters pb-4">
                                    <h3 class="fs-17 fw-medium pb-2">Tags</h3>
                                    <p class="fs-15 lh-24 pb-4">A tag is a keyword or label that categorizes your question with other, similar questions.
                                        Using the right tags makes it easier for others to find and answer your question.
                                    </p>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <form method="post" class="flex-grow-1 me-3">
                                            <div class="form-group mb-0">
                                                <input class="form-control form--control form-control-sm h-auto lh-34" type="text" name="search" placeholder="Filter by tag name...">
                                                <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                            </div>
                                        </form>
                                        <div class="filter-option-box w-20">
                                            <select class="select-container mt-2">
                                                <option value="popular" selected="selected">Popular</option>
                                                <option value="name">Name</option>
                                                <option value="new">New</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end filters -->
                                <div class="tags-main-bar">
                                    <div class="tags-snippet">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">javascript</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            For questions regarding programming in ECMAScript (JavaScript/JS) and its various dialects/implementations (excluding ActionScript). Please include all relevant tags on your question; e.g., [node.js],…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">java</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a high-level programming language. Use this tag when you're having problems using or understanding the language itself. This tag is rarely used alone and is most often used in conjunction with…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">python</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a multi-paradigm, dynamically typed, multipurpose programming language. It is designed to be quick to learn, understand, and use, and enforce a clean and uniform syntax. Please note that Pyt…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">c#</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a high level, statically typed, multi-paradigm programming language developed by Microsoft. C# code usually targets Microsoft's .NET family of tools and run-times, which…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">php</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a widely used, high-level, dynamic, object-oriented, and interpreted scripting language primarily designed for server-side web development. Used for questions about the PHP language.
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">android</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            Google's mobile operating system, used for programming or developing digital devices (Smartphones, Tablets, Automobiles, TVs, Wear, Glass, IoT). For topics related to Android, use Android-s…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">html</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            the markup language for creating web pages and other information to be displayed in a web browser. Questions regarding HTML should include a minimal reproducible ex…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">jquery</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a JavaScript library, consider also adding the JavaScript tag. jQuery is a popular cross-browser JavaScript library that facilitates Document Object Model (DOM) traversal, event handling…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">c++</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a general-purpose programming language. It was originally designed as an extension to C and has a similar syntax, but it is now a completely different language. Use this tag for questions about…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="card card-item">
                                                    <div class="card-body">
                                                        <div class="tags pb-1">
                                                            <a href="#" class="tag-link tag-link-md tag-link-blue">css</a>
                                                        </div>
                                                        <p class="card-text fs-14 truncate-4 lh-24 text-black-50">
                                                            a representation style sheet language used for describing the look and formatting of HTML (HyperText Markup Language), XML (Extensible Markup Language) documents and SV…
                                                        </p>
                                                        <div class="d-flex tags-info fs-14 pt-3 border-top border-top-gray mt-3">
                                                            <p class="pe-1 lh-18">2177849 questions</p>
                                                            <p class="lh-18">901 asked today, 5319 this week</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-6 -->
                                        </div><!-- end row -->
                                    </div><!-- end tags-snippet -->
                                    <div class="pager d-flex align-items-center justify-content-between pt-10px pb-30px">
                                        <div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination generic-pagination pe-1">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
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
                                            <p class="fs-13 pt-3">Showing 1-10 results of 50,577 tags</p>
                                        </div>
                                        <div class="filter-option-box w-20">
                                            <select class="select-container">
                                                <option selected="" value="10">10 per page</option>
                                                <option value="20">20 per page</option>
                                                <option value="30">30 per page</option>
                                                <option value="40">40 per page</option>
                                                <option value="50">50 per page</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end tags-main-bar -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                                <div class="filters pb-4">
                                    <h3 class="fs-17 fw-medium pb-4">Users</h3>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <form method="post" class="flex-grow-1 me-3">
                                            <div class="form-group mb-0">
                                                <input class="form-control form--control form-control-sm h-auto lh-34" type="text" name="search" placeholder="Filter by user...">
                                                <button class="form-btn" type="button"><i class="la la-search"></i></button>
                                            </div>
                                        </form>
                                        <div class="filter-option-box w-20 mt-2">
                                            <select class="select-container">
                                                <option value="reputation" selected="selected">Reputation</option>
                                                <option value="new-users">New users</option>
                                                <option value="voters">Voters</option>
                                                <option value="editors">Editors</option>
                                                <option value="moderators">Moderators</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end filters -->
                                <div class="users-main-bar">
                                    <div class="users-snippet">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Sector labs</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Barmar</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">CertainPerformance</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">mck</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo3.jpg" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">LoicTheAztec</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo4.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Günter Zöchbauer</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Suragch</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Martijn Pieters</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo3.jpg" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Frank van Puffelen</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo4.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Igor Goyda</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Sector labs</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Barmar</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">CertainPerformance</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">mck</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo3.jpg" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">LoicTheAztec</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo4.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Günter Zöchbauer</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Suragch</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo2.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Martijn Pieters</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo3.jpg" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Frank van Puffelen</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="media media-card p-3">
                                                    <a href="#" class="media-img d-inline-block">
                                                        <img src="<?php echo BASE_URL; ?>assets/images/company-logo4.png" alt="company logo">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="fs-16 fw-medium"><a href="user-profile.html">Igor Goyda</a></h5>
                                                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                                                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                                                    </div><!-- end media-body -->
                                                </div><!-- end media -->
                                            </div><!-- end col-lg-6 -->
                                        </div><!-- end row -->
                                    </div><!-- end users-snippet -->
                                    <div class="pager d-flex align-items-center justify-content-between pt-10px pb-30px">
                                        <div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination generic-pagination pe-1">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
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
                                            <p class="fs-13 pt-3">Showing 1-20 results of 50,577 users</p>
                                        </div>
                                        <div class="filter-option-box w-20">
                                            <select class="select-container">
                                                <option value="10">10 per page</option>
                                                <option selected="" value="20">20 per page</option>
                                                <option value="30">30 per page</option>
                                                <option value="40">40 per page</option>
                                                <option value="50">50 per page</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end users-main-bar -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
                                <div class="filters pb-4">
                                    <h3 class="fs-17 fw-medium pb-2">Badges</h3>
                                    <p class="fs-15 lh-24 pb-4">Besides gaining reputation with your questions and answers, you receive badges for being especially helpful. Badges appears on your profile page, questions & answers.</p>
                                    <div class="filter-option-box w-20">
                                        <select class="select-container">
                                            <option value="all" selected="selected">All</option>
                                            <option value="bronze">Bronze</option>
                                            <option value="silver">Silver</option>
                                            <option value="gold">Gold</option>
                                        </select>
                                    </div>
                                </div><!-- end filters -->
                                <div class="badges-main-bar">
                                    <div class="badges-snippet">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Altruist</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First bounty you manually award on another person's question</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Analytical</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>43587</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Visited every section of the FAQ</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Announcer</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>227641</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Share a link to a post later visited by 25 unique IP addresses</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Archaeologist</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>2514</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Edit 100 posts that were inactive for 6 months</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Autobiographer</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>1367031</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Complete "About Me" section of user profile</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Benefactor</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>48793</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First bounty you manually award on your own question</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Beta</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Voted 10 times, added 3 posts score > 0, and visited the site on 3 separate days during the private beta</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Booster</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Share a link to a post later visited by 300 unique IP addresses</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Census</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Completed the annual Disilab survey; your responses are anonymous</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Citizen Patrol</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First flagged post</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Civic Duty</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Vote 300 or more times</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Cleanup</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First rollback</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Commentator</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Leave 10 comments</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Constable</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>0</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Served as a pro-tem moderator for at least 1 year or through site graduation</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Copy Editor</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Edit 500 posts (excluding own or deleted posts and tag edits)</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Critic</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First down vote</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Curious</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Ask a well-received question on 5 separate days, and maintain a positive question record</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Deputy</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Raise 80 helpful flags</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Disciplined</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Delete own post with score of 3 or higher</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Documentation Beta</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Contributed 3+ substantive pieces of documentation during the private beta</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Documentation Pioneer</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Contributed 3+ substantive pieces of documentation in the first month of documentation</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Editor</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">First edit</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Favorite Question</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Question bookmarked by 25 users</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4">
                                                <div class="card card-item">
                                                    <div class="card-body p-3">
                                                        <div class="badge-item">
                                                            <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Generalist</a>
                                                            <span class="item-multiplier fs-13 fw-medium">
                                                                <span>×</span>
                                                                <span>32924</span>
                                                            </span>
                                                            <p class="fs-13 lh-18 pt-2 text-black-50">Provide non-wiki answers of 15 total score in 20 of top 40 tags</p>
                                                        </div>
                                                    </div><!-- end card-body -->
                                                </div><!-- end card -->
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-12 pb-40px">
                                                <div class="collapse" id="collapseMoreBadges">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Good Answer</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Answer score of 25 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Good Question</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Question score of 25 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Guru</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Accepted answer and score of 40 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Scholar</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Ask a question and accept an answer</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Self-Learner</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Answer your own question with score of 3 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Sportsmanship</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Up vote 100 answers on questions where an answer of yours has a positive score</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-3"></span> Stellar Question</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Question bookmarked by 100 users</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Student</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First question with score of 1 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Supporter</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First up vote</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Tag Editor</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">First tag wiki edit</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Taxonomist</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Create a tag used by 50 questions</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Teacher</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Answer a question with score of 1 or more</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Tenacious</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Zero score accepted answers: more than 5 and 20% of total</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Tumbleweed</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Asked a question with zero score, no answers, no comments, and low views for a week</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball"></span> Vox Populi</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Use the maximum 40 votes in a day</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="card card-item">
                                                                <div class="card-body p-3">
                                                                    <div class="badge-item">
                                                                        <a href="#" class="badge badge-md badge-dark d-inline-flex align-items-center"><span class="ball bg-gray"></span> Yearling</a>
                                                                        <span class="item-multiplier fs-13 fw-medium">
                                                                            <span>×</span>
                                                                            <span>32924</span>
                                                                        </span>
                                                                        <p class="fs-13 lh-18 pt-2 text-black-50">Active member for a year, earning at least 200 reputation</p>
                                                                    </div>
                                                                </div><!-- end card-body -->
                                                            </div><!-- end card -->
                                                        </div><!-- end col-lg-4 -->
                                                    </div>
                                                </div>
                                                <a class="collapse-btn btn theme-btn theme-btn-sm text-white w-100" data-bs-toggle="collapse" href="#collapseMoreBadges" role="button" aria-expanded="false" aria-controls="collapseMoreBadges">
                                                    <span class="collapse-btn-hide">Show more<i class="la la-angle-down ms-1 fs-11"></i></span>
                                                    <span class="collapse-btn-show">Show less<i class="la la-angle-up ms-1 fs-11"></i></span>
                                                </a>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </div><!-- end badges-snippet -->
                                </div><!-- end badges-main-bar -->
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end question-tabs -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Number Achievement</h3>
                                <div class="divider"><span></span></div>
                                <div class="row no-gutters text-center">
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color">980k</span>
                                            <p class="fs-14">Questions</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-2">610k</span>
                                            <p class="fs-14">Answers</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-3">650k</span>
                                            <p class="fs-14">Answer accepted</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column-half">
                                        <div class="icon-box pt-3">
                                            <span class="fs-20 fw-bold text-color-4">320k</span>
                                            <p class="fs-14">Users</p>
                                        </div><!-- end icon-box -->
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12 pt-3">
                                        <p class="fs-14">To get answer of question <a href="signup.html" class="text-color hover-underline">Join<i class="la la-arrow-right ms-1"></i></a></p>
                                    </div>
                                </div><!-- end row -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Related Questions</h3>
                                <div class="divider"><span></span></div>
                                <div class="sidebar-questions pt-3">
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">Using web3 to call precompile contract</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">2 mins ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">Sudhir Kumbhare</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">Is it true while finding Time Complexity of the algorithm [closed]</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">48 mins ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">wimax</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">image picker and store them into firebase with flutter</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">1 hour ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">Antonin gavrel</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                </div><!-- end sidebar-questions -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Trending Questions</h3>
                                <div class="divider"><span></span></div>
                                <div class="sidebar-questions pt-3">
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">How did chickenpox get its name?</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">2 mins ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">Sudhir Kumbhare</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">How can you cut an onion without crying?</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">48 mins ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">wimax</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card media--card media--card-2">
                                        <div class="media-body">
                                            <h5><a href="question-details.html">Does flu vaccine protect against Coronavirus?</a></h5>
                                            <small class="meta">
                                                <span class="pe-1">1 hour ago</span>
                                                <span class="pe-1">. by</span>
                                                <a href="#" class="author">Antonin gavrel</a>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                </div><!-- end sidebar-questions -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-17 pb-3">Trending Tags</h3>
                                <div class="divider"><span></span></div>
                                <div class="tags pt-4">
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">analytics</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">computer</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">python</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">javascript</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="tag-item">
                                        <a href="#" class="tag-link tag-link-md">c#</a>
                                        <span class="item-multiplier fs-13">
                                            <span>×</span>
                                            <span>32924</span>
                                        </span>
                                    </div><!-- end tag-item -->
                                    <div class="collapse" id="showMoreTags">
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">java</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">swift</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">html</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">angular</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">flutter</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                        <div class="tag-item">
                                            <a href="#" class="tag-link tag-link-md">machine-language</a>
                                            <span class="item-multiplier fs-13">
                                                <span>×</span>
                                                <span>32924</span>
                                            </span>
                                        </div><!-- end tag-item -->
                                    </div><!-- end collapse -->
                                    <a class="collapse-btn fs-13" data-bs-toggle="collapse" href="#showMoreTags" role="button" aria-expanded="false" aria-controls="showMoreTags">
                                        <span class="collapse-btn-hide">Show more<i class="la la-angle-down ms-1 fs-11"></i></span>
                                        <span class="collapse-btn-show">Show less<i class="la la-angle-up ms-1 fs-11"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="ad-card">
                            <h4 class="text-gray text-uppercase fs-13 pb-3 text-center">Advertisements</h4>
                            <div class="ad-banner mb-4 mx-auto">
                                <span class="ad-text">290x500</span>
                            </div>
                        </div><!-- end ad-card -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end question-area -->
    <!-- END QUESTION -->

    <!-- CTA -->
    <?php require_once(__DIR__ . '/cta.php') ?>
    <!-- END CTA -->

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