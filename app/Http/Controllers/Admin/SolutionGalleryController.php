<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\SolutionGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SolutionGalleryController extends Controller
{
    /**
     * Display a listing of gallery images for a specific solution.
     */
    public function index(Solution $solution)
    {
        $galleries = $solution->galleries()->ordered()->get();
        return view('admin.solutions.galleries.index', compact('solution', 'galleries'));
    }

    /**
     * Show the form for creating a new gallery image.
     */
    public function create(Solution $solution)
    {
        return view('admin.solutions.galleries.create', compact('solution'));
    }

    /**
     * Store a newly created gallery image.
     */
    public function store(Request $request, Solution $solution)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/solutions/galleries'), $imageName);
            $validated['image'] = 'images/solutions/galleries/' . $imageName;
        }

        $validated['solution_id'] = $solution->id;
        
        SolutionGallery::create($validated);

        return redirect()->route('admin.solutions.galleries.index', $solution)
                         ->with('success', 'Gallery image added successfully!');
    }

    /**
     * Show the form for editing a gallery image.
     */
    public function edit(Solution $solution, SolutionGallery $gallery)
    {
        return view('admin.solutions.galleries.edit', compact('solution', 'gallery'));
    }

    /**
     * Update the specified gallery image.
     */
    public function update(Request $request, Solution $solution, SolutionGallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean'
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
            
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/solutions/galleries'), $imageName);
            $validated['image'] = 'images/solutions/galleries/' . $imageName;
        }

        $gallery->update($validated);

        return redirect()->route('admin.solutions.galleries.index', $solution)
                         ->with('success', 'Gallery image updated successfully!');
    }

    /**
     * Remove the specified gallery image.
     */
    public function destroy(Solution $solution, SolutionGallery $gallery)
    {
        // Delete image file
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        
        $gallery->delete();

        return redirect()->route('admin.solutions.galleries.index', $solution)
                         ->with('success', 'Gallery image deleted successfully!');
    }
}
