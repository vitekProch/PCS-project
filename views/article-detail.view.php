<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container">
            <div class="author">
                <img class="avatar__article-detail" src="/projekty/PCS2023/PCS-project/images/icons/avatar.png" alt="avatar">   
                <div class="author-info">
                    <h3 class="author-name">Vítek</h3>
                    <!--Důležité pořadí mezer! 1 za "Publikováno", 4 za datumem a 1 za číslem--> 
                    <p class="article-info">Publikováno <span class="article-date-and-likes">27.03.2023    <span class="like-amount">5 </span></span></p>
                </div>
            </div>
            <article class="article-detail">
                <h1>Ovládněte programování v Javě</h1>
                <div class="img-holder">
                    <div class="img-sizer">
                        <img src="/projekty/PCS2023/PCS-project/images/image/Java.png" alt="">
                    </div>
                </div>
                <div class="article-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non blandit massa enim nec. Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis natoque penatibus et magnis dis parturient montes. Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus in hendrerit gravida rutrum quisque non.</p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non blandit massa enim nec. Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis natoque penatibus et magnis dis parturient montes. Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus in hendrerit gravida rutrum quisque non.</p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non blandit massa enim nec. Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis natoque penatibus et magnis dis parturient montes. Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus in hendrerit gravida rutrum quisque non.</p>
                </div>
                <div class="like-holder">
                    <img id="like-active" src="/projekty/PCS2023/PCS-project/images/icons/like-active.png" alt="like">
                    <img id="like" src="/projekty/PCS2023/PCS-project/images/icons/like.png" alt="like">
                </div>
                <hr class="separator">
            </article>
            <section class="editor-accept-section">
                <button class="button__bigest--success">Schválit</button>
                <button onclick="showArticleDenyModal()" class="button__bigest--error">Zamítnout</button>
            </section>

            <section class="comments">
                <h2 class="comments-title">Komentáře:</h2>
                <article class="comment">
                    <div class="comment__header">
                        <div class="user-menu user-menu--change">
                            <img src="/projekty/PCS2023/PCS-project/images/icons/avatar.png" class="avatar"></img>
                            <div class="user-menu__user-info">                        
                                <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                
                                <div class="email-text">sardor@mail.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="comment__body">
                        I really appreciate the insights and perspective shared in this article. It's definitely given me something to think about and has helped me see things from a different angle. Thank you for writing and sharing!
                    </div>
                </article>
                <article class="comment">
                    <div class="comment__header">
                        <div class="user-menu user-menu--change">
                            <img src="/projekty/PCS2023/PCS-project/images/icons/avatar.png" class="avatar"></img>
                            <div class="user-menu__user-info">                        
                                <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                
                                <div class="email-text">sardor@mail.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="comment__body">
                        I really appreciate the insights and perspective shared in this article. It's definitely given me something to think about and has helped me see things from a different angle. Thank you for writing and sharing!
                    </div>
                </article>
                <div class="add-comment">
                    <form action="" class="form">
                        <h1 class="comment__header">
                            <div class="user-menu">
                                <img src="/projekty/PCS2023/PCS-project/images/icons/avatar.png" class="avatar"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                    
                                    <div class="email-text">sardor@mail.com</div>
                                </div>
                            </div>
                        </h1>
                        <div class="form__input-group">
                            <div class="input-icons textarea">
                                <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/text.png" alt="" class="form-icon"></i>
                                <textarea name="textArea" id="textArea" cols="20" rows="8" placeholder="Text"></textarea>
                            </div>
                        </div>
                        <button class="button-form--success" type="submit">Přidat komentář</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <div class="modal-overlay" id="deny-article-modal">
        <form action="" class="form">
            <h1 class="form__headline">Důvod zamítnutí</h1>
            <div class="form__input-group">
                <div class="input-icons textarea">
                    <i class="icon"><img src="/projekty/PCS2023/PCS-project/images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="textArea" id="text" cols="20" rows="8" placeholder="Text"></textarea>
                </div>
            </div>
            <button class="button-form--success" type="submit">Odeslat zprávu</button>
        </form>
    </div>
    <?php Core\View::render('partials/main-scripts') ?>
    <script src/projekty/PCS2023/PCS-project/js/articleDetail.js"></script>
</body>
</html>