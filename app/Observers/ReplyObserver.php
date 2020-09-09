<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'default');
    }

    public function created(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
}
