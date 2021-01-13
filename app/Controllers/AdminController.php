<?php

namespace App\Controllers;

use App\Libraries\View;

class AdminController
{

    public function index()
    {
        return View::render('admin/main.view');
    }
}