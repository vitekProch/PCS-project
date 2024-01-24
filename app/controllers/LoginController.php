<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use App\Services\Errors;
use Core\View;

class LoginController
{
    protected User $user;


    public function __construct()
    {
        $this->user = new User();
    }

    public function showLogin(): View
    {
        $error = $_GET['error'] ?? null;

        return View::render('login', [
            'title' => "Přihlášení",
            'error'=> Errors::errorMessage($error),
        ]);
    }

    public function loginUser(array $data): void
    {
        $user = $this->user->exist($data['email'])[0];
        
        if(password_verify($data['password'], $user['password'] )) {
            Auth::login($user['id'], $user['name'], $user['email'], $user['avatar'], $user['role']);
            header('location: ' . $GLOBALS['__BASE_PATH__']);
            exit;
        }

        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'login?error=wrong_credentials');
    }

    public function logoutUser(): void
    {
        Auth::logout();
        header('location: ' . $GLOBALS['__BASE_PATH__']);
    }
}
