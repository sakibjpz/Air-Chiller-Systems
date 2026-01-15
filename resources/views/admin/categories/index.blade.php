@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Category Management</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
            <i class="fas fa-plus mr-2"></i>Add New Category
        </a>
    </div>

    <!-- Categories Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">ID</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Name</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Type</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Products</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $category->id }}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center">
                            @if($category->icon)
                            <i class="{{ $category->icon }} mr-2 text-blue-500"></i>
                            @endif
                            <span class="font-medium">{{ $category->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded">{{ $category->type }}</span>
                    </td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">
                            {{ $category->products_count ?? 0 }} products
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        @if($category->is_active)
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Active</span>
                        @else
                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded">Inactive</span>
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" 
                           class="text-blue-600 hover:text-blue-800 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                              method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">
                        <i class="fas fa-tags text-3xl mb-2"></i>
                        <p>No categories found. Add your first category!</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
