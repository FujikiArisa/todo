<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    function login()
    {
        return view ('pages/login');
    }

    public function submit(Request $request) {
        $credition = $request->only(["email", "password"]);

        if (Auth::attempt($credition)) {
            $request->session()->regenerate();
            return redirect(RouteServiceProvider::HOME);
        }
        return view('pages/login');
    }
}