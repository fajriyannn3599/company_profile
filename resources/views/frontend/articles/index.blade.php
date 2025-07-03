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
    <x-hero page-identifier="articles" fallback-title="Artikel & Blog"
        fallback-subtitle="Dapatkan insight terbaru, tips praktis, dan informasi berharga dari para ahli di bidang teknologi dan bisnis" />

    <!-- Search & Filter Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Search & Filter -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <form method="GET" action="{{ route('articles.index') }}" class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari artikel..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="sm:w-48">
                            <select name="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Semua Kategori</option>                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}"
                                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-colors font-medium">
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
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            Artikel Pilihan
                        </h2>
                        <p class="text-xl text-gray-600">
                            Artikel terbaru dan paling populer dari kami
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            @if ($featuredArticle->image)
                                <div class="aspect-video lg:aspect-square overflow-hidden">
                                    <img src="{{ Storage::url($featuredArticle->image) }}"
                                        alt="{{ $featuredArticle->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif

                            <div class="p-8 lg:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-4 mb-6">
                                    <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                                        {{ $featuredArticle->category->name }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        {{ $featuredArticle->published_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3
                                    class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('articles.show', $featuredArticle->slug) }}">
                                        {{ $featuredArticle->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                                    {{ $featuredArticle->excerpt }}
                                </p>

                                <div class="flex items-center gap-4 mb-6">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $featuredArticle->author->name }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $featuredArticle->read_time ?? '5' }} min
                                            baca</span>
                                    </div>
                                </div>

                                <a href="{{ route('articles.show', $featuredArticle->slug) }}"
                                    class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors self-start">
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
                            <h2 class="text-2xl font-bold text-gray-900">
                                Hasil Pencarian
                                @if (request('search'))
                                    untuk "{{ request('search') }}"
                                @endif
                                @if (request('category'))
                                    dalam kategori
                                    "{{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}"
                                @endif
                            </h2>
                            <span class="text-gray-600">{{ $articles->total() }} artikel ditemukan</span>
                        </div>
                    </div>
                @endif

                @if ($articles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($articles as $article)
                            <article
                                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if ($article->image)
                                    <div class="aspect-video overflow-hidden">
                                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $article->category->name }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $article->published_at->format('d M Y') }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors line-clamp-2">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 mb-4 line-clamp-3">
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
                                                <span>{{ $article->author->name }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>{{ $article->read_time ?? '5' }} min</span>
                                            </div>
                                        </div>

                                        <a href="{{ route('articles.show', $article->slug) }}"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm">
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
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Artikel Tidak Ditemukan</h3>
                            <p class="text-gray-600 mb-6">
                                Maaf, tidak ada artikel yang sesuai dengan pencarian Anda.
                                Coba gunakan kata kunci yang berbeda.
                            </p>
                            <a href="{{ route('articles.index') }}"
                                class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
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
