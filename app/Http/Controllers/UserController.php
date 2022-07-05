<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $users = User::orderBy('updated_at', 'desc')->get();
            return view('users.index', compact('users'));

        } catch (\Exception $e) {

            $error = $e->getMessage();
            return redirect()->view('errors.index', compact('error'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated_request = $request->validate([
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'repeat-password' => 'required|string|min:8|same:password',
            'is_admin' => 'sometimes|required|accepted'
        ]);

        $user = [
            'username' => $validated_request['username'],
            'email' => $validated_request['email'],
            'password' => Hash::make($validated_request['password']),
        ];

        if (isset($validated_request['is_admin'])) {
            $user['is_admin'] = 1;
        }

        User::create($user);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            
            $user = User::find($id);
    
            return view('users.show', compact('user'));

        } catch (\Exception $e) {

            $error = $e->getMessage();

            return redirect()->view('errors.index', compact('error'));

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $user = User::find($id);
            
            return view('users.edit', compact('user'));

        } catch (\Exception $e) {

            $error = $e->getMessage();
            return redirect()->view('errors.index', compact('error'));

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_request = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email',
            'is_admin' => 'sometimes|required|accepted'
        ]);

        
        try {
            
            $user = User::find($id);

            if (!isset($validated_request['is_admin'])) {

                $user->update([
                    'username' => $validated_request['username'],
                    'email' => $validated_request['email'],
                    'is_admin' => 0
                ]);
                
                return redirect()->route('users.index');
            }
            
            $validated_request['is_admin'] = 1;
            $user->update([
                'is_admin' => $validated_request['is_admin']
            ]);

            return redirect()->route('users.index');

        } catch(\Exception $e) {
            $error = $e->getMessage();
            return view('errors.index', compact('error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            User::destroy($id);

            return redirect()->route('users.index');

        } catch(\Exception $e) {

            $error = $e->getMessage();

            return redirect()->view('errors.index', compact('error'));

        }
    }
}
