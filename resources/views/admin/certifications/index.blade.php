@extends('layouts.admin')

@section('title', 'Certifications Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-blue-800">Certifications Management</h1>
        <a href="{{ route('admin.certifications.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i>Add New Certification
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($certifications as $index => $certification)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($certification->image)
                                <img src="{{ asset($certification->image) }}" 
                                     alt="Certification" 
                                     class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">
                                {{ $certification->title ?: 'No Title' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $certification->sort_order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $certification->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $certification->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.certifications.edit', $certification) }}" 
                                   class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.certifications.destroy', $certification) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this certification?')">
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
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-award text-4xl mb-4 text-gray-300"></i>
                            <p class="text-lg">No certifications found.</p>
                            <p class="text-sm mt-2">Add your first certification to get started.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection