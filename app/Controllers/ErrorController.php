<?php

namespace App\Controllers;

use App\Libraries\View;

class ErrorController
{

    public function error403()
    {
        View::render('errors/403.view');
    }
    
}