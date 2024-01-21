<?php

namespace App\Services;

class Errors
{    
    const ERROR_MESSAGES = 
    [
        "wrong_credentials" =>" Špatné přihlašovací údaje.",
        "not_email" => "Pro přihlášení musíte použít email.",
        "sign_in_first" => "Nejdříve je nutné se přihlásit.",
        "acces_deny" => "Na toto nemáte oprávnění.",
        "user_exist" => "Uživatel s těmito údaji už v databázi existuje.",
        "unexpected_error" => "Nastala neočekávaná chyba.",
    ];


    public static function errorMessage($error): ?string
    {   
        if (!$error) {
            return null;
        }

        if (!array_key_exists($error, self::ERROR_MESSAGES)) {
            return self::ERROR_MESSAGES["unexpected_error"];
        }
        
        return self::ERROR_MESSAGES[$error];
        
    }

}