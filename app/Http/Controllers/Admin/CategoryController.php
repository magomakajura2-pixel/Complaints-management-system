<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string',
        ]);

        Category::create($request->only('categoryName', 'categoryDescription'));

        return back()->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string',
        ]);

        $category->update($request->only('categoryName', 'categoryDescription'));

        return back()->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted successfully.');
    }
}
