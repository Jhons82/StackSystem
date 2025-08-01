<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
require_once __DIR__ . '/../../models/Question.php';     // 5. Modelo de Question (opcional aquí si no se usa)
/* echo "BASE_URL: " . BASE_URL; */

/* Sanitizar y validar */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$slug = isset($_GET['slug']) ? htmlspecialchars(trim($_GET['slug'])) : '';

if ($id <= 0) {
    // ID inválido => redirigir a 404
    header("Location: " . BASE_URL . "404");
    exit('Pregunta no encontrada');
}

/* Obtener la pregunta */
$question = new Question();
$datosQ = $question->getQuestionDetails($id);
$answers = $question->getAnswersByQuestionId($id);

if (!$datosQ) {
    header("Location: " . BASE_URL . "404");
    exit('Pregunta no encontrada');
}

/* Obtener contenido de 'content' - Question */
$content = $datosQ['content'];

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML('<div>' . $content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
libxml_clear_errors();

$wrapper = '';
foreach ($dom->documentElement->childNodes as $node) {
    if ($node->nodeType === XML_ELEMENT_NODE) {
        if ($node->nodeName === 'p') {
            $wrapper .= '<p>' . htmlspecialchars($node->textContent) . '</p>';
        } elseif ($node->nodeName === 'blockquote') {
            $wrapper .= '<blockquote>' . htmlspecialchars(($node->textContent)) . '</blockquote>';
        }elseif ($node->nodeName === 'pre' || $node->nodeName === 'div') {
            if ($node->nodeName === 'pre') {
                $preNode = $node;
            } elseif ($node instanceof DOMElement) {
                $preNode = $node->getElementsByTagName('pre')->item(0);
            } else {
                $preNode = null;
            }

            if ($preNode instanceof DOMElement) {
                $codeNode = $preNode->getElementsByTagName('code')->item(0);
                if ($codeNode instanceof DOMElement) {
                    $codeContent = htmlspecialchars($codeNode->textContent, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

                    $wrapper .= '
                    <pre class="code-block custom-scrollbar-styled">
                        <code>' . $codeContent . '</code>
                    </pre>';
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>

    <style>
        .hljs {
            background: #f0f0f0 !important;
            /* fondo del tema "default" */
            padding: 1em;
            border-radius: 5px;
            margin: 0 !important;
        }

        p {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        pre {
            overflow: unset; /* Evitar scroll en pre - Movil */
            margin: 0 !important;
            /* elimina márgenes top y bottom */
            padding: 0 !important;
            /* elimina padding extra */
            line-height: 1.4;
            /* controla altura de línea */
            background: transparent;
            /* deja el fondo a .hljs */
            border: none;
        }

        pre+* {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        pre+p {
            margin-top: -0.9em !important;
            /* pequeño ajuste, puede variarse */
        }

        pre code {
            display: block;
            max-height: 600px;
            /* altura máxima visible */
            overflow: auto;
            /* activa scroll si se excede */
            white-space: pre;
            /* conserva formato original */
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f8f8;
        }
        blockquote {
            border-left: 4px solid #ccc;
            padding: 0.8em;
            margin: 0.6em 0;
            color: #555;
            font-style: italic;
            background-color: #f9f9f9;
            border-radius: 3px;
        }
    </style>

    <title>Question Details - J-GOD</title>
</head>

<body>
    <?php include('preloader.php') ?>

    <!-- HEADER -->
    <?php include('header.php') ?>
    <!-- END HEADER -->

    <!-- START USER DETAILS AREA -->
    <section class="question-area pt-40px pb-40px">

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="question-main-bar mb-50px">
                        <div class="question-highlight">
                            <div class="media media-card shadow-none rounded-0 mb-0 bg-transparent p-0">
                                <div class="media-body">
                                    <h5 class="fs-20"><a href="question-details.html"><?= htmlspecialchars($datosQ['title']) ?></a></h5>
                                    <div class="meta d-flex flex-wrap align-items-center fs-13 lh-20 py-1">
                                        <div class="pe-3">
                                            <!-- <span>Preguntado hace</span> -->
                                            <span class="text-black"><?= $datosQ['question_relative_date'] ?></span>
                                        </div>
                                        <div class="pe-3">
                                            <span class="pe-1">Active</span>
                                            <a href="#" class="text-black">19 days ago</a>
                                        </div>
                                        <div class="pe-3">
                                            <span class="pe-1">visto</span>
                                            <span class="text-black" id="total_views">0</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($datosQ) && !empty($datosQ['tags'])): ?>
                                        <div class="tags">
                                            <?php
                                            if (!empty($datosQ['tags'])) {
                                                $tags = explode(', ', $datosQ['tags']);
                                                foreach ($tags as $tag) {
                                                    echo '<a href="tags" class="tag-link">' . htmlspecialchars($tag) . '</a>';
                                                }
                                            } else {
                                                echo '<span class="no-tags">Sin etiquetas</span>';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div><!-- end question-highlight -->
                        <div class="question d-flex">
                            <div class="votes votes-styled w-auto">
                                <div class="vote-container" data-id="<?= $datosQ["question_id"] ?>" data-type="question">
                                    <button class="btn-vote up" title="Voto positivo" data-target-id="<?= $datosQ["question_id"]?>" data-target-type="question">▲</button>
                                    <div class="vote-count" data-target-id="<?= $datosQ["question_id"]?>" data-target-type="question">0</div>
                                    <button class="btn-vote down" title="Voto Negativo" data-target-id="<?= $datosQ["question_id"]?>" data-target-type="question">▼</button>
                                </div>
                            </div>
                            <div class="question-post-body-wrap flex-grow-1">
                                <div class="question-post-body">
                                    <?= $wrapper ?>
                                </div>
                                <div class="question-post-user-action">
                                    <div class="post-menu">
                                        <div class="btn-group">
                                            <button class="btn dropdown-toggle after-none" type="button" id="shareDropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                            <div class="dropdown-menu dropdown--menu dropdown--menu-2 mt-2" aria-labelledby="shareDropdownMenu">
                                                <div class="py-3 px-4">
                                                    <h4 class="fs-15 pb-2">Share a link to this question</h4>
                                                    <form action="#" class="copy-to-clipboard">
                                                        <span class="text-success-message">Link Copied!</span>
                                                        <input type="text" class="form-control form--control form-control-sm copy-input" value="https://Disilab.com/q/66552850/15319675">
                                                        <div class="btn-box pt-2 d-flex align-items-center justify-content-between">
                                                            <a href="#" class="btn-text copy-btn">Copy link</a>
                                                            <ul class="social-icons social-icons-sm">
                                                                <li><a href="#" class="bg-8 text-white shadow-none" title="Share link to this question on Facebook"><i class="la la-facebook"></i></a></li>
                                                                <li><a href="#" class="bg-9 text-white shadow-none" title="Share link to this question on Twitter"><i class="la la-twitter"></i></a></li>
                                                                <li><a href="#" class="bg-dark text-white shadow-none" title="Share link to this question on DEV"><i class="lab la-dev"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn">Edit</a>
                                        <button class="btn">Follow</button>
                                    </div>
                                    <div class="media media-card user-media owner align-items-center">
                                        <a href="<?= BASE_URL . 'profile/' . $datosQ['user_id'] . '/' . $datosQ['slugUser'] ?>" class="media-img d-block">
                                            <img src="<?= BASE_URL . $datosQ['image_author'] ?>" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="<?= BASE_URL . 'profile/' . $datosQ['user_id'] . '/' . $datosQ['slugUser'] ?>"><?= $datosQ['question_author'] ?></a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2">224,110</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="d-block lh-18 fs-12"><?= $datosQ['question_relative_date'] ?></span>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="media media-card user-media align-items-center">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="images/img4.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Kevin Martin</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2">6,514</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball gold"></span>3</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball silver"></span>35</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball"></span>48</span>
                                                </div>
                                            </div>
                                            <a href="revisions.html" class="meta d-block text-end fs-13 text-color">
                                                <span class="d-block lh-18">edited</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-wrap" data-target-id="<?= $datosQ["question_id"] ?>" data-target-type="question">
                                    <ul class="comments-list"><!-- Lista de comentarios --></ul>
                                    <div class="comment-form">
                                        <div class="comment-link-wrap text-center">
                                            <a class="collapse-btn comment-link" data-bs-toggle="collapse" href="#addCommentCollapse" role="button" aria-expanded="false" aria-controls="addCommentCollapse" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Añadir un comentario</a>
                                        </div>
                                        <div class="collapse border-top border-top-gray mt-2 pt-3" id="addCommentCollapse">
                                            <form method="post" class="row pb-3 formComment" data-type="question" data-id="<?= $datosQ["question_id"] ?>">
                                                <div class="col-lg-12">
                                                    <h4 class="fs-16 pb-2">Deja un Comentario</h4>
                                                    <div class="divider mb-2"><span></span></div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Mensaje</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control form--control form-control-sm fs-13" name="content" rows="5" placeholder="Tu comentario aquí..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-box d-flex flex-wrap align-items-center justify-content-between">
                                                        <div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewComments">
                                                                <label class="custom-control-label custom--control-label" for="getNewComments">Notificarme los nuevos comentarios por correo electrónico.</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewPosts">
                                                                <label class="custom-control-label custom--control-label" for="getNewPosts">Notificarme nuevas publicaciones por correo electrónico.</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray" type="submit">Publicar Comentario</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end question -->
                        <div class="subheader d-flex align-items-center justify-content-between">
                            <div class="subheader-title">
                                <h3 class="fs-16"><?= count($answers) ?> respuestas</h3>
                            </div><!-- end subheader-title -->
                            <div class="subheader-actions d-flex align-items-center lh-1">
                                <label class="fs-13 fw-regular me-1 mb-0">Order by</label>
                                <div class="w-100px">
                                    <select class="select-container">
                                        <option value="active">active</option>
                                        <option value="oldest">oldest</option>
                                        <option value="votes" selected="selected">votes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($answers as $datosA): ?>
                            <?php
                            $answersBody = $datosA['body'];
                            $domAnswers = new DOMDocument();
                            libxml_use_internal_errors(true);
                            $domAnswers->loadHTML('<div>' . $answersBody . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                            libxml_clear_errors();

                            $wrappers = '';
                            foreach ($domAnswers->documentElement->childNodes as $nodeA) {
                                if ($nodeA->nodeType === XML_ELEMENT_NODE) {
                                    if ($nodeA->nodeName === 'p') {
                                        $wrappers .= '<p>' . htmlspecialchars($nodeA->textContent) . '</p>';
                                    } elseif ($nodeA->nodeName === 'blockquote') {
                                        $wrappers .= '<blockquote>' . htmlspecialchars($nodeA->textContent) . '</blockquote>';
                                    }elseif ($nodeA->nodeName === 'pre' || $nodeA->nodeName === 'div') {
                                        if ($nodeA->nodeName === 'pre') {
                                            $preNodeA = $nodeA;
                                        } elseif ($nodeA instanceof DOMElement) {
                                            $preNodeA = $nodeA->getElementsByTagName('pre')->item(0);
                                        } else {
                                            $preNodeA = null;
                                        }

                                        if ($preNodeA instanceof DOMElement) {
                                            $codeNodeA = $preNodeA->getElementsByTagName('code')->item(0);
                                            if ($codeNodeA instanceof DOMElement) {
                                                $codeContentA = htmlspecialchars($codeNodeA->textContent, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

                                                $wrappers .= '
                                                <pre class="code-block custom-scrollbar-styled">
                                                    <code>' . $codeContentA . '</code>
                                                </pre>';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>

                            <div class="answer-wrap d-flex">
                                <div class="votes votes-styled w-auto">
                                    <div class="vote-container" data-id="<?= $datosA["answer_id"] ?>" data-type="answer">
                                        <button class="btn-vote up" title="Voto positivo" data-target-id="<?= $datosA["answer_id"] ?>"
                                        data-target-type="answer">▲</button>
                                        <div class="vote-count" data-target-id="<?= $datosA["answer_id"] ?>" data-target-type="answer">0</div>
                                        <button class="btn-vote down" title="Voto negativo" data-target-id="<?= $datosA["answer_id"] ?>" data-target-type="answer">▼</button>
                                    </div>
                                </div>
                                <div class="answer-body-wrap flex-grow-1">
                                    <div class="answer-body"><?= $wrappers ?></div>
                                    <div class="question-post-user-action">
                                        <div class="post-menu">
                                            <div class="btn-group">
                                                <button class="btn dropdown-toggle after-none" type="button" id="shareDropdownMenuTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                                <div class="dropdown-menu dropdown--menu dropdown--menu-2 mt-2" aria-labelledby="shareDropdownMenuTwo">
                                                    <div class="py-3 px-4">
                                                        <h4 class="fs-15 pb-2">Share a link to this question</h4>
                                                        <form action="#" class="copy-to-clipboard">
                                                            <span class="text-success-message">Link Copied!</span>
                                                            <input type="text" class="form-control form--control form-control-sm copy-input" value="https://Disilab.com/q/66552850/15319675">
                                                            <div class="btn-box pt-2 d-flex align-items-center justify-content-between">
                                                                <a href="#" class="btn-text copy-btn">Copy link</a>
                                                                <ul class="social-icons social-icons-sm">
                                                                    <li><a href="#" class="bg-8 text-white shadow-none" title="Share link to this question on Facebook"><i class="la la-facebook"></i></a></li>
                                                                    <li><a href="#" class="bg-9 text-white shadow-none" title="Share link to this question on Twitter"><i class="la la-twitter"></i></a></li>
                                                                    <li><a href="#" class="bg-dark text-white shadow-none" title="Share link to this question on DEV"><i class="lab la-dev"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn">Edit</a>
                                            <button class="btn">Follow</button>
                                        </div><!-- end post-menu -->
                                        <div class="media media-card user-media align-items-center">
                                            <a href="<?= BASE_URL . 'profile/' . $datosA['answer_user_id'] . '/' . $datosA['slugUser'] ?>" class="media-img d-block">
                                                <img src="<?= BASE_URL . $datosA['image_author'] ?>" alt="avatar">
                                            </a>
                                            <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                                <div>
                                                    <h5 class="pb-1"><a href="<?= BASE_URL . 'profile/' . $datosA['answer_user_id'] . '/' . $datosA['slugUser'] ?>"><?= htmlspecialchars($datosA['answer_author']) ?></a></h5>
                                                    <div class="stats fs-12 d-flex align-items-center lh-18">
                                                        <span class="text-black pe-2">15.5k</span>
                                                        <span class="pe-2 d-inline-flex align-items-center"><span class="ball gold"></span>3</span>
                                                        <span class="pe-2 d-inline-flex align-items-center"><span class="ball silver"></span>10</span>
                                                        <span class="pe-2 d-inline-flex align-items-center"><span class="ball"></span>26</span>
                                                    </div>
                                                </div>
                                                <small class="meta d-block text-end">
                                                    <span class="d-block lh-18 fs-12"><?= $datosA['answer_relative_date'] ?></span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="media media-card user-media align-items-center">
                                            <div class="media-body d-flex flex-wrap align-items-center justify-content-end">
                                                <a href="revisions.html" class="meta d-block text-end fs-13 text-color">
                                                    <span class="d-block lh-18">edited</span>
                                                    <span class="d-block lh-18 fs-12">8 hours ago</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comments-wrap" data-target-id="<?= $datosA["answer_id"] ?>" data-target-type="answer">
                                        <ul class="comments-list"></ul>
                                        <div class="comment-form">
                                            <div class="comment-link-wrap text-center">
                                                <a class="collapse-btn comment-link" data-bs-toggle="collapse" href="#addCommentCollapseTwo" role="button" aria-expanded="false" aria-controls="addCommentCollapseTwo" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Añadir un comentario</a>
                                            </div>
                                            <div class="collapse border-top border-top-gray mt-2 pt-3" id="addCommentCollapseTwo">
                                                <form method="post" class="row pb-3 formComment" data-type="answer" data-id="<?= $datosA["answer_id"] ?>">
                                                    <div class="col-lg-12">
                                                        <h4 class="fs-16 pb-2">Deja un Comentario</h4>
                                                        <div class="divider mb-2"><span></span></div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <label class="fs-13 text-black lh-20">Mensaje</label>
                                                            <div class="form-group">
                                                                <textarea class="form-control form--control form-control-sm fs-13" name="content" rows="5" placeholder="Tu comentario aquí..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box d-flex flex-wrap align-items-center justify-content-between">
                                                            <div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input">
                                                                    <label class="custom-control-label custom--control-label">Notificarme los nuevos comentarios por correo electrónico.</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox fs-13">
                                                                    <input type="checkbox" class="custom-control-input">
                                                                    <label class="custom-control-label custom--control-label">Notificarme nuevas publicaciones por correo electrónico.</label>
                                                                </div>
                                                            </div>
                                                            <button class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray" type="submit">Publicar Comentario</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        <div class="subheader">
                            <div class="subheader-title">
                                <h3 class="fs-16">Tu respuesta</h3>
                            </div>
                        </div>
                        <div class="post-form">
                            <form method="post" id="formAnswer" class="pt-3" enctype="multipart/form-data">
                                <div class="input-box">
                                    <label class="fs-14 text-black lh-20 fw-medium">Body</label>
                                    <div class="form-group">
                                        <iframe id="stackEditorFrame" src="<?php echo BASE_URL; ?>views/html/editor-frame.php" style="width: 100%; border: none;" scrolling="no"></iframe>
                                        <script>
                                            window.addEventListener("message", function (event) {
                                                if (event.data?.type === "editorHeight" && typeof event.data.height === "number") {
                                                    const iframe = document.getElementById("stackEditorFrame");
                                                    if (iframe) {
                                                        iframe.style.height = event.data.height + "px";
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div id="preview-panel" class="s-card mt16 p16 d-none mb-2">
                                    <p id="preview-excerpt" class="fc-black-600 mb12"></p>
                                    <div id="preview-content" class="s-prose s-card p16 mb16"></div>
                                </div>
                                <button class="btn theme-btn theme-btn-sm" type="submit">Publica tu respuesta</button>
                            </form>
                        </div>
                    </div><!-- end question-main-bar -->
                </div><!-- end col-lg-9 -->
                <div class="col-lg-3">
                    <?php include('sidebar.php'); ?>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- END USER DETAILS AREA -->

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

    <!-- Activar Highlight -->
    <script>
        const BASE_URL = " <?php echo BASE_URL; ?>";
        const questionId = <?= $id ?>

        document.querySelectorAll("pre").forEach(pre => {
            pre.removeAttribute("class");
        });

        document.querySelectorAll("pre code").forEach(block => {
            block.removeAttribute("class"); // limpia clases como 'content-dom'
            block.classList.add("hljs"); // añade clase de Highlight.js
            hljs.highlightElement(block);
        });
    </script>
    <script>
        window.addEventListener("message", function (event) {
            // Ajustar altura del iframe
            if (event.data?.type === "editorHeight") {
                document.getElementById("stackEditorFrame").style.height = event.data.height + "px";
            }

            // Obtener contenido del editor
            if (event.data?.type === "editorContent") {
                console.log("Contenido:", event.data.content);

                // Aquí puedes guardar en una variable o enviarlo en un form oculto si lo deseas
                // document.getElementById("contenidoEditor").value = event.data.content;
            }
        });
    </script>
    <script type="text/javascript" src="<?= BASE_URL; ?>views/js/askquestiondetails.js"></script>
    <script type="text/javascript" src="<?= BASE_URL; ?>views/js/viewTracker.js"></script>
    <script type="text/javascript" src="<?= BASE_URL; ?>views/js/comments.js"></script>
    <script type="text/javascript" src="<?= BASE_URL; ?>views/js/answer.js"></script>
</body>

</html>