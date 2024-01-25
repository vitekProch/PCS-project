<?php

namespace App\Models;

use Core\Model;
use PDOStatement;

class User extends Model
{
    protected $table = 'users';

    public function exist(string $email): array
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

    public function registerUser(string $name, string $email, string $password, string $avatar): array
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

    public function changePassword(string $password, int $userId): PDOStatement
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

    public function changeUserName(string $userName, int $userId): PDOStatement
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

    public function changeUserEmail(string $email, int $userId): PDOStatement
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

    public function changeAvatar(int $userId, string $avatar): PDOStatement
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
