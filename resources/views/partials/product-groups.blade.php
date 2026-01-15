{{-- 

@php
$categories = [
    'all' => 'All Products',
    'hvac' => 'HVAC Systems',
    'cooling' => 'Cooling Systems',
    'electrical' => 'Electrical Panels',
    'pumps' => 'Water Pumps',
    'compression' => 'Compressors',
];

$products = [
    ['category' => 'hvac', 'name' => 'Central AC Unit', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Commercial central air conditioning unit'],
    ['category' => 'hvac', 'name' => 'VRF System', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Variable refrigerant flow system'],
    ['category' => 'hvac', 'name' => 'Ducted AC', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Ducted air conditioning system'],
    ['category' => 'cooling', 'name' => 'Water Chiller', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Industrial water chilling unit'],
    ['category' => 'cooling', 'name' => 'Air Cooled Chiller', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Air cooled industrial chiller'],
    ['category' => 'electrical', 'name' => 'Main Distribution', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Main electrical distribution panel'],
    ['category' => 'pumps', 'name' => 'Submersible Pump', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Industrial submersible water pump'],
    ['category' => 'pumps', 'name' => 'Centrifugal Pump', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'High capacity centrifugal pump'],
    ['category' => 'compression', 'name' => 'Air Compressor', 'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'description' => 'Industrial air compressor unit'],
];
@endphp --}}



  {{-- <div class="absolute top-3 right-3">
                    <span class="bg-blue-600/90 text-white text-xs font-semibold px-2 py-1 rounded">
                        ${category === 'all' ? (product.category ? (product.category.charAt(0).toUpperCase() + product.category.slice(1)) : '') : 
                          '${category.charAt(0).toUpperCase() + category.slice(1)}'}
                    </span>
                </div> --}}


@php
// Categories are now passed from controller
// $categories is an array: ['all' => 'All Products', 'slug1' => 'Name1', 'slug2' => 'Name2', ...]
@endphp

<!-- Popular Products Section -->
<section class="mb-16">
    <div class="text-center mb-10">
        <h2 class="text-2xl sm:text-3xl font-bold text-blue-800 mb-3">Our Products</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Browse our engineering products by category</p>
    </div>

    <!-- Category Tabs - Dynamic from Database -->
    <div class="flex flex-wrap justify-center gap-3 mb-10" id="categoryTabs">
        @foreach($categories as $slug => $name)
        <button onclick="filterProducts('{{ $slug }}')" 
                class="category-tab {{ $slug == 'all' ? 'active' : '' }} px-5 py-3 {{ $slug == 'all' ? 'bg-blue-600 text-white' : 'bg-white text-blue-700 border-2 border-blue-200' }} rounded-xl font-semibold transition-all duration-300 text-sm sm:text-base shadow-md hover:shadow-lg hover:-translate-y-1"
                data-category="{{ $slug }}">
            @if($slug == 'all')
                <i class="fas fa-boxes mr-2"></i>
            @else
                @php
                    // Get icon from database if available
                    $categoryIcon = \App\Models\Category::where('slug', $slug)->first()->icon ?? 'fas fa-folder';
                @endphp
                <i class="{{ $categoryIcon }} mr-2"></i>
            @endif
            {{ $name }}
        </button>
        @endforeach
    </div>

    <!-- Products Grid - Show first 6 products, 3 per row -->
    <div id="productsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products->take(6) as $product)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1 product-card" data-category="{{ $product->category }}">
            <!-- Product Image -->
            <div class="relative h-48 overflow-hidden">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <div class="absolute top-3 right-3">
                    <span class="bg-blue-600/90 text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ $categories[$product->category] ?? $product->category }}
                    </span>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $product->description }}</p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('products.show', $product->slug) }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm hover:underline">
                        View Details
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- View All Button -->
    <div class="text-center mt-10">
        <a href="{{ route('products.index') }}" 
           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300 shadow-md hover:shadow-lg">
            View All Products
            <i class="fas fa-chevron-right ml-2"></i>
        </a>
    </div>
</section>

<script>
function filterProducts(category) {
    const products = @json($products->toArray());
    const grid = document.getElementById('productsGrid');
    const buttons = document.querySelectorAll('.category-tab');
    
    // Update active button
    buttons.forEach(btn => {
        const btnCategory = btn.getAttribute('data-category');
        if (btnCategory === category) {
            btn.classList.remove('bg-white', 'text-blue-700', 'border-2', 'border-blue-200');
            btn.classList.add('active', 'bg-blue-600', 'text-white');
        } else {
            btn.classList.remove('active', 'bg-blue-600', 'text-white');
            btn.classList.add('bg-white', 'text-blue-700', 'border-2', 'border-blue-200');
        }
    });
    
    // Filter and display products
    let filteredProducts = category === 'all' 
        ? products.slice(0, 6) 
        : products.filter(p => p.category === category).slice(0, 6);
    
    grid.innerHTML = filteredProducts.map(product => `
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
            <div class="relative h-48 overflow-hidden">
                <img src="${product.image.startsWith('http') ? product.image : '/' + product.image}" 
                     alt="${product.name}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>


              
                
            </div>
            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-800 mb-2">${product.name}</h3>
                <p class="text-gray-600 text-sm mb-4">${product.description}</p>
                <div class="flex items-center justify-between">
                    <a href="/products/${product.slug}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm hover:underline">
                        View Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    `).join('');
}
</script>

<style>
/* Smooth tab transition */
button {
    transition: all 0.2s ease;
}

/* Product card hover effect */
.bg-white:hover {
    transform: translateY(-5px);
}

/* Category tab active state */
.category-tab.active {
    background: linear-gradient(135deg, #164DFF 0%, #2387B9 100%);
    box-shadow: 0 4px 15px rgba(22, 77, 255, 0.3);
    transform: translateY(-1px);
    border: none !important;
}
</style>