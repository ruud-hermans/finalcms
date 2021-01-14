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
use App\Middleware\Permissions;

$router->get('admin', 'App/Controllers/AdminController.php@index', [
    'auth' => WhenNotLoggedin::class
]);

$router->get('user', 'App/Controllers/UserController.php@index', [
    'show' => Permissions::class
]);

$router->get('user/edit', 'App/Controllers/UserController.php@edit', [
    'update' => Permissions::class
]);

$router->post('user/update', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

$router->post('user/store', 'App/Controllers/UserController.php');
$router->get('me', 'App/Controllers/ProfileController.php@index');
$router->get('artists', 'App/Controllers/ArtistController.php@index');
$router->get('artists/detail', 'App/Controllers/ArtistController.php@show');

$router->get('', 'App/Controllers/HomeController.php@index');
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');