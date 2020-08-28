<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function saving(User $user)
    {
        if (empty($user->avatar)) {
            $user->avatar =  config('app.url') . '/uploads/images/avatars/default_avatar.png';
        }
    }
}
