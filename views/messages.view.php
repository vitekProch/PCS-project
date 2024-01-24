<?php Core\View::render('partials/header', ['title' => $title]) ?>

<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container">
            <section class="massage-section">
                <div id="messages-nav-toggler" aria-expanded="false" aria-controls="messages-nav" type="button" class="hamburger navbar-toggler collapsed">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <aside class="messages-nav" id="messages-nav" aria-labelledby="navbar-toggle">
                    <div class="messages-nav__container">
                        <div class="messages-nav__header">Zamítnuté články</div>
                        <ul class="messages-nav__menu" id="messages-nav__menu">
                        <?php
                            $displayedArticleIds = [];
                            foreach ($allUserMessages as $allUserMessage):
                                if (!in_array($allUserMessage['article_id'], $displayedArticleIds)):
                                    $displayedArticleIds[] = $allUserMessage['article_id'];
                                    ?>
                                    <li class="messages-nav__list <?= $messagesForArticle[0]['article_id'] === $allUserMessage['article_id'] ? 'active' : ''; ?>">
                                        <a href="<?= $GLOBALS['__BASE_PATH__']?>messages?article_id=<?= $allUserMessage['article_id'] ?>" class="messages-nav__list-group">
                                            <img class="messages-nav__list-group__article-img" src="<?= $GLOBALS['__BASE_PATH__']?>images/uploads/articles/<?= $allUserMessage['article_image'] ?>" alt="article-img">
                                            <div class="messages-nav__list-group-box">
                                                <div class="messages-nav__list-group-info">
                                                    <p class="messages-nav__list-group-article-title"><?= \App\Services\TextShortener::textShortener($allUserMessage['title']) ?></p>
                                                    <p class="messages-nav__list-group-editor-name"><?= $allUserMessage['reviewing_person_role'] ?>: <?= $allUserMessage['reviewing_person'] ?></p>
                                                </div>
                                                <?= $allUserMessage['message_open'] ? '' : '<div class="message-notification"></div>'; ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </aside>
                <?php if ($messagesForArticle): ?>
                    <div class="contentik">
                        
                        <?php foreach ($messagesForArticle as $index => $messageForArticle): ?>
                            <article class="message">
                                <div class="message__header">
                                    <a class="user-menu" href="<?= $GLOBALS['__BASE_PATH__']?>user?user_id=<?= $allUserMessages[$index]['reviewing_person_id']; ?>">
                                        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?= $allUserMessages[$index]['reviewing_person_avatar'] ?>" class="avatar">
                                        <div class="user-menu__user-info">                        
                                            <p class="user-menu__user-name"><?= $allUserMessages[$index]['reviewing_person'] ?> <span class="user-menu__role"><?= $allUserMessages[$index]['reviewing_person_role'] ?></span></p>  
                                            <div class="email-text"><?= $allUserMessages[$index]['reviewing_person_email'] ?></div>
                                        </div>
                                    </a>
                                    <div>
                                        <p class="message-send-time"><?= \App\Services\DateFormat::formatDate($messageForArticle['created_at'], true) ?></p>
                                    </div>
                                </div>
                                <p>Dobrý den,</p>
                                <div class="message__content">
                                    <p><?= $messageForArticle['message_content'] ?></p>
                                </div>
                                <div class="message__footer">
                                    <p>Děkuji za pochopení.</p>
                                    <div class="bottom">
                                        <div>
                                            <p>S pozdravem</p>
                                            <p class="messeger-name"><?= $allUserMessages[$index]['reviewing_person'] ?></p>
                                        </div>
                                        <button  onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/deny'" class="button--success--smaller button--edit--smaller">Upravit hned</button>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <script src="<?= $GLOBALS['__BASE_PATH__']?>js/messages.js"></script>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>
