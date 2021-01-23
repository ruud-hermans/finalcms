<?php

namespace App\Controllers;

use App\Models\User2Model;
use App\Libraries\View;

use Exception;

class User2Controller extends Controller
{

    public function index()
    {
        // sthrow new Exception('Uncaught Exception');
        $users = User2Model::load()->all();
        

        return View::render('admin/main.view', [
            'users' => $users,
            'test' => 'string'
        ]);

    }

}