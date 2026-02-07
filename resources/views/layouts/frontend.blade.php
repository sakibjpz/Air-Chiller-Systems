<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mohiuddin Engineering Limited')</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Vite CSS - Tailwind + Custom -->
    @vite(['resources/css/app.css', 'resources/css/header.css'])
    
    @stack('styles')
</head>
<body>

<!-- ==================== HEADER START ==================== -->
<header class="site-header">
    
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-container">
            <div class="top-bar-left">
              <a href="tel:+8801214567777" class="top-bar-link" data-tooltip="+880(121) 456 77">
    <i class="fas fa-phone-alt"></i>
    <span>Call No: +880(121) 456 77</span>
</a>
<a href="mailto:mohiuddinrengineering@gmail.com" class="top-bar-link" data-tooltip="Email Us">
    <i class="fas fa-envelope"></i>
    <span>Email: mohiuddinrengineering@gmail.com</span>
</a>
            </div>
            <div class="top-bar-right">
                <span class="follow-text">Follow us:</span>
                <div class="social-links">
                    <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
        <div class="main-header-container">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Mohiuddin Engineering Limited">
            </a>

            <!-- Desktop Navigation -->
            <nav class="nav-desktop">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About us</a>
                <a href="{{ route('products.index') }}" class="nav-link">Products</a>
                <a href="{{ route('services') }}" class="nav-link">Services</a>
                <a href="{{ route('clients') }}" class="nav-link">Clients</a>
                
                <!-- Dropdown -->
                <div class="nav-dropdown" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="nav-link nav-dropdown-btn">
                        Pages
                        <i class="fas fa-chevron-down" :class="{ 'rotated': open }"></i>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="fade-enter"
                         x-transition:leave="fade-leave"
                         class="dropdown-menu"
                         style="display: none;">
                        <a href="{{ route('news.index') }}" class="dropdown-link">
                            <i class="fas fa-newspaper"></i>
                            <div>
                                <div class="dropdown-title">News & Blogs</div>
                                <div class="dropdown-desc">Latest updates</div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('contact') }}" class="nav-link">Contact us</a>
            </nav>

            <!-- Search Box -->
            <div class="search-box">
                <input type="search" placeholder="Search..." class="search-input">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Menu">
                <i class="fas fa-bars"></i>
            </button>

        </div>
    </div>

</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-backdrop"></div>
    <div class="mobile-menu-panel">
        
        <!-- Mobile Header -->
        <div class="mobile-header">
            <h3>Menu</h3>
            <button class="mobile-close-btn" id="mobileCloseBtn" aria-label="Close Menu">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="mobile-search">
            <input type="search" placeholder="Search..." class="mobile-search-input">
            <button type="submit" class="mobile-search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-nav">
            <a href="{{ url('/') }}" class="mobile-nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link">
                <i class="fas fa-info-circle"></i>
                <span>About us</span>
            </a>
            <a href="{{ route('products.index') }}" class="mobile-nav-link">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </a>
            <a href="{{ route('services') }}" class="mobile-nav-link">
                <i class="fas fa-cogs"></i>
                <span>Services</span>
            </a>
            <a href="{{ route('clients') }}" class="mobile-nav-link">
                <i class="fas fa-users"></i>
                <span>Clients</span>
            </a>
            
            <!-- Mobile Dropdown -->
            <div class="mobile-nav-dropdown">
                <button class="mobile-nav-link mobile-dropdown-toggle">
                    <div class="mobile-dropdown-label">
                        <i class="fas fa-file-alt"></i>
                        <span>Pages</span>
                    </div>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="{{ route('news.index') }}" class="mobile-dropdown-link">
                        <i class="fas fa-newspaper"></i>
                        <span>News & Blogs</span>
                    </a>
                </div>
            </div>
            
            <a href="{{ route('contact') }}" class="mobile-nav-link">
                <i class="fas fa-phone-alt"></i>
                <span>Contact us</span>
            </a>
        </nav>

        <!-- Mobile Social -->
        <div class="mobile-social">
            <p>Follow us:</p>
            <div class="mobile-social-links">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- ==================== HEADER END ==================== -->

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
@include('partials.footer')

<!-- JavaScript -->
<script>
// Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const mobileCloseBtn = document.getElementById('mobileCloseBtn');
const backdrop = document.querySelector('.mobile-menu-backdrop');

function openMobileMenu() {
    mobileMenu.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
}

mobileMenuBtn.addEventListener('click', openMobileMenu);
mobileCloseBtn.addEventListener('click', closeMobileMenu);
backdrop.addEventListener('click', closeMobileMenu);

// Mobile Dropdown
const mobileDropdownToggle = document.querySelector('.mobile-dropdown-toggle');
const mobileDropdownContent = document.querySelector('.mobile-dropdown-content');

if (mobileDropdownToggle) {
    mobileDropdownToggle.addEventListener('click', function(e) {
        e.preventDefault();
        const icon = this.querySelector('.dropdown-icon');
        mobileDropdownContent.classList.toggle('open');
        icon.classList.toggle('rotated');
    });
}

// Close menu on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
        closeMobileMenu();
    }
});

// Sticky header on scroll
let lastScroll = 0;
const header = document.querySelector('.site-header');

window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
});


</script>

@stack('scripts')
</body>
</html>