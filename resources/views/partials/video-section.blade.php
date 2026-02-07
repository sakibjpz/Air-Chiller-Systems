@php
    // Get active video ordered by sort_order
    $video = \App\Models\Video::active()->ordered()->first();
@endphp

@if($video && $video->is_active)
    <section id="video-section" class="relative w-full h-[500px] overflow-hidden bg-black">
        @if($video->isYouTube())
            <!-- YouTube Embed -->
            <div class="relative w-full h-full">
                <iframe 
                    class="absolute top-0 left-0 w-full h-full"
                    src="https://www.youtube.com/embed/{{ $video->video_id }}?autoplay=1&mute=1&loop=1&controls=0&playsinline=1"
                    frameborder="0"
                    allow="autoplay"
                    allowfullscreen
                ></iframe>
            </div>
        @elseif($video->isUploaded())
            <!-- Uploaded Video -->
            <video 
                class="w-full h-full object-cover"
                autoplay
                muted
                loop
                playsinline
            >
                <source src="{{ asset($video->video_path) }}" type="{{ $video->mime_type }}">
                Your browser does not support the video tag.
            </video>
        @endif
        
        <!-- Dark overlay for better visibility -->
        <div class="absolute inset-0 bg-black/40"></div>
    </section>
@endif