@extends('layouts.admin')

@section('title', 'Tambah Anggota Tim')

@section('content')
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Anggota Tim</h1>
                <p class="mt-1 text-sm text-gray-600">Tambahkan anggota tim baru</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.teams.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Form -->
            <div class="lg:col-span-2">
                <!-- Basic Information -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Dasar</h3>
                        <p class="mt-1 text-sm text-gray-500">Data pribadi anggota tim</p>
                    </div>
                    <div class="px-6 py-4 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Masukkan nama lengkap" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                                    Posisi/Jabatan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="position" id="position" value="{{ old('position') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('position') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Contoh: CEO, Developer, Designer" required>
                                @error('position')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                                Bio/Deskripsi
                            </label>
                            <textarea name="bio" id="bio" rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('bio') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Ceritakan tentang pengalaman dan keahlian anggota tim...">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Profil
                            </label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('photo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, WEBP. Maksimal 2MB. Disarankan foto
                                berbentuk persegi.</p>
                            @error('photo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Kontak</h3>
                        <p class="mt-1 text-sm text-gray-500">Email, telepon, dan media sosial</p>
                    </div>
                    <div class="px-6 py-4 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="nama@email.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="+62 812 3456 7890">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-linkedin text-blue-600 mr-2"></i>
                                    LinkedIn
                                </label>
                                <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('linkedin') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="https://linkedin.com/in/username">
                                @error('linkedin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-twitter text-blue-400 mr-2"></i>
                                    Twitter
                                </label>
                                <input type="url" name="twitter" id="twitter" value="{{ old('twitter') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('twitter') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="https://twitter.com/username">
                                @error('twitter')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-instagram text-pink-500 mr-2"></i>
                                    Instagram
                                </label>
                                <input type="url" name="instagram" id="instagram" value="{{ old('instagram') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('instagram') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="https://instagram.com/username">
                                @error('instagram')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fab fa-facebook text-blue-700 mr-2"></i>
                                    Facebook
                                </label>
                                <input type="url" name="facebook" id="facebook" value="{{ old('facebook') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('facebook') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="https://facebook.com/username">
                                @error('facebook')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex items-center space-x-4">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Anggota Tim
                    </button>
                    <a href="{{ route('admin.teams.index') }}"
                        class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Settings -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Pengaturan</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                                Urutan Tampil
                            </label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                                min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sort_order') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">Angka lebih kecil akan tampil terlebih dahulu</p>
                            @error('sort_order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="border-gray-200">

                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Aktifkan anggota tim</span>
                        </label>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Preview</h3>
                    </div>
                    <div class="p-6">
                        <!-- Photo Preview -->
                        <div id="photo-preview-container" class="hidden mb-4">
                            <img id="photo-preview" class="w-20 h-20 object-cover rounded-full mx-auto">
                        </div>

                        <!-- Live Preview -->
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gray-200 rounded-full mx-auto mb-3 flex items-center justify-center"
                                id="default-avatar">
                                <i class="fas fa-user text-gray-400 text-2xl"></i>
                            </div>
                            <h4 id="preview-name" class="font-semibold text-gray-900 mb-1">Nama Anggota</h4>
                            <p id="preview-position" class="text-sm text-gray-600 mb-3">Posisi/Jabatan</p>
                            <div id="preview-contact" class="text-xs text-gray-500 space-y-1 mb-3">
                                <div id="preview-email" class="hidden">
                                    <i class="fas fa-envelope mr-1"></i>
                                    <span></span>
                                </div>
                                <div id="preview-phone" class="hidden">
                                    <i class="fas fa-phone mr-1"></i>
                                    <span></span>
                                </div>
                            </div>
                            <div id="preview-social" class="flex justify-center space-x-2 mb-3"></div>
                            <div id="preview-bio" class="text-xs text-gray-600 italic hidden">
                                Bio akan ditampilkan di sini...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Photo preview
                const photoInput = document.getElementById('photo');
                const photoPreviewContainer = document.getElementById('photo-preview-container');
                const photoPreview = document.getElementById('photo-preview');
                const defaultAvatar = document.getElementById('default-avatar');

                photoInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            photoPreview.src = e.target.result;
                            photoPreviewContainer.classList.remove('hidden');
                            defaultAvatar.classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        photoPreviewContainer.classList.add('hidden');
                        defaultAvatar.classList.remove('hidden');
                    }
                });

                // Live preview updates
                const nameInput = document.getElementById('name');
                const positionInput = document.getElementById('position');
                const bioInput = document.getElementById('bio');
                const emailInput = document.getElementById('email');
                const phoneInput = document.getElementById('phone');
                const linkedinInput = document.getElementById('linkedin');
                const twitterInput = document.getElementById('twitter');
                const instagramInput = document.getElementById('instagram');

                const previewName = document.getElementById('preview-name');
                const previewPosition = document.getElementById('preview-position');
                const previewBio = document.getElementById('preview-bio');
                const previewEmail = document.getElementById('preview-email');
                const previewPhone = document.getElementById('preview-phone');
                const previewSocial = document.getElementById('preview-social');

                nameInput.addEventListener('input', function () {
                    previewName.textContent = this.value || 'Nama Anggota';
                });

                positionInput.addEventListener('input', function () {
                    previewPosition.textContent = this.value || 'Posisi/Jabatan';
                });

                bioInput.addEventListener('input', function () {
                    if (this.value) {
                        previewBio.textContent = this.value;
                        previewBio.classList.remove('hidden');
                    } else {
                        previewBio.classList.add('hidden');
                    }
                });

                emailInput.addEventListener('input', function () {
                    if (this.value) {
                        previewEmail.querySelector('span').textContent = this.value;
                        previewEmail.classList.remove('hidden');
                    } else {
                        previewEmail.classList.add('hidden');
                    }
                });

                phoneInput.addEventListener('input', function () {
                    if (this.value) {
                        previewPhone.querySelector('span').textContent = this.value;
                        previewPhone.classList.remove('hidden');
                    } else {
                        previewPhone.classList.add('hidden');
                    }
                });

                function updateSocialLinks() {
                    previewSocial.innerHTML = '';

                    if (linkedinInput.value) {
                        const linkedinIcon = document.createElement('a');
                        linkedinIcon.href = '#';
                        linkedinIcon.className = 'text-blue-600';
                        linkedinIcon.innerHTML = '<i class="fab fa-linkedin"></i>';
                        previewSocial.appendChild(linkedinIcon);
                    }

                    if (twitterInput.value) {
                        const twitterIcon = document.createElement('a');
                        twitterIcon.href = '#';
                        twitterIcon.className = 'text-blue-400';
                        twitterIcon.innerHTML = '<i class="fab fa-twitter"></i>';
                        previewSocial.appendChild(twitterIcon);
                    }

                    if (instagramInput.value) {
                        const instagramIcon = document.createElement('a');
                        instagramIcon.href = '#';
                        instagramIcon.className = 'text-pink-600';
                        instagramIcon.innerHTML = '<i class="fab fa-instagram"></i>';
                        previewSocial.appendChild(instagramIcon);
                    }
                }

                linkedinInput.addEventListener('input', updateSocialLinks);
                twitterInput.addEventListener('input', updateSocialLinks);
                instagramInput.addEventListener('input', updateSocialLinks);
            });
        </script>
    @endpush
@endsection