@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Profil Saya</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola informasi profil dan keamanan akun Anda</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.profile.edit') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit Profil
            </a>
            <a href="{{ route('admin.profile.edit-password') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                <i class="fas fa-key mr-2"></i>
                Ubah Password
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Profile Information -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                <p class="text-sm text-gray-600">Informasi dasar akun administrator</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Nama Lengkap</label>
                        <p class="mt-1 text-lg text-gray-900">{{ $user->name }}</p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">Alamat Email</label>
                        <p class="mt-1 text-lg text-gray-900">{{ $user->email }}</p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">Role</label>
                        <p class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Administrator
                            </span>
                        </p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">Status Akun</label>
                        <p class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Aktif
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Activity -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Aktivitas Akun</h2>
                <p class="text-sm text-gray-600">Informasi terkait aktivitas akun Anda</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Akun Dibuat</label>
                        <p class="mt-1 text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">Terakhir Diperbarui</label>
                        <p class="mt-1 text-gray-900">{{ $user->updated_at->format('d M Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">Email Verified</label>
                        <p class="mt-1">
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Terverifikasi
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Belum Verifikasi
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500">ID Pengguna</label>
                        <p class="mt-1 text-gray-900 font-mono">#{{ $user->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">        <!-- Profile Avatar -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Foto Profil</h3>
            
            <div class="text-center" id="avatar-display">
                @if($user->avatar)
                    <div class="w-24 h-24 mx-auto mb-4 relative">
                        <img src="{{ Storage::url($user->avatar) }}" 
                             alt="{{ $user->name }}" 
                             class="w-24 h-24 rounded-full object-cover shadow-lg">
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Foto profil Anda</p>
                    <div class="flex flex-col space-y-2">
                        <button onclick="document.getElementById('avatar-upload').click()" 
                                class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            <i class="fas fa-camera mr-1"></i>
                            Ganti Foto
                        </button>
                        <button type="button" 
                                onclick="removeAvatar()"
                                class="text-red-600 hover:text-red-700 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus Foto
                        </button>
                    </div>
                @else
                    <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg mx-auto mb-4">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Avatar berdasarkan inisial nama</p>
                    <button onclick="document.getElementById('avatar-upload').click()" 
                            class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                        <i class="fas fa-camera mr-1"></i>
                        Upload Foto
                    </button>
                @endif
            </div>
            
            <!-- Hidden forms - outside the replaceable div -->
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="avatar-form" style="display: none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="file" 
                       id="avatar-upload" 
                       name="avatar" 
                       accept="image/*" 
                       onchange="previewAndSubmit(this)">
            </form>
            
            <form action="{{ route('admin.profile.remove-avatar') }}" method="POST" id="remove-avatar-form" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="flex flex-col space-y-3">
                <a href="{{ route('admin.profile.edit') }}"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg text-center transition">
                    <i class="fas fa-user-edit mr-2"></i>Edit Profil
                </a>
                
                <a href="{{ route('admin.profile.edit-password') }}"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg text-center transition">
                    <i class="fas fa-key mr-2"></i>Ubah Password
                </a>
                
                <a href="{{ route('admin.dashboard') }}"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg text-center transition">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
            </div>
        </div>

        <!-- Security Info -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Keamanan</h3>
            <div class="space-y-4">
                <div class="flex items-center p-3 bg-green-50 rounded-lg">
                    <div class="flex-shrink-0">
                        <i class="fas fa-shield-check text-green-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">Akun Aman</p>
                        <p class="text-xs text-green-600">Password terenkripsi</p>
                    </div>
                </div>
                
                <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-shield text-blue-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-800">Administrator</p>
                        <p class="text-xs text-blue-600">Akses penuh sistem</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, checking for forms...');
    const avatarForm = document.getElementById('avatar-form');
    const removeForm = document.getElementById('remove-avatar-form');
    console.log('Avatar form:', avatarForm);
    console.log('Remove form:', removeForm);
});

function previewAndSubmit(input) {
    console.log('previewAndSubmit called', input);
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validasi ukuran file (max 2MB)
        if (file.size > 2048 * 1024) {
            alert('Ukuran file maksimal 2MB');
            input.value = '';
            return;
        }
        
        // Validasi tipe file
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Format file harus JPG, JPEG, PNG, atau GIF');
            input.value = '';
            return;
        }
        
        // Get form before modifying DOM
        const form = document.getElementById('avatar-form');
        console.log('Form found before DOM change:', form);
        
        if (!form) {
            alert('Error: Form tidak ditemukan. Silakan refresh halaman dan coba lagi.');
            return;
        }
          // Show loading state
        const avatarContainer = document.getElementById('avatar-display');
        let originalContent = '';
        
        if (avatarContainer) {
            originalContent = avatarContainer.innerHTML;
            avatarContainer.innerHTML = `
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-spinner fa-spin text-gray-500"></i>
                </div>
                <p class="text-sm text-gray-600">Mengupload foto...</p>
            `;
        }
        
        // Submit form immediately
        try {
            form.submit();
        } catch (error) {
            console.error('Error submitting form:', error);
            alert('Error saat upload. Silakan coba lagi.');
            // Restore original content if error
            if (avatarContainer && originalContent) {
                avatarContainer.innerHTML = originalContent;
            }
        }
    }
}

function removeAvatar() {
    if (confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
        // Get form before modifying DOM
        const form = document.getElementById('remove-avatar-form');
        
        if (!form) {
            alert('Error: Form tidak ditemukan. Silakan refresh halaman dan coba lagi.');
            return;
        }
          // Show loading state
        const avatarContainer = document.getElementById('avatar-display');
        if (avatarContainer) {
            avatarContainer.innerHTML = `
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-spinner fa-spin text-gray-500"></i>
                </div>
                <p class="text-sm text-gray-600">Menghapus foto...</p>
            `;
        }
        
        // Submit delete form immediately
        try {
            form.submit();
        } catch (error) {
            console.error('Error submitting remove form:', error);
            alert('Error saat menghapus foto. Silakan coba lagi.');
        }
    }
}
</script>
@endpush
