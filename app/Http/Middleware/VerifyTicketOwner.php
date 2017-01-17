<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyTicketOwner
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
        if ($request->route()->getParameter('ticket')->user_id !== Auth::user()->id) {
            return response()->json([
                'message' => 'Ticket does not belong to the authenticated user'
            ], 401);
        }

        return $next($request);
    }
}
