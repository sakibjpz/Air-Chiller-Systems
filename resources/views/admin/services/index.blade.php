@extends('layouts.admin')

@section('title', 'Services Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Services Management</h1>
            <p class="text-gray-600">Manage all your service pages and their content</p>
        </div>
        <a href="{{ route('admin.services.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Add New Service
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

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tl-lg">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Sections</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($services as $index => $service)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($service->image)
                                <img src="{{ asset($service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-14 h-14 object-cover rounded-lg shadow-md border-2 border-blue-100">
                            @else
                                <div class="w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-cog text-gray-400 text-xl"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $service->title }}</div>
                            @if($service->subtitle)
                                <div class="text-xs text-gray-500 mt-1">{{ $service->subtitle }}</div>
                            @endif
                            <div class="text-xs text-gray-400 mt-1">Slug: {{ $service->slug }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                @if($service->statistics)
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Stats</span>
                                @endif
                                @if($service->overview_cards)
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Overview</span>
                                @endif
                                @if($service->support_features)
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Support</span>
                                @endif
                                @if($service->building_systems)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Systems</span>
                                @endif
                                @if($service->chillers)
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Chillers</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                {{ $service->sort_order }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                                <i class="fas fa-{{ $service->is_active ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <!-- Preview Button -->
                                <a href="{{ route('services.show', $service->slug) }}" 
                                   target="_blank"
                                   class="text-purple-600 hover:text-purple-900 bg-purple-50 hover:bg-purple-100 p-2 rounded-lg transition duration-200"
                                   title="Preview Service">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.services.edit', $service) }}" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition duration-200"
                                   title="Edit Service">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.services.destroy', $service) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this service? All associated data will be deleted.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition duration-200"
                                            title="Delete Service">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-cogs text-5xl mb-4 text-gray-300"></i>
                                <p class="text-lg font-medium">No services found</p>
                                <p class="text-sm mt-2 text-gray-400">Get started by adding your first service</p>
                                <a href="{{ route('admin.services.create') }}" 
                                   class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Add New Service
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Summary Footer -->
        @if($services->count() > 0)
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div>
                    <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
                    <span>Total Services: <strong>{{ $services->count() }}</strong></span>
                    <span class="mx-3">|</span>
                    <span>Active: <strong class="text-green-600">{{ $services->where('is_active', true)->count() }}</strong></span>
                    <span class="mx-2">•</span>
                    <span>Inactive: <strong class="text-red-600">{{ $services->where('is_active', false)->count() }}</strong></span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Quick Tips Tooltip -->
<script>
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
                    <li><i class="fas fa-eye text-purple-500 mr-2"></i>Preview: View on website</li>
                    <li><i class="fas fa-edit text-blue-500 mr-2"></i>Edit: Update service content</li>
                    <li><i class="fas fa-trash text-red-500 mr-2"></i>Delete: Removes service</li>
                    <li><i class="fas fa-tag text-green-500 mr-2"></i>Colored badges show active sections</li>
                </ul>
            </div>
        </div>
    `;
    document.body.appendChild(tooltip);
});
</script>
@endsection
