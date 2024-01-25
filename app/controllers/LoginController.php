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
        $userToken = $_COOKIE['user_token'] ?? null;

        if($userData = $this->user->getUserToken($userToken)) {
            $user = $userData[0];
            Auth::login($user['id'], $user['name'], $user['email'], $user['avatar'], $user['role']);
            header('location: ' . $GLOBALS['__BASE_PATH__']);
            exit;
        }

        return View::render('login', [
            'title' => "Přihlášení",
            'error'=> Errors::errorMessage($error),
        ]);
    }

    public function loginUser(array $data): void
    {
        $user = $this->user->exist($data['email'])[0];

        if(password_verify($data['password'], $user['password'] )) {

            if($data['remember'] === "true") {
                $userToken = bin2hex(random_bytes(16));
                $this->user->setUserToken($user['id'], $userToken);
                setcookie("user_token", $userToken, time() + (86400 * 30), "/");
            }

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
