<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $query = News::published()->latest('published_date');
        
        if ($category) {
            $query->where('category', $category);
        }
        
        $news = $query->paginate(9);
        $featuredNews = News::published()->featured()->latest('published_date')->take(3)->get();
        
        $categories = ['New Products', 'Exhibition News', 'Company News'];
        
        return view('frontend.news.index', compact('news', 'featuredNews', 'categories', 'category'));
    }

    public function show($slug)
    {
        $news = News::published()->where('slug', $slug)->firstOrFail();
        
        // Increment views
        $news->incrementViews();
        
        $relatedNews = News::published()
            ->where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->latest('published_date')
            ->take(3)
            ->get();
        
        return view('frontend.news.show', compact('news', 'relatedNews'));
    }
}