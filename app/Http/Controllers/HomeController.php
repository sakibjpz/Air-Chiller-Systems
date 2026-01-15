<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\CoreValue;
use App\Models\Solution;
use App\Models\ProductLineup;
use App\Models\Certification;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
                          ->orderBy('sort_order')
                          ->orderBy('created_at', 'desc')
                          ->take(9)
                          ->get();
        
        // Get active product categories from database
        $dbCategories = Category::where('type', 'product')
                               ->where('is_active', true)
                               ->orderBy('sort_order')
                               ->orderBy('name')
                               ->get();
        
        // Create array with 'all' option first, then database categories
        $categories = ['all' => 'All Products'];
        foreach ($dbCategories as $category) {
            $categories[$category->slug] = $category->name;
        }
        
        // Get active core values
        $coreValues = CoreValue::where('is_active', true)
                              ->orderBy('sort_order')
                              ->orderBy('created_at')
                              ->get();
        
        // Get active solutions
        $solutions = Solution::where('is_active', true)
                            ->orderBy('sort_order')
                            ->orderBy('created_at')
                            ->get();
        
        // Get active product lineups
        $productLineups = ProductLineup::where('is_active', true)
                                      ->orderBy('sort_order')
                                      ->orderBy('created_at')
                                      ->get();
        
        // Get active certifications
        $certifications = Certification::where('is_active', true)
                                      ->orderBy('sort_order')
                                      ->orderBy('created_at')
                                      ->get();
        
        // Get active gallery images
        $galleries = Gallery::where('is_active', true)
                           ->orderBy('sort_order')
                           ->orderBy('created_at', 'desc')
                           ->get();
        
        return view('frontend.home.index', compact('products', 'categories', 'coreValues', 'solutions', 'productLineups', 'certifications', 'galleries'));
    }
}