<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyTicketRedeemed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route()->getParameter('ticket')->redeemed) {
            return response()->json([
                'message' => 'Ticket has already been redeemed'
            ], 400);
        }

        return $next($request);
    }
}
