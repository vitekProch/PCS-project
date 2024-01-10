<?php

use App\controllers\ArticleDetailController;
use App\controllers\ArticlesController;
use App\controllers\HomepageController;
use App\controllers\LoginController;
use App\controllers\MessagesController;
use App\controllers\RegisterController;
use App\controllers\UserController;
use Core\Router;

$router = new Router();

//defince cest

$router->get("/projekty/PCS2023/PCS-project/", HomepageController::class, 'index');

$router->get("/projekty/PCS2023/PCS-project/register", RegisterController::class, 'showRegister');
$router->post("/projekty/PCS2023/PCS-project/register", RegisterController::class, 'registerUser');

$router->get("/projekty/PCS2023/PCS-project/login", LoginController::class, 'showLogin');
$router->post("/projekty/PCS2023/PCS-project/login", LoginController::class, 'loginUser');

$router->get("/projekty/PCS2023/PCS-project/articles", ArticlesController::class, 'showAllArticles');

$router->get("/projekty/PCS2023/PCS-project/articles/user-articles/published", ArticlesController::class, 'showUserPublishedArticles');
$router->get("/projekty/PCS2023/PCS-project/articles/user-articles/deny", ArticlesController::class, 'showUserDenyArticles');
$router->get("/projekty/PCS2023/PCS-project/articles/user-articles/to-check", ArticlesController::class, 'showUserToCheckdArticles');
$router->get("/projekty/PCS2023/PCS-project/articles/user-articles/to-approve", ArticlesController::class, 'showUsersToApproveArticles');

$router->get("/projekty/PCS2023/PCS-project/articles/delete", ArticlesController::class, 'deleteArticle');
$router->post("/projekty/PCS2023/PCS-project/articles", ArticlesController::class, 'createArticle');
$router->post("/projekty/PCS2023/PCS-project/articles/edit", ArticlesController::class, 'editArticle');

$router->get("/projekty/PCS2023/PCS-project/article-detail", ArticleDetailController::class, 'showArticleDetail');

$router->get("/projekty/PCS2023/PCS-project/user", UserController::class, 'showUser');

$router->get("/projekty/PCS2023/PCS-project/messages", MessagesController::class, 'showMessages');




//zjištění na jaké adrese 
$currentUrl = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];
$currentUrl = parse_url($currentUrl)['path'];


//spusť metodu pro tuto URL na konkrétním kontroleru
$router->dispatch($currentUrl);
