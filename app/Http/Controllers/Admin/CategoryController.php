<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Create slug from name
        $validated['slug'] = Str::slug($request->name);

        // Create category
        Category::create($validated);

        // Redirect with success message
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'type' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Update slug if name changed
        if ($request->name != $category->name) {
            $validated['slug'] = Str::slug($request->name);
        }

        // Update category
        $category->update($validated);

        // Redirect with success message
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category.
     */
    public function destroy(Category $category)
    {
        // Check if category has products
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')
                             ->with('error', 'Cannot delete category with products. Move products first.');
        }
        
        // Delete category
        $category->delete();
        
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully!');
    }
}