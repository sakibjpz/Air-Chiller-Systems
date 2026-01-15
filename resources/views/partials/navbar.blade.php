<header class="sticky top-0 z-50 shadow bg-white">

    <!-- ================= TOP HEADER ================= -->
    <div class="header-top hidden md:flex justify-between items-center bg-gray-100 text-gray-700 px-4 py-2 text-sm">
        <!-- Left: Info -->
        <div class="flex space-x-6">
            <span class="flex items-center space-x-1"><i class="fas fa-industry"></i><span>Air Chillers & AC Solutions</span></span>
            <span class="flex items-center space-x-1"><i class="fas fa-tools"></i><span>Professional Engineering Services</span></span>
        </div>

        <!-- Right: Social Icons -->
        <div class="flex space-x-4">
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
            <a href="https://linkedin.com" target="_blank" class="hover:text-blue-800"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <!-- ================= MAIN HEADER ================= -->
    <div class="main-header flex justify-between items-center px-4 py-3 md:py-4">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo flex items-center">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Mohiuddin Engineering Limited Logo" class="h-12 md:h-14">
        </a>

        <!-- Navigation (Desktop Only) -->
        <nav class="main-nav hidden md:flex mx-auto font-medium text-gray-700 space-x-8">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Home</a>
            <a href="#" class="hover:text-blue-600 transition">About Us</a>
            <a href="#" class="hover:text-blue-600 transition">Services</a>
            <a href="#" class="hover:text-blue-600 transition">Projects</a>
            <a href="#" class="hover:text-blue-600 transition">Contact</a>
        </nav>

        <!-- Search Bar (Desktop Only) -->
        <div class="search-box hidden md:flex items-center border rounded overflow-hidden">
            <input type="text" placeholder="Search..." class="px-3 py-1 focus:outline-none">
            <button class="px-3 bg-blue-600 text-white"><i class="fas fa-search"></i></button>
        </div>

        <!-- Hamburger Menu (Mobile Only) -->
        <button class="md:hidden text-gray-700 focus:outline-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

</header>

<!-- ================= MOBILE MENU OFFCANVAS ================= -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-4 py-3">
        <!-- Mobile Search -->
        <div class="mb-4">
            <input type="text" placeholder="Search..." class="w-full border px-3 py-2 rounded focus:outline-none">
        </div>

        <!-- Mobile Navigation -->
        <ul class="flex flex-col space-y-2">
            <li><a href="{{ route('home') }}" class="font-medium hover:text-blue-600 transition">Home</a></li>
            <li><a href="#" class="font-medium hover:text-blue-600 transition">About Us</a></li>
            <li><a href="#" class="font-medium hover:text-blue-600 transition">Services</a></li>
            <li><a href="#" class="font-medium hover:text-blue-600 transition">Projects</a></li>
            <li><a href="#" class="font-medium hover:text-blue-600 transition">Contact</a></li>
        </ul>

        <!-- Social Icons Mobile -->
        <div class="mobile-social flex space-x-4 mt-6">
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
            <a href="https://linkedin.com" target="_blank" class="hover:text-blue-800"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>
