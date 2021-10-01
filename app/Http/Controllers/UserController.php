<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $users = User::all();
        $active_menu = 'users';
        
        return view('users.index', compact('users', 'active_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = new User;
        $active_menu = 'users';
        $action = 'user.store';
        return view('users.create', compact('user', 'active_menu', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->name);
        // var_dump($request->email);
        // var_dump($request->password);
        // var_dump($request->password_confirmation);
        // exit();

        if(!empty($request->name) && !empty($request->email) && !empty($request->password) && !empty($request->password_confirmation)) {
            if($request->password == $request->password_confirmation) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                if($user->save()){
                    session(['alert' => 'User created successfully', 'class' => 'alert alert-success']);
                    return redirect()->route('users');
                } else {
                    session(['alert' => 'Unable to create user this time please try again later', 'class' => 'alert alert-warning']);
                    return redirect()->route('user.add');
                }
            } else{
                session(['alert' => 'Password and Confirm Password is not matched', 'class' => 'alert alert-danger']);
                return redirect()->route('user.add');
            }
        } else {
            session(['alert' => 'All fields required', 'class' => 'alert alert-danger']);
            return redirect()->route('user.add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();
        $active_menu = 'users';
        $action = 'user.update';
        return view('users.create', compact('user', 'active_menu', 'action'));
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
        //
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->update()){
            session(['alert' => 'User updated successfully', 'class' => 'alert alert-success']);
            return redirect()->route('users');
        } else {
            session(['alert' => 'Unable to update user this time please try again later', 'class' => 'alert alert-warning']);
            return redirect()->route('user.edit', $id);
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
        //
        $user = User::where('id', $id)->first();
        if($user->delete()){
            session(['alert' => 'User deleted successfully', 'class' => 'alert alert-success']);
            return redirect()->route('users');
        } else {
            session(['alert' => 'Unable to delete user this time please try again later', 'class' => 'alert alert-warning']);
            return redirect()->route('users');
        }
    }
}