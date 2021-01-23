<?php

/** --------------------------------------------------------------------------------------------------------
 * Add your routes here.
 * At this point, variables in a route are not supported like in Laravel: user/{user_id}/edit
 *  I add this in a future version.
 * 
 * Protect your routes with one ore more Middleware classes, like WhenNotLoggedIn or Permissions.
 *  See the classes for more information.
 * Add Middleware in an associative array with a key, like the admin route
 * ---------------------------------------------------------------------------------------------------------
*/

use App\Middleware\WhenNotLoggedin;
use App\Middleware\WhenLoggedin;
use App\Middleware\Permissions;

$router->get('admin', 'app/Controllers/AdminController.php@index', [
    'auth' => WhenNotLoggedin::class,
]);

$router->get('user', 'app/Controllers/UserController.php@index', [
    'show' => Permissions::class
]);

$router->get('user/edit', 'app/Controllers/UserController.php@edit', [
    'update' => Permissions::class
]);

$router->post('user/update', 'app/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

$router->post('user/store', 'app/Controllers/UserController.php@store', [
    'store' => Permissions::class
]);

$router->get('user2', 'app/Controllers/User2Controller.php@index');


$router->get('me', 'app/Controllers/ProfileController.php@index');
$router->get('artists', 'app/Controllers/ArtistController.php@index');
$router->get('artists/detail', 'app/Controllers/ArtistController.php@show');

$router->get('', 'app/Controllers/HomeController.php@index');
$router->get('home', 'app/Controllers/HomeController.php');

$router->get('login', 'app/Controllers/LoginController.php@index');
$router->get('logout', 'app/Controllers/LoginController.php@logout');
$router->post('login/auth', 'app/Controllers/LoginController.php@login');

$router->get('contact', 'app/Controllers/ContactController.php@index');

$router->get('register', 'app/Controllers/RegisterController.php@index');
$router->post('register', 'app/Controllers/RegisterController.php@store');

// $router->get('register', 'app/Controllers/User2Controller.php@index');