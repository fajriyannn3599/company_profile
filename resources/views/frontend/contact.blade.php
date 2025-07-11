@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="contact" :title="page_title('contact', 'Hubungi Kami - ' . setting('site_name'))" :description="page_description(
        'contact',
        'Hubungi ' .
            setting('site_name') .
            ' untuk konsultasi gratis tentang kebutuhan teknologi dan digital solution untuk bisnis Anda.',
    )" />
@endpush

@section('content')
    <!-- Page Header -->
    <x-hero page-identifier="contact" fallback-title="Hubungi Kami"
        fallback-subtitle="Mari diskusikan bagaimana kami dapat membantu bisnis Anda" />

    <!-- Contact Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12"> 
                <!-- Contact Information -->
                <!-- <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>

                    <div class="space-y-6 mb-8">
                        @if (setting('contact_address'))
                            <div class="flex items-start">
                                <div
                                    class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Alamat Kantor</h3>
                                    <p class="text-gray-600">{{ setting('contact_address') }}</p>
                                </div>
                            </div>
                        @endif

                        @if (setting('contact_phone'))
                            <div class="flex items-start">
                                <div
                                    class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Telepon</h3>
                                    <p class="text-gray-600">{{ setting('contact_phone') }}</p>
                                </div>
                            </div>
                        @endif

                        @if (setting('contact_email'))
                            <div class="flex items-start">
                                <div
                                    class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                                    <p class="text-gray-600">{{ setting('contact_email') }}</p>
                                </div>
                            </div>
                        @endif

                        @if (setting('contact_whatsapp'))
                            <div class="flex items-start">
                                <div
                                    class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fab fa-whatsapp text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">WhatsApp</h3>
                                    <p class="text-gray-600">{{ setting('contact_whatsapp') }}</p>
                                    <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', setting('contact_whatsapp')) }}"
                                        target="_blank"
                                        class="inline-block mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fab fa-whatsapp mr-1"></i>
                                        Chat WhatsApp
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div> -->

                    <!-- Social Media -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            @if (setting('facebook_url'))
                                <a href="{{ setting('facebook_url') }}" target="_blank"
                                    class="bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if (setting('instagram_url'))
                                <a href="{{ setting('instagram_url') }}" target="_blank"
                                    class="bg-pink-600 hover:bg-pink-700 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

    <!-- Map Section -->
<section('content')>
    <div class="container mx-auto px-4 py-10">
        {{-- Navigasi Tab --}}
        <div class="flex justify-center space-x-8 text-lg font-semibold mb-8">
            <button onclick="showTab('batu')" id="tab-batu" class="tab-button text-blue-900 border-b-2">
                (Kantor Pusat) Batu
            </button>
            <button onclick="showTab('karangploso')" id="tab-karangploso" class="tab-button text-blue-900 border-b-2">
                (Kantor Cabang) Karang Ploso
            </button>
            <button onclick="showTab('kas')" id="tab-kas" class="tab-button text-blue-900 border-b-2">
                (Kantor Kas) UMM
            </button>
        </div>

        {{-- Konten Tab --}}
        <div id="konten-batu" class="tab-content block">
            @include('kontak-lokasi.batu')
        </div>

        <div id="konten-karangploso" class="tab-content hidden">
            @include('kontak-lokasi.karangploso')
        </div>

        <div id="konten-kas" class="tab-content hidden">
            @include('kontak-lokasi.kas')
        </div>
    </div>

    {{-- Script Tab --}}
    <script>
        function showTab(id) {
            const tabs = ['batu', 'karangploso', 'kas'];

            tabs.forEach(tab => {
                document.getElementById('konten-' + tab).classList.add('hidden');
                document.getElementById('tab-' + tab).classList.remove('border-b-2', 'border-red-700', 'text-red-700');
            });

            document.getElementById('konten-' + id).classList.remove('hidden');
            document.getElementById('tab-' + id).classList.add('border-b-2', 'border-red-700', 'text-red-700');

            if (id === 'karangploso') {
                document.getElementById('tab-' + id).classList.add('border-b-2', 'border-red-700', 'text-red-700');
            }
        }
    </script>
</section>
<!-- FAQ Section -->
<!-- <section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xl text-gray-600">Temukan jawaban untuk pertanyaan umum tentang layanan kami</p>
        </div>

        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Berapa lama waktu pengembangan aplikasi?</h3>
                <p class="text-gray-600">Waktu pengembangan tergantung pada kompleksitas project. Aplikasi sederhana
                    biasanya 2-3 bulan, sementara aplikasi enterprise bisa 6-12 bulan. Kami akan memberikan timeline
                    yang detail setelah analisis requirement.</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Apakah ada garansi untuk aplikasi yang
                    dikembangkan?</h3>
                <p class="text-gray-600">Ya, kami memberikan garansi maintenance dan bug fixing selama 6 bulan setelah
                    go-live. Setelah itu, kami juga menyediakan paket maintenance berkelanjutan.</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Bagaimana sistem pembayaran projectnya?</h3>
                <p class="text-gray-600">Pembayaran biasanya dibagi dalam beberapa milestone: 30% di awal, 40% saat
                    development selesai, dan 30% setelah testing dan go-live. Sistem pembayaran dapat disesuaikan dengan
                    kebutuhan client.</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Apakah bisa konsultasi gratis dulu?</h3>
                <p class="text-gray-600">Tentu! Kami menyediakan konsultasi gratis untuk memahami kebutuhan Anda.
                    Hubungi kami melalui form di atas atau langsung via WhatsApp untuk jadwalkan meeting.</p>
            </div>
        </div>
    </div>
</section> -->

<!-- CTA Section -->
<!-- <section class="py-20 bg-blue-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Project Anda?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto">
                    Tim ahli kami siap membantu mewujudkan ide digital Anda menjadi kenyataan
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @if (setting('contact_whatsapp'))
<a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', setting('contact_whatsapp')) }}"
                            target="_blank"
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Chat WhatsApp
                        </a>
@endif
                    <a href="{{ route('services.index') }}"
                        class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold transition-all">
                        Lihat Layanan
                    </a>
                </div>

            </div>
        </section> -->
@endsection
