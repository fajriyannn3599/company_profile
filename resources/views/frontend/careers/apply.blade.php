@extends('layouts.frontend')

@section('title', 'Lamar - ' . $job->title . ' - ' . setting('company_name'))
@section('meta_description', 'Lamar posisi ' . $job->title . ' di ' . setting('company_name') . '. Bergabunglah dengan tim kami dan kembangkan karier Anda.')

@section('content')
<!-- Application Header -->
<section class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <nav class="mb-8">
                <ol class="flex items-center justify-center space-x-2 text-sm text-gray-600">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('careers.index') }}" class="hover:text-blue-600">Karier</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('careers.show', $job->slug) }}" class="hover:text-blue-600">{{ Str::limit($job->title, 20) }}</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-800">Lamar</li>
                </ol>
            </nav>

            <div class="bg-white rounded-2xl p-2 shadow-lg inline-block mb-6">
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-xl text-sm font-medium">
                    📝 Form Lamaran
                </span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Lamar Posisi
            </h1>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 max-w-lg mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $job->title }}</h2>
                <div class="flex items-center justify-center gap-4 text-sm text-gray-600">
                    <span>{{ $job->location }}</span>
                    <span>•</span>
                    <span>{{ ucfirst(str_replace('-', ' ', $job->type)) }}</span>
                    <span>•</span>
                    <span>Deadline: {{ $job->deadline->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-xl mb-8">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('careers.apply.store', $job->slug) }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Personal Information -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Informasi Pribadi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                            @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="portfolio_url" class="block text-sm font-medium text-gray-700 mb-2">
                                Portfolio URL (Opsional)
                            </label>
                            <input type="url" 
                                   id="portfolio_url" 
                                   name="portfolio_url" 
                                   value="{{ old('portfolio_url') }}"
                                   placeholder="https://..."
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('portfolio_url') border-red-500 @enderror">
                            @error('portfolio_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Documents -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Dokumen</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="resume" class="block text-sm font-medium text-gray-700 mb-2">
                                CV/Resume <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2">
                                <input type="file" 
                                       id="resume" 
                                       name="resume" 
                                       accept=".pdf,.doc,.docx"
                                       required
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('resume') border-red-500 @enderror">
                                <p class="mt-2 text-sm text-gray-500">Format yang didukung: PDF, DOC, DOCX. Maksimal 2MB.</p>
                            </div>
                            @error('resume')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Cover Letter -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Cover Letter</h3>
                    
                    <div>
                        <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-2">
                            Cover Letter <span class="text-red-500">*</span>
                        </label>
                        <textarea id="cover_letter" 
                                  name="cover_letter" 
                                  rows="8" 
                                  required
                                  placeholder="Ceritakan tentang diri Anda, pengalaman, dan mengapa Anda tertarik dengan posisi ini..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cover_letter') border-red-500 @enderror">{{ old('cover_letter') }}</textarea>
                        @error('cover_letter')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Agreement -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="flex items-start gap-3">
                        <input type="checkbox" 
                               id="agreement" 
                               name="agreement"
                               required
                               class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="agreement" class="text-sm text-gray-700">
                            Saya menyetujui bahwa informasi yang saya berikan adalah benar dan akurat. 
                            Saya juga memahami bahwa {{ setting('company_name') }} akan menggunakan 
                            informasi ini untuk proses seleksi dan dapat menghubungi saya terkait 
                            aplikasi lamaran ini. <span class="text-red-500">*</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="submit" 
                            class="bg-blue-600 text-white px-8 py-4 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                        Kirim Lamaran
                    </button>
                    <a href="{{ route('careers.show', $job->slug) }}" 
                       class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-xl font-medium hover:bg-gray-50 transition-colors text-center">
                        Kembali ke Detail Posisi
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Tips Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tips untuk Lamaran yang Sukses</h2>
                <p class="text-xl text-gray-600">Beberapa tips untuk meningkatkan peluang Anda diterima</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">CV yang Menarik</h3>
                    <p class="text-gray-600">
                        Pastikan CV Anda rapi, terstruktur, dan highlight pengalaman yang relevan dengan posisi yang dilamar.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cover Letter Personal</h3>
                    <p class="text-gray-600">
                        Tulis cover letter yang personal, spesifik untuk posisi ini, dan tunjukkan antusiasme Anda.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Portfolio Online</h3>
                    <p class="text-gray-600">
                        Jika ada, sertakan link portfolio online yang menampilkan karya terbaik Anda.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Teliti dan Lengkap</h3>
                    <p class="text-gray-600">
                        Pastikan semua informasi lengkap dan akurat. Periksa kembali sebelum mengirim lamaran.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
