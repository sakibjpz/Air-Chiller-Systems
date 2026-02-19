@extends('layouts.admin')

@section('title', 'Solutions Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Solutions Management</h1>
            <p class="text-gray-600">Manage all your solution pages and their content</p>
        </div>
        <a href="{{ route('admin.solutions.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Add New Solution
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Features</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Equipment</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Stats</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($solutions as $index => $solution)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($solution->image)
                                <img src="{{ asset($solution->image) }}" 
                                     alt="{{ $solution->title }}" 
                                     class="w-12 h-12 object-cover rounded-lg shadow-md border-2 border-blue-100">
                            @else
                                <div class="w-12 h-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-900">{{ $solution->title }}</div>
                            <div class="text-xs text-gray-500 mt-1">Slug: {{ $solution->slug }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($solution->features && count($solution->features) > 0)
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ count($solution->features) }} features
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($solution->equipment && count($solution->equipment) > 0)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ count($solution->equipment) }} items
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($solution->statistics && count($solution->statistics) > 0)
                                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ count($solution->statistics) }} stats
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                {{ $solution->sort_order }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $solution->is_active ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                                <i class="fas fa-{{ $solution->is_active ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $solution->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <!-- Gallery Button -->
                                <a href="{{ route('admin.solutions.galleries.index', $solution) }}" 
                                   class="text-green-600 hover:text-green-900 bg-green-50 hover:bg-green-100 p-2 rounded-lg transition duration-200"
                                   title="Manage Gallery">
                                    <i class="fas fa-images"></i>
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.solutions.edit', $solution) }}" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition duration-200"
                                   title="Edit Solution">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- View Button (opens frontend) -->
                                <a href="{{ route('solutions.show', $solution->slug) }}" 
                                   target="_blank"
                                   class="text-purple-600 hover:text-purple-900 bg-purple-50 hover:bg-purple-100 p-2 rounded-lg transition duration-200"
                                   title="View on Website">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.solutions.destroy', $solution) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this solution? All gallery images will also be deleted.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition duration-200"
                                            title="Delete Solution">
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
                                <i class="fas fa-inbox text-5xl mb-4 text-gray-300"></i>
                                <p class="text-lg font-medium">No solutions found</p>
                                <p class="text-sm mt-2 text-gray-400">Get started by adding your first solution</p>
                                <a href="{{ route('admin.solutions.create') }}" 
                                   class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Add New Solution
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Summary Footer -->
        @if($solutions->count() > 0)
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div>
                    <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
                    <span>Total Solutions: <strong>{{ $solutions->count() }}</strong></span>
                    <span class="mx-3">|</span>
                    <span>Active: <strong class="text-green-600">{{ $solutions->where('is_active', true)->count() }}</strong></span>
                    <span class="mx-2">•</span>
                    <span>Inactive: <strong class="text-red-600">{{ $solutions->where('is_active', false)->count() }}</strong></span>
                </div>
                <div>
                    <i class="fas fa-images mr-2 text-green-500"></i>
                    <span>Total Gallery Images: <strong>{{ $solutions->sum(function($s) { return $s->galleries->count(); }) }}</strong></span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Quick Tips Tooltip -->
<div class="fixed bottom-6 right-6">
    <div class="relative group">
        <button class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition duration-300">
            <i class="fas fa-question text-xl"></i>
        </button>
        <div class="absolute bottom-full right-0 mb-3 w-64 bg-white rounded-lg shadow-xl p-4 text-sm text-gray-600 hidden group-hover:block transition duration-300">
            <h4 class="font-bold text-gray-800 mb-2">Quick Tips:</h4>
            <ul class="space-y-2">
                <li><i class="fas fa-images text-green-500 mr-2"></i>Gallery: Manage solution images</li>
                <li><i class="fas fa-edit text-blue-500 mr-2"></i>Edit: Update solution content</li>
                <li><i class="fas fa-eye text-purple-500 mr-2"></i>View: Preview on website</li>
                <li><i class="fas fa-trash text-red-500 mr-2"></i>Delete: Removes everything</li>
            </ul>
        </div>
    </div>
</div>
@endsection