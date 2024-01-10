<?php

namespace App\controllers;

use Core\View;

class LoginController
{
    public function showLogin(): View
    {
        return View::render('login', [
            'title' => "Přihlášení",
        ]);
    }

    public function loginUser()
    {
        
    }
}
