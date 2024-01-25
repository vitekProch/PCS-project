<?php

use App\Controllers\ArticleDetailController;
use App\Controllers\ArticlesController;
use App\Controllers\HomepageController;
use App\Controllers\LoginController;
use App\Controllers\MessagesController;
use App\Controllers\RegisterController;
use App\Controllers\UserController;
use Core\Router;

$router = new Router();


$router->get($GLOBALS['__BASE_PATH__'], HomepageController::class, 'showHomepage');

$router->get($GLOBALS['__BASE_PATH__'] . "register", RegisterController::class, 'showRegister');
$router->post($GLOBALS['__BASE_PATH__'] . "register", RegisterController::class, 'registerUser');

$router->get($GLOBALS['__BASE_PATH__'] . "login", LoginController::class, 'showLogin');
$router->post($GLOBALS['__BASE_PATH__'] . "login", LoginController::class, 'loginUser');
$router->get($GLOBALS['__BASE_PATH__'] . "logout", LoginController::class, 'logoutUser');

$router->get($GLOBALS['__BASE_PATH__'] . "articles", ArticlesController::class, 'showAllArticles');
$router->post($GLOBALS['__BASE_PATH__'] . "articles", ArticlesController::class, 'createArticle', ["Auth:USER"]);

$router->get($GLOBALS['__BASE_PATH__'] . "articles/delete", ArticlesController::class, 'deleteArticle', ["Auth:USER"]);
$router->post($GLOBALS['__BASE_PATH__'] . "articles/edit", ArticlesController::class, 'editArticle', ["Auth:USER"]);
$router->post($GLOBALS['__BASE_PATH__'] . "articles/fill-edit-article", ArticlesController::  class, 'fillEditArticle');

$router->get($GLOBALS['__BASE_PATH__'] . "articles/user-articles/published", ArticlesController::class, 'showUserPublishedArticles', ["Auth:USER"]);
$router->get($GLOBALS['__BASE_PATH__'] . "articles/user-articles/deny", ArticlesController::class, 'showUserDenyArticles', ["Auth:USER"]);
$router->get($GLOBALS['__BASE_PATH__'] . "articles/user-articles/to-check", ArticlesController::class, 'showUserToCheckArticles', ["Auth:USER"]);
$router->get($GLOBALS['__BASE_PATH__'] . "articles/user-articles/to-approve", ArticlesController::class, 'showUsersToApproveArticles', ["Auth:EDITOR"]);

$router->get($GLOBALS['__BASE_PATH__'] . "article-detail", ArticleDetailController::class, 'showArticleDetail');
$router->post($GLOBALS['__BASE_PATH__'] . "article-detail", ArticleDetailController::class, 'changeUserArticleLikeStatus', ["Auth:USER"]);
$router->post($GLOBALS['__BASE_PATH__'] . "article-detail/comment", ArticleDetailController::class, 'addComentToArticle', ["Auth:USER"]);

$router->get($GLOBALS['__BASE_PATH__'] . "article-detail/approval", ArticleDetailController::class, 'acceptArticle', ["Auth:EDITOR"]);
$router->post($GLOBALS['__BASE_PATH__'] . "article-detail/approval", ArticleDetailController::class, 'denyArticle', ["Auth:EDITOR"]);

$router->get($GLOBALS['__BASE_PATH__'] . "user", UserController::class, 'showUser');
$router->post($GLOBALS['__BASE_PATH__'] . "user/change-avatar", UserController::class, 'changeAvatar');
$router->post($GLOBALS['__BASE_PATH__'] . "user/settings-edit", UserController::class, 'userSettingsEdit');

$router->get($GLOBALS['__BASE_PATH__'] . "messages", MessagesController::class, 'showMessages', ["Auth:USER"]);

$currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
$currentUrl = parse_url($currentUrl)['path'];

$router->dispatch($currentUrl);
