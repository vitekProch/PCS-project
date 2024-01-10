<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <main class="form-center">
        <form action="" class="form">
            <h1 class="form__headline">Registrace</h1>
            <div class="form__input-group">
                <div class="input-icons">
                    <i class="icon"><img src="../images/icons/user-name.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="text" name="user-name" placeholder="Uživatelské jméno">
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../images/icons/email.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="email" name="email" placeholder="Email">
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../images/icons/unlocked-lock.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="password" name="password" placeholder="Heslo">
                </div>
                <div class="input-icons textarea">
                    <i class="icon"><img src="../images/icons/text.png" alt="" class="form-icon"></i>
                    <textarea name="textArea" id="textArea" cols="20" rows="2" placeholder="Text"></textarea>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../images/icons/upload.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="file" name="article-image" title="Obrázek k článku">
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../images/icons/lock.png" alt="" class="form-icon"></i>
                    <input class="input-field input--error" type="password" name="check-password" placeholder="Potvrdit heslo">
                    <p class="form__error-message">Hesla se neschodují</p>
                </div>
                <div class="avatar__input">
                    <h5 class="avatar__header">Vyberte si svého Avatara</h5>
                    <div class="avatar__group">
                        <input type="radio" name="avatar" id="1">
                        <input type="radio" name="avatar" id="2">
                        <input type="radio" name="avatar" id="3">
                        <input type="radio" name="avatar" id="4">
                        <label for="1"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="2"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="3"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="4"><img src="../images/icons/avatar.png" alt=""></label>
                    </div>
                    <div class="avatar__group">
                        <input type="radio" name="avatar" id="5">
                        <input type="radio" name="avatar" id="6">
                        <input type="radio" name="avatar" id="7">
                        <input type="radio" name="avatar" id="8">
                        <label for="5"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="6"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="7"><img src="../images/icons/avatar.png" alt=""></label>
                        <label for="8"><img src="../images/icons/avatar.png" alt=""></label>
                    </div>
                </div>
            </div>
            <button class="button-form--success" type="submit">Vytvořit účet</button>
            <div class="form__footer">
                <p class="form__footer-text">Již máte účet? <a class="form__footer-link" href="/PCS2023/TodoApp/views/login.html">Přihlaste se</a></p>
            </div>
        </form>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>
</html>