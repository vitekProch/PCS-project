<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-container">
                    <h1 class="hero__title">Začněte cestu s programováním</h1>
                    <p class="hero__subtitle">Zde se dozvíte vše potřebné o programování</p>
                    <button onclick="location.href='/projekty/PCS2023/PCS-project/articles'" class="button--success">Začni hned!</button>
                </div>
            </div>
        </section>
        <section class="homepage-articles">
            <div class="container">
                <h2 class="homepage-articles__header">Programování je zábava, tak se pojďme bavit!</h2>
                <div class="test-section">
                    <img class="txtasd" src="/projekty/PCS2023/PCS-project/images/image/wires.png" alt="">
                </div>
                <div class="article-container">
                    <article class="article">
                        <div class="article__box">
                            <div class="article__text">
                                <h3 class="article__title">Dominujte jazyku Python</h3>
                                <p class="article__subtitle">Python je jedním z nejúžasnějších jazyků pro začátečníky</p>
                                <button onclick="location.href='/projekty/PCS2023/PCS-project/article-detail'" class="button--success">Přečíst článek</button>
                            </div>
                        </div>
                        <div class="article__img-holder">
                            <img class="article__img" src="/projekty/PCS2023/PCS-project/images/image/python.jpg" alt="java">
                        </div>
                        <div class="test-section2">
                            <img class="txtasd" src="/projekty/PCS2023/PCS-project/images/image/wires.png" alt="">
                        </div>
                    </article>

                    <article class="article">
                        <div class="article__box">
                            <div class="article__text">
                                <h3 class="article__title">Ovládněte programování v Javě</h3>
                                <p class="article__subtitle">Vítáme vás ve světě Javy! Tento článek je klíčem k pochopení a ovládnutí programovacího jazyka Java.</p>
                                <button onclick="location.href='/projekty/PCS2023/PCS-project/article-detail'" class="button--success">Přečíst článek</button>
                            </div>
                        </div>
                        <div class="article__img-holder">
                            <img class="article__img" src="/projekty/PCS2023/PCS-project/images/image/Java.png" alt="java">
                        </div>
                        <div class="test-section3">
                            <img class="txtasd" src="/projekty/PCS2023/PCS-project/images/image/wires.png" alt="">
                        </div>
                    </article>
                    <article class="article">
                        <div class="article__box">
                            <div class="article__text">
                                <h3 class="article__title">Prozkoumání světa JavaScriptu: Základní tipy a triky</h3>
                                <p class="article__subtitle">Klíčové tipy pro dynamické webové stránky.</p>
                                <button onclick="location.href='/projekty/PCS2023/PCS-project/article-detail'" class="button--success">Přečíst článek</button>
                            </div>
                        </div>
                        <div class="article__img-holder">
                            <img class="article__img" src="/projekty/PCS2023/PCS-project/images/image/JavaScript.png" alt="java">
                        </div>
                    </article>
                </div>

        </section>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>