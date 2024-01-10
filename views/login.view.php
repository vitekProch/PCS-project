<?php Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="form-center main-class">
        <form action="" class="form">
            <h1 class="form__headline">Přihlášení</h1>
            <div class="form__input-group">
                <div class="input-icons">
                    <i class="icon"><img src="./images/icons/user-name.png" alt="" class="form-icon"></i>
                    <input onchange="userNameValidation(this)" class="input-field" type="text" name="user-name" placeholder="Uživatelské jméno">
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="./images/icons/lock.png" alt="" class="form-icon"></i>
                    <input class="input-field" type="password" name="password" placeholder="Heslo">
                </div>
            </div>
            <button class="button-form--success" type="submit">Přihlásit se</button>
            <div class="form__footer">
                <p class="form__footer-text">Nemáte účet? <a class="form__footer-link" href="/projekty/PCS2023/PCS-project/register">Vytvořte si ho</a></p>
            </div>
        </form>
    </main>

</body>
<?php Core\View::render('partials/footer') ?>
<?php Core\View::render('partials/main-scripts') ?>
</html>