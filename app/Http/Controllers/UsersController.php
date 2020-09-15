<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ImageUploadHelper;
use App\Http\Services\UsersService;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update(UsersService $service, User $user)
    {
        $this->authorize('update', $user);

        $service->update($user);

        return redirect()->route('users.show', $user->id)->with('success', 'You have updated your information!');
    }
}
