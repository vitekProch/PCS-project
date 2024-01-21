<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-container">
                    <h1 class="hero__title">Začněte cestu s programováním</h1>
                    <p class="hero__subtitle">Zde se dozvíte vše potřebné o programování</p>
                    <button onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?>articles'" class="button--success">Začni hned!</button>
                </div>
            </div>
        </section>
        <section class="homepage-articles">
            <div class="container">
                <h2 class="homepage-articles__header">Programování je zábava, tak se pojďme bavit!</h2>
                <div class="article-container">
                    <?php foreach ($articles as $index => $article): ?>
                        <article class="article">
                            <div class="article__box">
                                <div class="article__text">
                                    <h3 class="article__title"><?= $article['title'] ?></h3>
                                    <p class="article__subtitle"><?= $article['subtitle'] ?></p>
                                    <button onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?>article-detail?article_id=<?= $article['id'] ?>'" class="button--success">Přečíst článek</button>
                                </div>
                            </div>
                            <div class="article__img-holder">
                                <img class="article__img" src="<?= $GLOBALS['__BASE_PATH__']?>images/uploads/articles/<?= $article['article_image']; ?>" alt="java">
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
        </section>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>