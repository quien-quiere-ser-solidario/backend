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
        $user_data = $request->validate([
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'repeat-password' => 'required|string|min:8|same:password'
        ]);

        $user = [
            "username" => $user_data["username"],
            "email" => $user_data["email"],
            "password" => Hash::make($user_data["password"]),
            "is_admin" => 0
        ];

        try {

            User::create($user);

            return response('¡El usuario se ha registrado correctamente!');

        } catch (\Exception $e) {

            $error = $e->getMessage();

            return response($error, 500);

        }
    }

    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')]
                ]);        
        }
        return $request->user();
    }

    public function logout() 
    {
        return Auth::logout();
    }
}
