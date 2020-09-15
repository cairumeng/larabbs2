<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UsersService;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.users', compact('users'));
    }

    public function destroy(Request $request)
    {
        User::whereIn('id', explode('_', $request->user_ids))->delete();
        return back()->with('success', 'Success to delete');
    }

    public function show(Request $request)
    {
        $query = User::query();
        if ($request->id) {
            $query->where('id', $request->id);
        }
        if ($request->name) {
            $query->orWhere('name', $request->name);
        }
        if ($request->email) {
            $query->orWhere('email', $request->email);
        }
        $users = $query->paginate(20);
        return view('admin.users.users', compact('users'));
    }

    public function update(UsersService $service, User $user)
    {
        $service->update($user);
        return back()->with('success', 'You have updated the information!');
    }
}
