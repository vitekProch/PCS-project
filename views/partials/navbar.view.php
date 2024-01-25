<header id="navbar" class="nav-background-color">
    <nav class="navbar-container">
        <div class="logo">
            <a href="<?= $GLOBALS['__BASE_PATH__']?>"><img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/logo.png" alt="logo"></a>
        </div>

        <div id="navbar-toggle" class="hamburger navbar-toggler collapsed" aria-expanded="false" aria-controls="navbar-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        </button>
        <div id="navbar-menu" aria-labelledby="navbar-toggle">
            <ul class="navbar-links">
                <li class="navbar-item"><a class="navbar-link" href="<?= $GLOBALS['__BASE_PATH__']?>">Úvod</a></li>
                <li class="navbar-item"><a class="navbar-link" href="<?= $GLOBALS['__BASE_PATH__']?>articles">Články</a></li>
                <?php if(App\Services\Auth::getUser()): ?>
                    <li class="navbar-item">  
                        <div class="user-menu__container">                
                            <div class="user-menu" id="user-menu">
                                <img id="avatar_user_menu" class="avatar" src="<?= $GLOBALS['__BASE_PATH__']?>images/avatars/<?= App\Services\Auth::getUser()['user_avatar'] ?>"></img>
                                <div class="user-menu__user-info">                        
                                    <p class="user-menu__user-name"><?= App\Services\Auth::getUser()['user_name'] ?><span class="user-menu__role"><?= App\Services\Auth::getUser()['user_role'] ?></span></p>  
                                    <div class="email-text"><?= App\Services\Auth::getUser()['user_email'] ?></div>
                                </div>
                            </div>

                            <ul class="user-dropdown" id="user-menu-dropdown">
                                <li class="user-dropdown__separator">
                                    <a class="user-dropdown__item" href="<?= $GLOBALS['__BASE_PATH__']?>user?user_id=<?= App\Services\Auth::getUser()['user_id'] ?>">
                                        <img class="user-dropdown__logo" src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/settings.png" alt="Nastavení">
                                        Nastavení profilu
                                    </a>
                                </li>

                                <?php if (in_array(App\Services\Auth::getUser()['user_role'], App\Services\Auth::ROLES['EDITOR'])): ?>
                                    <li>
                                        <a class="user-dropdown__item" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/to-approve" class="item__group">
                                            <div class="small-notification" id="check-articles-count" current-count="<?= App\Helpers\UserNotification::getToApproveCount(); ?>">
                                                <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/check-broken2.png" alt="Nastavení">
                                            </div>
                                            Schválit
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a class="user-dropdown__item" href="<?= $GLOBALS['__BASE_PATH__']?>articles/user-articles/published" class="item__group">
                                        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/file-edit-02.png" alt="Nastavení">
                                        Moje články
                                    </a>
                                </li>

                                <li>
                                    <a class="user-dropdown__item" href="<?= $GLOBALS['__BASE_PATH__']?>messages" class="item__group">
                                        <div class="small-notification" id="message-count" current-count="<?= App\Helpers\UserNotification::getMessagesCount(); ?>">
                                            <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/message-text-01.png" alt="Nastavení">
                                        </div>  
                                        Zprávy
                                    </a>
                                </li>

                                <li class="user-dropdown__relative-position">
                                    <a class="user-dropdown__item logout user-dropdown__separator" href="<?= $GLOBALS['__BASE_PATH__']?>logout" class="item__group user-dropdown__separator">
                                        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/sign-out.png" alt="Nastavení">
                                        Odhlásit se
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="navbar-item"><button onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?>login'" class="button--success">Přihlásit se</button></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>