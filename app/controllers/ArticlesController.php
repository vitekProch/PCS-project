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

    public function editArticle()
    {
        echo "ERRRRORRR";
    }

    public function createArticle($data)
    {
        if(!$this->articleImageValidation()) {

            $em = "Něco se pokazilo. Zkontrolujte typ, nebo velikost souboru.";
            return header('location: "/projekty/PCS2023/PCS-project/articles?error=$em"');
        };
        $articleImgName = $this->createArticleImgName();
        $this->uploadImg($articleImgName);
        $data['article_image'] = $articleImgName;
        $this->article->createArticle($data);
    }
    


    public function articleImageValidation(): bool
    {
        $imgSize = $_FILES['article_image']['size'];
        $error = $_FILES['article_image']['error'];
        $imgName = $_FILES['article_image']['name'];

        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);    
        $imgExLc = strtolower($imgEx);
		$allowedExs = array("jpg", "jpeg", "png"); 

        if ($error !== 0) {
            return false;
        }

        // if ($imgSize > 125000) {
        //     return false;
        // }

        if (!in_array($imgExLc, $allowedExs)) {
            return false;
        }
        return true;
    }

    public function createArticleImgName(): string
    {
        $imgName = $_FILES['article_image']['name'];
        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);    
        $imgExLc = strtolower($imgEx);
        $newImgName = uniqid("IMG-", true).'.'.$imgExLc;

        return $newImgName;
    }

    public function uploadImg(string $imgName): void
    {
        $imgTmpName = $_FILES['article_image']['tmp_name'];
        $img_upload_path = $_SERVER['DOCUMENT_ROOT'] . '/projekty/PCS2023/PCS-project/images/uploads/articles/' . $imgName;
        move_uploaded_file($imgTmpName, $img_upload_path);
    }
}
