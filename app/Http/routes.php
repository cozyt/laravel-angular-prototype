<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api'], function () {
    Route::get('ticket', 'TicketController@index');
    Route::post('ticket', 'TicketController@store');
    
    Route::get('ticket/{ticket}', 'TicketController@redeem')
        ->middleware(['user.ticket', 'ticket.redeemed']);
});
