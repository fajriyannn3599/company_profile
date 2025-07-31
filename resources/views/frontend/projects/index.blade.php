@extends('layouts.frontend')

@push('seo')
    <x-seo-head
        page-identifier="projects"
        :title="page_title('projects', 'Portfolio Kami - ' . setting('site_name'))"
        :description="page_description('projects', 'Jelajahi portfolio project terbaik yang telah kami kerjakan untuk berbagai klien dalam berbagai industri.')" />
@endpush

@section('content')
<!-- Page Header -->
<x-hero
    page-identifier="projects"
    fallback-title="Portfolio Kami"
    fallback-subtitle="Lihat project-project terbaik yang telah kami selesaikan" />

<!-- Filter Categories -->
<!-- <section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">            <a href="{{ route('projects.index') }}"
               class="px-6 py-2 rounded-full transition-colors {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua Project
            </a>
            @foreach($categories as $category)
                <a href="{{ route('projects.index', ['category' => $category->slug]) }}"
                   class="px-6 py-2 rounded-full transition-colors {{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</section> -->

<!-- Projects Grid -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="bg-white shadow-lg hover:shadow-xl transition-shadow overflow-hidden group">
                        <div class="relative overflow-hidden">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/'.$project->featured_image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                    <i class="fas fa-image text-6xl text-blue-300"></i>
                                </div>
                            @endif

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $project->category->name }}
                                </span>
                            </div>

                            @if($project->is_featured)
                                <div class="absolute top-4 right-4">
                                    <span class="bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        <i class="fas fa-star mr-1"></i>
                                        Featured
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $project->short_description }}</p>

                            @if($project->client_name)
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>{{ $project->client_name }}</span>
                                </div>
                            @endif
                              @if($project->technologies)
                                @php
                                    $techs = is_array($project->technologies) ? $project->technologies : json_decode($project->technologies, true);
                                    $techs = is_array($techs) ? $techs : [];
                                @endphp
                                @if(count($techs) > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach(array_slice($techs, 0, 3) as $tech)
                                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                        @if(count($techs) > 3)
                                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                                +{{ count($techs) - 3 }} more
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            @endif

                            <div class="flex items-center justify-between">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                                    Lihat Detail
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>

                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}"
                                       target="_blank"
                                       class="text-gray-500 hover:text-gray-700 transition-colors"
                                       title="Visit Website">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($projects->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $projects->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <div class="text-gray-400 text-6xl mb-6">
                    <i class="fas fa-folder-open"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Belum Ada Project</h3>
                <p class="text-gray-600 mb-8">Portfolio project sedang dalam proses update. Silakan kembali lagi nanti.</p>
                <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    Diskusikan Project Anda
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Statistics -->
<!--<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Project Statistics</h2>
            <p class="text-xl text-gray-600">Angka-angka yang menunjukkan pengalaman kami</p>
        </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <x-stat-card number="50+" label="Project Selesai" icon="fas fa-check-circle" />
            <x-stat-card number="30+" label="Happy Clients" icon="fas fa-smile" />
            <x-stat-card number="8+" label="Tahun Pengalaman" icon="fas fa-calendar-alt" />
            <x-stat-card number="15+" label="Teknologi Dikuasai" icon="fas fa-code" />
        </div>
    </div>
</section> -->

<!-- CTA Section -->
<!--section class="py-20 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik dengan Project Kami?</h2>
        <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto">
            Mari diskusikan ide project Anda dan wujudkan menjadi kenyataan bersama tim expert kami
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                Mulai Project Anda
            </a>
            <a href="{{ route('services.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold transition-all">
                Lihat Layanan
            </a>
        </div>
    </div>
</section> -->
@endsection

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
