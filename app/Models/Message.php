<?php

namespace App\Models;

use Core\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function getMessagesCount(int $id)
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS messages_count 
            FROM 
                $this->table 
            WHERE 
                user_id = $id 
            AND 
                message_open = false
        ");
    }

    public function createMessage(int $userId, int $articleId, string $messageContent)
    {
        return $this->database->query("
            INSERT INTO 
                $this->table (
                    user_id, 
                    article_id, 
                    message_content, 
                    message_open
                ) 
            VALUES ($userId, $articleId, '$messageContent', 0)
        ");
    }

    public function getUserMessagesForArticle(int $userId, $articleId)
    {
        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table 
            WHERE 
                user_id = $userId 
            AND 
                article_id = $articleId 
            ORDER BY 
                created_at DESC
        ");
    }

    public function messageIsOpen(int $userid, int $articleId)
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                message_open = 1 
            WHERE 
                user_id = $userid 
            AND 
                article_id = $articleId
        ");
    }

    public function getAllUserMessages(int $userId)
    {
        return $this->database->query("
            SELECT 
                sender_user.id AS reviewing_person_id,
                sender_user.name AS reviewing_person,
                sender_user.email AS reviewing_person_email,
                sender_user.avatar AS reviewing_person_avatar,
                sender_user.role AS reviewing_person_role,
                messages.message_open,
                messages.article_id,
                user_article.title,
                user_article.article_image
            FROM 
                `messages` 
            INNER JOIN 
                `articles` AS user_article ON messages.article_id = user_article.id 
            INNER JOIN 
                `users` AS sender_user ON messages.user_id = sender_user.id 
            WHERE 
                sender_user.id = $userId
            ORDER BY 
                messages.created_at DESC;
        ");
    }
}
