<?php

use App\Services\Auth;

 Core\View::render('partials/header', ['title' => $title]) ?>
<body>
    <?php Core\View::render('partials/navbar') ?>
    <main class="main-class">
        <?php if(isset($error)) { echo '<div class="alert">' . $error . '</div>'; } ?>
        <div class="container container--center">
            <div class="user-info__container">
                <img id="user_page_avatar" class="user-info__avatar avatar" src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?= $userData['avatar']; ?>" alt="">
                <h2 class="user-info__user-name"><?= $userData['name']; ?></h2>
                <p class="user-info__email"><?= $userData['email']; ?></p>
                <p class="user-menu__role"><?= $userData['role']; ?></p>
                <div class="user-info__propeties">
                    <div class="user-info__propeties-box">
                        <div id="article-likes" class="user-info__amount"><?= $userLikesCount ?></div>
                        <div class="user-info__text">Udělené palce</div>
                    </div>
                    <div class="user-info__propeties-box">
                        <div id="article-writes" class="user-info__amount"><?= $userArticlesCount ?></div>
                        <div class="user-info__text">Příspěvky</div>
                    </div>
                    <div class="user-info__propeties-box">
                        <div id="comments-writes" class="user-info__amount"><?= $usersCommentsCount ?></div>
                        <div class="user-info__text">Komentáře</div>
                    </div>
                </div>
            </div>
            <?php if (Auth::getUser() && Auth::getUser()['user_id'] == $_GET['user_id']): ?>
            <div id="user-edit-form">
                <div class="form">
                    <div class="form__input-group">
                    <?php foreach ($inputFields as $field): ?>
                            <form action="<?= $GLOBALS['__BASE_PATH__']?>user/settings-edit" class="input-icons" method="POST">
                                <i onclick="showUserEditButtons(this)" class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/edit-pen.png" alt="" class="form-icon edit"></i>
                                <i onclick="hideUserEditButtons(this)" class="icon"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/cross.png" alt="" class="form-icon cross"></i>
                                <button class="button--style-less" type="submit">
                                    <i onclick="hideUserEditButtons(this)" class="icon">
                                    <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/accept.png" alt="" class="form-icon accept">
                                    </i>
                                </button>
                                <input placeholder="<?= $field['placeholder'] ?>" readonly  class="input-field" type="<?= $field['type'] ?>" name="<?= $field['name'] ?>" value="<?= $field['value'] ?>">
                            </form>
                    <?php endforeach; ?>
                        <div class="avatar__input">
                            <h5 class="avatar__header">Změňte si svého Avatara</h5>
                            <div class="avatar__group" id="avatar-selection">
                                <?php
                                $avatarImages = ['avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png'];

                                foreach ($avatarImages as $index => $avatarImage) {
                                    $isActive = Auth::getUser()['user_avatar'] === $avatarImage ? "active" : "";
                                    $inputId = "avatar-create-" . ($index + 1);
                                ?>
                                    <input class="radio_avatar" type="radio" value="<?= $avatarImage ?>" name="avatar" id="<?= $inputId ?>" <?= $index === 0 ? "checked" : "" ?>>
                                    <label for="<?= $inputId ?>"><img class="avatar__image avatar <?= $isActive ?>" src="<?= $GLOBALS['__BASE_PATH__'] ?>images/avatars/<?= $avatarImage ?>" alt=""></label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>
    <?php Core\View::render('partials/footer') ?>
   <?php Core\View::render('partials/main-scripts') ?>
   <script src="<?= $GLOBALS['__BASE_PATH__'] ?>js/avatarSelection.js"></script>
</body>
</html>