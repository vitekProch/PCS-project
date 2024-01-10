<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container">
            <nav class="articles-nav">
                <ul class="article-nav" id="article-nav__menu">
                    <li class="article-nav__item <?php if($articleStatus === "all"){echo "active";} ?>"><a class="article-nav__link" href="/projekty/PCS2023/PCS-project/articles">Všechny články</a></li>
                    <li class="article-nav__item <?php if($articleStatus === 1){echo "active";} ?>"><a class="article-nav__link" href="/projekty/PCS2023/PCS-project/articles/user-articles/published">Moje články</a></li>
                    <li class="article-nav__item <?php if($articleStatus === 2){echo "active";} ?>"><a class="article-nav__link" href="/projekty/PCS2023/PCS-project/articles/user-articles/to-check">Kontroluje se</a></li>
                    <li class="article-nav__item <?php if($articleStatus === 0){echo "active";} ?>"><a class="article-nav__link" href="/projekty/PCS2023/PCS-project/articles/user-articles/deny">Zamítnuté</a></li>
                    <li class="article-nav__item <?php if($articleStatus === "checkInProgress"){echo "active";} ?>"><a class="article-nav__link" href="/projekty/PCS2023/PCS-project/articles/user-articles/to-approve">Ke kontrole</a></li>
                </ul>
                <i class="add-article"><img  title="Přidat článek" onclick="showArticleCreateModal()" src="/projekty/PCS2023/PCS-project/images/icons/article-add.png" alt=""></i>
            </nav>

            <div class="article-container-small row" id="paginated-list" data-current-page="1" aria-live="polite">
            <?php
            foreach ($articles as $aticle) {
                echo '
                <article class="article--small column">
                <div class="article__img-holder">
                    <img class="article__img article__img--smaller" src="' . $aticle['article_image'] . '" alt="java">
                </div>
                <div class="article__box">
                    <div class="article__text">
                        <h3 class="article__title--smaller">' . $aticle['title'] . '</h3>
                        <p class="article__subtitle-smaller">' . $aticle['subtitle'] . '</p>
                        <div class="buttons-group">
                            <button class="button--success--smaller">Přečíst článek</button>
                            <div class="change-buttons">
                                <img onclick="showArticleEditModal()" class="edit-button-pen" src="/projekty/PCS2023/PCS-project/images/icons/edit-pen.png" alt="1">
                                <img class="delete-button-cross" src="/projekty/PCS2023/PCS-project/images/icons/cross.png" alt="1">
                            </div>
                        </div>
                    </div>
                </div>
            </article>
                ';
            }
            ?>
            </div>
            <div class="paggination" id="paggination">
                <div class="paggination-box-previos disabled" id="prev-button" aria-label="Previous page" title="Previous page">
                    <img src="/projekty/PCS2023/PCS-project/images/icons/previous.png" alt="previous">
                </div>
                <div class="pagination-numbers" id="pagination-numbers">
            
                </div>
                <div class="paggination-box-next"  id="next-button" aria-label="Next page" title="Next page">
                    <img src="/projekty/PCS2023/PCS-project/images/icons/next.png" alt="next">
                </div>
            </div>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <div class="modal-overlay" id="create-article-modal">
        <form action="/projekty/PCS2023/PCS-project/articles" method="POST" class="form" enctype="multipart/form-data">
            <h1 class="form__headline">Přidat článek</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/title.png" alt="" class="form-icon"></i>
                    <textarea name="title" id="title" cols="20" rows="1" placeholder="Titulek"></textarea>
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/subtitle.png" alt="" class="form-icon"></i>
                    <textarea name="subtitle" id="subtitle" cols="20" rows="1" placeholder="Podtitulek"></textarea>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/upload.png" alt="" class="form-icon"></i>
                    <input class="article_image" type="file" name="article_image" title="Obrázek k článku">
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="article_content" id="text" cols="20" rows="8" placeholder="Text"></textarea>
                </div>
            </div>
            <button class="button-form--success" type="submit">Zaslat ke kontrole</button>
        </form>
    </div>

    <div class="modal-overlay" id="edit-article-modal">
        <form action="" class="form">
            <h1 class="form__headline">Úprava článku</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/title.png" alt="" class="form-icon"></i>
                    <textarea name="textArea" id="title" cols="20" rows="1">Dominujte jazyku Python</textarea>
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/subtitle.png" alt="" class="form-icon"></i>
                    <textarea name="textArea" id="subtitle" cols="20" rows="1">Python je jedním z nejúžasnějších jazyků pro začátečníky</textarea>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/upload.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="file" name="article-image" title="Obrázek k článku">
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="textArea" id="text" cols="20" rows="8">TEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXT</textarea>
                </div>
            </div>
            <button class="button-form--success" type="submit">Zaslat ke kontrole</button>
        </form>
    </div>
    <?php Core\View::render('partials/main-scripts') ?>
    <script src="/projekty/PCS2023/PCS-project/js/pagination.js"></script>
</body>
</html>