<?php Core\View::render('partials/header', ['title' => $title]) ?>

<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="form-center main-class">
        <form action="" class="form">
            <h1 class="form__headline">Registrace</h1>
            <div class="form__input-group">
                <div class="input-icons">
                    <i class="icon"><img src="../PCS-project/images/icons/user-name.png" alt="" class="form-icon"></i>
                    <input onchange="userNameValidation(this)" class="input-field" type="text" name="user-name" placeholder="Uživatelské jméno" required>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../PCS-project/images/icons/email.png" alt="" class="form-icon"></i>
                    <input onchange="emailValidation(this)" class="input-field" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../PCS-project/images/icons/unlocked-lock.png" alt="" class="form-icon"></i>
                    <input onchange="passwordValidation(this)" class="input-field" type="password" name="password" placeholder="Heslo" id="create-password" required>
                </div>
                <div class="input-icons">
                    <i class="icon"><img src="../PCS-project/images/icons/lock.png" alt="" class="form-icon"></i>
                    <input onchange="passwordCheckValidation(this)" class="input-field" type="password" name="check-password" placeholder="Potvrdit heslo" id="check-password" required>
                </div>
                <div class="avatar__input">
                    <h5 class="avatar__header">Vyberte si svého Avatara</h5>
                    <div class="avatar__group" id="avatar-selection">
                        <input type="radio" checked name="avatar" id="avatar-create-1">
                        <input type="radio" name="avatar" id="avatar-create-2">
                        <input type="radio" name="avatar" id="avatar-create-3">
                        <input type="radio" name="avatar" id="avatar-create-4">
                        <label for="avatar-create-1"><img class="avatar__image active" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-2"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-3"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-4"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <input type="radio" name="avatar" id="avatar-create-5">
                        <input type="radio" name="avatar" id="avatar-create-6">
                        <input type="radio" name="avatar" id="avatar-create-7">
                        <input type="radio" name="avatar" id="avatar-create-8">
                        <label for="avatar-create-5"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-6"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-7"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                        <label for="avatar-create-8"><img class="avatar__image" src="../PCS-project/images/icons/avatar.png" alt=""></label>
                    </div>
                </div>
            </div>
            <button class="button-form--success" type="submit">Vytvořit účet</button>
            <div class="form__footer">
                <p class="form__footer-text">Již máte účet? <a class="form__footer-link" href="/projekty/PCS2023/PCS-project/login">Přihlaste se</a></p>
            </div>
        </form>
    </main>
    <?php Core\View::render('partials/footer') ?>
    <?php Core\View::render('partials/main-scripts') ?>
</body>

</html>