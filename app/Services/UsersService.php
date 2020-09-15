<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ImageUploadHelper;

class UsersService
{
    public function update(User $user)
    {
        $avatarUploader = app()->make(ImageUploadHelper::class);
        $request = request();

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

        return $user;
    }
}
