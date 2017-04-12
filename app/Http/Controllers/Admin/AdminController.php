<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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