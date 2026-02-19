<!-- ================= FOOTER ================= -->
<footer class="bg-gradient-to-b from-blue-900 to-blue-950 text-white">
    <!-- Main Footer -->
    <div class="container mx-auto px-4 py-8 md:py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-block mb-4">
                    <div class="flex items-center">
                        <div class="bg-white p-2 rounded-lg mr-3">
                            <img src="{{ asset('assets/images/logo.png') }}" 
                                 alt="Mohiuddin Engineering Limited Logo"
                                 class="h-10 w-auto">
                        </div>
                        <div>
                            <div class="text-lg font-bold">Mohiuddin Engineering</div>
                            <div class="text-blue-300 text-xs">Limited</div>
                        </div>
                    </div>
                </a>
                <p class="text-blue-200 text-sm mb-4 max-w-lg">
                    Leading engineering solutions provider with decades of experience in industrial 
                    and commercial projects.
                </p>
                <div class="flex space-x-3">
                    <a href="https://facebook.com" target="_blank" 
                       class="w-8 h-8 rounded-full bg-blue-800 hover:bg-blue-700 flex items-center justify-center transition text-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" 
                       class="w-8 h-8 rounded-full bg-blue-800 hover:bg-blue-700 flex items-center justify-center transition text-sm">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" 
                       class="w-8 h-8 rounded-full bg-blue-800 hover:bg-blue-700 flex items-center justify-center transition text-sm">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-base font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ url('/') }}" class="text-blue-200 hover:text-white transition text-sm flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about.show') }}" class="text-blue-200 hover:text-white transition text-sm flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="text-blue-200 hover:text-white transition text-sm flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-blue-200 hover:text-white transition text-sm flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-base font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-blue-800 flex items-center justify-center mr-2 flex-shrink-0 mt-0.5">
                            <i class="fas fa-phone-alt text-xs"></i>
                        </div>
                        <div class="text-sm">
                            <a href="tel:+88012145677" class="text-blue-200 hover:text-white transition">
                                01750-138901-10
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-blue-800 flex items-center justify-center mr-2 flex-shrink-0 mt-0.5">
                            <i class="fas fa-envelope text-xs"></i>
                        </div>
                        <div class="text-sm">
                            <a href="mailto:mohiuddinengineering@gmail.com" class="text-blue-200 hover:text-white transition">
                                info@mohiuddin.com.bd
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-blue-800 flex items-center justify-center mr-2 flex-shrink-0 mt-0.5">
                            <i class="fas fa-map-marker-alt text-xs"></i>
                        </div>
                        <div class="text-sm text-blue-200">
                            24, Maddherchar, Shakta, Keranigonj Model, Dhaka-1312
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Services Quick View -->
        <div class="mt-8 pt-6 border-t border-blue-700">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="text-center p-3 rounded-lg bg-blue-800/30 hover:bg-blue-800/50 transition cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-snowflake text-sm"></i>
                    </div>
                    <div class="text-xs font-medium">HVAC Systems</div>
                </div>
                <div class="text-center p-3 rounded-lg bg-blue-800/30 hover:bg-blue-800/50 transition cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-tint text-sm"></i>
                    </div>
                    <div class="text-xs font-medium">Cooling Solutions</div>
                </div>
                <div class="text-center p-3 rounded-lg bg-blue-800/30 hover:bg-blue-800/50 transition cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-bolt text-sm"></i>
                    </div>
                    <div class="text-xs font-medium">Electrical Panels</div>
                </div>
                <div class="text-center p-3 rounded-lg bg-blue-800/30 hover:bg-blue-800/50 transition cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-tools text-sm"></i>
                    </div>
                    <div class="text-xs font-medium">Maintenance</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bg-blue-950 py-4 border-t border-blue-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-blue-300 text-xs mb-3 md:mb-0">
                    &copy; {{ date('Y') }} Mohiuddin Engineering Limited. All rights reserved.
                </div>
                <div class="flex flex-wrap gap-3 text-xs">
                    <a href="#" class="text-blue-300 hover:text-white transition">Privacy</a>
                    <span class="text-blue-600">•</span>
                    <a href="#" class="text-blue-300 hover:text-white transition">Terms</a>
                    <span class="text-blue-600">•</span>
                    <a href="#" class="text-blue-300 hover:text-white transition">Sitemap</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button onclick="scrollToTop()" 
            id="backToTop"
            class="fixed bottom-6 right-6 w-10 h-10 rounded-full bg-blue-600 text-white shadow-lg hover:bg-blue-700 transition transform hover:scale-105 hidden z-50 text-sm">
        <i class="fas fa-chevron-up"></i>
    </button>
</footer>

<script>
// Back to Top Button
window.onscroll = function() {
    const backToTop = document.getElementById('backToTop');
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        backToTop.classList.remove('hidden');
    } else {
        backToTop.classList.add('hidden');
    }
};

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
</script>