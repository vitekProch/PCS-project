<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Message;
use App\Services\Auth;
use Core\View;

class MessagesController
{
    protected Article $article;
    protected Message $message;

    public function __construct()
    {
        $this->article = new Article();
        $this->message = new Message();
    }

    public function showMessages(): View
    {
        $userId = Auth::getUser()['user_id'];
        $articleId = $_GET['article_id'] ?? null;
        
        if ($articleId) {
            $messagesForArticle = $this->message->getUserMessagesForArticle($userId, $articleId);
            $this->message->messageIsOpen($userId, $articleId);
        }

        return View::render('messages', [
            'title' => "Zprávy",
            'messagesForArticle' => $messagesForArticle ?? NULL,
            'allUserMessages' => $this->message->getAllUserMessages($userId),
        ]);
    }
}
