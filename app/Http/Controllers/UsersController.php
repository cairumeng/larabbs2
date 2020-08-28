<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ImageUploadHelper;

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

    public function update(Request $request, User $user, ImageUploadHelper $avatarUploader)
    {
        $this->authorize('update', $user);
        $updateArr = ['name' => $request->name];
        $rulesArr = [
            'name' => 'required|min:2|max:56',
        ];

        if ($request->password) {
            $updateArr['password'] = bcrypt($request->password);
            $rulesArr['password'] = 'min:8|confirmed';
        }

        if ($request->introduction) {
            $updateArr['introduction'] = $request->introduction;
            $rulesArr['introduction'] = 'min:2|max:255';
        } else {
            $updateArr['introduction'] = null;
        }

        if ($request->avatar) {
            $rulesArr['avatar'] = 'image';
        }

        $request->validate($rulesArr);

        if ($request->avatar) {
            $result = $avatarUploader->save($request->avatar, 'avatars', $user->id, 416);
            $updateArr['avatar'] = $result['path'];
        }

        $user->update($updateArr);
        return redirect()->route('users.show', $user->id)->with('success', 'You have updated your information!');
    }
}
