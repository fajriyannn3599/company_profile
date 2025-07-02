@props(['pageIdentifier', 'title' => null, 'description' => null, 'keywords' => null, 'image' => null])

@php
    $seo = page_seo($pageIdentifier);
    $finalTitle = $title ?: ($seo?->title ?? page_title($pageIdentifier));
    $finalDescription = $description ?: ($seo?->description ?? page_description($pageIdentifier));
    $finalKeywords = $keywords ?: ($seo?->keywords ?? '');
    $finalImage = $image ?: ($seo?->og_image ? Storage::url($seo->og_image) : asset('images/og-default.jpg'));
@endphp

{{-- Basic Meta Tags --}}
<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDescription }}">
@if($finalKeywords)
    <meta name="keywords" content="{{ $finalKeywords }}">
@endif

{{-- Open Graph Meta Tags --}}
<meta property="og:title" content="{{ $seo?->og_title ?? $finalTitle }}">
<meta property="og:description" content="{{ $seo?->og_description ?? $finalDescription }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:site_name" content="{{ setting('site_name') }}">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo?->twitter_title ?? $finalTitle }}">
<meta name="twitter:description" content="{{ $seo?->twitter_description ?? $finalDescription }}">
<meta name="twitter:image" content="{{ $seo?->twitter_image ? Storage::url($seo->twitter_image) : $finalImage }}">

{{-- Additional SEO Meta Tags --}}
<meta name="robots" content="index,follow">
<meta name="author" content="{{ setting('company_name') }}">
<link rel="canonical" href="{{ url()->current() }}">

{{-- Schema.org Structured Data --}}
@if($seo && $seo->schema_markup)
    <script type="application/ld+json">
        {!! $seo->schema_markup !!}
    </script>
@else
    {{-- Default Organization Schema --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{ setting('company_name') }}",
        "url": "{{ url('/') }}",
        "logo": "{{ asset(setting('logo', 'images/logo.png')) }}",
        @if(setting('contact_phone'))
        "telephone": "{{ setting('contact_phone') }}",
        @endif
        @if(setting('contact_email'))
        "email": "{{ setting('contact_email') }}",
        @endif
        @if(setting('contact_address'))
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ setting('contact_address') }}"
        },
        @endif
        "sameAs": [
            @if(setting('facebook_url'))"{{ setting('facebook_url') }}"@if(setting('twitter_url') || setting('linkedin_url') || setting('instagram_url')),@endif @endif
            @if(setting('twitter_url'))"{{ setting('twitter_url') }}"@if(setting('linkedin_url') || setting('instagram_url')),@endif @endif
            @if(setting('linkedin_url'))"{{ setting('linkedin_url') }}"@if(setting('instagram_url')),@endif @endif
            @if(setting('instagram_url'))"{{ setting('instagram_url') }}"@endif
        ]
    }
    </script>
@endif
