<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Mohiuddin Engineering</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS via Vite -->
    @vite(['resources/css/app.css'])
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @stack('styles')
</head>
<body class="bg-gray-100">
    <!-- Admin Navigation -->
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">
                        <i class="fas fa-cogs mr-2"></i>Admin Panel
                    </a>
                    <a href="{{ route('home') }}" class="text-blue-200 hover:text-white">
                        <i class="fas fa-globe mr-1"></i>View Site
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-blue-200">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-blue-200 hover:text-white">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Sidebar & Content -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-4">Management</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                            <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                            <i class="fas fa-tags mr-3"></i>Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 bg-blue-700 rounded">
                            <i class="fas fa-box mr-3"></i>Products
                        </a>
                    </li>

<li>
    <a href="{{ route('admin.core-values.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-heart mr-3"></i>Core Values
    </a>
</li>


<li>
    <a href="{{ route('admin.solutions.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-cogs mr-3"></i>Solutions
    </a>
</li>

<li>
    <a href="{{ route('admin.product-lineups.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-boxes mr-3"></i>Other Products
    </a>
</li>

<li>
    <a href="{{ route('admin.certifications.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-award mr-3"></i>Certifications
    </a>
</li>


<li>
    <a href="{{ route('admin.galleries.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-images mr-3"></i>Latest Gallery
    </a>
</li>

<li>
    <a href="{{ route('admin.clients.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-users mr-3"></i>Clients
    </a>
</li>

<li>
    <a href="{{ route('admin.news.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-newspaper mr-3"></i>News & Blogs
    </a>
</li>

<li>
    <a href="{{ route('admin.banner-slides.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
        <i class="fas fa-images mr-3"></i>Banner Slides
    </a>
</li>


                    <li>
                        <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded">
                            <i class="fas fa-images mr-3"></i>Banner Images
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded">
                            <i class="fas fa-users mr-3"></i>Users
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>