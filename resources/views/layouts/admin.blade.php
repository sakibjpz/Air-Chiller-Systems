<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>@yield('title', 'Admin Panel') - Mohiuddin Engineering</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS via Vite -->
    @vite(['resources/css/app.css'])
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @stack('styles')
    
    <style>
        /* Fix for sticky header */
        .admin-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
        }
        
        /* Active menu item style */
        .sidebar-menu-item.active {
            background-color: #1e40af !important; /* Blue-800 */
            color: white !important;
        }
        
        .sidebar-menu-item.active i {
            color: white !important;
        }
        
        /* Hover effect for non-active items */
        .sidebar-menu-item:not(.active):hover {
            background-color: #374151; /* Gray-700 */
        }

        /* Mobile menu toggle button */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Sidebar overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .desktop-only {
                display: none;
            }

            .admin-sidebar {
                position: fixed;
                left: -16rem;
                transition: left 0.3s ease-in-out;
                z-index: 1001;
            }

            .admin-sidebar.open {
                left: 0;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100%;
                padding: 1rem;
            }

            .admin-header .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .admin-header .flex {
                flex-wrap: wrap;
            }

            .header-title {
                font-size: 1rem;
            }

            .user-name {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .admin-header .flex {
                flex-direction: column;
                height: auto;
                padding: 0.5rem 0;
            }

            .admin-header .flex > div {
                width: 100%;
                justify-content: center;
                margin-bottom: 0.25rem;
            }

            .admin-header .flex > div:last-child {
                margin-bottom: 0;
            }

            .main-content {
                padding: 0.75rem;
            }
        }

        /* Tablet styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .admin-sidebar {
                width: 14rem;
            }

            .main-content {
                margin-left: 14rem !important;
            }

            .sidebar-menu-item span {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Admin Navigation - STICKY HEADER -->
    <nav class="admin-header bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-2 sm:px-4">
            <div class="flex justify-between items-center h-auto sm:h-16 py-2 sm:py-0">
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-base sm:text-xl header-title">
                        <i class="fas fa-cogs mr-1 sm:mr-2"></i>
                        <span class="hidden xs:inline">Admin Panel</span>
                        <span class="xs:hidden">Admin</span>
                    </a>
                    
                    <a href="{{ route('home') }}" class="text-blue-200 hover:text-white text-sm sm:text-base">
                        <i class="fas fa-globe mr-1"></i>
                        <span class="hidden sm:inline">View Site</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <span class="text-blue-200 text-sm sm:text-base user-name">
                        <i class="fas fa-user-circle mr-1"></i>
                        {{ Auth::user()->name }}
                    </span>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-blue-200 hover:text-white text-sm sm:text-base">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Sidebar & Content -->
    <div class="flex min-h-screen">
        <!-- Sidebar - Responsive -->
        <div class="admin-sidebar w-64 bg-gray-800 text-white fixed h-full overflow-y-auto transition-all duration-300 ease-in-out" id="adminSidebar">
            <div class="p-3 sm:p-4">
                <h3 class="font-bold text-base sm:text-lg mb-3 sm:mb-4">Management</h3>
                <ul class="space-y-1 sm:space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Dashboard</span>
                        </a>
                    </li>


                    <!-- About Pages -->
<li>
    <a href="{{ route('admin.about.index') }}" 
       class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
        <i class="fas fa-info-circle mr-3"></i>
        <span class="text-sm sm:text-base">About Us</span>
    </a>
</li>

<!-- Contact Messages -->
<li>
    <a href="{{ route('admin.contact-messages.index') }}" 
       class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.contact-messages*') ? 'active' : '' }}">
        <i class="fas fa-envelope mr-3 text-sm sm:text-base"></i>
        <span class="text-sm sm:text-base">Contact Messages</span>
        @php
            $unreadCount = \App\Models\ContactMessage::unread()->count();
        @endphp
        @if($unreadCount > 0)
        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $unreadCount }}</span>
        @endif
    </a>
</li>

<!-- Contact Settings -->
<li>
    <a href="{{ route('admin.contact-settings.edit') }}" 
       class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.contact-settings*') ? 'active' : '' }}">
        <i class="fas fa-cog mr-3 text-sm sm:text-base"></i>
        <span class="text-sm sm:text-base">Contact Settings</span>
    </a>
</li>
                    
                    <!-- Categories -->
                    <li>
                        <a href="{{ route('admin.categories.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                            <i class="fas fa-tags mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Categories</span>
                        </a>
                    </li>
                    
                    <!-- Products -->
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                            <i class="fas fa-box mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Products</span>
                        </a>
                    </li>
                    
                    <!-- Core Values -->
                    <li>
                        <a href="{{ route('admin.core-values.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                            <i class="fas fa-heart mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Core Values</span>
                        </a>
                    </li>
                    
                    <!-- Solutions -->
                    <li>
                        <a href="{{ route('admin.solutions.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.solutions*') ? 'active' : '' }}">
                            <i class="fas fa-cogs mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Solutions</span>
                        </a>
                    </li>
                    
                    <!-- Services -->
                    <li>
                        <a href="{{ route('admin.services.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                            <i class="fas fa-wrench mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Services</span>
                        </a>
                    </li>
                    
                    <!-- Other Products -->
                    <li>
                        <a href="{{ route('admin.product-lineups.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.product-lineups*') ? 'active' : '' }}">
                            <i class="fas fa-boxes mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Other Products</span>
                        </a>
                    </li>
                    
                    <!-- Certifications -->
                    <li>
                        <a href="{{ route('admin.certifications.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.certifications*') ? 'active' : '' }}">
                            <i class="fas fa-award mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Certifications</span>
                        </a>
                    </li>
                    
                    <!-- Latest Gallery -->
                    <li>
                        <a href="{{ route('admin.galleries.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}">
                            <i class="fas fa-images mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Latest Gallery</span>
                        </a>
                    </li>
                    
                    <!-- Clients -->
                    <li>
                        <a href="{{ route('admin.clients.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                            <i class="fas fa-users mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Clients</span>
                        </a>
                    </li>
                    
                    <!-- News & Blogs -->
                    <li>
                        <a href="{{ route('admin.news.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                            <i class="fas fa-newspaper mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">News & Blogs</span>
                        </a>
                    </li>
                    
                    <!-- Banner Slides -->
                    <li>
                        <a href="{{ route('admin.banner-slides.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.banner-slides*') ? 'active' : '' }}">
                            <i class="fas fa-images mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Banner Slides</span>
                        </a>
                    </li>
                    
                    <!-- Video Section -->
                    <li>
                        <a href="{{ route('admin.videos.index') }}" 
                           class="flex items-center p-2 rounded sidebar-menu-item {{ request()->routeIs('admin.videos*') ? 'active' : '' }}">
                            <i class="fas fa-video mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Video Section</span>
                        </a>
                    </li>
                    
                    <!-- Banner Images (placeholder) -->
                    <li>
                        <a href="#" 
                           class="flex items-center p-2 rounded sidebar-menu-item">
                            <i class="fas fa-images mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Banner Images</span>
                        </a>
                    </li>
                    
                    <!-- Users (placeholder) -->
                    <li>
                        <a href="#" 
                           class="flex items-center p-2 rounded sidebar-menu-item">
                            <i class="fas fa-users mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content - Responsive -->
        <div class="flex-1 p-4 sm:p-6 main-content transition-all duration-300" id="mainContent">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            
            // Prevent body scroll when sidebar is open on mobile
            if (sidebar.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('adminSidebar');
            const toggle = document.querySelector('.mobile-menu-toggle');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target) && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');
            
            if (window.innerWidth > 768) {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = 'auto';
                mainContent.style.marginLeft = '16rem';
            } else {
                mainContent.style.marginLeft = '0';
            }
        });

        // Set initial main content margin
        if (window.innerWidth > 768) {
            document.getElementById('mainContent').style.marginLeft = '16rem';
        }

        // Optional: Add scroll event to adjust header shadow
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.admin-header');
            if (window.scrollY > 0) {
                header.classList.add('shadow-xl');
            } else {
                header.classList.remove('shadow-xl');
            }
        });

        // Close sidebar on route change (for mobile)
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.sidebar-menu-item');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        const sidebar = document.getElementById('adminSidebar');
                        const overlay = document.getElementById('sidebarOverlay');
                        sidebar.classList.remove('open');
                        overlay.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            });
        });
    </script>

    <style>
        /* Extra small devices */
        @media (max-width: 480px) {
            .xs\:inline {
                display: inline;
            }
            .xs\:hidden {
                display: none;
            }
        }

        /* Custom scrollbar for sidebar */
        .admin-sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: #2d3748;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 20px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #718096;
        }

        /* Smooth transitions */
        .sidebar-menu-item {
            transition: all 0.2s ease-in-out;
        }

        /* Active menu item indicator */
        .sidebar-menu-item.active {
            position: relative;
        }

        .sidebar-menu-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #3b82f6;
            border-radius: 0 4px 4px 0;
        }

        /* Mobile menu toggle animation */
        .mobile-menu-toggle i {
            transition: transform 0.3s ease;
        }

        .mobile-menu-toggle:hover i {
            transform: scale(1.1);
        }

        /* Sidebar overlay animation */
        .sidebar-overlay {
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .sidebar-overlay.active {
            opacity: 1;
        }
    </style>
</body>
</html>