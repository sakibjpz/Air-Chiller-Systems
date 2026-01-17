@extends('layouts.admin')

@section('title', 'Manage News')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">News & Articles</h1>
                <p class="text-gray-600">Manage news articles, blog posts, and company updates</p>
            </div>
            <a href="{{ route('admin.news.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>
                Add New Article
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center mr-4">
                    <i class="fas fa-newspaper text-blue-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $news->total() }}</div>
                    <div class="text-sm text-gray-600">Total Articles</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center mr-4">
                    <i class="fas fa-eye text-green-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $news->sum('views') }}</div>
                    <div class="text-sm text-gray-600">Total Views</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center mr-4">
                    <i class="fas fa-star text-yellow-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $news->where('is_featured', true)->count() }}</div>
                    <div class="text-sm text-gray-600">Featured</div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mr-4">
                    <i class="fas fa-layer-group text-purple-600"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">3</div>
                    <div class="text-sm text-gray-600">Categories</div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">All Articles</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Filter:</span>
                    <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm">
                        <option>All Categories</option>
                        <option>New Products</option>
                        <option>Exhibition News</option>
                        <option>Company News</option>
                    </select>
                </div>
            </div>
        </div>

        @if($news->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Article
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Views
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($news as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-lg overflow-hidden">
                                        <img src="{{ asset($item->featured_image ?? 'images/default-news.jpg') }}" 
                                             alt="{{ $item->title }}"
                                             class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 truncate max-w-xs">
                                            {{ $item->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit(strip_tags($item->excerpt ?? $item->content), 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $item->category == 'New Products' ? 'bg-blue-100 text-blue-800' : 
                                       ($item->category == 'Exhibition News' ? 'bg-purple-100 text-purple-800' : 
                                       'bg-green-100 text-green-800') }}">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->published_date->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $item->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $item->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                    @if($item->is_featured)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Featured
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-eye mr-1 text-gray-400"></i>
                                    {{ $item->views }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('news.show', $item->slug) }}" 
                                       target="_blank"
                                       class="text-blue-600 hover:text-blue-900"
                                       title="View">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $item) }}" 
                                       class="text-blue-600 hover:text-blue-900"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-newspaper text-4xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Articles Yet</h3>
                <p class="text-gray-500 mb-6">Start by publishing your first news article.</p>
                <a href="{{ route('admin.news.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i>
                    Create First Article
                </a>
            </div>
        @endif
    </div>
</div>
@endsection