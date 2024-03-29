<?php

namespace App\Controllers;

use App\Models\Article;
use App\Services\Auth;
use App\Helpers\UploadHelper;
use Core\View;
use App\Services\Errors;

class ArticlesController
{
    const DENY_ARTICLES = 0;
    const PUBLISHED_ARTICLES = 1;
    const TO_CHECK_ARTICLES = 2;
    const PAGE_ARTICLE_LIMIT = 10;

    protected Article $article;
    protected UploadHelper $uploadHelper;

    public function __construct()
    {
        $this->article = new Article();
        $this->uploadHelper = new UploadHelper();
    }

    public function showAllArticles(): View
    {
        $error = $_GET['error'] ?? null;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = self::PAGE_ARTICLE_LIMIT * ($page - 1);
        $articleCount = $this->article->getArticlesByStatusCount(self::PUBLISHED_ARTICLES)[0]['articles_count'];

        return View::render('articles', [
            'title' => "Články",
            'articles' => $this->article->getAllPublicArticles(self::PAGE_ARTICLE_LIMIT, $offset),
            'articleStatus' => "all",
            'articleMaxPages' =>  max(ceil($articleCount / self::PAGE_ARTICLE_LIMIT), 1) ,
            'pageUrl' => "articles?page=",
            'error'=> Errors::errorMessage($error),
        ]);
    }
    
    public function showUserPublishedArticles(): View
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = self::PAGE_ARTICLE_LIMIT * ($page - 1);
        $articleCount = $this->article->getUserArticlesByStatusCount(self::PUBLISHED_ARTICLES, Auth::getUser()['user_id'])[0]['articles_count'];
        
        return View::render('articles', [
            'title' => "Publikované články",
            'articles' => $this->article->getUserArticlesByStatus(Auth::getUser()['user_id'], self::PUBLISHED_ARTICLES, self::PAGE_ARTICLE_LIMIT, $offset),
            'articleStatus' => self::PUBLISHED_ARTICLES,
            'articleMaxPages' =>  max(ceil($articleCount / self::PAGE_ARTICLE_LIMIT), 1),
            'pageUrl' => "articles/user-articles/published?page=",
        ]);
    }

    public function showUserDenyArticles(): View
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = self::PAGE_ARTICLE_LIMIT * ($page - 1);
        $articleCount = $this->article->getUserArticlesByStatusCount(self::DENY_ARTICLES, Auth::getUser()['user_id'])[0]['articles_count'];
        
        return View::render('articles', [
            'title' => "Zamítnuté články",
            'articles' => $this->article->getUserArticlesByStatus(Auth::getUser()['user_id'], self::DENY_ARTICLES, self::PAGE_ARTICLE_LIMIT, $offset),
            'articleStatus' => self::DENY_ARTICLES,
            'articleMaxPages' =>  max(ceil($articleCount / self::PAGE_ARTICLE_LIMIT), 1),
            'pageUrl' => "articles/user-articles/deny?page=",
        ]);
    }

    public function showUserToCheckArticles(): View
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = self::PAGE_ARTICLE_LIMIT * ($page - 1);
        $articleCount = $this->article->getUserArticlesByStatusCount(self::TO_CHECK_ARTICLES, Auth::getUser()['user_id'])[0]['articles_count'];
        
        return View::render('articles', [
            'title' => "Kontrolované články",
            'articles' => $this->article->getUserArticlesByStatus(Auth::getUser()['user_id'], self::TO_CHECK_ARTICLES, self::PAGE_ARTICLE_LIMIT, $offset),
            'articleStatus' => self::TO_CHECK_ARTICLES,
            'articleMaxPages' =>  max(ceil($articleCount / self::PAGE_ARTICLE_LIMIT), 1),
            'pageUrl' => "articles/user-articles/to-check?page=",
        ]);
    }

    public function showUsersToApproveArticles(): View
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = self::PAGE_ARTICLE_LIMIT * ($page - 1);
        $articleCount = $this->article->getArticlesByStatusCount(self::TO_CHECK_ARTICLES)[0]['articles_count'];
        
        return View::render('articles', [
            'title' => "Kontrolované články",
            'articles' => $this->article->getAllArticlesToApprove(self::PAGE_ARTICLE_LIMIT, $offset),
            'articleStatus' => "checkInProgress",
            'articleMaxPages' =>  max(ceil($articleCount / self::PAGE_ARTICLE_LIMIT), 1),
            'pageUrl' => "articles/user-articles/to-approve?page=",
        ]);
    }

    public function createArticle(array $data): void
    {
        if (empty($data['title']) || empty($data['subtitle']) || empty($data['article_content'])) {
            header('location: ' . $GLOBALS['__BASE_PATH__'] . "articles?error=input_empty");
            exit;
        }

        if(!$this->uploadHelper->articleImageValidation()) {
            header('location: ' . $GLOBALS['__BASE_PATH__'] . "articles?error=wrong_file");
            exit;
        };

        $articleImgName = $this->uploadHelper->createArticleImgName();
        $data['article_image'] = $articleImgName;
        
        $this->uploadHelper->uploadImg($articleImgName);
        $this->article->createArticle(Auth::getUser()['user_id'], $data['title'], $data['subtitle'], $data['article_content'], $data['article_image']);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles');
    }

    public function fillEditArticle(): void
    {
        $article = $this->article->find($_POST['article_id']);
        echo json_encode($article[0]);
    }

    public function editArticle(array $data): void
    {
        $data['article_image'] = $_FILES['article_image']['name'];

        if ($_FILES['article_image']['size'] !== 12) {
            $articleImgName = $this->uploadHelper->createArticleImgName();
            $this->uploadHelper->uploadImg($articleImgName);
            $data['article_image'] = $articleImgName;
        }
        $this->article->editArticle($data['article_id'], $data['title'], $data['subtitle'], $data['article_content'], $data['article_image']);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles');
    }

    public function deleteArticle(): void
    {
        $this->article->deleteArticle($_GET['article_id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
