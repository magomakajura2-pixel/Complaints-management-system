<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::all();

        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryid' => 'required|exists:categories,id',
            'subcategory' => 'required|string|max:255',
        ]);

        Subcategory::create($request->only('categoryid', 'subcategory'));

        return back()->with('success', 'Subcategory created successfully.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'categoryid' => 'required|exists:categories,id',
            'subcategory' => 'required|string|max:255',
        ]);

        $subcategory->update($request->only('categoryid', 'subcategory'));

        return back()->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return back()->with('success', 'Subcategory deleted successfully.');
    }
}
