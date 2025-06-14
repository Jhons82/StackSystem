<?php
require_once __DIR__ . '/../../includes/config.php';     // 1. Constantes como BASE_URL
require_once __DIR__ . '/../../config/session.php';      // 2. Inicia la sesión (si no está iniciada)
require_once __DIR__ . '/../../config/auth.php';         // 3. Protege la vista (redirige si no hay sesión)
require_once __DIR__ . '/../../config/conexion.php';     // 4. Conexión a la BD (opcional aquí si no se usa)
/* echo "BASE_URL: " . BASE_URL; */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>

    <title>Edit Profile - J-GOD</title>
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
                                    <h5 class="fs-20"><a href="question-details.html">No se puede obtener el atributo de datos del elemento del botón a través de Jquery</a></h5>
                                    <div class="meta d-flex flex-wrap align-items-center fs-13 lh-20 py-1">
                                        <div class="pe-3">
                                            <span>Preguntado</span>
                                            <span class="text-black">hace 1 hora</span>
                                        </div>
                                        <div class="pe-3">
                                            <span class="pe-1">Activo</span>
                                            <a href="#" class="text-black">hace 19 días</a>
                                        </div>
                                        <div class="pe-3">
                                            <span class="pe-1">Visto</span>
                                            <span class="text-black">89 veces</span>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        <a href="#" class="tag-link">javascript</a>
                                        <a href="#" class="tag-link">jquery</a>
                                        <a href="#" class="tag-link">attribute</a>
                                    </div>
                                </div>
                            </div><!-- end media -->
                        </div><!-- end question-highlight -->
                        <div class="question d-flex">
                            <div class="votes votes-styled w-auto">
                                <div id="vote" class="upvotejs">
                                    <a class="upvote upvote-on" data-bs-toggle="tooltip" data-placement="right" title="This question is useful"></a>
                                    <span class="count">1</span>
                                    <a class="downvote" data-bs-toggle="tooltip" data-placement="right" title="This question is not useful"></a>
                                    <a class="star" data-bs-toggle="tooltip" data-placement="right" title="Bookmark this question."></a>
                                </div>
                            </div><!-- end votes -->
                            <div class="question-post-body-wrap flex-grow-1">
                                <div class="question-post-body">
                                    <p>No puedo obtener el atributo de datos de un elemento de botón.</p>
                                    <pre class="code-block custom-scrollbar-styled">
<code>&lt;button
 <span class="code-attr">class</span>=<span class="code-string">"btn btn-solid navigate"</span>
 <span class="code-attr">value</span>=<span class="code-string">"2"</span>
 <span class="code-attr">data-productId</span>={{$product-&gt;id}}
 <span class="code-attr">id</span>=<span class="code-string">"size-click"</span>
 &gt;
 Next
&lt;/button&gt;
</code></pre>
                                    <p>Luego intento conseguirlo así:</p>
                                    <pre class="code-block custom-scrollbar-styled">
<code>$(<span class="code-string">"#size-click"</span>).click(<span class="code-function">() =&gt;</span> {
 <span class="code-keyword">let</span> width = $(<span class="code-string">"#prod-width"</span>).val();
 <span class="code-keyword">let</span> height = $(<span class="code-string">"#prod-height"</span>).val();
 <span class="code-keyword">var</span> prodId = $(<span class="code-built-in">this</span>).data(<span class="code-string">"productId"</span>);

 <span class="code-built-in">console</span>.log(<span class="code-string">'this is prodId'</span>);
 <span class="code-built-in">console</span>.log(prodId);

 <span class="code-keyword">const</span> data = {
      <span class="code-attr">prodId</span>: prodId,
      <span class="code-attr">step</span>: <span class="code-string">'Size'</span>,
      <span class="code-attr">width</span>: width,
      <span class="code-attr">height</span>: height,
    }

    postDataEstimate(data);

  })
</code></pre>
                                    <p>También estoy probando esto:</p>
                                    <pre class="code-block custom-scrollbar-styled">
<code><span class="code-keyword">var</span> prodId = $(<span class="code-built-in">this</span>).attr(<span class="code-string">'data-productId'</span>);
</code></pre>
                                    <p>¿Podrías decirme qué me estoy perdiendo?</p>
                                </div><!-- end question-post-body -->
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
                                        </div><!-- btn-group -->
                                        <a href="#" class="btn">Edit</a>
                                        <button class="btn">Follow</button>
                                    </div><!-- end post-menu -->
                                    <div class="media media-card user-media owner align-items-center">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img3.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Arden Smith</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2">224,110</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball gold"></span>16</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball silver"></span>93</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball"></span>136</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">asked</span>
                                                <span class="d-block lh-18 fs-12">6 hours ago</span>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card user-media align-items-center">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img4.jpg" alt="avatar">
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
                                    </div><!-- end media -->
                                </div><!-- end question-post-user-action -->
                                <div class="comments-wrap">
                                    <ul class="comments-list">
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score">1</span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">Where are you trying to get <code class="code">prodId</code>?</span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user" title="15,467 reputation">Majed Badawi</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">8 hours ago</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score"></span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">In a separate js file. @MajedBadawi</span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user owner" title="224,110 reputation">Arden Smith</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">8 hours ago</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score"></span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">@MajedBadawi I just updated the code to show where I'm trying to get it.</span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user owner" title="224,110 reputation">Arden Smith</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">8 hours ago</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score"></span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">Your are missing quotes <code class="code">data-productId={{$product->id}}</code> Your markup breaks after that</span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user" title="6,514 reputation">Kevin Martin</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">8 hours ago</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score"></span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">This doesn't work either: <code class="code">data-productId="{{$product->id}}"</code>. @Kevin Martin</span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user owner" title="224,110 reputation">Arden Smith</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">8 hours ago</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="comment-form">
                                        <div class="comment-link-wrap text-center">
                                            <a class="collapse-btn comment-link" data-bs-toggle="collapse" href="#addCommentCollapse" role="button" aria-expanded="false" aria-controls="addCommentCollapse" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Añadir un comentario</a>
                                        </div>
                                        <div class="collapse border-top border-top-gray mt-2 pt-3" id="addCommentCollapse">
                                            <form method="post" class="row pb-3">
                                                <div class="col-lg-12">
                                                    <h4 class="fs-16 pb-2">Leave a Comment</h4>
                                                    <div class="divider mb-2"><span></span></div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Your name">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Email (Address never made public)</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Your email">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Website</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Website link">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Message</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control form--control form-control-sm fs-13" name="message" rows="5" placeholder="Your comment here..."></textarea>
                                                            <div class="d-flex flex-wrap align-items-center pt-2">
                                                                <div class="badge bg-gray border border-gray me-3 fw-regular fs-13">[named hyperlinks] (https://example.com)</div>
                                                                <div class="me-3 fw-bold fs-13">**bold**</div>
                                                                <div class="me-3 font-italic fs-13">_italic_</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box d-flex flex-wrap align-items-center justify-content-between">
                                                        <div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewComments">
                                                                <label class="custom-control-label custom--control-label" for="getNewComments">Notify me of new comments vai email.</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewPosts">
                                                                <label class="custom-control-label custom--control-label" for="getNewPosts">Notify me of new posts vai email.</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray" type="submit">Post Comment</button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </form>
                                        </div><!-- end collapse -->
                                    </div>
                                </div><!-- end comments-wrap -->
                            </div><!-- end question-post-body-wrap -->
                        </div><!-- end question -->
                        <div class="subheader d-flex align-items-center justify-content-between">
                            <div class="subheader-title">
                                <h3 class="fs-16">1 Answer</h3>
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
                            </div><!-- end subheader-actions -->
                        </div><!-- end subheader -->
                        <div class="answer-wrap d-flex">
                            <div class="votes votes-styled w-auto">
                                <div id="vote2" class="upvotejs">
                                    <a class="upvote upvote-on" data-bs-toggle="tooltip" data-placement="right" title="This question is useful"></a>
                                    <span class="count">2</span>
                                    <a class="downvote" data-bs-toggle="tooltip" data-placement="right" title="This question is not useful"></a>
                                    <a class="star check star-on" data-bs-toggle="tooltip" data-placement="right" title="The question owner accepted this answer"></a>
                                </div>
                            </div><!-- end votes -->
                            <div class="answer-body-wrap flex-grow-1">
                                <div class="answer-body">
                                    <p>Dado que estás usando un <code class="code">arrow-function</code>, <code class="code">this</code> no se refiere a <code class="code">button</code>:</p>
                                    <pre class="code-block custom-scrollbar-styled">
<code>$(<span class="code-string">"#size-click"</span>).click(<span class="code-function"><span class="code-keyword">function</span>() </span>{
  <span class="code-keyword">var</span> prodId = $(<span class="code-built-in">this</span>).attr(<span class="code-string">"data-productId"</span>);
  <span class="code-built-in">console</span>.log(<span class="code-string">'this is prodId'</span>);
  <span class="code-built-in">console</span>.log(prodId);
});</code></pre>
                                    <pre class="code-block custom-scrollbar-styled"><code><span class="code-tag">&lt;<span class="code-name">script</span> <span class="code-attr">src</span>=<span class="code-string">"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"</span>&gt;</span><span class="code-tag">&lt;/<span class="code-name">script</span>&gt;</span>

<span class="code-tag">&lt;<span class="code-name">button</span>
  <span class="code-attr">class</span>=<span class="code-string">"btn btn-solid navigate"</span>
  <span class="code-attr">value</span>=<span class="code-string">"2"</span>
  <span class="code-attr">data-productId</span>=<span class="code-string">"1"</span>
  <span class="code-attr">id</span>=<span class="code-string">"size-click"</span>
&gt;</span>Next<span class="code-tag">&lt;/<span class="code-name">button</span>&gt;</span></code></pre>
                                    <p>Si aún desea usarlo, puede utilizar el <code class="code">event</code> método pasado a la función:</p>
                                    <pre class="code-block custom-scrollbar-styled"><code>$(<span class="code-string">"#size-click"</span>).click(<span class="code-function"><span class="code-params">e</span> =&gt;</span> {
  <span class="code-keyword">var</span> prodId = $(e.currentTarget).attr(<span class="code-string">"data-productId"</span>);
  <span class="code-built-in">console</span>.log(<span class="code-string">'this is prodId'</span>);
  <span class="code-built-in">console</span>.log(prodId);
});</code></pre>
                                    <pre class="code-block custom-scrollbar-styled"><code><span class="code-tag">&lt;<span class="code-name">script</span> <span class="code-attr">src</span>=<span class="code-string">"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"</span>&gt;</span><span class="code-tag">&lt;/<span class="code-name">script</span>&gt;</span>

<span class="code-tag">&lt;<span class="code-name">button</span>
  <span class="code-attr">class</span>=<span class="code-string">"btn btn-solid navigate"</span>
  <span class="code-attr">value</span>=<span class="code-string">"2"</span>
  <span class="code-attr">data-productId</span>=<span class="code-string">"1"</span>
  <span class="code-attr">id</span>=<span class="code-string">"size-click"</span>
&gt;</span>Next<span class="code-tag">&lt;/<span class="code-name">button</span>&gt;</span></code></pre>
                                </div><!-- end answer-body -->
                                <div class="question-post-user-action">
                                    <div class="post-menu">
                                        <div class="btn-group">
                                            <button class="btn dropdown-toggle after-none" type="button" id="shareDropdownMenuTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compartir</button>
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
                                        </div><!-- btn-group -->
                                        <a href="#" class="btn">Editar</a>
                                        <button class="btn">Seguir</button>
                                    </div><!-- end post-menu -->
                                    <div class="media media-card user-media align-items-center">
                                        <a href="user-profile.html" class="media-img d-block">
                                            <img src="<?php echo BASE_URL; ?>assets/images/img4.jpg" alt="avatar">
                                        </a>
                                        <div class="media-body d-flex align-items-center justify-content-between">
                                            <div>
                                                <h5 class="pb-1"><a href="user-profile.html">Majed Badawi</a></h5>
                                                <div class="stats fs-12 d-flex align-items-center lh-18">
                                                    <span class="text-black pe-2">15.5k</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball gold"></span>3</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball silver"></span>10</span>
                                                    <span class="pe-2 d-inline-flex align-items-center"><span class="ball"></span>26</span>
                                                </div>
                                            </div>
                                            <small class="meta d-block text-end">
                                                <span class="text-black d-block lh-18">contestado</span>
                                                <span class="d-block lh-18 fs-12">hace 8 horas</span>
                                            </small>
                                        </div>
                                    </div><!-- end media -->
                                    <div class="media media-card user-media align-items-center">
                                        <div class="media-body d-flex align-items-center justify-content-end">
                                            <a href="revisions.html" class="meta d-block text-end fs-13 text-color">
                                                <span class="d-block lh-18">editado</span>
                                                <span class="d-block lh-18 fs-12">hace 8 horas</span>
                                            </a>
                                        </div>
                                    </div><!-- end media -->
                                </div><!-- end question-post-user-action -->
                                <div class="comments-wrap">
                                    <ul class="comments-list">
                                        <li>
                                            <div class="comment-actions">
                                                <span class="comment-score">1</span>
                                            </div>
                                            <div class="comment-body">
                                                <span class="comment-copy">¡Ah, excelente! ¡Gracias! </span>
                                                <span class="comment-separated">-</span>
                                                <a href="user-profile.html" class="comment-user owner" title="224,110 reputation">Arden Smith</a>
                                                <span class="comment-separated">-</span>
                                                <a href="#" class="comment-date">hace 8 horas</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="comment-form">
                                        <div class="comment-link-wrap text-center">
                                            <a class="collapse-btn comment-link" data-bs-toggle="collapse" href="#addCommentCollapseTwo" role="button" aria-expanded="false" aria-controls="addCommentCollapseTwo" title="Use comments to ask for more information or suggest improvements. Avoid answering questions in comments.">Añadir un comentario</a>
                                        </div>
                                        <div class="collapse border-top border-top-gray mt-2 pt-3" id="addCommentCollapseTwo">
                                            <form method="post" class="row pb-3">
                                                <div class="col-lg-12">
                                                    <h4 class="fs-16 pb-2">Deja un comentario</h4>
                                                    <div class="divider mb-2"><span></span></div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Nombre</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Your name">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Correo electrónico (la dirección nunca se hará pública)</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Your email">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Sitio web</label>
                                                        <div class="form-group">
                                                            <input class="form-control form--control form-control-sm fs-13" type="text" name="text" placeholder="Website link">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="fs-13 text-black lh-20">Mensaje</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control form--control form-control-sm fs-13" name="message" rows="5" placeholder="Your comment here..."></textarea>
                                                            <div class="d-flex flex-wrap align-items-center pt-2">
                                                                <div class="badge bg-gray border border-gray me-3 fw-regular fs-13">[named hyperlinks] (https://example.com)</div>
                                                                <div class="me-3 fw-bold fs-13">**bold**</div>
                                                                <div class="me-3 font-italic fs-13">_italic_</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box d-flex flex-wrap align-items-center justify-content-between">
                                                        <div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewCommentsTwo">
                                                                <label class="custom-control-label custom--control-label" for="getNewCommentsTwo">Notificarme los nuevos comentarios por correo electrónico.</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox fs-13">
                                                                <input type="checkbox" class="custom-control-input" id="getNewPostsTwo">
                                                                <label class="custom-control-label custom--control-label" for="getNewPostsTwo">Notificarme nuevas publicaciones por correo electrónico.</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn theme-btn theme-btn-sm theme-btn-outline theme-btn-outline-gray" type="submit">Publicar comentario</button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </form>
                                        </div><!-- end collapse -->
                                    </div>
                                </div><!-- end comments-wrap -->
                            </div><!-- end answer-body-wrap -->
                        </div><!-- end answer-wrap -->
                        <div class="subheader">
                            <div class="subheader-title">
                                <h3 class="fs-16">Tu respuesta</h3>
                            </div><!-- end subheader-title -->
                        </div><!-- end subheader -->
                        <div class="post-form">
                            <form method="post" class="pt-3">
                                <div class="input-box">
                                    <label class="fs-14 text-black lh-20 fw-medium">Body</label>
                                    <div class="form-group">
                                        <textarea class="form-control form--control form-control-sm fs-13 user-text-editor" name="message" rows="6" placeholder="Your answer here...">Tu respuesta aquí...</textarea>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="fs-14 text-black fw-medium">Imagen</label>
                                    <div class="form-group">
                                        <div class="file-upload-wrap file-upload-layout-2">
                                            <input type="file" name="files[]" class="file-upload-input" multiple="">
                                            <span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload me-2 fs-24"></i>suelte los archivos aquí o haga clic para cargar</span>
                                        </div>
                                    </div>
                                </div><!-- end input-box -->
                                <button class="btn theme-btn theme-btn-sm" type="submit">Publicar la respuesta</button>
                            </form>
                        </div>
                    </div><!-- end question-main-bar -->
                </div><!-- end col-lg-9 -->
                <div class="col-lg-3">
                    <?php require_once(__DIR__ . "/sidebar.php") ?>
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end question-area -->
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
</body>

</html>