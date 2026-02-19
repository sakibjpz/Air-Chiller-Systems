<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of all solutions (if needed)
     */
    public function index()
    {
        $solutions = Solution::active()->ordered()->get();
        return view('solutions.index', compact('solutions'));
    }

    /**
     * Display the specified solution based on slug
     */
    public function show($slug)
    {
        $solution = Solution::where('slug', $slug)
                            ->where('is_active', true)
                            ->firstOrFail();
        
        return view('solutions.show', compact('solution'));
    }
}