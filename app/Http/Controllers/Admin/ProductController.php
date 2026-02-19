<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::where('type', 'product')
                             ->where('is_active', true)
                             ->orderBy('sort_order')
                             ->orderBy('name')
                             ->get();
        
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Convert features from textarea (one per line) to array
        if ($request->has('features')) {
            $featuresArray = array_filter(
                array_map('trim', explode("\n", $request->input('features'))),
                function($line) {
                    return !empty($line) && $line !== '';
                }
            );
            $validated['features'] = json_encode($featuresArray);
        }

        // Create slug from name
        $validated['slug'] = Str::slug($request->name);
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        // Create product
        Product::create($validated);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing a product.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('type', 'product')
                             ->where('is_active', true)
                             ->orderBy('sort_order')
                             ->orderBy('name')
                             ->get();
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Convert features from textarea (one per line) to array
        if ($request->has('features')) {
            $featuresArray = array_filter(
                array_map('trim', explode("\n", $request->input('features'))),
                function($line) {
                    return !empty($line) && $line !== '';
                }
            );
            $validated['features'] = json_encode($featuresArray);
        }

        // Update slug if name changed
        if ($request->name != $product->name) {
            $validated['slug'] = Str::slug($request->name);
        }
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
            
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
        }

        // Update product
        $product->update($validated);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        
        // Delete product
        $product->delete();
        
        return redirect()->route('admin.products.index')
                         ->with('success', 'Product deleted successfully!');
    }
}