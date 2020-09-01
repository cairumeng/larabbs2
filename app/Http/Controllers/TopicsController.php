<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('topics.create', compact('categories'));
    }

    public function store(Request $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
        return redirect()->route('topics.show', ['topic' => $topic])->with('success', 'Created Successfully');
    }

    public function show(Topic $topic)
    {
        $user = $topic->user;
        return view('topics.show', compact('topic', 'user'));
    }

    public function Edit(Topic $topic)
    {
        return view('topics.edit', compact($topic));
    }
}
