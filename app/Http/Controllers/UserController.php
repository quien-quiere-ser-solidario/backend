<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

            $users = User::getOrderedUsers();
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

        $validated_request = User::validateStoreRequest($request);
        User::storeUser($validated_request);

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
        try {
            $validated_request = User::validateUpdateRequest($request);
            
            User::updateUser($validated_request, $id);

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
