<?php

namespace Claws\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Claws\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
}