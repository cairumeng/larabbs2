<?php

namespace App\Observers;

use App\Models\Topic;
use Illuminate\Support\Str;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        require_once(app_path() . '/Helpers/mixHelper.php');
        $topic->body = clean($topic->body, 'default');
        $topic->excerpt = make_excerpt($topic->body);
        $topic->slug = Str::slug($topic->title, '-');
    }
}
