@extends('layouts.frontend')

@section('title', $job->title . ' - Karier ' . setting('company_name'))
@section('meta_description', Str::limit(strip_tags($job->description), 160))

@section('content')
    <!-- Job Header -->
     <section class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <nav class="mb-8">
                    <ol class="flex items-center space-x-2 text-sm text-gray-600">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li><a href="{{ route('careers.index') }}" class="hover:text-blue-600">Laporan Keuangan</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li class="text-gray-800">{{ Str::limit($job->title, 30) }}</li>
                    </ol>
                </nav>

               <!-- <div class="flex items-center gap-4 mb-6">
                    <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        {{ ucfirst(str_replace('-', ' ', $job->type)) }}
                    </span>
                    <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium">
                        {{ $job->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div> -->

                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ $job->title }}
                </h1>
<!--
                <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $job->location }}</span>
                    </div>

                    @if ($job->salary_range)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                            <span>{{ $job->salary_range }}</span>
                        </div>
                    @endif

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Deadline: {{ $job->deadline->format('d F Y') }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Diposting {{ $job->created_at->diffForHumans() }}</span>
                    </div>
                </div> -->

                <!-- Quick Apply Button -->
                <!-- <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('careers.apply', $job->slug) }}"
                        class="bg-blue-600 text-white px-8 py-4 rounded-xl font-medium hover:bg-blue-700 transition-colors text-center">
                        Lamar Posisi Ini
                    </a>
                    <button
                        onclick="navigator.share({title: '{{ $job->title }}', text: '{{ Str::limit($job->description, 100) }}', url: '{{ route('careers.show', $job->slug) }}'})"
                        class="border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-xl font-medium hover:bg-blue-600 hover:text-white transition-colors">
                        Bagikan Posisi
                    </button>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Job Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Job Description -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Deskripsi Pekerjaan</h2>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! nl2br(e($job->description)) !!}
                            </div>
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <a href="{{ route('careers.apply', $job->slug) }}"
                                    class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors text-center block">
                                    Klik Untuk Download
                                </a>
                            </div>
                        </div>
                        <!-- Job Requirements -->
                        <!-- @if ($job->requirements && is_array($job->requirements) && count($job->requirements) > 0)
                            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Persyaratan</h2>
                                <div class="space-y-3">
                                    @foreach ($job->requirements as $requirement)
                                        <div class="flex items-start gap-3">
                                            <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 flex-shrink-0"></div>
                                            <span class="text-gray-700">{{ trim($requirement) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div> -->
                        @endif
                        <!-- Job Responsibilities -->
                        <!-- @if ($job->responsibilities && is_array($job->responsibilities) && count($job->responsibilities) > 0)
                            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Tanggung Jawab</h2>
                                <div class="space-y-3">
                                    @foreach ($job->responsibilities as $responsibility)
                                        <div class="flex items-start gap-3">
                                            <div class="w-2 h-2 bg-green-600 rounded-full mt-2 flex-shrink-0"></div>
                                            <span class="text-gray-700">{{ trim($responsibility) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div> -->
                        @endif
                        <!-- Job Benefits -->
                        <!-- @if ($job->benefits && is_array($job->benefits) && count($job->benefits) > 0)
                            <div class="bg-white rounded-2xl shadow-lg p-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Benefit & Fasilitas</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach ($job->benefits as $benefit)
                                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                                            <div
                                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">{{ trim($benefit) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div> -->

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Quick Info -->
                        <!-- <div class="fixed bottom-0 left-0 bg-white rounded-2xl shadow-lg p-8 mb-8 sticky top-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Informasi Posisi</h3>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Jenis</span>
                                    <span
                                        class="font-medium text-gray-900">{{ ucfirst(str_replace('-', ' ', $job->type)) }}</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Lokasi</span>
                                    <span class="font-medium text-gray-900">{{ $job->location }}</span>
                                </div>

                                @if ($job->salary_range)
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600">Gaji</span>
                                        <span class="font-medium text-gray-900">{{ $job->salary_range }}</span>
                                    </div>
                                @endif

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Deadline</span>
                                    <span class="font-medium text-gray-900">{{ $job->deadline->format('d M Y') }}</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Status</span>
                                    <span
                                        class="px-3 py-1 rounded-full text-sm font-medium {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $job->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div> -->
                            </div>


                        </div>

                        <!-- Share -->
                        <!-- <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Bagikan Posisi</h3>
                            <p class="text-gray-600 mb-6">Bantu teman Anda menemukan peluang karier yang bagus</p>

                            <div class="flex gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('careers.show', $job->slug)) }}"
                                    target="_blank"
                                    class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($job->title . ' - ' . setting('company_name')) }}&url={{ urlencode(route('careers.show', $job->slug)) }}"
                                    target="_blank"
                                    class="w-12 h-12 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('careers.show', $job->slug)) }}"
                                    target="_blank"
                                    class="w-12 h-12 bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($job->title . ' - ' . route('careers.show', $job->slug)) }}"
                                    target="_blank"
                                    class="w-12 h-12 bg-green-600 hover:bg-green-700 text-white rounded-full flex items-center justify-center transition-colors">
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
        </div>
    </section> -->

    <!-- Related Jobs -->
    <!-- @if ($relatedJobs->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            Posisi Lainnya
                        </h2>
                        <p class="text-xl text-gray-600">
                            Posisi terkait yang mungkin menarik untuk Anda
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($relatedJobs as $relatedJob)
                            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                        {{ ucfirst(str_replace('-', ' ', $relatedJob->type)) }}
                                    </span>
                                    <span class="text-sm text-gray-500">{{ $relatedJob->location }}</span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('careers.show', $relatedJob->slug) }}">
                                        {{ $relatedJob->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($relatedJob->description, 100) }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">
                                        Deadline: {{ $relatedJob->deadline->format('d M Y') }}
                                    </span>
                                    <a href="{{ route('careers.show', $relatedJob->slug) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                        Lihat Detail →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-12">
                        <a href="{{ route('careers.index') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                            Lihat Semua Posisi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif -->

    <!-- CTA Section -->
    <!-- <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Siap Bergabung dengan Tim Kami?
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Jangan lewatkan kesempatan untuk menjadi bagian dari perjalanan inovasi bersama kami
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('careers.apply', $job->slug) }}"
                        class="bg-white text-blue-600 px-8 py-3 rounded-xl font-medium hover:bg-gray-100 transition-colors">
                        Lamar Posisi Ini
                    </a>
                    <a href="{{ route('careers.index') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-xl font-medium hover:bg-white hover:text-blue-600 transition-colors">
                        Lihat Posisi Lain
                    </a>
                </div>
            </div>
        </div>
    </section> -->
@endsection
