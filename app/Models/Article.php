<?php

namespace App\Models;

use Core\Model;
use PDOStatement;

class Article extends Model
{
    protected $table = 'articles';

    protected $denyArticles = 0;
    protected $publishedArticles = 1;
    protected $toCheckArticles = 2;


    public function getAllPublishedArticles(): array
    {
        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table
            WHERE 
                article_status = $this->publishedArticles
        ");
    }

    public function getUserArticlesByStatus(int $userId, int $status, int $limit, int $offset): array
    {
        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table
            WHERE 
                user_id = $userId 
            AND 
                article_status = $status
            ORDER BY 
                created_at DESC
            LIMIT $limit
            OFFSET $offset
        ");
    }

    public function getAllArticlesToApprove(int $limit, int $offset): array
    {

        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table
            WHERE 
                article_status = $this->toCheckArticles
            ORDER BY 
                created_at DESC
            LIMIT $limit
            OFFSET $offset
        ");
    }

    public function createArticle(
        int $userId, 
        string $title, 
        string $subtitle, 
        string $article_content, 
        string $article_image): PDOStatement
    {
        return $this->database->query("
            INSERT INTO 
                $this->table (
                    user_id,
                    title, 
                    subtitle, 
                    article_content, 
                    article_image,
                    article_status
                ) 
            VALUES (?, ?, ?, ?, ?, 2)", [$userId, $title, $subtitle, $article_content, $article_image]
        );
    }

    public function editArticle(int $id, string $title, string $subtitle, string $article_content, string $article_image): array
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                title = '$title',
                subtitle = '$subtitle', 
                article_content = '$article_content', 
                article_image = '$article_image', 
                article_status = 2 
            WHERE 
                id = $id
        ");
    }

    public function deleteArticle(int $article_id): array
    {
        return $this->database->query("
            DELETE 
            FROM 
                $this->table 
            WHERE 
                id = $article_id
        ");
    }

    public function setArticleStatus(int $articleId, int $articleStatus): array
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                article_status = '$articleStatus' 
            WHERE 
                id = $articleId
        ");
    }

    public function getUsersArticlesCount(int $userId): array
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS users_articles_count 
            FROM 
                $this->table 
            WHERE 
                user_id = $userId 
            AND 
                article_status = 1
        ");
    }

    public function getAllPublicArticles(int $limit, int $offset): array
    {
        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table
            WHERE
                article_status = 1
            ORDER BY 
                created_at DESC
            LIMIT $limit
            OFFSET $offset
        ");
    }

    public function getUserArticlesByStatusCount(int $articleStatus, int $userId): array
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS articles_count 
            FROM 
                $this->table 
            WHERE
                article_status = $articleStatus
            AND
                user_id = $userId
        ");
    }

    public function getArticlesByStatusCount(int $articleStatus): array
    {
        return $this->database->query("
            SELECT 
                COUNT(id) AS articles_count 
            FROM 
                $this->table 
            WHERE 
                article_status = $articleStatus
        ");
    }

    public function getArticleByLimit(int $limit): array
    {
        return $this->database->query("
            SELECT 
                *
            FROM 
                $this->table 
            LIMIT $limit
        ");
    }
}
