<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('gallery.create')->with('success', 'Category created successfully');
    }

    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    
    return redirect()->route('gallery.index')->with('success', 'Category deleted successfully.');
}

}

