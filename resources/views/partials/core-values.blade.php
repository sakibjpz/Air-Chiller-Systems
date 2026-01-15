@if($coreValues && count($coreValues) > 0)
<!-- ================= OUR CORE VALUES ================= -->
<section class="py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16 lg:mb-20">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-blue-900 mb-4">
                Our Core Values
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg md:text-xl">
                The foundation for everything we do and the reason for our success
            </p>
        </div>

        <!-- Core Values Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-10 lg:gap-12">
            @foreach($coreValues as $value)
            <div class="group">
                <!-- Full Image -->
                <div class="relative h-64 md:h-72 lg:h-80 overflow-hidden rounded-lg mb-6 md:mb-8">
                    @if($value->image)
                    <img src="{{ asset('images/core-values/' . $value->image) }}" 
                         alt="{{ $value->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center rounded-lg">
                        <i class="{{ $value->icon ?? 'fas fa-heart' }} text-blue-400 text-5xl opacity-70"></i>
                    </div>
                    @endif
                    
                    <!-- Subtle overlay on hover -->
                    <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/10 transition-all duration-500 rounded-lg"></div>
                </div>

                <!-- Content - Center Aligned -->
                <div class="text-center">
                    <!-- Title -->
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-3">
                        {{ $value->title }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 leading-relaxed text-base px-4">
                        {{ $value->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif