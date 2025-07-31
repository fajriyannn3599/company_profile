@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="articles" :title="page_title('articles', 'Artikel & Blog - ' . setting('company_name'))" :description="page_description(
        'articles',
        'Baca artikel dan blog terbaru dari ' .
            setting('company_name') .
            '. Dapatkan tips, insight, dan informasi terkini seputar teknologi dan bisnis.',
    )" />
@endpush

@section('content')
    <!-- Hero Section -->
    <!-- <x-hero page-identifier="articles" fallback-title="Artikel & Blog"
        fallback-subtitle="Dapatkan insight terbaru, tips praktis, dan informasi berharga dari para ahli di bidang teknologi dan bisnis" /> -->

    <!-- Search & Filter Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Search & Filter -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                    <form method="GET" action="{{ route('articles.index') }}" class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari artikel..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="sm:w-48">
                            <select name="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                style="font-family: 'Poppins', sans-serif;">
                                <option value="">Semua Kategori</option>                                
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}"
                                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                        <button type="submit"
                            class="inline-flex items-center bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                            style="font-family: 'Poppins', sans-serif;">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    @if ($featuredArticle && !request('search') && !request('category'))
        <section class="py-16">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                            style="font-family: 'Poppins', sans-serif;">
                            Artikel Pilihan
                        </h2>
                        <p class="text-xl text-gray-600"
                            style="font-family: 'Poppins', sans-serif;">
                            Artikel terbaru dan paling populer dari kami
                        </p>
                    </div>

                    <div class="bg-white shadow-2xl overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            @if ($featuredArticle->image)
                                <div class="aspect-video lg:aspect-square overflow-hidden"
                                    style="font-family: 'Poppins', sans-serif;">
                                    <img src="{{ Storage::url($featuredArticle->image) }}"
                                        alt="{{ $featuredArticle->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif

                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                <div class="flex items-center gap-4 mb-6">
                                    <span class="bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-medium"
                                        style="font-family: 'Poppins', sans-serif;">
                                        {{ $featuredArticle->category->name }}
                                    </span>
                                    <span class="text-sm text-gray-500"
                                        style="font-family: 'Poppins', sans-serif;">
                                        {{ $featuredArticle->published_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3
                                    class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4 hover:text-red-600 transition-colors"
                                    style="font-family: 'Poppins', sans-serif;">
                                    <a href="{{ route('articles.show', $featuredArticle->slug) }}">
                                        {{ $featuredArticle->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 mb-6 text-lg leading-relaxed"
                                    style="font-family: 'Poppins', sans-serif;">
                                    {{ $featuredArticle->excerpt }}
                                </p>

                                <div class="flex items-center gap-4 mb-6">
                                    <div class="flex items-center gap-2">
                                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-sm text-gray-600"
                                            style="font-family: 'Poppins', sans-serif;">{{ $featuredArticle->author->name }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                        <span class="text-sm text-gray-600"
                                            style="font-family: 'Poppins', sans-serif;">{{ $featuredArticle->read_time ?? '5' }} min
                                            baca</span>
                                    </div>
                                </div>

                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                <a href="{{ route('articles.show', $featuredArticle->slug) }}"
                                    class="inline-flex items-center bg-gradient-to-r from-red-600 to-yellow-600 hover:from-red-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                                    style="font-family: 'Poppins', sans-serif;">
                                    Baca Selengkapnya
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Articles Grid -->
    <section class="py-16 {{ $featuredArticle && !request('search') && !request('category') ? 'bg-gray-50' : '' }}">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                @if (request('search') || request('category'))
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                            <h2 class="text-2xl font-bold text-gray-900"
                                style="font-family: 'Poppins', sans-serif;">
                                Hasil Pencarian
                                @if (request('search'))
                                    untuk "{{ request('search') }}"
                                @endif
                                @if (request('category'))
                                    dalam kategori
                                    "{{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}"
                                @endif
                            </h2>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                            <span class="text-gray-600" style="font-family: 'Poppins', sans-serif;">{{ $articles->total() }} artikel ditemukan</span>
                        </div>
                    </div>
                @endif

                @if ($articles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($articles as $article)
                            <article
                                class="bg-white shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if ($article->image)
                                    <div class="aspect-video overflow-hidden">
                                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium"
                                            style="font-family: 'Poppins', sans-serif;">
                                            {{ $article->category->name }}
                                        </span>
                                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                        <span class="text-sm text-gray-500"
                                            style="font-family: 'Poppins', sans-serif;">
                                            {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                                        </span>
                                    </div>

                                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors line-clamp-2"
                                        style="font-family: 'Poppins', sans-serif;">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>

                                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                    <p class="text-gray-600 mb-4 line-clamp-3" style="font-family: 'Poppins', sans-serif;">
                                        {{ $article->excerpt }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                                <span style="font-family: 'Poppins', sans-serif;"> {{ $article->author->name }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                                <span style="font-family: 'Poppins', sans-serif;">{{ $article->read_time ?? '5' }} min</span>
                                            </div>
                                        </div>

                                        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                        <a href="{{ route('articles.show', $article->slug) }}"
                                            class="inline-flex items-center text-red-600 hover:text-blue-800 font-medium text-sm"
                                            style="font-family: 'Poppins', sans-serif;">
                                            Baca
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($articles->hasPages())
                        <div class="mt-12">
                            {{ $articles->links('pagination::tailwind') }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                            <h3 class="text-xl font-bold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Artikel Tidak Ditemukan</h3>
                            <p class="text-gray-600 mb-6" style="font-family: 'Poppins', sans-serif;">
                                Maaf, tidak ada artikel yang sesuai dengan pencarian Anda.
                                Coba gunakan kata kunci yang berbeda.
                            </p>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                            <a href="{{ route('articles.index') }}"
                                class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors"
                                style="font-family: 'Poppins', sans-serif;">
                                Lihat Semua Artikel
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <!--<section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Jangan Lewatkan Artikel Terbaru
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Berlangganan newsletter kami dan dapatkan artikel terbaru langsung di inbox Anda
                </p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Masukkan email Anda..."
                        class="flex-1 px-6 py-3 rounded-xl border-0 focus:ring-2 focus:ring-white">
                    <button type="submit"
                        class="bg-white text-blue-600 px-8 py-3 rounded-xl font-medium hover:bg-gray-100 transition-colors">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </section> -->
@endsection
