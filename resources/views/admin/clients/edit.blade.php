@extends('layouts.admin')

@section('title', 'Edit Client')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Client</h1>
        <p class="text-gray-600">Update client information and logo</p>
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.clients.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Clients
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="p-6 space-y-6">
                <!-- Current Logo Preview -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Current Logo
                    </label>
                    <div class="flex items-center space-x-4">
                        @if($client->logo)
                            <div class="h-24 w-24 border border-gray-200 rounded-lg overflow-hidden bg-white p-2 flex items-center justify-center">
                                <img src="{{ asset($client->logo) }}" 
                                     alt="{{ $client->name }}" 
                                     class="max-h-full max-w-full object-contain">
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">
                                    Current logo will be replaced if you upload a new one.
                                </p>
                            </div>
                        @else
                            <div class="h-24 w-24 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 flex items-center justify-center">
                                <span class="text-gray-400">No logo</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Client Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Client Name *
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name"
                           value="{{ old('name', $client->name) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Enter client company name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website URL -->
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-2">
                        Website URL
                    </label>
                    <input type="url" 
                           name="website" 
                           id="website"
                           value="{{ old('website', $client->website) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="https://example.com">
                    @error('website')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Logo Upload -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload New Logo (Optional)
                    </label>
                    <div class="mt-1 flex items-center space-x-4">
                        <div class="flex-1">
                            <input type="file" 
                                   name="logo" 
                                   id="logo"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                   onchange="previewImage(event)">
                            <p class="mt-2 text-sm text-gray-500">
                                Leave empty to keep current logo. Max 2MB.
                            </p>
                            @error('logo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="preview-container hidden">
                            <div class="h-24 w-24 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden bg-gray-50 flex items-center justify-center">
                                <img id="logo-preview" class="max-h-full max-w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                        Sort Order
                    </label>
                    <input type="number" 
                           name="sort_order" 
                           id="sort_order"
                           value="{{ old('sort_order', $client->sort_order ?? 0) }}"
                           class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="0">
                    <p class="mt-2 text-sm text-gray-500">
                        Lower numbers appear first.
                    </p>
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div>
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="is_active" 
                               id="is_active"
                               value="1"
                               {{ old('is_active', $client->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Active (Show on website)
                        </label>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        If unchecked, this client will be hidden from the website.
                    </p>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                <form action="{{ route('admin.clients.destroy', $client) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this client? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Client
                    </button>
                </form>
                
                <div class="flex space-x-3">
                    <a href="{{ route('admin.clients.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Client
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('logo-preview');
    const container = document.querySelector('.preview-container');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        container.classList.add('hidden');
    }
}
</script>
@endsection