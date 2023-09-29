<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        echo "hello world";
    }
    
    public function register(Request $request)
    {
        echo "register ";
    }
}
