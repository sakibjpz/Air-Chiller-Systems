@php
$slides = \App\Models\BannerSlide::active()->ordered()->get();
@endphp

@if($slides->count() > 0)
<div id="bannerSlider" class="relative w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] overflow-hidden">
    @foreach($slides as $index => $slide)
    <div class="slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
        <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-600/50"></div>

        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white max-w-2xl px-4">
                @if($slide->subtitle)
                <span class="inline-block px-3 py-1 sm:px-4 sm:py-2 bg-blue-600/80 rounded-full text-xs sm:text-sm font-medium mb-2">
                    {{ $slide->subtitle }}
                </span>
                @endif

                <h1 class="text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-3">
                    {{ $slide->title }}
                </h1>

                @if($slide->description)
                <p class="text-xs sm:text-sm md:text-base lg:text-lg mb-3 sm:mb-4">
                    {{ $slide->description }}
                </p>
                @endif

                @if($slide->button_text)
                <a href="{{ $slide->button_link ?: '#' }}" class="inline-block px-4 py-2 sm:px-6 sm:py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-xs sm:text-sm md:text-base font-semibold transition">
                    {{ $slide->button_text }}
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <!-- Navigation Arrows -->
    <button id="prevBtn" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white w-8 sm:w-10 h-8 sm:h-10 flex items-center justify-center rounded-full z-20">
        &#10094;
    </button>
    <button id="nextBtn" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white w-8 sm:w-10 h-8 sm:h-10 flex items-center justify-center rounded-full z-20">
        &#10095;
    </button>

    <!-- Navigation Dots -->
    <div id="sliderDots" class="absolute bottom-2 sm:bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
        @foreach($slides as $index => $slide)
        <button class="w-2 sm:w-3 h-2 sm:h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }}" data-index="{{ $index }}"></button>
        @endforeach
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('#bannerSlider .slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('#sliderDots button');
    const slider = document.getElementById('bannerSlider');
    let current = 0;
    let interval = setInterval(nextSlide, 4000);

    function showSlide(index) {
        slides.forEach((slide, i) => slide.style.opacity = (i === index ? '1' : '0'));
        dots.forEach((dot, i) => {
            dot.classList.remove('bg-white');
            dot.classList.add('bg-white/50');
            if(i === index) dot.classList.add('bg-white');
        });
        current = index;
    }

    function nextSlide() {
        let next = current + 1;
        if(next >= slides.length) next = 0;
        showSlide(next);
    }

    function prevSlide() {
        let prev = current - 1;
        if(prev < 0) prev = slides.length - 1;
        showSlide(prev);
    }

    // Buttons
    nextBtn.addEventListener('click', () => { nextSlide(); resetInterval(); });
    prevBtn.addEventListener('click', () => { prevSlide(); resetInterval(); });

    // Dot navigation
    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.dataset.index);
            showSlide(index);
            resetInterval();
        });
    });

    function resetInterval() {
        clearInterval(interval);
        interval = setInterval(nextSlide, 4000);
    }

    // Pause autoplay on hover
    slider.addEventListener('mouseenter', () => clearInterval(interval));
    slider.addEventListener('mouseleave', () => interval = setInterval(nextSlide, 4000));

    // --- Mobile swipe support ---
    let startX = 0;
    let endX = 0;

    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    slider.addEventListener('touchmove', (e) => {
        endX = e.touches[0].clientX;
    });

    slider.addEventListener('touchend', () => {
        let diff = startX - endX;
        if(Math.abs(diff) > 50) { // minimum swipe distance
            if(diff > 0) nextSlide(); // swipe left → next
            else prevSlide();          // swipe right → prev
            resetInterval();
        }
        startX = 0;
        endX = 0;
    });
});
</script>


@else
<div class="w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] bg-blue-600 flex items-center justify-center text-white">
    No slides available
</div>
@endif
