<?php

namespace App\Controllers;
use App\Models\Article;
use Core\View;

class HomepageController
{
    protected Article $article;

    public function __construct()
    {
        $this->article = new Article();
    }

    public function showHomepage(): View
    {
        return View::render('homepage', [
            'title' => "ProgBlog",
            'articles' => $this->article->getArticleByLimit(3),
        ]);
    }
}
