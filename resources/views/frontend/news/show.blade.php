@extends('layouts.frontend')

@section('title', $news->meta_title ?? $news->title . ' - Mohiuddin Engineering Limited')

@section('meta')
    @if($news->meta_description)
    <meta name="description" content="{{ $news->meta_description }}">
    @endif
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12 md:py-16">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-blue-200 hover:text-white">
                                <i class="fas fa-home mr-2"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-blue-300 mx-2"></i>
                                <a href="{{ route('news.index') }}" class="text-blue-200 hover:text-white">News</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-blue-300 mx-2"></i>
                                <span class="text-blue-100">{{ $news->category }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <!-- Category & Date -->
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="px-4 py-1.5 bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-full">
                        {{ $news->category }}
                    </span>
                    <div class="flex items-center text-blue-200">
                        <i class="far fa-calendar mr-2"></i>
                        <span class="text-sm">{{ $news->formatted_date }}</span>
                        <span class="mx-3">•</span>
                        <i class="far fa-clock mr-1"></i>
                        <span class="text-sm">{{ $news->reading_time }}</span>
                    </div>
                </div>
                
                <!-- Title -->
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-tight tracking-tight">
                    {{ $news->title }}
                </h1>
                
                <!-- Author & Stats -->
                <div class="flex flex-wrap items-center justify-between gap-4 pt-6 border-t border-white/20">
                    @if($news->author)
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center mr-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="text-sm text-blue-200">Written by</p>
                            <p class="font-medium">{{ $news->author }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center text-sm">
                            <i class="far fa-eye mr-2"></i>
                            {{ $news->views }} views
                        </span>
                        @if($news->is_featured)
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 text-xs font-semibold rounded-full">
                            <i class="fas fa-star mr-1"></i>Featured
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,80L1360,80C1280,80,1120,80,960,80C800,80,640,80,480,80C320,80,160,80,80,80L0,80Z"></path>
            </svg>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Article Content -->
                <article class="lg:col-span-2">
                    <!-- Featured Image -->
                    <div class="mb-8 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ $news->featured_image_url }}" 
                             alt="{{ $news->title }}"
                             class="w-full h-auto object-cover">
                    </div>

                    <!-- Article Body -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg">
                            {!! $news->content !!}
                        </div>
                    </div>

                    <!-- Gallery (if exists) -->
                    @if(!empty($news->gallery_urls))
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Gallery</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($news->gallery_urls as $image)
                            <a href="{{ $image }}" 
                               data-fancybox="gallery"
                               class="block rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                <img src="{{ $image }}" 
                                     alt="Gallery Image {{ $loop->iteration }}"
                                     class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500">
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Tags -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex flex-wrap gap-2">
                            <span class="text-gray-700 font-medium mr-3">Tags:</span>
                            <span class="px-3 py-1.5 bg-blue-100 text-blue-700 text-sm font-medium rounded-full">
                                {{ $news->category }}
                            </span>
                            <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-full">
                                Engineering
                            </span>
                            <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-full">
                                Innovation
                            </span>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Share This Article</h4>
                        <div class="flex space-x-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 bg-sky-500 text-white rounded-full hover:bg-sky-600 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($news->title) }}"
                               target="_blank"
                               class="flex items-center justify-center w-10 h-10 bg-blue-700 text-white rounded-full hover:bg-blue-800 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:?subject={{ urlencode($news->title) }}&body={{ urlencode(url()->current()) }}"
                               class="flex items-center justify-center w-10 h-10 bg-gray-700 text-white rounded-full hover:bg-gray-800 transition">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <!-- Related News -->
                    @if($relatedNews->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">
                            Related News
                        </h3>
                        <div class="space-y-6">
                            @foreach($relatedNews as $related)
                            <article class="group">
                                <a href="{{ route('news.show', $related->slug) }}" class="flex gap-4">
                                    <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden">
                                        <img src="{{ $related->featured_image_url }}" 
                                             alt="{{ $related->title }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                    <div>
                                        <span class="text-xs font-semibold text-blue-600 mb-1 block">
                                            {{ $related->category }}
                                        </span>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-blue-700 transition line-clamp-2">
                                            {{ $related->title }}
                                        </h4>
                                        <span class="text-xs text-gray-500 mt-1 block">
                                            {{ $related->published_date->format('M d') }}
                                        </span>
                                    </div>
                                </a>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Categories -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">
                            Categories
                        </h3>
                        <div class="space-y-2">
                            @php
                            $categories = ['New Products', 'Exhibition News', 'Company News'];
                            @endphp
                            @foreach($categories as $cat)
                            <a href="{{ route('news.index', ['category' => $cat]) }}" 
                               class="flex items-center justify-between p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="font-medium text-gray-700 group-hover:text-blue-700">
                                    {{ $cat }}
                                </span>
                                <span class="text-blue-600 group-hover:text-blue-800">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white mb-4">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Stay Updated</h4>
                            <p class="text-sm text-gray-600 mb-4">
                                Get the latest engineering news delivered to your inbox
                            </p>
                            <form class="space-y-3">
                                <input type="email" 
                                       placeholder="Your email"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <button type="submit"
                                        class="w-full px-4 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition text-sm">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Have Engineering Questions?</h2>
                <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
                    Our team of experts is ready to help with your engineering challenges
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Us
                    </a>
                    <a href="{{ route('services') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-white/10 text-white font-semibold rounded-lg hover:bg-white/20 transition border border-white/30">
                        <i class="fas fa-cogs mr-2"></i>
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.prose {
    color: #374151;
}
.prose p {
    margin-bottom: 1.5em;
    line-height: 1.7;
}
.prose h2 {
    color: #1f2937;
    font-weight: 700;
    font-size: 1.5em;
    margin-top: 2em;
    margin-bottom: 1em;
}
.prose h3 {
    color: #374151;
    font-weight: 600;
    font-size: 1.25em;
    margin-top: 1.5em;
    margin-bottom: 0.75em;
}
.prose ul {
    list-style-type: disc;
    padding-left: 1.5em;
    margin-bottom: 1.5em;
}
.prose ol {
    list-style-type: decimal;
    padding-left: 1.5em;
    margin-bottom: 1.5em;
}
.prose img {
    border-radius: 0.75rem;
    margin: 1.5em 0;
}
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<!-- Fancybox CSS for gallery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endpush

@push('scripts')
<!-- Fancybox JS for gallery -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
@endpush
@endsection