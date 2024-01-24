<?php

namespace App\Models;

use Core\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function getArticleComments(int $articleId): array
    {
        return $this->database->query("
            SELECT 
                comments.id, 
                comment_content,
                users.id AS comment_author_id,
                users.name AS comment_author, 
                users.email AS comment_author_email, 
                users.avatar AS comment_author_avatar,
                users.role AS comment_author_role
            FROM 
                $this->table 
            INNER JOIN
                users
            ON
                user_id = users.id
            WHERE 
                article_id = $articleId 
            ORDER BY created_at
        ");
    }

    public function createComment(int $userId, int $articleId, string $comment_content): array
    {
        return $this->database->query("
            INSERT INTO $this->table (
                user_id, 
                article_id, 
                comment_content
            ) 
            VALUES ($userId, $articleId, '$comment_content')
        ");
    }

    
    public function getUsersCommentsCount(int $userId): array
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS users_comments_count 
            FROM 
                $this->table 
            WHERE 
                user_id = $userId 
        ");
    }

}