<?php

Route::get('user', 'UserController@index');

Route::get('ticket', [
    'as'   => 'ticket',
    'uses' => 'TicketController@index',
]);
Route::post('ticket', 'TicketController@store');

Route::post('ticket/{ticket}', [
    'as'         => 'ticket.redeem',
    'middleware' => ['user.ticket', 'ticket.redeemed'],
    'uses'       => 'TicketController@redeem',
]);
