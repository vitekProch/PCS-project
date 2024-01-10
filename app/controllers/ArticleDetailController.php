<?php

namespace App\controllers;

use Core\View;

class ArticleDetailController
{
    public function showArticleDetail(): View
    {
        return View::render('article-detail', [
            'title' => "Article name?",
        ]);
    }
}
