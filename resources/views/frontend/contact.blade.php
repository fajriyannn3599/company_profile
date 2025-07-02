@extends('layouts.frontend')

@push('seo')
    <x-seo-head 
        page-identifier="contact" 
        :title="page_title('contact', 'Hubungi Kami - ' . setting('site_name'))"
        :description="page_description('contact', 'Hubungi ' . setting('site_name') . ' untuk konsultasi gratis tentang kebutuhan teknologi dan digital solution untuk bisnis Anda.')" />
@endpush

@section('content')
<!-- Page Header -->
<x-hero 
    page-identifier="contact"
    fallback-title="Hubungi Kami"
    fallback-subtitle="Mari diskusikan bagaimana kami dapat membantu bisnis Anda" />

<!-- Contact Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>
                
                <div class="space-y-6 mb-8">
                    @if(setting('contact_address'))
                        <div class="flex items-start">
                            <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Alamat Kantor</h3>
                                <p class="text-gray-600">{{ setting('contact_address') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if(setting('contact_phone'))
                        <div class="flex items-start">
                            <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Telepon</h3>
                                <p class="text-gray-600">{{ setting('contact_phone') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if(setting('contact_email'))
                        <div class="flex items-start">
                            <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                                <p class="text-gray-600">{{ setting('contact_email') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if(setting('contact_whatsapp'))
                        <div class="flex items-start">
                            <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
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
                </div>
                
                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        @if(setting('facebook_url'))
                            <a href="{{ setting('facebook_url') }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(setting('twitter_url'))
                            <a href="{{ setting('twitter_url') }}" target="_blank" class="bg-blue-400 hover:bg-blue-500 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(setting('linkedin_url'))
                            <a href="{{ setting('linkedin_url') }}" target="_blank" class="bg-blue-700 hover:bg-blue-800 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(setting('instagram_url'))
                            <a href="{{ setting('instagram_url') }}" target="_blank" class="bg-pink-600 hover:bg-pink-700 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(setting('youtube_url'))
                            <a href="{{ setting('youtube_url') }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek *</label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject" 
                                   value="{{ old('subject') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan *</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('message') }}</textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
@if(setting('google_maps_embed'))
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Lokasi Kantor</h2>
            <p class="text-xl text-gray-600">Kunjungi kantor kami untuk konsultasi langsung</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="h-96">
                {!! setting('google_maps_embed') !!}
            </div>
        </div>
    </div>
</section>
@endif

<!-- FAQ Section -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xl text-gray-600">Temukan jawaban untuk pertanyaan umum tentang layanan kami</p>
        </div>
        
        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Berapa lama waktu pengembangan aplikasi?</h3>
                <p class="text-gray-600">Waktu pengembangan tergantung pada kompleksitas project. Aplikasi sederhana biasanya 2-3 bulan, sementara aplikasi enterprise bisa 6-12 bulan. Kami akan memberikan timeline yang detail setelah analisis requirement.</p>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Apakah ada garansi untuk aplikasi yang dikembangkan?</h3>
                <p class="text-gray-600">Ya, kami memberikan garansi maintenance dan bug fixing selama 6 bulan setelah go-live. Setelah itu, kami juga menyediakan paket maintenance berkelanjutan.</p>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Bagaimana sistem pembayaran projectnya?</h3>
                <p class="text-gray-600">Pembayaran biasanya dibagi dalam beberapa milestone: 30% di awal, 40% saat development selesai, dan 30% setelah testing dan go-live. Sistem pembayaran dapat disesuaikan dengan kebutuhan client.</p>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Apakah bisa konsultasi gratis dulu?</h3>
                <p class="text-gray-600">Tentu! Kami menyediakan konsultasi gratis untuk memahami kebutuhan Anda. Hubungi kami melalui form di atas atau langsung via WhatsApp untuk jadwalkan meeting.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Project Anda?</h2>
        <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto">
            Tim ahli kami siap membantu mewujudkan ide digital Anda menjadi kenyataan
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if(setting('contact_whatsapp'))
                <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', setting('contact_whatsapp')) }}" 
                   target="_blank"
                   class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                    <i class="fab fa-whatsapp mr-2"></i>
                    Chat WhatsApp
                </a>
            @endif
            <a href="{{ route('services.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold transition-all">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>
@endsection
