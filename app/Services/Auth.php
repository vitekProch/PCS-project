<?php

namespace App\Services;

class Auth
{
    const ROLES = [
        'ADMIN' => ['ADMIN'],
        'EDITOR' => ['EDITOR', 'ADMIN'],
        'USER' => ['ADMIN', 'EDITOR', 'USER'],
    ];

    public static function getUser(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function login(
        int $user_id, 
        string $user_name, 
        string $user_email, 
        string $user_avatar, 
        string $user_role): void
    {
        $_SESSION['user'] = compact('user_id', 'user_name', 'user_email', 'user_avatar', 'user_role');
    }

    public static function logout(): void
    {
        session_unset();
        session_destroy();
        unset($_COOKIE['user_token']); 
        setcookie('user_token', '', -1, '/');
    }
}
