<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    // /api/register
    $router->post('auth/register', 'AuthController@register');

    // /api/login
    $router->post('auth/login', 'AuthController@login');

    // /api/users/user-id
    $router->get('users/{id}', 'UserController@getUser');
 
 });
