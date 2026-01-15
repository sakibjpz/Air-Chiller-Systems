<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SolutionController extends Controller
{
    /**
     * Display a listing of solutions.
     */
    public function index()
    {
        $solutions = Solution::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new solution.
     */
    public function create()
    {
        return view('admin.solutions.create');
    }

    /**
     * Store a newly created solution.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($request->title);
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Store in public/images/solutions folder
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/solutions'), $imageName);
            $validated['image'] = 'images/solutions/' . $imageName;
        }

        // Create solution
        Solution::create($validated);

        // Redirect with success message
        return redirect()->route('admin.solutions.index')
                         ->with('success', 'Solution created successfully!');
    }

    /**
     * Show the form for editing a solution.
     */
    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    /**
     * Update the specified solution.
     */
    public function update(Request $request, Solution $solution)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Update slug if title changed
        if ($request->title != $solution->title) {
            $validated['slug'] = Str::slug($request->title);
        }
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Store in public/images/solutions folder
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/solutions'), $imageName);
            $validated['image'] = 'images/solutions/' . $imageName;
            
            // Delete old image if exists
            if ($solution->image && file_exists(public_path($solution->image))) {
                unlink(public_path($solution->image));
            }
        }

        // Update solution
        $solution->update($validated);

        // Redirect with success message
        return redirect()->route('admin.solutions.index')
                         ->with('success', 'Solution updated successfully!');
    }

    /**
     * Remove the specified solution.
     */
    public function destroy(Solution $solution)
    {
        // Delete image if exists
        if ($solution->image && file_exists(public_path($solution->image))) {
            unlink(public_path($solution->image));
        }
        
        // Delete solution
        $solution->delete();
        
        return redirect()->route('admin.solutions.index')
                         ->with('success', 'Solution deleted successfully!');
    }
}