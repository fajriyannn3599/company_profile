@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="contact" :title="page_title('contact', 'Hubungi Kami - ' . setting('site_name'))"
        :description="page_description(
            'contact',
            'Hubungi ' .
            setting('site_name') .
            ' untuk konsultasi gratis tentang kebutuhan teknologi dan digital solution untuk bisnis Anda.',
        )" />
@endpush

@section('content')
    

    <!-- Contact Section -->
    <section class="py-20 bg-white">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-10">



                <!-- Contact Form -->
                <div>
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6" style="font-family: 'Poppins', sans-serif;"> Form Pengajuan Pembiayaan</h2>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                                <ul class="list-disc list-inside" style="font-family: 'Poppins', sans-serif;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf


                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Nama Lengkap
                                    *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Email *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Subjek *</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Nomor Telepon *</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="jenis_produk" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
                                    Jenis Produk *
                                </label>
                                <select id="jenis_produk" name="jenis_produk" class="w-full px-4 py-3 border rounded-lg" style="font-family: 'Poppins', sans-serif;">
                                    <option value="">-- Pilih Jenis Produk --</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('jenis_produk') == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



{{-- Form tambahan jenis kendaraan (hidden dulu) --}}
<div id="jenisKendaraanWrapper" class="hidden mt-4">
    <label for="jenis_kendaraan" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
        Jenis Kendaraan *
    </label>
    <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" value="{{ old('jenis_kendaraan') }}"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
</div>



{{-- Script --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const jenisProduk = document.getElementById("jenis_produk");
        const jenisKendaraanWrapper = document.getElementById("jenisKendaraanWrapper");
        
        // ganti sesuai ID "kendaraan" dari database
        const kendaraanId = 13;

        function toggleJenisKendaraan() {
            if (jenisProduk.value == kendaraanId) {
                jenisKendaraanWrapper.classList.remove("hidden");
            } else {
                jenisKendaraanWrapper.classList.add("hidden");
                document.getElementById("jenis_kendaraan").value = ""; // reset
            }
        }

        // Jalankan saat halaman load
        toggleJenisKendaraan();

        // Jalankan setiap kali ada perubahan
        jenisProduk.addEventListener("change", toggleJenisKendaraan);
    });
</script>


                            <div>
                                <label for="nilai_pembiayaan" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Nilai
                                    Pembiayaan *</label>
                                <input type="text" id="nilai_pembiayaan" name="nilai_pembiayaan"
                                    value="{{ old('nilai_pembiayaan') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Lokasi *</label>
                                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">Deskripsi
                                    *</label>
                                <textarea id="message" name="message" rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors"
                                style="font-family: 'Poppins', sans-serif;">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Form Pengajuan Pembiayaan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </section>
    
        
@endsection