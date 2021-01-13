<?php

namespace App\Middleware;

use App\Libraries\View;

class WhenNotLoggedin
{

    /**
     * Check if a user is NOT logged in by checking the session
     * If user is not logged in then redirect to login page
     */

    private $isLoggedIn = false;

    public function __construct()
    {
        $this->isLoggedIn = isset($_SESSION) && isset($_SESSION['user']);
        
        $this->redirect();
    }

    /**
     * Redirect to route
     */
    private function redirect()
    {
        if (!$this->isLoggedIn) {
            View::redirect('login');
        }
    }
}