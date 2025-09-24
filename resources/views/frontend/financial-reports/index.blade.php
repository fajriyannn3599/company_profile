@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="financial-reports" :title="page_title('financial-reports', 'Laporan Keuangan - ' . setting('company_name'))" :description="page_description('financial-reports', 'Telusuri laporan keuangan resmi dari ' . setting('company_name') . ' untuk transparansi dan akuntabilitas.')" />
@endpush

@section('content')
    <!-- Hero Section -->
    <!-- <x-hero page-identifier="financial-reports" fallback-title="Laporan Keuangan"
        fallback-subtitle="Akses laporan keuangan resmi untuk transparansi dan informasi yang akurat" /> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Laporan Keuangan -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="mb-10 text-center">
                    <h2 class="text-3xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">Daftar Laporan Keuangan</h2>
                    <p class="mt-2 text-gray-600" style="font-family: 'Poppins', sans-serif;">Unduh laporan keuangan dalam format PDF untuk setiap periode</p>
                </div>

                @if ($financialReports->count())
                    <div class="space-y-6">
                        @foreach ($financialReports as $report)
                            <div class="bg-white shadow-md p-6 hover:shadow-lg transition-shadow">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <div class="mb-4 sm:mb-0">
                                        <h3 class="text-xl font-semibold text-gray-800" style="font-family: 'Poppins', sans-serif;">{{ $report->title }}</h3>
                                        <p class="text-gray-600 mt-1 line-clamp-2" style="font-family: 'Poppins', sans-serif;">{{ $report->description }}</p>
                                    </div>
                                    <a href="{{ $report->file_url }}" target="_blank"
                                        class="inline-flex items-center bg-red-700 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors"
                                        style="font-family: 'Poppins', sans-serif;">
                                        <i class="fas fa-file-pdf mr-2"></i> Lihat PDF
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($financialReports->hasPages())
                        <div class="mt-12">
                            {{ $financialReports->links('pagination::tailwind') }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-20">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2a4 4 0 014-4h4M3 7h4a4 4 0 014 4v4a4 4 0 004 4h4" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada laporan tersedia</h3>
                        <p class="text-gray-600"
                        style="font-family: 'Poppins', sans-serif;">Kami akan segera mengunggah laporan keuangan terbaru. Silakan cek kembali
                            nanti.</p>
                    </div>
                @endif
                <!-- Views Counter -->
                <div class="flex items-center justify-end text-sm text-gray-600 mt-8"
                    style="font-family: 'Poppins', sans-serif;">
                    <i class="fas fa-eye mr-2 text-gray-500"></i>
                    <span>Visited</span>
                    <span class="mx-1">:</span>
                    <span class="ml-1 font-semibold">{{ number_format($views) }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection