@extends('layouts.frontend')

@section('title', 'Products | Mohiuddin Engineering Limited')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    Our Engineering Products
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-6">
                    Innovative solutions for industrial and commercial applications
                </p>
                <div class="inline-flex items-center space-x-2 text-blue-200">
                    <i class="fas fa-cogs text-2xl"></i>
                    <span class="font-medium">Premium Quality • Technical Excellence • Reliable Performance</span>
                </div>
            </div>
        </div>
        
        <!-- Curved bottom -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container mx-auto px-4 py-12 md:py-16">
        <!-- Category Filter (Optional) -->
        {{-- <div class="flex flex-wrap justify-center gap-2 mb-12">
            <button class="px-5 py-2 rounded-full bg-blue-600 text-white font-medium transition">
                All Products
            </button>
            @foreach($categories as $key => $category)
                @if($key !== 'all')
                <button class="px-5 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium transition">
                    {{ $category }}
                </button>
                @endif
            @endforeach
        </div> --}}

        @if($products->count() > 0)
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                <!-- Product Image Container -->
                <div class="relative overflow-hidden">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->name }}"
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center">
                        <i class="fas fa-cogs text-5xl text-blue-300"></i>
                    </div>
                    @endif
                    
                    <!-- Category Badge -->
                 <!-- Category Badge -->
<div class="absolute top-4 left-4">
    <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-700 text-xs font-semibold rounded-full">
        {{ $product->category->name ?? 'Uncategorized' }}
    </span>
</div>
                </div>
                
                <!-- Product Content -->
                <div class="p-6">
                    <!-- Product Name (BELOW the picture) -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition duration-300 text-center">
                        {{ $product->name }}
                    </h3>
                    
                    <!-- Short Description -->
                    <p class="text-gray-600 mb-5 text-center">
                        {{ Str::limit($product->description, 120) }}
                    </p>
                    
                    
                  <!-- Features List (4-5 features) -->
<div class="mb-6">
    <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
        <i class="fas fa-star text-yellow-500 mr-2"></i>
        Key Features
    </h4>
    <ul class="space-y-2">
        @php
        // Get features from database using the features_array attribute
        $features = $product->features_array;
        $displayFeatures = array_slice($features, 0, 5); // Show only first 5 features
        @endphp
        
        @foreach($displayFeatures as $feature)
        <li class="flex items-start text-sm text-gray-700">
            <i class="fas fa-check text-green-500 mr-2 mt-1 text-xs"></i>
            <span>{{ $feature }}</span>
        </li>
        @endforeach
    </ul>
</div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-gray-100">
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition text-sm">
                            <i class="fas fa-info-circle mr-2"></i>
                            View Details
                        </a>
                        <button class="inline-flex items-center justify-center px-4 py-2.5 border border-blue-600 text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition text-sm">
                            <i class="fas fa-envelope mr-2"></i>
                            Inquire
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- No Products -->
        <div class="text-center py-16">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-6">
                <i class="fas fa-cogs text-3xl text-blue-400"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-700 mb-3">No Products Available</h3>
            <p class="text-gray-500 max-w-md mx-auto">
                Our product catalog is being updated. Please check back soon for our latest engineering solutions.
            </p>
        </div>
        @endif

        <!-- CTA Section -->
        <div class="mt-16 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 md:p-12 text-center border border-blue-100">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                Need Custom Engineering Solutions?
            </h2>
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                Contact us for tailored products and solutions for your specific requirements.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-phone-alt mr-2"></i>
                    Contact Sales
                </a>
              <a href="{{ route('services.index') }}" 
   class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 font-medium rounded-lg border border-blue-200 hover:bg-blue-50 transition duration-300">
    <i class="fas fa-cogs mr-2"></i>
    Our Services
</a>
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
</style>
@endpush
@endsection