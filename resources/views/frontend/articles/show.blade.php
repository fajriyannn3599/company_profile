@extends('layouts.frontend')

@section('title', $article->title . ' - ' . setting('company_name'))
@section('meta_description', $article->excerpt ?? strip_tags(Str::limit($article->content, 160)))

@push('head')
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt ?? strip_tags(Str::limit($article->content, 160)) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('articles.show', $article->slug) }}">
    @if ($article->image)
        <meta property="og:image" content="{{ Storage::url($article->image) }}">
    @endif
    <meta property="article:author" content="{{ $article->author->name }}">
    <meta property="article:published_time" content="{{ $article->created_at->toISOString() }}">
    <meta property="article:section" content="{{ $article->category->name }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ $article->excerpt ?? strip_tags(Str::limit($article->content, 160)) }}">
    @if ($article->image)
        <meta name="twitter:image" content="{{ Storage::url($article->image) }}">
    @endif

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "{{ $article->title }}",
      "description": "{{ $article->excerpt ?? strip_tags(Str::limit($article->content, 160)) }}",
      "author": {
        "@type": "Person",
        "name": "{{ $article->author->name }}"
      },
      "publisher": {
        "@type": "Organization",
        "name": "{{ setting('company_name') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('images/logo.png') }}"
        }
      },
      "datePublished": "{{ $article->created_at->toISOString() }}",
      "dateModified": "{{ $article->updated_at->toISOString() }}",
      @if($article->image)
          "image": "{{ Storage::url($article->image) }}",
      @endif
      "url": "{{ route('articles.show', $article->slug) }}"
    }
    </script>
@endpush

@section('content')
    <!-- Article Header -->
    <section class="bg-gradient-to-br from-red-50 to-red-100 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <nav class="mb-8">
                    <ol class="flex items-center space-x-2 text-sm text-gray-600">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-600"
                                style="font-family: 'Poppins', sans-serif;">Beranda</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-blue-600"
                                style="font-family: 'Poppins', sans-serif;">Berita</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li class="text-gray-800" style="font-family: 'Poppins', sans-serif;">
                            {{ Str::limit($article->title, 50) }}</li>
                    </ol>
                </nav>

                <div class="flex items-center gap-4 mb-6">
                    <span class="bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-medium"
                        style="font-family: 'Poppins', sans-serif;">
                        {{ $article->category->name }}
                    </span>
                    <span class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">
                        {{ $article->created_at->format('d F Y') }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight"
                    style="font-family: 'Poppins', sans-serif;">
                    {{ $article->title }}
                </h1>

                @if ($article->excerpt)
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed" style="font-family: 'Poppins', sans-serif;">
                        {{ $article->excerpt }}
                    </p>
                @endif

                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-orange-900 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900" style="font-family: 'Poppins', sans-serif;">
                                    {{ $article->author->name }}</div>
                                <div class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">Penulis</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm" style="font-family: 'Poppins', sans-serif;">
                                {{ $article->read_time }} menit baca
                            </span>
                            
                        </div>
                        <div class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">Diterbitkan
                            {{ $article->created_at->format('d F Y') }}
                        </div>
                    </div>

                    <!-- Social Share -->
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">Bagikan:</span>
                        <div class="flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('articles.show', $article->slug)) }}"
                                target="_blank"
                                class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <!--<a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(route('articles.show', $article->slug)) }}"
                                    target="_blank"
                                    class="w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('articles.show', $article->slug)) }}"
                                    target="_blank"
                                    class="w-10 h-10 bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a> -->
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . route('articles.show', $article->slug)) }} style="
                                font-family: 'Poppins' , sans-serif;"" target="_blank"
                                class="w-10 h-10 bg-green-600 hover:bg-green-700 text-white rounded-full flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Image -->
    @if ($article->image)
        <section class="py-8">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }} style=" font-family: 'Poppins'
                            , sans-serif;"" class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Article Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                    <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700 prose-blockquote:border-blue-200 prose-blockquote:bg-blue-50 prose-blockquote:text-gray-800"
                        style="font-family: 'Poppins', sans-serif;">
                        {!! $article->content !!}
                    </div>
                    <!-- Article Tags -->
                    @if ($article->tags && count($article->tags) > 0)
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">
                                Tags:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($article->tags as $tag)
                                    <span
                                        class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors"
                                        style="font-family: 'Poppins', sans-serif;">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Article Footer -->
                    <!-- <div class="mt-8 pt-8 border-t border-gray-200">
                            <div class="flex items-center justify-between flex-wrap gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $article->author->name }}</div> -->

                </div>
            </div>

            <!-- <div class="text-right">
                                    <div class="text-sm text-gray-600">Bagikan artikel ini:</div>
                                    <div class="flex gap-2 mt-2">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('articles.show', $article->slug)) }}"
                                            target="_blank"
                                            class="w-8 h-8 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(route('articles.show', $article->slug)) }}"
                                            target="_blank"
                                            class="w-8 h-8 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                            </svg>
                                        </a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('articles.show', $article->slug)) }}"
                                            target="_blank"
                                            class="w-8 h-8 bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                    </div> -->
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if ($relatedArticles->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            Artikel Terkait
                        </h2>
                        <p class="text-xl text-gray-600">
                            Artikel lainnya yang mungkin menarik untuk Anda
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($relatedArticles as $relatedArticle)
                            <article
                                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if ($relatedArticle->image)
                                    <div class="aspect-video overflow-hidden">
                                        <img src="{{ Storage::url($relatedArticle->image) }}" alt="{{ $relatedArticle->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $relatedArticle->category->name }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $relatedArticle->created_at->format('d M Y') }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors line-clamp-2">
                                        <a href="{{ route('articles.show', $relatedArticle->slug) }}">
                                            {{ $relatedArticle->title }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 mb-4 line-clamp-3">
                                        {{ $relatedArticle->excerpt }}
                                    </p>

                                    <a href="{{ route('articles.show', $relatedArticle->slug) }}"
                                        class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="text-center mt-12">
                        <a href="{{ route('articles.index') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                            Lihat Semua Artikel
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <!-- <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                        Butuh Bantuan dengan Project Anda?
                    </h2>
                    <p class="text-xl text-blue-100 mb-8">
                        Tim ahli kami siap membantu mewujudkan ide dan project impian Anda
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}"
                            class="bg-white text-blue-600 px-8 py-3 rounded-xl font-medium hover:bg-gray-100 transition-colors">
                            Konsultasi Gratis
                        </a>
                        <a href="{{ route('services.index') }}"
                            class="border-2 border-white text-white px-8 py-3 rounded-xl font-medium hover:bg-white hover:text-blue-600 transition-colors">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </section> -->
@endsection