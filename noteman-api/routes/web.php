<?php

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

$router->get('/notes',          [ 'middleware' => ['auth', 'cors'], 'uses' => 'NotesController@index' ]);
$router->post('/notes',         [ 'middleware' => ['auth', 'cors'], 'uses' => 'NotesController@store' ]);
$router->delete('/notes/{id}',  [ 'middleware' => ['auth', 'cors'], 'uses' => 'NotesController@destroy' ]);
$router->patch('/notes/{id}',    [ 'middleware' => ['auth', 'cors'], 'uses' => 'NotesController@update']);

$router->post('/login', [ 'middleware' => 'cors', 'uses' => 'AuthController@store' ]);