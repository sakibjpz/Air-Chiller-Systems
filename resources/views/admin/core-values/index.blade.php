@extends('layouts.admin')

@section('title', 'Core Values Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-blue-800">Core Values Management</h1>
        <a href="{{ route('admin.core-values.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i>Add New Core Value
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Icon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($coreValues as $index => $coreValue)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($coreValue->image)
                                <img src="{{ asset('images/core-values/' . $coreValue->image) }}" 
                                     alt="{{ $coreValue->title }}" 
                                     class="w-12 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">{{ $coreValue->title }}</div>
                            <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($coreValue->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            @if($coreValue->icon)
                                <i class="{{ $coreValue->icon }} text-blue-600 text-lg"></i>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $coreValue->sort_order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $coreValue->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $coreValue->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.core-values.edit', $coreValue) }}" 
                                   class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.core-values.destroy', $coreValue) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this core value?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                            <p class="text-lg">No core values found.</p>
                            <p class="text-sm mt-2">Add your first core value to get started.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection