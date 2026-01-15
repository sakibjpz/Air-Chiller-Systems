@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
        <p class="text-gray-600 mt-1">Update product details</p>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Product Name *
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., Central AC Unit" required>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                        Category *
                    </label>
                    <select id="category" name="category" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->slug }}" 
                                {{ $product->category == $category->slug ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Product details and specifications">{{ old('description', $product->description) }}</textarea>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Current Image
                    </label>
                    @if($product->image)
                    <div class="mb-3">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                             class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                    @endif

                    <!-- New Image -->
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                        New Image (Leave empty to keep current)
                    </label>
                    <input type="file" id="image" name="image" 
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                           accept="image/*">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" 
                                   {{ $product->is_active ? 'checked' : '' }}
                                   class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-2">Active</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" 
                                   {{ !$product->is_active ? 'checked' : '' }}
                                   class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-2">Inactive</span>
                        </label>
                    </div>
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">
                        Display Order
                    </label>
                    <input type="number" id="sort_order" name="sort_order" 
                           value="{{ old('sort_order', $product->sort_order) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           min="0">
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" 
               class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                Cancel
            </a>
            <button type="submit" 
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium flex items-center">
                <i class="fas fa-save mr-2"></i>
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection