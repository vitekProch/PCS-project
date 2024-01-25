<?php
use App\Services\Auth;
 Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container">
            <a class="author" href="<?= $GLOBALS['__BASE_PATH__']?>user?user_id=<?= $articleAuthor['id']; ?>">
                <img class="avatar__article-detail avatar" src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?= $articleAuthor['avatar']; ?>" alt="avatar">   
                <div class="author-info">
                    <h3 class="author-name"><?= $articleAuthor['name']; ?></h3>
                    <!--Důležité pořadí mezer! 1 za "Publikováno", 4 za datumem a 1 za číslem--> 
                    <p class="article-info">Publikováno <span class="article-date-and-likes"><?php \App\Helpers\DateFormat::formatDate($article['created_at'], false);?>    <span class="like-amount"><?= $articleLikesCount; ?> </span></span></p>
                </div>
            </a>
            <article class="article-detail">
                <h1><?= $article['title']; ?></h1>
                <div class="img-holder">
                    <div class="img-sizer">
                        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/uploads/articles/<?= $article['article_image']; ?>" alt="">
                    </div>
                </div>
                <div class="article-text">
                     <?= $article['article_content']; ?>
                </div>
                <?php if (Auth::getUser()): ?>
                <div class="like-holder">
                    <?php
                        $likeImg = isset($likeStatus) && $likeStatus['liked'] == 1 ? 'like-active.png' : 'like.png';
                    ?>
                        <form action="<?= $GLOBALS['__BASE_PATH__']?>article-detail" method="POST">
                            <button class="button--style-less" type="submit">
                                <img class="like-icon" src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/<?php echo $likeImg; ?>" alt="like">
                            </button>
                            <input name="article_id" type="hidden" value="<?php echo $article['id']; ?>">
                            <input name="like_status_id" type="hidden" value="<?php echo isset($likeStatus['id']) ? $likeStatus['id'] : 0; ?>">
                            <input name="like_status" type="hidden" value="<?php echo isset($likeStatus['liked']) ? $likeStatus['liked'] : 0; ?>">
                        </form>
                    </div>
                <?php endif; ?>
                <hr class="separator">
            </article>
            <?php if (Auth::getUser() && in_array(Auth::getUser()['user_role'], Auth::ROLES['EDITOR']) && ($article['article_status'] == 2)): ?>
            <section class="editor-accept-section">
                <button onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?>article-detail/approval?article_id=<?= $article['id'] ?>'" class="button__bigest--success">Schválit</button>
                <button onclick="showArticleDenyModal()" class="button__bigest--error">Zamítnout</button>
            </section>
            <?php endif; ?>
            <section class="comments">
                <h2  id="add_comment_header" class="comments-title">Komentáře:</h2>
                <?php foreach ($articleComments as $articleComment): ?>
                    <article class="comment">
                        <a class="comment__header" href="<?= $GLOBALS['__BASE_PATH__']?>user?user_id=<?= $articleComment['comment_author_id']; ?>">
                            <div class="user-menu user-menu--change">
                                <img class="avatar" src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?= $articleComment['comment_author_avatar']; ?>" alt="User Avatar">
                                <div class="user-menu__user-info">
                                    <p class="user-menu__user-name"><?= $articleComment['comment_author']; ?><span class="user-menu__role"><?= $articleComment['comment_author_role']; ?></span></p>
                                    <div class="email-text">
                                        <?= $articleComment['comment_author_email']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="comment__body">
                            <?= $articleComment['comment_content']; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php if(isset($error)) { echo '<div class="alert">' . $error . '</div>'; } ?>
                <?php if (Auth::getUser()): ?>
                <div class="add-comment">
                    <form action="<?= $GLOBALS['__BASE_PATH__']?>article-detail/comment" method="POST" class="form">
                        <h1 class="comment__header">
                            <div class="user-menu">
                                <img class="avatar" src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?php echo Auth::getUser()['user_avatar'] ?>"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name"><?php echo Auth::getUser()['user_name'] ?><span class="user-menu__role"><?php echo Auth::getUser()['user_role'] ?></span></p>  
                                    <div class="email-text"><?php echo Auth::getUser()['user_email'] ?></div>
                                </div>
                            </div>
                        </h1>
                        <div class="form__input-group">
                            <div class="input-icons textarea">
                                <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/text.png" alt="" class="form-icon"></i>
                                <textarea name="comment_content" id="article_comment_text" cols="20" rows="8" placeholder="Text"></textarea>
                                <input id="article_id_value" name="article_id" type="hidden" value="<?= $article['id'] ?>">
                            </div>
                        </div>
                        <button class="button-form--success" type="submit">Přidat komentář</button>
                    </form>
                </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <div class="modal-overlay" id="deny-article-modal">
        <form action="<?= $GLOBALS['__BASE_PATH__']?>article-detail/approval" method="POST" class="form">
            <h1 class="form__headline">Důvod zamítnutí</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="message" id="text" cols="20" rows="8" placeholder="Text"></textarea>
                    <input name="article_id" type="hidden" value="<?php echo $article['id']; ?>">
                </div>
            </div>
            <button class="button-form--success" type="submit">Odeslat zprávu</button>
        </form>
    </div>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>