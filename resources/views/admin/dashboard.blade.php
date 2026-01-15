@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600 mt-1">Welcome back, {{ Auth::user()->name }}!</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Products Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-box text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Product::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Products Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-700">Active Products</h3>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Product::where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-tags text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-700">Categories</h3>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Product::distinct('category')->count('category') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Recent Products</h2>
        </div>
        <div class="p-6">
            @php
            $recentProducts = \App\Models\Product::latest()->take(5)->get();
            @endphp
            
            @if($recentProducts->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-3 px-4 text-left font-medium text-gray-700">Name</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-700">Category</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-700">Status</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-700">Added</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($recentProducts as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium">{{ $product->name }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                @if($product->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Active</span>
                                @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded">Inactive</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-500">{{ $product->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-box-open text-3xl mb-2"></i>
                <p>No products yet. Add your first product!</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
