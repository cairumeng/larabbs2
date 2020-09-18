<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::paginate(20);
        return view('admin.topics.topics', compact('topics'));
    }

    public function store(Request $request)
    {
        Topic::create(['name' => $request->name]);
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
