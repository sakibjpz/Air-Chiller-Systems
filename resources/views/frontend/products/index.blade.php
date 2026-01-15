@extends('layouts.frontend')

@section('title', 'Products | Mohiuddin Engineering Limited')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Our Products</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Explore our range of engineering products and solutions
        </p>
    </div>

    @if($products->count() > 0)
    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        @foreach($products as $product)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
            <!-- Product Image -->
            <div class="relative h-48 overflow-hidden">
                @if($product->image)
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-box text-gray-400 text-4xl"></i>
                </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <div class="absolute top-3 right-3">
                    <span class="bg-blue-600/90 text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ $categories[$product->category] ?? ucfirst($product->category) }}
                    </span>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="p-5">
                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('products.show', $product->slug) }}" 
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm hover:underline">
                        View Details
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                    <button class="text-blue-500 hover:text-blue-700 p-1 rounded-full hover:bg-blue-50 transition">
                    
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- No products message -->
    <div class="text-center text-gray-500 py-12">
        <i class="fas fa-cogs text-6xl mb-4 text-blue-200"></i>
        <p class="text-lg">No products available at the moment</p>
    </div>
    @endif
</div>
@endsection