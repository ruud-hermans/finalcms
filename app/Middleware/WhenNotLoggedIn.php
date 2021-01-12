<?php

namespace App\Middleware;

use App\Libraries\View;

class WhenNotLoggedin
{

    private $isLoggedIn = false;

    public function __construct()
    {
        $this->isLoggedIn = isset($_SESSION) && isset($_SESSION['user']);

        $this->redirect();
    }

    private function redirect()
    {
        if (!$this->isLoggedIn) {
            View::redirect('login');
        }
    }
}