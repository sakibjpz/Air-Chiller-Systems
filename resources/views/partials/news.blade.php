<!-- News Section -->
@php
// Get latest 3 published news articles
$latestNews = \App\Models\News::published()->latest('published_date')->take(3)->get();
@endphp

@if($latestNews->count() > 0)
<section class="py-12 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                <i class="fas fa-newspaper text-2xl text-blue-600"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Latest News & Updates
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Stay informed with our latest engineering innovations, exhibitions, and company developments
            </p>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestNews as $news)
            <article class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                <!-- Image -->
                <div class="relative overflow-hidden h-48">
                    <img src="{{ $news->featured_image_url }}" 
                         alt="{{ $news->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-700 text-xs font-semibold rounded-full">
                            {{ $news->category }}
                        </span>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <!-- Date & Read Time -->
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span class="flex items-center">
                            <i class="far fa-calendar mr-2"></i>
                            {{ $news->formatted_date }}
                        </span>
                        <span class="mx-3">•</span>
                        <span class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            {{ $news->reading_time }}
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition duration-300 line-clamp-2">
                        <a href="{{ route('news.show', $news->slug) }}">
                            {{ $news->title }}
                        </a>
                    </h3>
                    
                    <!-- Excerpt -->
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        {{ $news->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($news->content), 100) }}
                    </p>
                    
                    <!-- Read More -->
                    <a href="{{ route('news.show', $news->slug) }}" 
                       class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 group">
                        Read More
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-10">
            <a href="{{ route('news.index') }}" 
               class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition duration-300">
                View All News & Articles
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endif