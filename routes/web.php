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

$router->get('hotels[/{id}]', 'HotelController@show');
$router->post('hotels', 'HotelController@store');
$router->delete('hotels/{id}', 'HotelController@destroy');
