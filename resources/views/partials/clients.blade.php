<!-- Clients Section -->
@php
// Get only active clients, limit to 10 for homepage
$clients = \App\Models\Client::active()->ordered()->take(10)->get();
@endphp

@if($clients->count() > 0)
<section class="py-12 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                <i class="fas fa-handshake text-2xl text-blue-600"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Trusted By Industry Leaders
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                We're proud to partner with renowned organizations that trust our engineering excellence
            </p>
        </div>

        <!-- Clients Slider Container -->
        <div class="relative">
            <!-- Gradient Overlays -->
            <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

            <!-- Clients Slider -->
            <div x-data="{
                clients: {{ $clients->toJson() }},
                currentIndex: 0,
                itemsPerView: 5,
                gap: 32,
                containerWidth: 0,
                itemWidth: 0,
                totalWidth: 0,
                
                init() {
                    this.calculateSizes();
                    window.addEventListener('resize', () => this.calculateSizes());
                    
                    // Auto slide
                    setInterval(() => {
                        this.nextSlide();
                    }, 3000);
                },
                
                calculateSizes() {
                    // Calculate responsive items per view
                    if (window.innerWidth < 640) this.itemsPerView = 2;
                    else if (window.innerWidth < 768) this.itemsPerView = 3;
                    else if (window.innerWidth < 1024) this.itemsPerView = 4;
                    else this.itemsPerView = 5;
                    
                    // Calculate positions
                    this.containerWidth = this.$refs.container.clientWidth;
                    this.itemWidth = (this.containerWidth / this.itemsPerView) - (this.gap * (this.itemsPerView - 1) / this.itemsPerView);
                    this.totalWidth = this.clients.length * (this.itemWidth + this.gap);
                },
                
                nextSlide() {
                    if (this.currentIndex >= this.clients.length - this.itemsPerView) {
                        this.currentIndex = 0;
                    } else {
                        this.currentIndex++;
                    }
                },
                
                prevSlide() {
                    if (this.currentIndex <= 0) {
                        this.currentIndex = this.clients.length - this.itemsPerView;
                    } else {
                        this.currentIndex--;
                    }
                }
            }" 
            x-init="init"
            class="relative overflow-hidden">
                <!-- Slider Container -->
                <div x-ref="container" class="flex transition-transform duration-500 ease-out"
                     :style="`transform: translateX(-${currentIndex * (itemWidth + gap)}px); gap: ${gap}px;`">
                    @foreach($clients as $client)
                    <div class="flex-shrink-0 bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 border border-gray-100 hover:border-blue-200 group"
                         :style="`width: ${itemWidth}px;`">
                        <!-- Client Logo -->
                        <div class="h-20 flex items-center justify-center mb-4">
                            @if($client->website)
                                <a href="{{ $client->website }}" target="_blank" class="block w-full group-hover:scale-110 transition-transform duration-300">
                                    <img src="{{ $client->logo_url }}" 
                                         alt="{{ $client->name }} Logo" 
                                         class="max-h-16 w-auto mx-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300">
                                </a>
                            @else
                                <div class="w-full group-hover:scale-110 transition-transform duration-300">
                                    <img src="{{ $client->logo_url }}" 
                                         alt="{{ $client->name }} Logo" 
                                         class="max-h-16 w-auto mx-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300">
                                </div>
                            @endif
                        </div>
                        
                        <!-- Client Name -->
                        <div class="text-center">
                            <h3 class="font-semibold text-gray-800 text-sm group-hover:text-blue-600 transition duration-300 truncate">
                                {{ $client->name }}
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation Arrows (Desktop) -->
                <button @click="prevSlide" 
                        class="hidden md:flex absolute left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 items-center justify-center bg-white shadow-lg rounded-full text-blue-600 hover:bg-blue-50 transition duration-300 z-20">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <button @click="nextSlide" 
                        class="hidden md:flex absolute right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 items-center justify-center bg-white shadow-lg rounded-full text-blue-600 hover:bg-blue-50 transition duration-300 z-20">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- View All Button -->
            @if($clients->count() > 10)
            <div class="text-center mt-10">
                <a href="{{ route('clients') }}" 
                   class="inline-flex items-center px-5 py-2.5 border border-blue-600 text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition duration-300">
                    View All {{ \App\Models\Client::active()->count() }}+ Clients
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endif