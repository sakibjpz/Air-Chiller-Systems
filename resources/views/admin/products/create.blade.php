@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Add New Product</h2>
        <p class="text-gray-600 mt-1">Fill in the product details below</p>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Product Name *
                    </label>
                    <input type="text" id="name" name="name" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="e.g., Central AC Unit" required>
                </div>

                
                <!-- Category -->
<!-- Category -->
<div>
    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
        Category *
    </label>
    <select id="category_id" name="category_id" 
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                              placeholder="Product details and specifications"></textarea>
                </div>
                <!-- Features -->
<div>
    <label for="features" class="block text-sm font-medium text-gray-700 mb-1">
        Features (One per line)
    </label>
    <textarea id="features" name="features" rows="6"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Enter each feature on a new line:
• High Efficiency
• Energy Saving
• Durable Construction
• Easy Maintenance
• Industry Certified"></textarea>
    <p class="text-xs text-gray-500 mt-1">
        Enter one feature per line. These will be displayed as bullet points.
    </p>
</div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Product Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                        Product Image
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Drag & drop or click to upload</p>
                        <input type="file" id="image" name="image" 
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               accept="image/*">
                        <p class="text-xs text-gray-500 mt-2">PNG, JPG, WEBP up to 2MB</p>
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" checked 
                                   class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-2">Active</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" 
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
                    <input type="number" id="sort_order" name="sort_order" value="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           min="0">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers display first</p>
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
                Save Product
            </button>
        </div>
    </form>
</div>
@endsection