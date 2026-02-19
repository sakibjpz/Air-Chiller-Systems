@extends('layouts.admin')

@section('title', 'About Pages Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">About Pages Management</h1>
            <p class="text-gray-600">Manage your about us page content</p>
        </div>
        <a href="{{ route('admin.about.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Create New About Page
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tl-lg">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Hero Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Stats</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Vision/Mission</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($aboutPages as $about)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $about->id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-900">{{ Str::limit($about->hero_title, 30) }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ Str::limit($about->hero_description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($about->hero_stats && count($about->hero_stats) > 0)
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ count($about->hero_stats) }} stats
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                @if($about->vision_title)
                                <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Vision</span>
                                @endif
                                @if($about->mission_title)
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Mission</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $about->is_active ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                                <i class="fas fa-{{ $about->is_active ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                {{ $about->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $about->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <!-- Preview Button -->
                                <a href="{{ route('about.show', $about->id) }}" 
                                   target="_blank"
                                   class="text-purple-600 hover:text-purple-900 bg-purple-50 hover:bg-purple-100 p-2 rounded-lg transition duration-200"
                                   title="Preview Page">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.about.edit', $about) }}" 
                                   class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition duration-200"
                                   title="Edit Page">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.about.destroy', $about) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this about page?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition duration-200"
                                            title="Delete Page">
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
                                <i class="fas fa-info-circle text-5xl mb-4 text-gray-300"></i>
                                <p class="text-lg font-medium">No about pages found</p>
                                <p class="text-sm mt-2 text-gray-400">Create your first about page to get started</p>
                                <a href="{{ route('admin.about.create') }}" 
                                   class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-plus mr-2"></i>Create About Page
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
