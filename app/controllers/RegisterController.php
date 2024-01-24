<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use App\Services\Errors;
use Core\View;
use Exception;

class RegisterController
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showRegister(): View
    {
        $error = $_GET['error'] ?? null;
        
        return View::render('register', [
            'title' => "Registrace",
            'error'=> Errors::errorMessage($error),
        ]);
    }
    
    public function registerUser(array $data): void
    {
        try {
            $this->user->registerUser($data['user_name'], $data['email'], $data['password'], $data['avatar']);
            $newUser = $this->user->exist($data['email'])[0];
            Auth::login($newUser['id'], $newUser['name'], $newUser['email'], $newUser['avatar'], $newUser['role']);

            header('location: ' . $GLOBALS['__BASE_PATH__']. 'articles');
        }
        catch (Exception $e) {
            header('location: ' . $GLOBALS['__BASE_PATH__'] . 'register?error=user_email_exist');
        }
    }
}
