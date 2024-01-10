<?php

namespace App\Models;

use Core\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $denyArticles = 0;
    protected $publishedArticles = 1;
    protected $toCheckArticles = 2;


    public function getAllPublishedArticles(): array
    {
        return $this->database->query("SELECT * FROM $this->table where article_status = $this->publishedArticles");
    }

    public function getUserArticlesByStatus(int $userId, int $status): array
    {
        return $this->database->query("SELECT * FROM $this->table where user_id = $userId AND article_status = $status");
    }

    public function getAllArticlesToApprove(): array
    {

        return $this->database->query("SELECT * FROM $this->table where article_status = $this->toCheckArticles");
    }

    public function getToApproveCount()
    {
        return $this->database->query("SELECT COUNT(id) AS to_approve_count FROM $this->table where article_status = $this->toCheckArticles");
    }

    public function createArticle($values)
    {
        return $this->database->query("INSERT INTO $this->table (title, subtitle, article_image, article_content, user_id, article_status) VALUES (?, ?, ?, ?, 1, 2)", $values);
    }
}
