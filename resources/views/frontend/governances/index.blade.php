@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="governances" :title="page_title('governances', 'Tata Kelola - ' . setting('company_name'))"
        :description="page_description('governances', 'Telusuri tata kelola resmi dari ' . setting('company_name') . ' untuk transparansi dan akuntabilitas.')" />
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
                    <h2 class="text-3xl font-bold text-gray-900" style="font-family: 'Poppins', sans-serif;">Daftar Piagam
                    </h2>
                    <p class="mt-2 text-gray-600" style="font-family: 'Poppins', sans-serif;">Unduh piagam dalam format PDF
                        untuk setiap periode</p>
                </div>

                <div class="max-w-5xl mx-auto px-4" style="font-family: 'Poppins', sans-serif;"">
    <h1 class=" text-3xl font-bold text-gray-900 mb-6">Piagam Audit Internal</h1>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Piagam Audit Internal BPR Syariah Arsa Sejahtera (Piagam) adalah wewenang Direksi dan Dewan
                        Komisaris
                        atas fungsi SKAI.
                        Piagam ini menggambarkan pelaporan organisasi audit internal dan mendefinisikan perannya di BPR
                        Syariah Arsa Sejahtera.
                        Standar, kebijakan, prosedur, dan praktik administrasi Audit Internal lainnya didokumentasikan dalam
                        Standar Prosedur Operasi (SOP)
                        Audit Internal dan Rencana Audit Internal (IAP). Kegiatan Audit Internal Perusahaan akan diatur
                        dengan mematuhi unsur-unsur wajib
                        dari Kerangka Kerja Praktik Profesional Internasional (IPPF) IIA termasuk Standar, Prinsip Inti,
                        Definisi, dan Kode Etik.
                    </p>

                    <div style="font-family: 'Poppins', sans-serif;">
                        <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-4">Tujuan Audit Internal</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Tujuan Audit Internal adalah kegiatan jasa asurans dan konsultasi yang independen dan obyektif
                            yang
                            dibentuk guna memeriksa
                            dan mengevaluasi kegiatan operasional dan kredit bisnis dalam mencapai tujuan bisnisnya melalui
                            tata
                            kelola dan manajemen risiko
                            yang baik. Kegiatan Audit Internal dirancang untuk menambah nilai (added value) bagi BPR Syariah
                            Arsa Sejahtera
                            dengan membantu
                            organisasi meningkatkan operasinya dan mencapai tujuannya melalui pendekatan yang sistematis dan
                            disiplin untuk evaluasi dan
                            peningkatan efektivitas manajemen risiko, pengendalian, dan proses tata kelola.
                        </p>
                    </div>

                </div>

                @if ($governances->count())
                        <div class="space-y-6">
                            @foreach ($governances as $governance)
                                    <div class="max-w-5xl mx-auto px-4">
                                        <a href="{{ $governance->file_url }}" target="_blank"
                                            class="inline-flex items-center bg-red-700 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-blue-700 transition-colors"
                                            style="font-family: 'Poppins', sans-serif;">
                                            <i class="fas fa-file-pdf mr-2"></i> Piagam Audit BPR Syariah Arsa Sejahtera
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($governances->hasPages())
                        <div class="mt-12">
                            {{ $governances->links('pagination::tailwind') }}
                        </div>
                    @endif
                @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2a4 4 0 014-4h4M3 7h4a4 4 0 014 4v4a4 4 0 004 4h4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada piagam tersedia</h3>
                    <p class="text-gray-600" style="font-family: 'Poppins', sans-serif;">Kami akan segera mengunggah piagam
                        terbaru. Silakan cek kembali
                        nanti.</p>
                </div>
            @endif
        </div>
        </div>
    </section>
@endsection