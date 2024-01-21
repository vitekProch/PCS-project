<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container">
            <?php if (App\Services\Auth::getUser()): ?>
                <nav class="articles-nav">
                    <ul class="article-nav" id="article-nav__menu">
                        <li class="article-nav__item <?php if($articleStatus === "all"){echo "active";} ?>"><a class="article-nav__link" href="<?= $GLOBALS['__BASE_PATH__']?>articles">Všechny články</a></li>
                        <li class="article-nav__item <?php if($articleStatus === 1){echo "active";} ?>"><a class="article-nav__link" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/published">Publikované články</a></li>
                        <li class="article-nav__item <?php if($articleStatus === 2){echo "active";} ?>"><a class="article-nav__link" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/to-check">Kontroluje se</a></li>
                        <li class="article-nav__item <?php if($articleStatus === 0){echo "active";} ?>"><a class="article-nav__link" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/deny">Zamítnuté</a></li>
                        <?php if (in_array(App\Services\Auth::getUser()['user_role'], App\Services\Auth::ROLES['EDITOR'])): ?>
                            <li class="article-nav__item <?php if($articleStatus === "checkInProgress"){echo "active";} ?>"><a class="article-nav__link" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/to-approve">Ke kontrole</a></li>
                        <?php endif; ?>
                    </ul>
                    <i class="add-article"><img  title="Přidat článek" onclick="showArticleCreateModal()" src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/article-add.png" alt=""></i>
                </nav>
            <?php endif; ?>
            <div class="article-container-small row" id="paginated-list" data-current-page="1" aria-live="polite">
            <?php foreach ($articles as $aticle): ?>
                <article class="article--small column">
                    <div class="article__img-holder">
                        <img class="article__img article__img--smaller" src="<?= $GLOBALS['__BASE_PATH__']?>images/uploads/articles/<?= $aticle['article_image'] ?>" alt="java">
                    </div>
                    <div class="article__box">
                        <div class="article__text">
                            <h3 class="article__title--smaller"><?= $aticle['title'] ?></h3>
                            <p class="article__subtitle-smaller"><?= $aticle['subtitle'] ?></p>
                            <div class="buttons-group">
                                <button class="button--success--smaller"><a href="<?= $GLOBALS['__BASE_PATH__']?>article-detail?article_id=<?= $aticle['id'] ?>">Přečíst článek</a></button>

                                <?php if (App\Services\Auth::getUser() && (App\Services\Auth::getUser()['user_id'] == $aticle['user_id'])): ?>
                                    <form action="<?= $GLOBALS['__BASE_PATH__']?>articles/delete" class="change-buttons">
                                        <img class="edit-button-pen edit-article" article_id="<?= $aticle['id'] ?>" src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/edit-pen.png" alt="1">
                                        <input id="article_id_value" name="article_id" type="hidden" value="<?= $aticle['id'] ?>">
                                        <button type="submit" class="button--style-less"><img class="delete-button-cross" src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/cross.png" alt="1"></button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            </div>
            <?php Core\View::render('partials/pagination', [
            'currentPage' => isset($_GET['page']) ? $_GET['page'] : 1,
            'articleMaxPages' => $articleMaxPages,
            'pageUrl' => $pageUrl,
        ]) ?>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <div class="modal-overlay" id="create-article-modal">
        <form action="<?= $GLOBALS['__BASE_PATH__']?>articles" method="POST" class="form" enctype="multipart/form-data">
            <h1 class="form__headline">Přidat článek</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/title.png" alt="" class="form-icon"></i>
                    <textarea name="title" id="title" cols="20" rows="1" placeholder="Titulek"></textarea>
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/subtitle.png" alt="" class="form-icon"></i>
                    <textarea name="subtitle" id="subtitle" cols="20" rows="1" placeholder="Podtitulek"></textarea>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/upload.png" alt="" class="form-icon"></i>
                    <input class="article_image" type="file" name="article_image" title="Obrázek k článku">
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="article_content" id="text" cols="20" rows="8" placeholder="Text"></textarea>
                </div>
            </div>
            <button class="button-form--success" type="submit">Zaslat ke kontrole</button>
        </form>
    </div>

    <div class="modal-overlay" id="edit-article-modal">
        <form action="<?= $GLOBALS['__BASE_PATH__']?>articles/edit" class="form" method="POST" enctype="multipart/form-data">
            <h1 class="form__headline">Úprava článku</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/title.png" alt="" class="form-icon"></i>
                    <textarea name="title" id="edit_article_title" cols="20" rows="1"></textarea>
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/subtitle.png" alt="" class="form-icon"></i>
                    <textarea name="subtitle" id="edit_article_subtitle" cols="20" rows="1"></textarea>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/upload.png" alt="" class="form-icon"></i>
                    <input class="input-field" id="edit_article_img" type="file" name="article_image" title="Obrázek k článku">
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="article_content" id="edit_article_text" cols="20" rows="8"></textarea>
                </div>
            </div>
            <input id="article_id_value_edit" name="article_id" type="hidden">
            <button class="button-form--success" type="submit">Zaslat ke kontrole</button>
        </form>
    </div>
    <?php Core\View::render('partials/main-scripts') ?>
    <script src="<?= $GLOBALS['__BASE_PATH__']?>js/articles.js"></script>
</body>
</html>