<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Message;

class UserNotification
{
    public static function getToApproveCount(): void
    {
        $article = new Article;
        echo $article->getArticlesByStatusCount(2)[0]['articles_count'];
    }

    public static function getMessagesCount(): void
    {
        $article = new Message;
        echo $article->getMessagesCount(Auth::getUser()['user_id'])[0]['messages_count'];
    }
}
