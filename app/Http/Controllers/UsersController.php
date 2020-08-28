<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2|max:56',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            'introduction'=>'min:2|max:255',
            'avatar'=>'dimensions:min_width=100,min_height=200,mimes:jpeg,gif,png'
        ]);
        $
    }
}
