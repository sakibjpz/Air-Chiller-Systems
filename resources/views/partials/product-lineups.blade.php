@if($productLineups && count($productLineups) > 0)
<!-- ================= OTHER PRODUCTS ================= -->
<section class="py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <!-- Section Header - LG Style -->
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                OTHER PRODUCTS
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                Explore our range of engineering products and solutions
            </p>
        </div>

        <!-- First Row: 3 items (for first 3 products) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16"> <!-- Increased mb-8 to mb-16 -->
            @foreach($productLineups->take(3) as $product)
            <div class="group">
                <!-- Product Image -->
                <div class="relative overflow-hidden rounded-lg mb-6">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->title }}"
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center">
                        <i class="fas fa-box text-blue-400 text-5xl"></i>
                    </div>
                    @endif
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/10 transition-all duration-500"></div>
                </div>

                <!-- Product Content -->
                <div class="text-center">
                    <!-- Product Title -->
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                        {{ $product->title }}
                    </h3>

                    <!-- LG-Style Button -->
                    @if($product->button_text)
                    <div class="mt-4 flex justify-center">
                        <a href="{{ $product->button_link ?: '#' }}" 
                           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 group">
                            <span>{{ $product->button_text }}</span>
                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Second Row: 4 items (for next 4 products) -->
        @if($productLineups->count() > 3)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($productLineups->slice(3, 4) as $product)
            <div class="group">
                <!-- Product Image - REDUCED HEIGHT for second row -->
                <div class="relative overflow-hidden rounded-lg mb-6">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->title }}"
                         class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700"> <!-- Changed h-64 to h-56 -->
                    @else
                    <div class="w-full h-56 bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center"> <!-- Changed h-64 to h-56 -->
                        <i class="fas fa-box text-blue-400 text-5xl"></i>
                    </div>
                    @endif
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/10 transition-all duration-500"></div>
                </div>

                <!-- Product Content -->
                <div class="text-center">
                    <!-- Product Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        {{ $product->title }}
                    </h3>

                    <!-- LG-Style Button -->
                    @if($product->button_text)
                    <div class="mt-4 flex justify-center">
                        <a href="{{ $product->button_link ?: '#' }}" 
                           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 group text-sm">
                            <span>{{ $product->button_text }}</span>
                            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300 text-xs"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Optional: View All Products -->
        @if(count($productLineups) > 7)
        <div class="text-center mt-12 md:mt-16">
            <a href="#" 
               class="inline-flex items-center justify-center px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold rounded-lg transition-all duration-300">
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