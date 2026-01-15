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
        $products = Product::where('is_active', true)
                          ->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->get();
        
        // Group products by category for the frontend
        $categories = [
            'all' => 'All Products',
            'hvac' => 'HVAC Systems',
            'cooling' => 'Cooling Systems',
            'electrical' => 'Electrical Panels',
            'pumps' => 'Water Pumps',
            'compression' => 'Compressors',
        ];
        
        return view('frontend.products.index', compact('products', 'categories'));
    }

    /**
     * Display a single product.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.products.show', compact('product'));
    }
}