<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Score;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all scores the user has
     */
    public function scores() {
        return $this->hasMany(Score::class);
    }

    static function getOrderedUsers() {
        return User::orderBy('updated_at', 'desc')->get();
    }

    static function validateStoreRequest($request) {
        return $request->validate([
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'repeat-password' => 'required|string|min:8|same:password',
            'is_admin' => 'sometimes|required|accepted'
        ]);
    }

    static function validateUpdateRequest($request) {
        return $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email',
            'is_admin' => 'sometimes|required|accepted'
        ]);
    }
    
    static function validateLoginRequest($request) {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    static function validateRegisterRequest($request) {
        return $request->validate([
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'repeat-password' => 'required|string|min:8|same:password'
        ]);
    }

    static function storeUser($request) {

        $user = [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ];

        if (isset($request['is_admin'])) {
            $user['is_admin'] = 1;
        }

        User::create($user);
    }
    static function updateUser($request, $id) {

        $user = User::find($id);

        if (!isset($request['is_admin'])) {

            $user->update([
                'username' => $request['username'],
                'email' => $request['email'],
                'is_admin' => 0
            ]);

            return $user->save();
        }
        
        $user->update([
            'username' => $request['username'],
            'email' => $request['email'],
            'is_admin' => 1
        ]);

        return $user->save();
    }

    static function login($credentials) {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'message' => [__('auth.failed')]
                ]);        
        }
        return true;
    }

    static function register($user_data) {
        $user = [
            "username" => $user_data["username"],
            "email" => $user_data["email"],
            "password" => Hash::make($user_data["password"]),
            "is_admin" => 0
        ];
        $stored_user = User::create($user);
        return $stored_user;
    }
}
