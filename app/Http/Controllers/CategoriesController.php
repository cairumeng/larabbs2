<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function topics(Category $category)
    {
        $topics = Topic::where('category_id', $category->id)->paginate(20);
        return view('categories.topics', compact('topics', 'category'));
    }
}
