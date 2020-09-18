<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(20);
        return view('admin.categories.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'You have created a new ModelsCategory!');
    }

    public function destroy(Request $request)
    {
        Category::whereIn('id', explode('_', $request->category_ids))->delete();
        return back()->with('success', 'Success to delete');
    }

    public function show(Request $request)
    {
        $query = Category::query();
        if ($request->id) {
            $query->where('id', $request->id);
        }
        if ($request->name) {
            $query->orWhere('name', $request->name);
        }

        $categories = $query->paginate(20);
        return view('admin.categories.categories', compact('categories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'You have updated the info!');
    }
}
