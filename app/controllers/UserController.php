<?php

namespace App\controllers;

use Core\View;

class UserController
{
    public function showUser(): View
    {
        return View::render('user', [
            'title' => "Uživatel",
        ]);
    }
}
