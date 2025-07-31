@props(['pageIdentifier', 'fallbackTitle' => null, 'fallbackSubtitle' => null])

@php
    $hero = page_hero($pageIdentifier);

    // If no specific hero found, create fallback using global settings
    if (!$hero) {
        $hero = \App\Models\PageHero::getFallback($pageIdentifier, $fallbackTitle, $fallbackSubtitle);
    }

    $title = $hero->title ?? $fallbackTitle ?? 'Welcome';
    $subtitle = $hero->subtitle ?? $fallbackSubtitle ?? '';
@endphp

<section class="relative {{ $hero->getHeightClass() }} flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    @if($hero->background_image)
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ Storage::url($hero->background_image) }}')">
        </div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-blue-700"></div>
    @endif

    {{-- Overlay --}}
    <div class="absolute inset-0" style="{{ $hero->getOverlayStyles() }}"></div>

    

    {{-- Decorative Elements --}}
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent">
    </div>
</section>