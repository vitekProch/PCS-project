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

        if (!$articleId) {
            echo "ERROR článek nenalezen";
            //return View::render('error', ['message' => 'Článek nenalezen']);
        }
        $likeStatus = null;
        $article = $this->article->find($articleId)[0];
        $articleAuthor = $this->user->find($article["user_id"]);
        $articleComments= $this->comment->getArticleComments($article["id"]);
        $articleLikesCount = $this->like->getArticleLikeCount($articleId)[0]['article_like_count'];
    
        if (Auth::getUser()) {
            $userId = Auth::getUser()['user_id'];
            $likeStatus = $this->like->getLikeStatus($userId, $articleId)[0] ?? null;
        }
        
        return View::render('article-detail', [
            'title' => $article['title'],
            'article' => $article,
            'likeStatus' => $likeStatus, 
            'articleLikesCount' => $articleLikesCount,
            'articleAuthor' => $articleAuthor[0],
            'articleComments' => $articleComments,
            'error'=> Errors::errorMessage($error),
        ]);
    }



    public function changeUserArticleLikeStatus(array $data)
    {
        $userId = Auth::getUser()['user_id'];
        $articleId = $data['article_id'];
        $articleStatusId = $data['like_status_id'];
        $articleStatus = $data['like_status'];

        if($articleStatusId > 0) {
            $this->like->editLikeArticle($articleStatusId, !boolval($articleStatus));
            return header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
        }

        $this->like->createLikeArticle($data['article_id'], $userId);
        return header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
    }

    public function addComentToArticle($data)
    {
        $articleId = $data["article_id"];
        $userId = Auth::getUser()['user_id'];

        if (empty($data['comment_content'])) {
            return header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId&error=input_empty#add_comment_header");
        }
        echo "cus";

        $this->comment->createComment($userId, $articleId, $data['comment_content']);
        return header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId");
    }

    public function acceptArticle()
    {
        $articleId = $_GET['article_id'] ?? null;
        $this->article->setArticleStatus($articleId, 1);
        return header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles/user-articles/to-approve');
    }

    public function denyArticle($data)
    {
        $userId = Auth::getUser()['user_id'];
        $articleId = $data["article_id"];

        if (empty($data['message'])) {
            return header('location: ' . $GLOBALS['__BASE_PATH__'] . "article-detail?article_id=$articleId&error=input_empty");
        }

        $this->message->createMessage($userId, $articleId, $data["message"]);
        $this->article->setArticleStatus($articleId, 0);
        return header('location: ' . $GLOBALS['__BASE_PATH__'] . 'articles/user-articles/to-approve');
    }
}
