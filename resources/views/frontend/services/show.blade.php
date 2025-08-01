@extends('layouts.frontend')

@section('title', $service->meta_title ?: $service->title . ' - ' . setting('site_name'))
@section('meta_description', $service->meta_description ?: $service->short_description)

@section('content')
    <!-- Service Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center bg-gradient-to-br from-red-900 to-red-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-white mb-8">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-200" style="font-family: 'Poppins', sans-serif;">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-blue-200" style="font-family: 'Poppins', sans-serif;">Produk</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-blue-200" style="font-family: 'Poppins', sans-serif;">{{ $service->title }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-white">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6" style="font-family: 'Poppins', sans-serif;">{{ $service->title }}</h1>
                    <p class="text-xl opacity-90 leading-relaxed" style="font-family: 'Poppins', sans-serif;">{{ $service->short_description }}</p>

                    @if($service->serviceCategory)
                        <!-- <div class="mt-6">
                            <span class="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full">
                                <i class="fas fa-star mr-1"></i>
                                {{ $service->serviceCategory->name }}
                            </span>
                        </div> -->
                    @endif
                </div>

                <div class="text-center">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                        class="w-full max-w-md mx-auto rounded-lg shadow-xl">
                    @elseif($service->icon)
                            <div class="text-8xl mb-6 text-blue-200">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Service Content -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start"
                style="font-family: 'Poppins', sans-serif;">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        @if($service->description)
                            @foreach(explode("\n", strip_tags($service->description)) as $paragraph)
                                @if(str_contains($paragraph, ':'))
                                    @php
                                        $parts = explode(':', $paragraph, 2);
                                        $title = trim($parts[0]);
                                        $content = trim($parts[1] ?? '');
                                    @endphp
                                    @if(str_starts_with($title, '-') || str_starts_with($content, '-'))
                                        <!-- List Section -->
                                        <div class="my-6">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ str_replace('-', '', $title) }}</h3>
                                            <ul class="columns-2 gap-20 space-y-2">
                                                @foreach(explode('-', strip_tags($content)) as $item)
                                                    @if(trim($item))
                                                        <li class="break-inside-avoid flex items-start" style="font-family: 'Poppins', sans-serif;">
                                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                                                            <span>{{ trim($item) }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <!-- Regular Section -->
                                        <div class="my-6">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $title }}</h3>
                                            <p class="text-gray-600 leading-relaxed">{{ $content }}</p>
                                        </div>
                                    @endif
                                @else
                                    <!-- Regular Paragraph -->
                                    <p class="text-gray-600 leading-relaxed mb-6">{{ $paragraph }}</p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Requirement_Description -->
                <div class="lg:col-span-2">
                <div class="prose prose-lg max-w-none">

                @foreach ([
                    'requirement_description' => 'Deskripsi 1',
                    'requirement_description_2' => 'Deskripsi 2',
                    'requirement_description_3' => 'Deskripsi 3',
                ] as $field => $defaultTitle)

                @php
                    $content = strip_tags($service->$field ?? '');
                @endphp

                    @if(!empty($content))
                        @foreach(explode("\n", $content) as $index => $paragraph)
                            @if(str_contains($paragraph, ':'))
                                @php
                                    $parts = explode(':', $paragraph, 2);
                                    $title = trim($parts[0]) ?: $defaultTitle;
                                    $list = trim($parts[1] ?? '');
                                    $accordionId = "{$field}-accordion-{$index}";
                                @endphp

                        @if(str_starts_with($list, '-') || str_starts_with($title, '-'))
                            <!-- Accordion List Section -->
                            <div class="my-6 border border-gray-300 rounded-md">
                                <button type="button"
                                    onclick="toggleAccordion('{{ $accordionId }}')"
                                    class="w-full text-left px-4 py-3 bg-red-900 text-white font-semibold flex justify-between items-center">
                                    <span>{{ str_replace('-', '', $title) }}</span>
                                    <svg id="icon-{{ $accordionId }}" class="w-5 h-5 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div id="{{ $accordionId }}" class="hidden px-6 py-4 bg-white">
                                    <ul class="space-y-2">
                                        @foreach(explode('-', $list) as $item)
                                            @if(trim($item))
                                                <li class="flex items-start">
                                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                                                    <span>{{ trim($item) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <!-- Section Biasa -->
                            <div class="my-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $title }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $list }}</p>
                            </div>
                        @endif
                    @else
                        <!-- Paragraf Biasa -->
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $paragraph }}</p>
                    @endif
                        @endforeach
                @endif

                @endforeach

            </div>
        </div>

<!-- JavaScript Toggle Accordion -->
<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-90');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-90');
        }
    }
</script>
                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Contact Card -->
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Butuh Konsultasi?</h3>
                        <p class="text-gray-600 mb-6" style="font-family: 'Poppins', sans-serif;">Diskusikan kebutuhan produk Anda dengan tim ahli kami</p>

                        <div class="space-y-4">
                            <a href="{{ route('contact') }}"
                                class="block bg-orange-700 hover:bg-blue-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition-colors" style="font-family: 'Poppins', sans-serif;">
                                Konsultasi Gratis
                            </a>

                            @if(setting('contact_whatsapp'))
                                <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', setting('contact_whatsapp')) }}"
                                    target="_blank"
                                    class="block bg-green-600 hover:bg-green-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition-colors" style="font-family: 'Poppins', sans-serif;">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Service Features -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6" >
                        <h3 class="text-xl font-semibold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Keunggulan Produk</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Konsultasi gratis</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Tim berpengalaman</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Teknologi terdepan</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Support berkelanjutan</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Harga kompetitif</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    @if($relatedServices && $relatedServices->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Produk Terkait</h2>
                    <p class="text-xl text-gray-600">Produk lain yang mungkin Anda butuhkan</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedServices as $relatedService)
                        <x-service-card :service="$relatedService" variant="compact" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <!-- <section class="py-20 bg-blue-900 text-white">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Proyek Anda?</h2>
                                    <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto">
                                        Konsultasikan kebutuhan {{ $service->title }} Anda dengan tim expert kami dan dapatkan solusi terbaik
                                    </p>

                                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                        <a href="{{ route('contact') }}" class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                                            Dapatkan Penawaran
                                        </a>
                                        <a href="{{ route('projects.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold transition-all">
                                            Lihat Portfolio
                                        </a>
                                    </div>
                                </div>
                            </section> -->
@endsection