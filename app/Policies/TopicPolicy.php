<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function update(User $currentUser, Topic $topic)
    {
        return $currentUser->id === $topic->user_id;
    }

    public function destroy(User $currentUser, Topic $topic)
    {
        return $currentUser->id === $topic->user_id;
    }
}
