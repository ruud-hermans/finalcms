<?php

namespace App\Middleware;

use App\Helpers\Helper;
use App\Models\UserModel;
use App\Libraries\View;

class Permissions
{

    // Data from Router
    protected $route;

    // Permissions are checked for a user
    protected $user = false;

    // Which CRUD action to check
    protected $crudAction;


    public function __construct($route, $crudString)
    {
        $this->route = $route;
        $this->crudAction = $crudString;
        $this->setUser();

        if (!$this->checkPermission()) {
            return View::render('errors/403.view', [
                'message' => $route . " | " . $crudString
            ]);
        }
    }

    private function checkPermission()
    {
        if (!$this->user) {
            return false;
        }

        $user = new UserModel;

        $userPermissions = $user->permissions();
        
        return in_array($this->crudAction . '_' . $this->route, $userPermissions);
    }

    private function setUser()
    {
        $userId = Helper::getUserIdFromSession();

        if ($userId !== false) {
            $user = new UserModel;
            $this->user = $user->findById($userId);
        }
    }

}