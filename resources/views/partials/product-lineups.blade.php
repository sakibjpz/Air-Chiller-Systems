@if($productLineups && count($productLineups) > 0)
<!-- ================= OUR PRODUCTS ================= -->
<section class="py-12 md:py-16 lg:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Section Header - LG Style -->
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                OUR PRODUCTS
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                Explore our range of engineering products and solutions
            </p>
        </div>

        <!-- First Row: 4 items -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-10 md:mb-12">
            @foreach($productLineups->take(4) as $product)
            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 cursor-pointer">
                <!-- Product Image Container with Clickable Area -->
                <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="block">
                    <div class="relative overflow-hidden h-56 md:h-64">
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center">
                            <i class="fas fa-box text-blue-400 text-5xl"></i>
                        </div>
                        @endif
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        
                        <!-- View Details Badge -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-blue-600 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            View Details →
                        </div>
                    </div>
                </a>

                <!-- Product Content -->
                <div class="p-6">
                    <!-- Product Title as Clickable Link -->
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}" 
                       class="block mb-3 group">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                            {{ $product->title }}
                        </h3>
                    </a>

                    <!-- Product Description -->
                    @if($product->description)
                    <p class="text-gray-600 text-sm line-clamp-3">
                        {{ Str::limit($product->description, 100) }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Second Row: Next 4 items -->
        @if($productLineups->count() > 4)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach($productLineups->slice(4, 4) as $product)
            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 cursor-pointer">
                <!-- Product Image Container with Clickable Area -->
                <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="block">
                    <div class="relative overflow-hidden h-56 md:h-64">
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center">
                            <i class="fas fa-box text-blue-400 text-5xl"></i>
                        </div>
                        @endif
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        
                        <!-- View Details Badge -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-blue-600 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            View Details →
                        </div>
                    </div>
                </a>

                <!-- Product Content -->
                <div class="p-6">
                    <!-- Product Title as Clickable Link -->
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}" 
                       class="block mb-3 group">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                            {{ $product->title }}
                        </h3>
                    </a>

                    <!-- Product Description -->
                    @if($product->description)
                    <p class="text-gray-600 text-sm line-clamp-3">
                        {{ Str::limit($product->description, 100) }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Optional: View All Products -->
        @if(count($productLineups) > 8)
        <div class="text-center mt-12 md:mt-16">
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center justify-center px-8 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold rounded-full transition-all duration-300 hover:scale-105">
                View All Products
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Divider -->
<div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
@endif