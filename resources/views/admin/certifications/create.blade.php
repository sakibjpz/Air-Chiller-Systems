@extends('layouts.admin')

@section('title', 'Add Certification')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Add New Certification</h1>
        <p class="text-gray-600">Upload certification images for display</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                <!-- Title (Optional) -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Title (Optional)
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                           placeholder="e.g., ISO 9001:2015, Trade License">
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                        Certification Image *
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-500 transition duration-300">
                        <div class="mb-4">
                            <i class="fas fa-file-certificate text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Upload certification document or logo</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                        </div>
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="w-full"
                               required>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', 0) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               min="0">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="0" 
                                       {{ old('is_active') == '0' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.certifications.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i>Save Certification
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection