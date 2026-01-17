@extends('layouts.frontend')

@section('title', 'News & Updates - Mohiuddin Engineering Limited')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-700/90"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight tracking-tight">
                    News & <span class="text-blue-300">Updates</span>
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Stay informed with the latest engineering innovations, exhibitions, and company developments
                </p>
                
                <!-- Category Filter -->
                <div class="inline-flex flex-wrap gap-2 p-1 bg-white/10 backdrop-blur-sm rounded-2xl">
                    <a href="{{ route('news.index') }}" 
                       class="px-5 py-2 rounded-xl font-medium transition-all duration-300 {{ !request('category') ? 'bg-white text-blue-900 shadow-lg' : 'text-blue-100 hover:bg-white/20' }}">
                        All News
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('news.index', ['category' => $cat]) }}" 
                       class="px-5 py-2 rounded-xl font-medium transition-all duration-300 {{ request('category') == $cat ? 'bg-white text-blue-900 shadow-lg' : 'text-blue-100 hover:bg-white/20' }}">
                        {{ $cat }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <!-- Featured News -->
    @if($featuredNews->count() > 0)
    <div class="container mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Featured Stories</h2>
                <p class="text-gray-600 mt-2">Highlighted updates from our engineering world</p>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center space-x-2 text-blue-600">
                    <i class="fas fa-star text-lg"></i>
                    <span class="font-medium">Top Picks</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach($featuredNews as $index => $item)
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                <!-- Category Badge -->
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-700 text-xs font-semibold rounded-full">
                        {{ $item->category }}
                    </span>
                </div>
                
                <!-- Image -->
                <div class="h-56 overflow-hidden">
                    <img src="{{ $item->featured_image_url }}" 
                         alt="{{ $item->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="far fa-calendar mr-2"></i>
                        <span>{{ $item->formatted_date }}</span>
                        <span class="mx-2">•</span>
                        <i class="far fa-clock mr-1"></i>
                        <span>{{ $item->reading_time }}</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition duration-300">
                        <a href="{{ route('news.show', $item->slug) }}" class="hover:underline">
                            {{ $item->title }}
                        </a>
                    </h3>
                    
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        {{ $item->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                    </p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('news.show', $item->slug) }}" 
                           class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 group">
                            Read More
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                        <span class="flex items-center text-gray-500 text-sm">
                            <i class="far fa-eye mr-1"></i>
                            {{ $item->views }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- All News Grid -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $item)
            <article class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                <!-- Image -->
                <div class="relative overflow-hidden h-48">
                    <img src="{{ $item->featured_image_url }}" 
                         alt="{{ $item->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    
                    <!-- Category -->
                    <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white text-blue-700 text-xs font-semibold rounded-full shadow">
                            {{ $item->category }}
                        </span>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <!-- Meta Info -->
                    <div class="flex items-center flex-wrap gap-2 text-sm text-gray-500 mb-4">
                        <span class="flex items-center">
                            <i class="far fa-calendar mr-1"></i>
                            {{ $item->formatted_date }}
                        </span>
                        <span class="flex items-center">
                            <i class="far fa-clock mr-1 ml-3"></i>
                            {{ $item->reading_time }}
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition duration-300 line-clamp-2">
                        <a href="{{ route('news.show', $item->slug) }}" class="hover:underline">
                            {{ $item->title }}
                        </a>
                    </h3>
                    
                    <!-- Excerpt -->
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        {{ $item->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}
                    </p>
                    
                    <!-- Footer -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('news.show', $item->slug) }}" 
                           class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                            Read Story
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                        <div class="flex items-center space-x-3">
                            <span class="flex items-center text-xs text-gray-500">
                                <i class="far fa-eye mr-1"></i>
                                {{ $item->views }}
                            </span>
                            @if($item->is_featured)
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
            @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6">
                        <i class="fas fa-newspaper text-3xl text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">No News Yet</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-8">
                        {{ request('category') ? 'No news articles found in this category.' : 'Stay tuned for updates from Mohiuddin Engineering Limited.' }}
                    </p>
                    @if(request('category'))
                    <a href="{{ route('news.index') }}" 
                       class="inline-flex items-center px-5 py-2.5 border border-blue-600 text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition">
                        View All News
                    </a>
                    @endif
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="mt-12">
            {{ $news->links('vendor.pagination.tailwind') }}
        </div>
        @endif
    </div>

    <!-- Newsletter Section -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-t border-blue-100 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-600 text-white mb-6">
                    <i class="fas fa-paper-plane text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Stay Updated</h2>
                <p class="text-gray-600 mb-8">
                    Subscribe to our newsletter for the latest engineering innovations and company news
                </p>
                
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" 
                           placeholder="Enter your email"
                           class="flex-grow px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-sm text-gray-500 mt-4">
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}
</style>
@endpush
@endsection