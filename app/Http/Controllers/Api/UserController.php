<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request) 
    {
        
        try {
            
            $user_data = User::validateRegisterRequest($request);
            User::register($user_data);

            return response('¡El usuario se ha registrado correctamente!');

        } catch (\Exception $e) {

            $error = $e->getMessage();

            return response($error, 500);

        }
    }

    public function login(Request $request) 
    {
        try {
            $credentials = User::validateLoginRequest($request);

            User::login($credentials);
        
            return $request->user();

        } catch (\Exception $e) {

            return response($e, 500);

        }
    }

    public function logout() 
    {
        return Auth::logout();
    }
}
