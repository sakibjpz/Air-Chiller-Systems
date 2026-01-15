<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/gallery'), $imageName);
            $validated['image'] = 'images/gallery/' . $imageName;
        }

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')
                         ->with('success', 'Gallery image added successfully!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/gallery'), $imageName);
            $validated['image'] = 'images/gallery/' . $imageName;
            
            // Delete old image if exists
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
        } else {
            unset($validated['image']);
        }

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')
                         ->with('success', 'Gallery image updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete image if exists
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.galleries.index')
                         ->with('success', 'Gallery image deleted successfully!');
    }
}