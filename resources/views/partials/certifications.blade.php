@if($certifications && count($certifications) > 0)
<!-- ================= MODERN CERTIFICATIONS SHOWCASE ================= -->
<section class="py-20 md:py-28 bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-400/10 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <div class="inline-flex items-center justify-center px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-certificate mr-2"></i>
                Quality Assured
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
                Certifications & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Accreditations</span>
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Recognized excellence backed by industry-leading standards and rigorous quality certifications
            </p>
        </div>

        <!-- Certifications Carousel -->
        <div x-data="certificationsCarousel()" 
             x-init="init({{ count($certifications) }})"
             class="relative max-w-6xl mx-auto">
            
            <!-- Main Carousel Container -->
            <div class="overflow-hidden rounded-2xl">
                <div class="flex transition-transform duration-700 ease-out"
                     :style="`transform: translateX(-${currentIndex * 100}%)`">
                    @foreach($certifications as $certification)
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="relative group">
                            <!-- Certificate Card -->
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500">
                                <!-- Image Container with Aspect Ratio -->
                                <div class="relative bg-gradient-to-br from-gray-50 to-slate-100 overflow-hidden">
                                    <div class="aspect-[16/10] flex items-center justify-center p-8">
                                        <img src="{{ asset($certification->image) }}" 
                                             alt="{{ $certification->title ?? 'Certification' }}"
                                             class="w-full h-full object-contain transform group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                    
                                    <!-- Overlay Gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    
                                    <!-- Verification Badge -->
                                    <div class="absolute top-6 right-6 bg-green-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg flex items-center">
                                        <i class="fas fa-check-circle mr-1.5"></i>
                                        Verified
                                    </div>
                                </div>
                                
                                <!-- Certificate Info -->
                                @if($certification->title || $certification->description)
                                <div class="p-8">
                                    @if($certification->title)
                                    <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                        {{ $certification->title }}
                                    </h3>
                                    @endif
                                    
                                    @if($certification->description)
                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $certification->description }}
                                    </p>
                                    @endif
                                    
                                    @if($certification->issued_date)
                                    <div class="mt-4 flex items-center text-sm text-gray-500">
                                        <i class="far fa-calendar mr-2"></i>
                                        Issued: {{ $certification->issued_date }}
                                    </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Buttons - Modern Style -->
            <button @click="prev()"
                    class="absolute -left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:text-blue-600 hover:shadow-xl hover:scale-110 transition-all duration-300 z-20 group">
                <i class="fas fa-chevron-left text-base group-hover:-translate-x-0.5 transition-transform"></i>
            </button>
            
            <button @click="next()"
                    class="absolute -right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:text-blue-600 hover:shadow-xl hover:scale-110 transition-all duration-300 z-20 group">
                <i class="fas fa-chevron-right text-base group-hover:translate-x-0.5 transition-transform"></i>
            </button>

            <!-- Progress Bar Style Dots -->
            <div class="flex justify-center items-center space-x-2 mt-12">
                @foreach($certifications as $index => $certification)
                <button @click="goTo({{ $index }})"
                        class="relative group/dot">
                    <div :class="currentIndex === {{ $index }} ? 'w-12 bg-gradient-to-r from-blue-600 to-indigo-600' : 'w-8 bg-gray-300 hover:bg-gray-400'"
                         class="h-1.5 rounded-full transition-all duration-500 ease-out">
                    </div>
                    <!-- Tooltip -->
                    @if($certification->title)
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1.5 bg-gray-900 text-white text-xs rounded-lg opacity-0 group-hover/dot:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                        {{ $certification->title }}
                    </div>
                    @endif
                </button>
                @endforeach
            </div>

            <!-- Modern Counter -->
            <div class="text-center mt-6">
                <span class="inline-flex items-center px-4 py-2 bg-white rounded-full shadow-sm text-sm font-medium text-gray-700">
                    <span class="text-blue-600 font-bold" x-text="currentIndex + 1"></span>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-gray-600">{{ count($certifications) }}</span>
                </span>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="mt-16 pt-12 border-t border-gray-200">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto text-center">
                <div class="group cursor-default">
                    <div class="text-3xl font-bold text-blue-600 mb-2 group-hover:scale-110 transition-transform">{{ count($certifications) }}+</div>
                    <div class="text-sm text-gray-600 font-medium">Certifications</div>
                </div>
                <div class="group cursor-default">
                    <div class="text-3xl font-bold text-green-600 mb-2 group-hover:scale-110 transition-transform">100%</div>
                    <div class="text-sm text-gray-600 font-medium">Compliant</div>
                </div>
                <div class="group cursor-default">
                    <div class="text-3xl font-bold text-indigo-600 mb-2 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <div class="text-sm text-gray-600 font-medium">Verified Quality</div>
                </div>
                <div class="group cursor-default">
                    <div class="text-3xl font-bold text-purple-600 mb-2 group-hover:scale-110 transition-transform">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="text-sm text-gray-600 font-medium">Industry Leading</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('certificationsCarousel', () => ({
        currentIndex: 0,
        totalItems: 0,
        intervalId: null,
        isAutoplayPaused: false,
        
        init(total) {
            this.totalItems = total;
            this.startAutoplay();
            
            // Pause on hover with smooth transition
            this.$el.addEventListener('mouseenter', () => this.pause());
            this.$el.addEventListener('mouseleave', () => this.resume());
            
            // Keyboard navigation
            window.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') this.prev();
                if (e.key === 'ArrowRight') this.next();
            });
        },
        
        startAutoplay() {
            this.intervalId = setInterval(() => {
                if (!this.isAutoplayPaused) {
                    this.next();
                }
            }, 6000); // 6 seconds for better viewing
        },
        
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.totalItems;
        },
        
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.totalItems) % this.totalItems;
        },
        
        goTo(index) {
            this.currentIndex = index;
        },
        
        pause() {
            this.isAutoplayPaused = true;
        },
        
        resume() {
            this.isAutoplayPaused = false;
        }
    }));
});
</script>
@endif