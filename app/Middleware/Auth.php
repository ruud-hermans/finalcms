<?php

namespace App\Middleware;

class Auth
{

    public $isLoggedIn = false;

    public function __construct()
    {
        $this->isLoggedIn = isset($_SESSION) && isset($_SESSION['user']);

        $this->redirect();
    }

    private function redirect()
    {
        if (!$this->isLoggedIn) {
            header('location: login');
        }
    }
}