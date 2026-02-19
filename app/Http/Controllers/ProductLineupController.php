<?php

namespace App\Http\Controllers;

use App\Models\ProductLineup;
use Illuminate\Http\Request;

class ProductLineupController extends Controller
{
    /**
     * Display a listing of product lineups
     */
    public function index()
    {
        $productLineups = ProductLineup::active()->ordered()->get();
        return view('product-lineups.index', compact('productLineups'));
    }

    /**
     * Display the specified product lineup
     */
    public function show($slug)
    {
        $productLineup = ProductLineup::where('slug', $slug)
                                      ->where('is_active', true)
                                      ->firstOrFail();
        
        // Get related products (optional)
        $relatedProducts = ProductLineup::active()
                                       ->where('id', '!=', $productLineup->id)
                                       ->inRandomOrder()
                                       ->limit(4)
                                       ->get();
        
        return view('product-lineups.show', compact('productLineup', 'relatedProducts'));
    }
}
