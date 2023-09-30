<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPostRequest;
use App\Repositories\EloquentAuthenticationRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // private AuthenticationRepository $authenticationRepository;
    
    // public function __construct(AuthenticationRepository $authenticationRepository)
    // {
    //     $this->authenticationRepository = $authenticationRepository;
    // }
    
    public function index()
    {
        return view('auth.register');
    }
    
    public function register(RegisterPostRequest $request, EloquentAuthenticationRepository $authenticationRepository)
    {
        $validated = $request->validated();

        try{
            $authenticationRepository->register($validated['name'], $validated['username'], $validated['email'], Hash::make($validated['password']));

            return redirect(route('login.index'));
        }catch(ValidationException $exception) {
            return redirect(route('register.index'));
        }
    }
}
