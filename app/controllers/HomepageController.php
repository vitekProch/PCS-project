<?php

namespace App\controllers;

use Core\View;

class HomepageController
{
    public function index(): View
    {

        return View::render('homepage', [
            'title' => "ProgBlog",
        ]);
    }
}
