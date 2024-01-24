<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Message;
use App\Models\User;
use App\Services\Auth;
use Core\View;
use App\Services\Errors;

class ArticleDetailController
{
    protected Article $article;
    protected Like $like;
    protected User $user;
    protected Comment $comment;
    protected Message $message;

    public function __construct()
    {
        $this->article = new Article();
        $this->user = new User();
        $this->like = new Like();
        $this->comment = new Comment();
        $this->message = new Message();
    }

    public function showArticleDetail(): View
    {
        $articleId = $_GET['article_id'] ?? null;
        $error = $_GET['error'] ?? null;
        $article = $this->article->find($articleId)[0];
        
        if (!$articleId) {
            return View::render('error-page', [
                'title' => 'Page not found 404',
            ]);
        }
    
        if (Auth::getUser()) {
            $likeStatus = $this->like->getLikeStatus(Auth::getUser()['user_id'], $articleId)[0] ?? null;
        }
        
        return View::render('article-detail', [
            'title' => $article['title'],
            'article' => $article,
            'likeStatus' => $likeStatus ?? NULL, 
            'articleLikesCount' => $this->like->getArticleLikeCount($articleId)[0]['article_like_count'],
            'articleAuthor' => $this->user->find($article["user_id"])[0],
            'articleComments' => $this->comment->getArticleComments($article["id"]),
            'error'=> Errors::errorMessage($error),
        ]);
    }

    public function changeUserArticleLikeStatus(array $data): void
    {
        $userId = Auth::getUser()['user_id'];
        $articleId = $data['article_id'];
        $articleStatusId = $data['like_status_id'];
        $articleStatus = $data['like_status'];

        if($articleStatusId > 0) {
            $this->like->editLikeArticle($articleStatusId, !boolval($articleStatus));
            header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
            exit;
        }

        $this->like->createLikeArticle($data['article_id'], $userId);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
    }

    public function addComentToArticle(array $data): void
    {
        $articleId = $data["article_id"];
        $userId = Auth::getUser()['user_id'];

        if (empty($data['comment_content'])) {
            header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId&error=input_empty#add_comment_header");
            exit;
        }

        $this->comment->createComment($userId, $articleId, $data['comment_content']);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
    }

    public function acceptArticle(): void
    {
        $articleId = $_GET['article_id'] ?? null;
        $this->article->setArticleStatus($articleId, 1);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles/user-articles/to-approve');
    }

    public function denyArticle(array $data): void
    {
        $userId = Auth::getUser()['user_id'];
        $articleId = $data["article_id"];

        if (empty($data['message'])) {
            header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId&error=input_empty");
            exit;
        }

        $this->message->createMessage($userId, $articleId, $data["message"]);
        $this->article->setArticleStatus($articleId, 0);
        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles/user-articles/to-approve');
    }
}
