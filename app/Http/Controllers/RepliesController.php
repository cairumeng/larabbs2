<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:2'
        ]);

        Reply::create([
            'user_id' => Auth::id(),
            'topic_id' => $request->topic_id,
            'content' => $request->content
        ]);

        return back()->with('success', 'You have just given your comment!');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        return back()->with('success', 'You have deleted a comment!');
    }
}
