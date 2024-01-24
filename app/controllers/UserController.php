<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use App\Services\Auth;
use Core\View;
use App\Services\Errors;
use Exception;

class UserController
{
    protected User $user;
    protected Like $like;
    protected Comment $comment;
    protected Article $article;
    
    public function __construct()
    {
        $this->user = new User();
        $this->like = new Like();
        $this->comment = new Comment();
        $this->article = new Article();
    }
    
    public function showUser(): View
    {
        $error = $_GET['error'] ?? null;
        $userId = $_GET['user_id'] ?? null;
        $userData = $this->user->find($userId)[0];

        $inputFields = [
            ['type' => 'text', 'name' => 'name', 'value' => $userData['name'], 'placeholder' => 'Změnit jméno', 'tst' => 'userNameValidation(this)'],
            ['type' => 'email', 'name' => 'email', 'value' => $userData['email'], 'placeholder' => 'Změnit email', 'tst' => 'emailValidation(this)'],
            ['type' => 'text', 'name' => 'password', 'value' => '', 'placeholder' => 'Změnit heslo', 'tst' => '']
        ];

        return View::render('user', [
            'title' => "Uživatel",
            'userData' => $userData,
            'userLikesCount' => $this->like->getUsersLikesCount($userId)[0]['users_likes_count'],
            'userArticlesCount' => $this->article->getUsersArticlesCount($userId)[0]['users_articles_count'],
            'usersCommentsCount' => $this->comment->getUsersCommentsCount($userId)[0]['users_comments_count'],
            'inputFields' => $inputFields,
            'error'=> Errors::errorMessage($error),
        ]);
    }

    public function changeAvatar(): void 
    {
        $this->user->changeAvatar(Auth::getUser()['user_id'], $_POST['avatar_img']);
        $_SESSION['user']['user_avatar'] = $_POST['avatar_img'];
        echo $_POST['avatar_img'];
    }

    function userSettingsEdit(array $data): void
    {
        $userId = Auth::getUser()['user_id'];

        if(!empty($data['email'])) {
            try {
                $this->user->changeUserEmail($data['email'], $userId);
                $_SESSION['user']['user_email'] = $data['email'];
            }
            catch (Exception $e) {
                header('Location: ' . $GLOBALS['__BASE_PATH__'] . 'user?user_id=' . $userId . '&error=user_email_exist');
            }
        }

        if(!empty($data['name'])) {
            $this->user->changeUserName($data['name'], $userId);
            $_SESSION['user']['user_name'] = $data['name'];
        }

        if(!empty($data['password'])) {
            $this->user->changePassword($data['password'], $userId);
        }
        
        header('location: ' . $GLOBALS['__BASE_PATH__'] . 'user?user_id=' . $userId);
    }
}
