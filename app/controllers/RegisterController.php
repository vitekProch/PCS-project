<?php

namespace App\controllers;

use Core\View;

class RegisterController
{
    public function showRegister(): View
    {
        return View::render('register', [
            'title' => "Registrace",
        ]);
    }
    
    public function registerUser()
    {

    }
}
