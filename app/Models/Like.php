<?php

namespace App\Models;

use Core\Model;

class Like extends Model
{
    protected $table = 'likes';

    public function getLikeStatus(int $userId, int $articleId)
    {
        return $this->database->query("
            SELECT 
                id, 
                liked 
            FROM
                $this->table 
            WHERE 
                user_id = $userId 
            AND 
                article_id = $articleId
        ");
    }

    public function getArticleLikeCount(int $articleId)
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS article_like_count 
            FROM 
                $this->table 
            WHERE 
                article_id = $articleId 
            AND 
                liked = 1
        ");
    }

    public function createLikeArticle(int $articleId, int $userId)
    {
        return $this->database->query("
            INSERT INTO 
                $this->table (
                    article_id, 
                    user_id, 
                    liked
                ) 
            VALUES ($articleId, $userId, 1)
        ");
    }
    
    public function editLikeArticle(int $Id, bool $likeStatus): array
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                liked = '$likeStatus' 
            WHERE 
                id = $Id
        ");
    }

    public function getUsersLikesCount(int $userId): array
    {
        return $this->database->query("
        SELECT 
            COUNT(id) AS users_likes_count 
        FROM 
            $this->table 
        WHERE 
            user_id = $userId 
        AND 
            liked = 1
    ");
    }
}
