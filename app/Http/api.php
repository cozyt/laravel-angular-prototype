<?php

Route::get('user', 'UserController@index');

Route::get('ticket', 'TicketController@index');
Route::post('ticket', 'TicketController@store');

Route::get('ticket/{ticket}', [
    'middleware' => ['user.ticket', 'ticket.redeemed'],
    'uses' => 'TicketController@redeem',
]);
