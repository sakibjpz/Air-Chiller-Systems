<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products.
     */
    public function index()
    {
        $products = Product::with('category')
                          ->where('is_active', true)
                          ->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->get();
        
        // Get all active product categories from database
        $categories = \App\Models\Category::where('type', 'product')
                                         ->where('is_active', true)
                                         ->orderBy('sort_order')
                                         ->orderBy('name')
                                         ->get();
        
        return view('frontend.products.index', compact('products', 'categories'));
    }

    /**
     * Display a single product.
     */
   public function show($slug)
{
    $product = Product::with('category')
                      ->where('slug', $slug)
                      ->where('is_active', true)
                      ->firstOrFail();
    return view('frontend.products.show', compact('product'));
}

    /**
     * Search products for live search.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $products = Product::with('category')
                          ->where('is_active', true)
                          ->where(function($q) use ($query) {
                              $q->where('name', 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%");
                          })
                          ->limit(5)
                          ->get(['id', 'name', 'slug', 'image', 'category_id']);
        
        return response()->json($products);
    }
}