@extends('layouts.frontend')

@section('title', $product->name . ' | Mohiuddin Engineering Limited')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="mb-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                        <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Products
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-sm"></i>
                        <span class="text-sm text-gray-500">{{ Str::limit($product->name, 30) }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Product Section -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12 border border-gray-100">
        <div class="md:flex">
            <!-- Left Column - Product Visuals (60%) -->
            <div class="md:w-3/5 p-6 md:p-10">
                <!-- Main Product Image -->
                <div class="mb-6">
                    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-4 md:p-8 border border-gray-200 shadow-inner">
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->name }}"
                             class="w-full h-auto max-h-[600px] object-contain rounded-xl hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-96 rounded-xl bg-gradient-to-br from-gray-200 to-gray-300 flex flex-col items-center justify-center">
                            <i class="fas fa-industry text-gray-400 text-8xl mb-4"></i>
                            <p class="text-gray-500 font-medium">Product Image</p>
                        </div>
                        @endif
                        
                        <!-- Product Status Badge -->
                        <div class="absolute top-6 right-6">
                            @if($product->is_active)
                            <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white text-sm font-bold rounded-full shadow-lg">
                                <i class="fas fa-check-circle mr-2"></i> In Stock
                            </span>
                            @else
                            <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-sm font-bold rounded-full shadow-lg">
                                <i class="fas fa-clock mr-2"></i> Out of Stock
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Image Thumbnails (Placeholder for future gallery) -->
                <div class="flex space-x-3 justify-center">
                    <div class="w-20 h-20 rounded-lg bg-gray-200 border-2 border-blue-300 flex items-center justify-center cursor-pointer">
                        <i class="fas fa-image text-gray-400"></i>
                    </div>
                    <div class="w-20 h-20 rounded-lg bg-gray-100 border border-gray-300 flex items-center justify-center cursor-pointer hover:border-blue-400">
                        <i class="fas fa-plus text-gray-400"></i>
                    </div>
                    <div class="w-20 h-20 rounded-lg bg-gray-100 border border-gray-300 flex items-center justify-center cursor-pointer hover:border-blue-400">
                        <i class="fas fa-plus text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Right Column - Product Info (40%) -->
            <div class="md:w-2/5 p-6 md:p-10 border-l border-gray-100">
                <!-- Category Badge -->
                <div class="mb-6">
                    @if($product->category)
                    <span class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-bold rounded-full shadow-md">
                        {{ $product->category()->first()->name ?? 'Uncategorized' }}
                    </span>
                    @endif
                </div>

                <!-- Product Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    {{ $product->name }}
                </h1>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                                <i class="fas fa-hashtag text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Product ID</p>
                                <p class="text-lg font-bold text-gray-900">#{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Added</p>
                                <p class="text-lg font-bold text-gray-900">{{ $product->created_at->format('M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Product Description
                    </h3>
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        @if($product->description)
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                        @else
                        <p class="text-gray-500 italic">Detailed description will be added soon.</p>
                        @endif
                    </div>
                </div>

                <!-- Key Features -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>
                        Key Features
                    </h3>
                    <div class="space-y-3">
                        @php
                        // Get features from the product's features_array attribute
                        $productFeatures = $product->features_array;
                        @endphp
                        
                        @if(!empty($productFeatures))
                            @foreach($productFeatures as $feature)
                            <div class="flex items-center bg-gradient-to-r from-gray-50 to-white p-3 rounded-lg border border-gray-200 hover:border-blue-300 transition">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-700 font-medium">{{ $feature }}</span>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center py-4 text-gray-500">
                                <i class="fas fa-clipboard-list text-2xl mb-2"></i>
                                <p>Features information coming soon</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Inquiry Buttons -->
                <div class="sticky top-6 space-y-3">
                    <a href="tel:+88012145677" 
                       class="block w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-xl text-center hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                       <i class="fas fa-phone-alt mr-2"></i> Call Now: +880 (121) 456 77
                    </a>
                    
                    <a href="mailto:mohiuddinrengineering@gmail.com" 
                       class="block w-full py-4 border-2 border-blue-600 text-blue-600 font-bold rounded-xl text-center hover:bg-blue-50 transition-all duration-300">
                       <i class="fas fa-envelope mr-2"></i> Email Inquiry
                    </a>
                    
                    <a href="{{ route('products.index') }}" 
                       class="block w-full py-3 text-gray-600 font-medium text-center hover:text-blue-600 transition">
                       <i class="fas fa-arrow-left mr-2"></i> Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Specifications Tabbed Section -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12 border border-gray-100">
        <div class="border-b border-gray-200">
            <div class="flex overflow-x-auto">
                <button class="tab-button active px-6 py-4 font-bold text-blue-600 border-b-2 border-blue-600">
                    <i class="fas fa-clipboard-list mr-2"></i> Specifications
                </button>
                <button class="tab-button px-6 py-4 font-medium text-gray-600 hover:text-blue-600">
                    <i class="fas fa-cogs mr-2"></i> Applications
                </button>
                <button class="tab-button px-6 py-4 font-medium text-gray-600 hover:text-blue-600">
                    <i class="fas fa-file-alt mr-2"></i> Documentation
                </button>
            </div>
        </div>
        
        <div class="p-8">
            <!-- Specifications Content -->
            <div class="tab-content active">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-gray-50 to-white p-5 rounded-xl border border-gray-200">
                        <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-tag text-blue-500 mr-2"></i>
                            Basic Information
                        </h4>
                        <div class="space-y-2">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Product Name</span>
                                <span class="font-medium">{{ $product->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Category</span>
                                <span class="font-medium">{{ $product->category->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Status</span>
                                <span class="font-medium {{ $product->is_active ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->is_active ? 'Available' : 'Not Available' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Add more specification cards as needed -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-xl border border-blue-200">
                        <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-industry text-blue-500 mr-2"></i>
                            Industry Standards
                        </h4>
                        <p class="text-gray-700">Complies with international engineering standards and certifications.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-xl border border-green-200">
                        <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-award text-green-500 mr-2"></i>
                            Quality Assurance
                        </h4>
                        <p class="text-gray-700">High-quality materials and rigorous testing ensure long-term reliability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tab-button {
    transition: all 0.3s ease;
    white-space: nowrap;
}

.tab-button.active {
    color: #2563eb;
    border-bottom-color: #2563eb;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}
</style>

<script>
// Simple tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');
            
            // Show corresponding content
            const tabIndex = Array.from(tabButtons).indexOf(button);
            if (tabContents[tabIndex]) {
                tabContents[tabIndex].classList.add('active');
            }
        });
    });
});
</script>
@endsection