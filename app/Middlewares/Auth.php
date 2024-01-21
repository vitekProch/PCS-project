<?php

namespace App\Middlewares;

use App\Services\Auth as ServicesAuth;

class Auth
{
    public function auth($role)
    {
        $userRole = ServicesAuth::getUser()['user_role'];

        if (!ServicesAuth::getUser()) {
            return ['success' => false, 'redirect' => $GLOBALS['__BASE_PATH__'] .'login?error=sign_in_first'];
        }

        if (!in_array($userRole, ServicesAuth::ROLES[$role])) {
            return ['success' => false, 'redirect' => $GLOBALS['__BASE_PATH__'] .'login?error=acces_deny'];
        }

        return ['success' => true];
    }
}

