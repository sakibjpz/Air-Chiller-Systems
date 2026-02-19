@if($solutions && count($solutions) > 0)
<!-- ================= SOLUTIONS ================= -->
<section class="py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                SOLUTIONS
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                Comprehensive engineering solutions for every sector
            </p>
        </div>

        <!-- Solutions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12">
            @foreach($solutions as $solution)
            <div class="group">
                <!-- Image Block -->
                <div class="mb-6 overflow-hidden rounded-lg">
                    @if($solution->image)
                    <img src="{{ asset($solution->image) }}" 
                         alt="{{ $solution->title }}"
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                    <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center rounded-lg">
                        <i class="{{ $solution->icon ?? 'fas fa-cogs' }} text-blue-400 text-5xl"></i>
                    </div>
                    @endif
                </div>

                <!-- Text Content -->
                <div class="text-center">
                    <!-- Title -->
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                        {{ $solution->title }}
                    </h3>

                    <!-- Short Description (optional) -->
                    @if($solution->description)
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        {{ Str::limit($solution->description, 100) }}
                    </p>
                    @endif

                    <!-- LG-Style Rectangular Button - FIXED: Using dynamic route with slug -->
                    @if($solution->button_text)
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('solutions.show', $solution->slug) }}" 
                           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 group">
                            <span>{{ $solution->button_text }}</span>
                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Divider -->
<div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
@endif