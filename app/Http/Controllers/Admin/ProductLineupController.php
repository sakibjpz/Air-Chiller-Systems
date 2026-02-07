<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductLineup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductLineupController extends Controller
{
    /**
     * Display a listing of product lineups.
     */
    public function index()
    {
        $productLineups = ProductLineup::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.product-lineups.index', compact('productLineups'));
    }

    /**
     * Show the form for creating a new product lineup.
     */
    public function create()
    {
        return view('admin.product-lineups.create');
    }

    /**
     * Store a newly created product lineup.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($request->title);
        
        // FIX: Ensure button_text is not null - use default if empty
        if (empty($validated['button_text'])) {
            $validated['button_text'] = 'LEARN MORE'; // Use the default from migration
        }
        
        // Handle image upload if present - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            // Store in public/images/product-lineups folder
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/product-lineups'), $imageName);
            $validated['image'] = 'images/product-lineups/' . $imageName;
        }

        // Create product lineup
        ProductLineup::create($validated);

        // Redirect with success message
        return redirect()->route('admin.product-lineups.index')
                         ->with('success', 'Product lineup created successfully!');
    }

    /**
     * Show the form for editing a product lineup.
     */
    public function edit(ProductLineup $productLineup)
    {
        return view('admin.product-lineups.edit', compact('productLineup'));
    }

    /**
     * Update the specified product lineup.
     */
    public function update(Request $request, ProductLineup $productLineup)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Update slug if title changed
        if ($request->title != $productLineup->title) {
            $validated['slug'] = Str::slug($request->title);
        }
        
        // FIX: Ensure button_text is not null - use default if empty
        if (empty($validated['button_text'])) {
            $validated['button_text'] = 'LEARN MORE'; // Use the default from migration
        }
        
        // Handle image upload if present - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            // Store in public/images/product-lineups folder
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/product-lineups'), $imageName);
            $validated['image'] = 'images/product-lineups/' . $imageName;
            
            // Delete old image if exists
            if ($productLineup->image && file_exists(public_path($productLineup->image))) {
                unlink(public_path($productLineup->image));
            }
        }

        // Update product lineup
        $productLineup->update($validated);

        // Redirect with success message
        return redirect()->route('admin.product-lineups.index')
                         ->with('success', 'Product lineup updated successfully!');
    }

    /**
     * Remove the specified product lineup.
     */
    public function destroy(ProductLineup $productLineup)
    {
        // Delete image if exists
        if ($productLineup->image && file_exists(public_path($productLineup->image))) {
            unlink(public_path($productLineup->image));
        }
        
        // Delete product lineup
        $productLineup->delete();
        
        return redirect()->route('admin.product-lineups.index')
                         ->with('success', 'Product lineup deleted successfully!');
    }
}