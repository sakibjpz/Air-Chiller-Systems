@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')

@if(session('success'))
<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
    <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <span>{{ session('success') }}</span>
    </div>
</div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Product Management</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
            <i class="fas fa-plus mr-2"></i>Add New Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">ID</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Image</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Name</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Category</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
          <tbody>
    @forelse($products as $product)
    <tr class="border-b hover:bg-gray-50">
        <td class="py-3 px-4">{{ $product->id }}</td>
        <td class="py-3 px-4">
            @if($product->image)
                <img src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-12 h-12 object-cover rounded">
            @else
                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                    <i class="fas fa-box text-gray-400"></i>
                </div>
            @endif
        </td>
        <td class="py-3 px-4 font-medium">{{ $product->name }}</td>
       <td class="py-3 px-4">
    @if($product->category)
        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
            {{ $product->category->name ?? 'N/A' }}
        </span>
    @else
        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">
            No Category
        </span>
    @endif
</td>
        <td class="py-3 px-4">
            @if($product->is_active)
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Active</span>
            @else
                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Inactive</span>
            @endif
        </td>
        <td class="py-3 px-4">
           <a href="{{ route('admin.products.edit', $product->id) }}" 
   class="text-blue-600 hover:text-blue-800 mr-3">
    <i class="fas fa-edit"></i>
</a>
<form action="{{ route('admin.products.destroy', $product->id) }}" 
      method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
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
            <i class="fas fa-box-open text-3xl mb-2"></i>
            <p>No products found. Add your first product!</p>
        </td>
    </tr>
    @endforelse
</tbody>
        </table>
    </div>

    <!-- Info Box -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex">
            <i class="fas fa-info-circle text-blue-500 text-xl mr-3 mt-1"></i>
            <div>
                <h4 class="font-bold text-blue-800">Product Management</h4>
                <p class="text-blue-700 text-sm mt-1">
                    This is where you can manage all your products. Add new products, edit existing ones, or remove products from your catalog.
                    Products will appear on the home page under "Popular Product Groups".
                </p>
            </div>
        </div>
    </div>
</div>
@endsection