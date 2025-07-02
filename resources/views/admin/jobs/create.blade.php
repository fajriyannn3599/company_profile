@extends('layouts.admin')

@section('title', 'Tambah Lowongan Pekerjaan')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.jobs.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Lowongan Pekerjaan</h1>
                <p class="mt-1 text-sm text-gray-600">Buat lowongan pekerjaan baru</p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>
                    <div class="space-y-4">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Posisi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                placeholder="Senior Frontend Developer" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                                Slug URL
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                placeholder="senior-frontend-developer">
                            <small class="text-gray-500">Kosongkan untuk generate otomatis dari judul</small>
                            @error('slug')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Singkat <span class="text-red-500">*</span>
                            </label>
                            <textarea name="short_description" id="short_description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('short_description') border-red-500 @enderror"
                                placeholder="Bergabunglah sebagai Senior Frontend Developer..." required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Job Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Department -->
                            <div>
                                <label for="department" class="block text-sm font-medium text-gray-700 mb-2">
                                    Departemen <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="department" id="department" value="{{ old('department') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('department') border-red-500 @enderror"
                                    placeholder="Engineering" required>
                                @error('department')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                    Lokasi <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location" id="location" value="{{ old('location') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror"
                                    placeholder="Jakarta" required>
                                @error('location')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Job Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tipe Pekerjaan <span class="text-red-500">*</span>
                                </label>
                                <select name="type" id="type" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('type') border-red-500 @enderror">
                                    <option value="">Pilih Tipe</option>
                                    <option value="full-time" {{ old('type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part-time" {{ old('type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                @error('type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Job Level -->
                            <div>
                                <label for="level" class="block text-sm font-medium text-gray-700 mb-2">
                                    Level <span class="text-red-500">*</span>
                                </label>
                                <select name="level" id="level" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('level') border-red-500 @enderror">
                                    <option value="">Pilih Level</option>
                                    <option value="entry" {{ old('level') == 'entry' ? 'selected' : '' }}>Entry Level</option>
                                    <option value="junior" {{ old('level') == 'junior' ? 'selected' : '' }}>Junior</option>
                                    <option value="mid" {{ old('level') == 'mid' ? 'selected' : '' }}>Mid Level</option>
                                    <option value="senior" {{ old('level') == 'senior' ? 'selected' : '' }}>Senior</option>
                                    <option value="lead" {{ old('level') == 'lead' ? 'selected' : '' }}>Lead</option>
                                </select>
                                @error('level')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="salary_min" class="block text-sm font-medium text-gray-700 mb-2">
                                    Gaji Minimum
                                </label>
                                <input type="number" name="salary_min" id="salary_min" value="{{ old('salary_min') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('salary_min') border-red-500 @enderror"
                                    placeholder="10000000">
                                @error('salary_min')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="salary_max" class="block text-sm font-medium text-gray-700 mb-2">
                                    Gaji Maximum
                                </label>
                                <input type="number" name="salary_max" id="salary_max" value="{{ old('salary_max') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('salary_max') border-red-500 @enderror"
                                    placeholder="15000000">
                                @error('salary_max')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="salary_range" class="block text-sm font-medium text-gray-700 mb-2">
                                    Range Gaji (Display)
                                </label>
                                <input type="text" name="salary_range" id="salary_range" value="{{ old('salary_range') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('salary_range') border-red-500 @enderror"
                                    placeholder="Rp 10.000.000 - Rp 15.000.000">
                                @error('salary_range')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                                Deadline
                            </label>
                            <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('deadline') border-red-500 @enderror">
                            @error('deadline')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Deskripsi Pekerjaan</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Lengkap <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" id="description" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                placeholder="Kami mencari Senior Frontend Developer yang berpengalaman..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">
                                Requirements <span class="text-red-500">*</span>
                            </label>
                            <textarea name="requirements" id="requirements" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirements') border-red-500 @enderror"
                                placeholder="Minimal 5 tahun pengalaman frontend development&#10;Menguasai React/Vue.js/Angular&#10;Pengalaman dengan TypeScript" required>{{ old('requirements') }}</textarea>
                            <small class="text-gray-500">Tulis satu requirement per baris</small>
                            @error('requirements')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="responsibilities" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggung Jawab <span class="text-red-500">*</span>
                            </label>
                            <textarea name="responsibilities" id="responsibilities" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('responsibilities') border-red-500 @enderror"
                                placeholder="Mengembangkan dan memaintenance aplikasi web frontend&#10;Berkolaborasi dengan tim backend dan designer&#10;Memastikan kualitas code dan performance aplikasi" required>{{ old('responsibilities') }}</textarea>
                            <small class="text-gray-500">Tulis satu tanggung jawab per baris</small>
                            @error('responsibilities')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="benefits" class="block text-sm font-medium text-gray-700 mb-2">
                                Benefits <span class="text-red-500">*</span>
                            </label>
                            <textarea name="benefits" id="benefits" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('benefits') border-red-500 @enderror"
                                placeholder="Gaji kompetitif&#10;Asuransi kesehatan&#10;Flexible working hours&#10;Work from home options" required>{{ old('benefits') }}</textarea>
                            <small class="text-gray-500">Tulis satu benefit per baris</small>
                            @error('benefits')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Meta</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_title') border-red-500 @enderror"
                                placeholder="Senior Frontend Developer - PT Digital Solusi">
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_description') border-red-500 @enderror"
                                placeholder="Bergabunglah sebagai Senior Frontend Developer di PT Digital Solusi...">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Status Publikasi</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" 
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                {{ old('is_active') ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">
                                Aktifkan lowongan
                            </label>
                        </div>
                        <small class="text-gray-500">Lowongan yang aktif akan tampil di halaman karir</small>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <div class="flex flex-col space-y-3">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Lowongan
                        </button>
                        <a href="{{ route('admin.jobs.index') }}"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize Summernote for description
                $('#description').summernote({
                    height: 200,
                    placeholder: 'Masukkan deskripsi lengkap pekerjaan...',
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['view', ['codeview']]
                    ]
                });

                // Auto-generate slug from title
                $('#title').on('input', function() {
                    const title = $(this).val();
                    const slug = title.toLowerCase()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                    $('#slug').val(slug);
                });
            });
        </script>
    @endpush

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush
@endsection
