<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\View;
use App\Libraries\MySql;
use App\Libraries\QueryBuilder;
use Exception;

class UserController extends Controller
{

    public function index()
    {
        // sthrow new Exception('Uncaught Exception');
    }

    public function add()
    {

    }

    /**
     * Store a user record into the database
     */
    public function store()
    {
        dd($_REQUEST);
    }

    public function edit()
    {
        
    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        
    }

    /**
     * Archive a user record into the database
     */
    public function destroy(int $id)
    {

    }

}

