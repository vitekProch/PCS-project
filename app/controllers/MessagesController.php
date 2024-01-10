<?php

namespace App\controllers;

use Core\View;

class MessagesController
{
    public function showMessages(): View
    {
        return View::render('messages', [
            'title' => "Zprávy",
        ]);
    }
}
