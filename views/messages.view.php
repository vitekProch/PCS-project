<?php Core\View::render('partials/header', ['title' => $title]) ?>
    <body>
    <?php Core\View::render('partials/navbar') ?>
        <main class="main-class">
            <div class="container">
                <section class="massage-section">
                    <aside class="messages-nav">
                        <div class="messages-nav__container">
                            <div class="messages-nav__header">Zamítnuté články</div>
                            <ul class="messages-nav__menu" id="messages-nav__menu">
                                <li class="messages-nav__list active">
                                    <div class="messages-nav__list-group">
                                        <img class="messages-nav__list-group__article-img" src="../PCS-project/images/image/JavaScript.png" alt="article-img">
                                        <div class="messages-nav__list-group-box">
                                            <div class="messages-nav__list-group-info">
                                                <p class="messages-nav__list-group-article-title">Ovládnětě programová...</p>
                                                <p class="messages-nav__list-group-editor-name">Editor: Vítek</p>
                                            </div>
                                            <div class="message-notification"></div>
                                        </div>
                                    </div>                
                                </li>
                            <li class="messages-nav__list">
                                <div class="messages-nav__list-group">
                                    <img class="messages-nav__list-group__article-img" src="../PCS-project/images/image/python.jpg" alt="article-img">
                                    <div class="messages-nav__list-group-box">
                                        <div class="messages-nav__list-group-info">
                                            <p class="messages-nav__list-group-article-title">Dominujte jazyku Pytho...</p>
                                            <p class="messages-nav__list-group-editor-name">Editor: Vítek</p>
                                        </div>
                                        <div class="message-notification"></div>
                                    </div>
                                </div>                
                            </li>
                            <li class="messages-nav__list">
                                <div class="messages-nav__list-group">
                                    <img class="messages-nav__list-group__article-img" src="../PCS-project/images/image/Java.png" alt="article-img">
                                    <div class="messages-nav__list-group-box">
                                        <div class="messages-nav__list-group-info">
                                            <p class="messages-nav__list-group-article-title">Prozkoumejte svět Java...</p>
                                            <p class="messages-nav__list-group-editor-name">Editor: Vítek</p>
                                        </div>
                                        <div class="message-notification"></div>
                                    </div>
                                </div>                
                            </li>
                        </ul>
                    </div>
                </aside>
                <div class="contentik">
                    <div id="messages-nav-toggler" type="button" class="hamburger navbar-toggler collapsed">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <article class="message">
                        <div class="message__header">
                            <div class="user-menu user-menu--change ">
                                <img src="../PCS-project/images/icons/avatar.png" class="avatar"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                    
                                    <div class="email-text">sardor@mail.com</div>
                                </div>
                            </div>
                            <p>Dobrý den,</p>
                        </div>
                        <div class="message__content">
                            <p>
                                děkuji za předložení článku. Bohužel jsem se rozhodl jej momentálně zamítnout. Našel jsem určité nedostatky v prezentaci, struktuře a obsahu.
                                Obsah článku trpí nejasností v prezentaci informací a potřebuje lepší strukturu. Chybí mu hloubka a analýza tématu. Jazykově je zapotřebí revize, aby byl text plynulý a konzistentní.
                                Pro zlepšení doporučuji důkladně strukturovat obsah, přidat konkrétní příklady a statistiky pro podporu prezentovaných názorů a provést důkladnou jazykovou revizi pro odstranění gramatických chyb.
                            </p>
                        </div>
                        <div class="message__footer">
                            <p>Děkuji za pochopení</p>
                            <div class="bottom">
                                <div>
                                    <p>S pozdravem</p>
                                    <p class="messeger-name">Vítek</p>
                                </div>
                                <button class="button--success--smaller button--edit--smaller">Upravit hned</button>
                            </div>
                        </div>
                    </article>

                    <article class="message">
                        <div class="message__header">
                            <div class="user-menu user-menu--change ">
                                <img src="../PCS-project/images/icons/avatar.png" class="avatar"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                    
                                    <div class="email-text">sardor@mail.com</div>
                                </div>
                            </div>
                            <p>Dobrý den,</p>
                        </div>
                        <div class="message__content">
                            <p>
                                děkuji za předložení článku. Bohužel jsem se rozhodl jej momentálně zamítnout. Našel jsem určité nedostatky v prezentaci, struktuře a obsahu.
                                Obsah článku trpí nejasností v prezentaci informací a potřebuje lepší strukturu. Chybí mu hloubka a analýza tématu. Jazykově je zapotřebí revize, aby byl text plynulý a konzistentní.
                                Pro zlepšení doporučuji důkladně strukturovat obsah, přidat konkrétní příklady a statistiky pro podporu prezentovaných názorů a provést důkladnou jazykovou revizi pro odstranění gramatických chyb.
                            </p>
                        </div>
                        <div class="message__footer">
                            <p>Děkuji za pochopení</p>
                            <div class="bottom">
                                <div>
                                    <p>S pozdravem</p>
                                    <p class="messeger-name">Vítek</p>
                                </div>
                                <button class="button--success--smaller button--edit--smaller">Upravit hned</button>
                            </div>
                        </div>
                    </article>
                    <article class="message">
                        <div class="message__header">
                            <div class="user-menu user-menu--change ">
                                <img src="../PCS-project/images/icons/avatar.png" class="avatar"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                    
                                    <div class="email-text">sardor@mail.com</div>
                                </div>
                            </div>
                            <p>Dobrý den,</p>
                        </div>
                        <div class="message__content">
                            <p>
                                děkuji za předložení článku. Bohužel jsem se rozhodl jej momentálně zamítnout. Našel jsem určité nedostatky v prezentaci, struktuře a obsahu.
                                Obsah článku trpí nejasností v prezentaci informací a potřebuje lepší strukturu. Chybí mu hloubka a analýza tématu. Jazykově je zapotřebí revize, aby byl text plynulý a konzistentní.
                                Pro zlepšení doporučuji důkladně strukturovat obsah, přidat konkrétní příklady a statistiky pro podporu prezentovaných názorů a provést důkladnou jazykovou revizi pro odstranění gramatických chyb.
                            </p>
                        </div>
                        <div class="message__footer">
                            <p>Děkuji za pochopení</p>
                            <div class="bottom">
                                <div>
                                    <p>S pozdravem</p>
                                    <p class="messeger-name">Vítek</p>
                                </div>
                                <button class="button--success--smaller button--edit--smaller">Upravit hned</button>
                            </div>
                        </div>
                    </article>
                    <article class="message">
                        <div class="message__header">
                            <div class="user-menu user-menu--change ">
                                <img src="../PCS-project/images/icons/avatar.png" class="avatar"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name">Vitalij Procházka<span class="user-menu__role">EDITOR</span></p>  
                                    
                                    <div class="email-text">sardor@mail.com</div>
                                </div>
                            </div>
                            <p>Dobrý den,</p>
                        </div>
                        <div class="message__content">
                            <p>
                                děkuji za předložení článku. Bohužel jsem se rozhodl jej momentálně zamítnout. Našel jsem určité nedostatky v prezentaci, struktuře a obsahu.
                                Obsah článku trpí nejasností v prezentaci informací a potřebuje lepší strukturu. Chybí mu hloubka a analýza tématu. Jazykově je zapotřebí revize, aby byl text plynulý a konzistentní.
                                Pro zlepšení doporučuji důkladně strukturovat obsah, přidat konkrétní příklady a statistiky pro podporu prezentovaných názorů a provést důkladnou jazykovou revizi pro odstranění gramatických chyb.
                            </p>
                        </div>
                        <div class="message__footer">
                            <p>Děkuji za pochopení</p>
                            <div class="bottom">
                                <div>
                                    <p>S pozdravem</p>
                                    <p class="messeger-name">Vítek</p>
                                </div>
                                <button class="button--success--smaller button--edit--smaller">Upravit hned</button>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
    <script src="../PCS-project/js/messages.js"></script>
</body>
</html>