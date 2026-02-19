@extends('layouts.admin')

@section('title', 'Product Lineups Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Product Lineups Management</h1>
            <p class="text-gray-600">Manage your other products and their details</p>
        </div>
        <a href="{{ route('admin.product-lineups.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Add New Product
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3 text-red-600"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tl-lg">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Product Info</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Details</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Features</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Specs</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($productLineups as $index => $lineup)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($lineup->image)
                                <img src="{{ asset($lineup->image) }}" 
                                     alt="{{ $lineup->title }}" 
                                     class="w-14 h-14 object-cover rounded-lg shadow-md border-2 border-blue-100">
                            @else
                                <div class="w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-gray-400 text-xl"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $lineup->title }}</div>
                            @if($lineup->subtitle)
                                <div class="text-xs text-gray-500 mt-1">{{ $lineup->subtitle }}</div>
                            @endif
                            <div class="text-xs text-gray-400 mt-1">Slug: {{ $lineup->slug }}</div>
                            @if($lineup->model_number)
                                <div class="text-xs text-blue-600 mt-1">Model: {{ $lineup->model_number }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                @if($lineup->brand)
                                    <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded-full">Brand: {{ $lineup->brand }}</span>
                                @endif
                                @if($lineup->origin)
                                    <div class="text-xs text-gray-600">Origin: {{ $lineup->origin }}</div>
                                @endif
                                @if($lineup->warranty)
                                    <div class="text-xs text-gray-600">Warranty: {{ $lineup->warranty }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($lineup->features && count($lineup->features) > 0)
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ count($lineup->features) }} features
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($lineup->specifications && count($lineup->specifications) > 0)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ count($lineup->specifications) }} specs
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                {{ $lineup->sort_order }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $lineup->is_active ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                                <i class="fas fa-{{ $lineup->is_active ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $lineup->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <!-- Quick View Button -->
                                <button onclick="quickView({{ $lineup->id }})" 
                                        class="text-purple-600 hover:text-purple-900 bg-purple-50 hover:bg-purple-100 p-2 rounded-lg transition duration-200"
                                        title="Quick View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.product-lineups.edit', $lineup) }}" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition duration-200"
                                   title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.product-lineups.destroy', $lineup) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product? All associated data will be deleted.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition duration-200"
                                            title="Delete Product">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-16 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-box-open text-5xl mb-4 text-gray-300"></i>
                                <p class="text-lg font-medium">No products found</p>
                                <p class="text-sm mt-2 text-gray-400">Get started by adding your first product</p>
                                <a href="{{ route('admin.product-lineups.create') }}" 
                                   class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Add New Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Summary Footer -->
        @if($productLineups->count() > 0)
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div>
                    <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
                    <span>Total Products: <strong>{{ $productLineups->count() }}</strong></span>
                    <span class="mx-3">|</span>
                    <span>Active: <strong class="text-green-600">{{ $productLineups->where('is_active', true)->count() }}</strong></span>
                    <span class="mx-2">•</span>
                    <span>Inactive: <strong class="text-red-600">{{ $productLineups->where('is_active', false)->count() }}</strong></span>
                </div>
                <div>
                    <i class="fas fa-tags mr-2 text-purple-500"></i>
                    <span>With Features: <strong>{{ $productLineups->filter(function($p) { return $p->features && count($p->features) > 0; })->count() }}</strong></span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Quick View Modal -->
<div id="quickViewModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6" id="quickViewContent">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<script>
function quickView(id) {
    // You can implement this with AJAX to show product details
    // For now, it will just show a message
    alert('Quick view feature coming soon! You can click Edit to view all details.');
}

// Quick Tips Tooltip
document.addEventListener('DOMContentLoaded', function() {
    const tooltip = document.createElement('div');
    tooltip.className = 'fixed bottom-6 right-6';
    tooltip.innerHTML = `
        <div class="relative group">
            <button class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition duration-300">
                <i class="fas fa-question text-xl"></i>
            </button>
            <div class="absolute bottom-full right-0 mb-3 w-64 bg-white rounded-lg shadow-xl p-4 text-sm text-gray-600 hidden group-hover:block transition duration-300">
                <h4 class="font-bold text-gray-800 mb-2">Quick Tips:</h4>
                <ul class="space-y-2">
                    <li><i class="fas fa-eye text-purple-500 mr-2"></i>Quick View: Preview details</li>
                    <li><i class="fas fa-edit text-blue-500 mr-2"></i>Edit: Update product info</li>
                    <li><i class="fas fa-trash text-red-500 mr-2"></i>Delete: Removes product</li>
                    <li><i class="fas fa-tag text-green-500 mr-2"></i>Features/Specs count shown</li>
                </ul>
            </div>
        </div>
    `;
    document.body.appendChild(tooltip);
});
</script>
@endsection