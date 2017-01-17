<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Returns a list of all tickets for the authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $request->user()->tickets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|email|max:255',
        ]);

        try {
            $ticket = $request->user()->tickets();

            $ticket->first_name = $request->first_name;
            $ticket->last_name  = $request->last_name;
            $ticket->email      = $request->email;

            $ticket->save();

            return [
                'message' => 'Ticket created!',
                'data'    => $ticket,
            ];

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Ticket could not be created'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function redeem(Request $request, Ticket $ticket)
    {
        try {
            $ticket->redeemed = true;
            $ticket->save();

            return [
                'message' => 'Ticket redeemed!',
                'data'    => $ticket,
            ];

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Ticket could not be redeem'
            ], 500);
        }
    }

}
