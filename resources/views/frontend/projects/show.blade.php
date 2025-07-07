@extends('layouts.frontend')

@section('title', $project->title . ' - ' . setting('company_name'))
@section('meta_description', $project->excerpt ?? strip_tags(Str::limit($project->description, 160)))

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <nav class="mb-8">
                <ol class="flex items-center justify-center space-x-2 text-sm text-gray-600">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-blue-600">Laporan Keuangan</a></li>
                    <!-- <li><span class="mx-2">/</span></li>
                    <li class="text-gray-800">{{ $project->title }}</li> -->
                </ol>
            </nav>

            <!-- <div class="bg-white rounded-2xl p-2 shadow-lg inline-block mb-6">
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-xl text-sm font-medium">
                    {{ $project->category->name }}
                </span>
            </div> -->

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                {{ $project->title }}
            </h1>

            @if($project->excerpt)
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                {{ $project->excerpt }}
            </p>
            @endif

            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-gray-600">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ $project->created_at->format('d M Y') }}</span>
                </div>
                @if($project->client)
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>{{ $project->client }}</span>
                </div>
                @endif
                @if($project->project_url)
                <div class="flex items-center gap-2">
                    <!--<svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    <a href="{{ $project->project_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        Lihat Project
                    </a> -->
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Main Image -->
    @if($project->image)
        <section class="py-8">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}"
                            class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </section>
    @endif

<!-- Project Content -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Project Description -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="prose prose-lg max-w-none">
                    {!! $project->description !!}
                </div>
            </div>
<!-- Project Technologies -->
                @if($project->technologies)
                    @php
                        $techs = is_array($project->technologies) ? $project->technologies :
                            (is_string($project->technologies) ?
                                (json_decode($project->technologies, true) ?: explode(',', $project->technologies)) :
                                []);
                        $techs = is_array($techs) ? $techs : [];
                    @endphp
                    @if(count($techs) > 0)
                        <!-- <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Teknologi yang Digunakan</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach($techs as $tech)
                                    <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif -->

            <!-- Project Gallery -->
            @if($project->gallery)
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Galeri Project</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach(json_decode($project->gallery, true) as $image)
                    <div class="rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ Storage::url($image) }}"
                             alt="Gallery Image"
                             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Related Projects -->
<!--<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Project Lainnya
                </h2>
                <p class="text-xl text-gray-600">
                    Lihat project terkait yang mungkin menarik untuk Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedProjects as $relatedProject)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($relatedProject->image)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ Storage::url($relatedProject->image) }}"
                             alt="{{ $relatedProject->title }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @endif

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $relatedProject->category->name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $relatedProject->created_at->format('M Y') }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                            <a href="{{ route('projects.show', $relatedProject->slug) }}">
                                {{ $relatedProject->title }}
                            </a>
                        </h3>

                        @if($relatedProject->excerpt)
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $relatedProject->excerpt }}
                        </p>
                        @endif

                        <a href="{{ route('projects.show', $relatedProject->slug) }}"
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        -->
            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}"
                   class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                    Lihat Semua Project
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section> -->

<!-- CTA Section -->
<!-- <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Tertarik dengan Project Serupa?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Mari diskusikan bagaimana kami dapat membantu mewujudkan project impian Anda
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
