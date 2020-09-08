<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{

    public function index(Request $request)
    {
        $topics = Topic::withOrder($request->order)->paginate(20);
        return view('topics.index', compact('topics'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create', compact('categories', 'topic'));
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
        $replies = $topic->replies()->latest()->paginate();
        $user = $topic->user;
        return view('topics.show', compact('topic', 'user', 'replies'));
    }

    public function Edit(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.edit', compact('topic', 'categories'));
    }

    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());
        return redirect()->route('topics.show', ['topic' => $topic])->with('success', 'Updated Successfully');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();
        return  redirect()->route('home')->with('success', 'You have deleted a topic!');
    }
}
