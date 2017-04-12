<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request){

        $email = $request->input('email');
        $password= $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('admin/dashboard');
        } else{
            return response()->view('admin.login',['error'=>'invalid credentials'],400);
        }
    }
}