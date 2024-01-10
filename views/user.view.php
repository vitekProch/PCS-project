<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <div class="container container--center">
            <div class="user-info__container">
                <img class="user-info__avatar" src="../PCS-project/images/icons/avatar.png" alt="">
                <h2 class="user-info__user-name">Vítek</h2>
                <p class="user-info__email">sardor@mail.com</p>
                <div class="user-info__propeties">
                    <div class="user-info__propeties-box">
                        <div id="article-likes" class="user-info__amount">15</div>
                        <div class="user-info__text">Palce</div>
                    </div>
                    <div class="user-info__propeties-box">
                        <div id="article-writes" class="user-info__amount">5</div>
                        <div class="user-info__text">Příspěvky</div>
                    </div>
                    <div class="user-info__propeties-box">
                        <div id="comments-writes" class="user-info__amount">0</div>
                        <div class="user-info__text">Komentáře</div>
                    </div>
                </div>
            </div>
            <div id="user-edit-form">
                <form action="" class="form">
                    <div class="form__input-group">
                        <div class="input-icons">
                            <i onclick="showUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/edit-pen.png" alt="" class="form-icon edit"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/cross.png" alt="" class="form-icon cross"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/accept.png" alt="" class="form-icon accept"></i>
                            <input readonly required class="input-field" type="text" name="user-name" value="Uživatelské jméno">
                        </div>
                        <div class="input-icons">
                            <i onclick="showUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/edit-pen.png" alt="" class="form-icon edit"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/cross.png" alt="" class="form-icon cross"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/accept.png" alt="" class="form-icon accept"></i>
                            <input readonly required class="input-field" type="email" name="email" value="Email">
                        </div>
                        <div class="input-icons">
                            <i onclick="showUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/edit-pen.png" alt="" class="form-icon edit"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/cross.png" alt="" class="form-icon cross"></i>
                            <i onclick="hideUserEditButtons(this)" class="icon"><img src="../PCS-project/images/icons/accept.png" alt="" class="form-icon accept"></i>
                            <input readonly required class="input-field" type="password" name="password" value="Heslo">
                        </div>
                    
                        <div class="avatar__input">
                            <h5 class="avatar__header">Vyberte si svého Avatara</h5>
                            <div class="avatar__group">
                                <input type="radio" name="avatar" id="avatar-change-1">
                                <input type="radio" name="avatar" id="avatar-change-2">
                                <input type="radio" name="avatar" id="avatar-change-3">
                                <input type="radio" name="avatar" id="avatar-change-4">
                                <label for="avatar-change-1"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-2"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-3"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-4"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                            </div>
                            <div class="avatar__group">
                                <input type="radio" name="avatar" id="avatar-change-5">
                                <input type="radio" name="avatar" id="avatar-change-6">
                                <input type="radio" name="avatar" id="avatar-change-7">
                                <input type="radio" name="avatar" id="avatar-change-8">
                                <label for="avatar-change-5"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-6"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-7"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                                <label for="avatar-change-8"><img src="../PCS-project/images/icons/avatar.png" alt=""></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>