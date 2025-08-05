@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="projects" :title="page_title('projects', 'Portfolio Kami - ' . setting('site_name'))"
        :description="page_description('projects', 'Jelajahi portfolio project terbaik yang telah kami kerjakan untuk berbagai klien dalam berbagai industri.')" />
@endpush

@section('content')
    <!-- Page Header -->
    <x-hero page-identifier="projects" fallback-title="Portfolio Kami"
        fallback-subtitle="Lihat project-project terbaik yang telah kami selesaikan" />

    <!-- Article Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                    <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700 prose-blockquote:border-blue-200 prose-blockquote:bg-blue-50 prose-blockquote:text-gray-800"
                        style="font-family: 'Poppins', sans-serif;">
                        Piagam Audit Internal
                        <p>Piagam Audit Internal PT. BPR Kirana Indonesia (Piagam) adalah wewenang Direksi dan Dewan
                            Komisaris atas fungsi SKAI. Piagam ini menggambarkan pelaporan organisasi audit internal dan
                            mendefinisikan perannya di PT. BPR Kirana Indonesia. Standar, kebijakan, prosedur, dan praktik
                            administrasi Audit Internal lainnya didokumentasikan dalam Standar Prosedur Operasi (SOP) Audit
                            Internal dan Rencana Audit Internal (IAP). Kegiatan Audit Internal Perusahaan akan diatur dengan
                            mematuhi unsur-unsur wajib dari Kerangka Kerja Praktik Profesional Internasional (IPPF) IIA
                            termasuk Standar, Prinsip Inti, Definisi, dan Kode Etik.</p>
                    </div>
                </div>
            </div>
    </section>
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