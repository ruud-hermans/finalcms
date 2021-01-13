<?php

namespace App\Middleware;

use App\Libraries\View;

class WhenLoggedIn
{

    /**
     * Check if a user is logged in by checking the session
     * If user is logged in then redirect to admin page
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
        if ($this->isLoggedIn) {
            View::redirect('admin');
        }
    }

}