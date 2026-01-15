@extends('layouts.admin')

@section('title', 'Add New Category')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Add New Category</h2>
        <p class="text-gray-600 mt-1">Create a new product category</p>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        
        <div class="space-y-6">
            <!-- Category Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Category Name *
                </label>
                <input type="text" id="name" name="name" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g., HVAC Systems" required>
            </div>

            <!-- Category Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                    Type *
                </label>
                <select id="type" name="type" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="product" selected>Product Category</option>
                    <option value="service">Service Category</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Brief description of this category"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">
                        Font Awesome Icon
                    </label>
                    <input type="text" id="icon" name="icon" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="fas fa-wind">
                    <p class="text-xs text-gray-500 mt-1">Font Awesome icon class</p>
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">
                        Color Theme
                    </label>
                    <select id="color" name="color" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="blue" selected>Blue</option>
                        <option value="green">Green</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="purple">Purple</option>
                        <option value="pink">Pink</option>
                        <option value="indigo">Indigo</option>
                        <option value="gray">Gray</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">
                        Display Order
                    </label>
                    <input type="number" id="sort_order" name="sort_order" value="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           min="0">
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
            </div>
        </div>

        <!-- Form Actions -->
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
            <a href="{{ route('admin.categories.index') }}" 
               class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                Cancel
            </a>
            <button type="submit" 
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium flex items-center">
                <i class="fas fa-save mr-2"></i>
                Save Category
            </button>
        </div>
    </form>
</div>
@endsection
