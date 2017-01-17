<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Returns a list of all tickets for the authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $request->user();
    }
}
