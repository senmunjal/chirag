<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
        return view('users.create');
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
        $user = new User;
        $user->name = request('name');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->password = request('password');
        $user->password = Hash::make(request('password'), [
            'rounds' => 12
        ]);
        $user->save();
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());
  
        $data = User::where('flag', 0)->get();
        $action = null;
        return view('users.index', compact('data', 'action'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        $data = User::where('flag', 0)->get();
        $action = null;
        return view('users.index', compact('data', 'action'));
    }

    public function log(User $user, Request $request)
    {
        //
        $email = request('email');
        $password = request('password');
        $user = User::where('email', $email)->get();
        if ($user->isEmpty()) {
            print_r('User Not Found');
        } else {

            $haspass = $user[0]->password;
            if (Hash::check($password, $haspass)) {

                $flag = $user[0]->flag;
                $role = $user[0]->role;
                $data = User::where('flag', 0)->get();

                if ($role == 'admin' &&  $flag == 1) {
                    $action = null;
                    return view('users.index', compact('data', 'action'));
                } else {
                    $action = 'disabled';
                    return view('users.index', compact('data', 'action'));
                }
            } else {
                print_r('User Not Found or Wrong Password');
            }
        }
    }
}
