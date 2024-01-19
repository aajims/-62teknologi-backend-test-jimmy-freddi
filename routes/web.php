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
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/business', 'BusinessController@list');
$router->get('/business/search', 'BusinessController@search');
$router->post('/business', 'BusinessController@store');
$router->get('/business/{id}', 'BusinessController@detail');
$router->put('/business/{id}', 'BusinessController@update');
$router->delete('/business/{id}', 'BusinessController@delete');

$router->get('/categorie', 'CategorieController@list');
$router->post('/categorie', 'CategorieController@store');
$router->get('/categorie/{id:[0-9]+}', 'CategorieController@detail');
$router->put('/categorie/{id:[0-9]+}', 'CategorieController@update');
