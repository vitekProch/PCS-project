<?php

namespace App\controllers;

use App\Models\Article;
use Core\View;

class ArticlesController
{
    const DENY_ARTICLES = 0;
    const PUBLISHED_ARTICLES = 1;
    const TO_CHECK_ARTICLES = 2;

    protected Article $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    public function showAllArticles(): View
    {
        return View::render('articles', [
            'title' => "Všecičky články",
            'articles' => $this->article->getAllPublishedArticles(),
            'articleStatus' => "all",
        ]);
    }
    
    public function showUserPublishedArticles(): View
    {
        $userId = 1;
        return View::render('articles', [
            'title' => "Publikované články",
            'articles' => $this->article->getUserArticlesByStatus($userId, self::PUBLISHED_ARTICLES),
            'articleStatus' => self::PUBLISHED_ARTICLES,
        ]);
    }

    public function showUserDenyArticles(): View
    {
        $userId = 1;
        return View::render('articles', [
            'title' => "Zamítnuté články",
            'articles' => $this->article->getUserArticlesByStatus($userId, self::DENY_ARTICLES),
            'articleStatus' => self::DENY_ARTICLES,
        ]);
    }

    public function showUserToCheckdArticles(): View
    {
        $userId = 1;
        return View::render('articles', [
            'title' => "Kontrolované články",
            'articles' => $this->article->getUserArticlesByStatus($userId, self::TO_CHECK_ARTICLES),
            'articleStatus' => self::TO_CHECK_ARTICLES,
        ]);
    }

    public function showUsersToApproveArticles(): View
    {
        return View::render('articles', [
            'title' => "Kontrolované články",
            'articles' => $this->article->getAllArticlesToApprove(),
            'articleStatus' => "checkInProgress",
        ]);
    }

    public function deleteArticle()
    {
        echo "CHELLO ROMAN";
        //return header('location: /projekty/PCS2023/PCS-project/articles');
    }

    public function createArticle($data)
    {
        echo "<prispre>";
            print_r($_FILES['article_image']);
        echo "</prispre>";
        $imgName = $_FILES['article_image']['name'];
        $imgSize = $_FILES['article_image']['size'];
        $imgTmpName = $_FILES['article_image']['tmp_name'];
        $error = $_FILES['article_image']['error'];

        if ($error !== 0) {
            $em = "Něco se pokazilo";
            return header('location: "/projekty/PCS2023/PCS-project/articles?error=$em"');
        }
        if ($imgSize > 125000) {
            $em = "Bohužel váš obrázek je moc velký";
            return header('location: "/projekty/PCS2023/PCS-project/articles?error=$em"');
        }
        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);    
        $imgExLc = strtolower($imgEx);
		$allowedExs = array("jpg", "jpeg", "png"); 
        if (!in_array($imgExLc, $allowedExs)) {
            $em = "Špatný typ souboru.";
            header("Location: index.php?error=$em");
        }
        $new_img_name = uniqid("IMG-", true).'.'.$imgExLc;
        $img_upload_path = $_SERVER['DOCUMENT_ROOT'] . '/PCS-project/images/uploads/articles';
        if (!file_exists(dirname($img_upload_path))) {
            mkdir(dirname("TEST"), 0777, true);
        }
        move_uploaded_file($imgTmpName, $img_upload_path);

        echo $img_upload_path;
        //$this->article->createArticle($data);
    }
    
    public function editArticle()
    {
        echo "ERRRRORRR";
    }

}
