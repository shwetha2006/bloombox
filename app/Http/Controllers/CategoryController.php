<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    // Web: show category list
    public function index(Request $request)
{
    $categories = Category::all();

    if ($request->is('api/*')) {
        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    return view('admin.categories.index', compact('categories'));
}


    // API: create category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create($validated);

        return response()->json([
        'success' => true,
        'category' => $category
    ], 201);
    }

    // API: delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    public function show(Category $category, Request $request)
{
    if ($request->is('api/*')) {
        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }

    return view('admin.categories.show', compact('category')); // optional for web
}

}
