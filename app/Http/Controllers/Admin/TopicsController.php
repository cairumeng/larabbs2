<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::paginate(20);
        $users = User::all();
        $categories = Category::all();
        return view('admin.topics.topics', compact('topics', 'users', 'categories'));
    }

    public function store(Request $request)
    {
        Topic::create([
            'title' => $request->title,
            'user_id' => $request->author,
            'category_id' => $request->category,
            'body' => $request->body
        ]);
        return back()->with('success', 'You have created a new topic!');
    }

    public function destroy(Request $request)
    {
        Topic::whereIn('id', explode('_', $request->topic_ids))->delete();
        return back()->with('success', 'Success to delete');
    }

    public function show(Request $request)
    {
        $topics = Topic::where('id', $request->id)->paginate(20);
        return view('admin.topics.topics', compact('topics'));
    }

    public function update(Request $request, Topic $topic)
    {
        $topic->update([
            'name' => $request->name
        ]);
        return back()->with('success', 'You have updated the info!');
    }
}
