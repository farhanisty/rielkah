<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'failed' => 'Email or password is incorrect'
        ]);
    }
}
