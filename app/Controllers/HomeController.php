<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Models\UserModel;
class HomeController {

    public function index()
    {
        return View::render('site/home.view');
    }

}