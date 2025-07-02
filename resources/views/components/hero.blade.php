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
             style="background-image: url('{{ $hero->id ? Storage::url($hero->default_hero) : asset($hero->default_hero) }}')"></div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-blue-700"></div>
    @endif

    {{-- Overlay --}}
    <div class="absolute inset-0" style="{{ $hero->getOverlayStyles() }}"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $hero->getTextAlignmentClass() }} {{ $hero->getTextColorClass() }}">
        <div class="max-w-4xl {{ $hero->text_alignment === 'center' ? 'mx-auto' : '' }}">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                {{ $title }}
            </h1>

            @if($subtitle)
                <p class="text-xl md:text-2xl mb-8 opacity-90 leading-relaxed">
                    {{ $subtitle }}
                </p>
            @endif

            {{-- CTA Buttons --}}
            @if($hero->cta_primary_text || $hero->cta_secondary_text)
                <div class="flex flex-col sm:flex-row gap-4 {{ $hero->text_alignment === 'center' ? 'justify-center' : ($hero->text_alignment === 'right' ? 'justify-end' : 'justify-start') }}">
                    @if($hero->cta_primary_text && $hero->cta_primary_url)
                        <a href="{{ $hero->cta_primary_url }}"
                           class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-lg font-semibold transition-colors">
                            {{ $hero->cta_primary_text }}
                        </a>
                    @endif

                    @if($hero->cta_secondary_text && $hero->cta_secondary_url)
                        <a href="{{ $hero->cta_secondary_url }}"
                           class="inline-flex items-center justify-center px-8 py-4 border-2 border-current hover:bg-current hover:text-white rounded-lg text-lg font-semibold transition-all">
                            {{ $hero->cta_secondary_text }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Decorative Elements --}}
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
</section>
