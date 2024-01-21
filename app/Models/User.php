<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function exist(string $email)
    {
        return $this->database->query("
            SELECT 
                * 
            FROM 
                $this->table 
            WHERE 
                email = '$email' 
        ");
    }

    public function registerUser(string $name, string $email, string $password, string $avatar)
    {
        $hashedPassword = $this->passwordHash($password);
        return $this->database->query("
            INSERT INTO 
                $this->table (
                    name, 
                    email, 
                    password, 
                    avatar, 
                    role
                ) 
            VALUES (?, ?, ?, ?, 'USER')", [$name, $email, $hashedPassword, $avatar]
        );
    }

    public function changePassword($password, $userId)
    {
        $hashedPassword = $this->passwordHash($password);
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                password = ? 
            WHERE 
                id = ?", [$hashedPassword, $userId]
        );
        
    }

    public function changeUserName($userName, $userId)
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                name = ? 
            WHERE 
                id = ?", [$userName, $userId]
        );
        
    }

    public function changeUserEmail($email, $userId)
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                email = ? 
            WHERE 
                id = ?", [$email, $userId]
        );
        
    }

    public function changeAvatar($userId, $avatar)
    {
        return $this->database->query("
            UPDATE 
                $this->table 
            SET 
                avatar = ? 
            WHERE 
                id = ?", [$avatar, $userId]
        );
        
    }

    protected function passwordHash(string $password): string 
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $hashedPassword;
    }


}
