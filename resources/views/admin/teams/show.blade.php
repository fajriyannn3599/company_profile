@extends('layouts.admin')

@section('title', 'Detail Anggota Tim')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Anggota Tim</h1>
            <p class="mt-1 text-sm text-gray-600">Profil lengkap {{ $team->name }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.teams.edit', $team) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.teams.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <!-- Profile Overview -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Profil Anggota Tim</h3>
                    <div class="flex items-center space-x-2">
                        @if($team->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <i class="fas fa-times mr-1"></i>
                                Nonaktif
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="px-6 py-4">
                <div class="flex items-start space-x-6">
                    @if($team->photo)
                        <div class="flex-shrink-0">
                            <img class="h-32 w-32 rounded-full object-cover border-4 border-white shadow-lg" 
                                 src="{{ Storage::url($team->photo) }}" 
                                 alt="{{ $team->name }}">
                        </div>
                    @else
                        <div class="flex-shrink-0 h-32 w-32 bg-gray-200 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                            <i class="fas fa-user text-gray-400 text-4xl"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <h4 class="text-3xl font-bold text-gray-900 mb-2">{{ $team->name }}</h4>
                        <p class="text-xl text-blue-600 font-medium mb-4">{{ $team->position }}</p>
                        
                        @if($team->bio)
                            <div class="prose max-w-none mb-6">
                                <p class="text-gray-700 leading-relaxed">{{ $team->bio }}</p>
                            </div>
                        @endif

                        <!-- Contact Information -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            @if($team->email)
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-envelope text-blue-600 text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Email</p>
                                        <p class="text-sm text-gray-900">
                                            <a href="mailto:{{ $team->email }}" class="hover:text-blue-600">{{ $team->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if($team->phone)
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-phone text-green-600 text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Telepon</p>
                                        <p class="text-sm text-gray-900">
                                            <a href="tel:{{ $team->phone }}" class="hover:text-green-600">{{ $team->phone }}</a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>                        <!-- Social Media -->
                        @if($team->social_links)
                            <div>
                                <h5 class="text-sm font-medium text-gray-500 mb-3">Media Sosial</h5>
                                <div class="flex flex-wrap gap-2">
                                    @if(isset($team->social_links['linkedin']) && $team->social_links['linkedin'])
                                        <a href="{{ $team->social_links['linkedin'] }}" target="_blank" 
                                           class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                                            <i class="fab fa-linkedin mr-2"></i>
                                            LinkedIn
                                        </a>
                                    @endif
                                    @if(isset($team->social_links['twitter']) && $team->social_links['twitter'])
                                        <a href="{{ $team->social_links['twitter'] }}" target="_blank" 
                                           class="inline-flex items-center px-3 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition duration-150 ease-in-out">
                                            <i class="fab fa-twitter mr-2"></i>
                                            Twitter
                                        </a>
                                    @endif
                                    @if(isset($team->social_links['instagram']) && $team->social_links['instagram'])
                                        <a href="{{ $team->social_links['instagram'] }}" target="_blank" 
                                           class="inline-flex items-center px-3 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition duration-150 ease-in-out">
                                            <i class="fab fa-instagram mr-2"></i>
                                            Instagram
                                        </a>
                                    @endif
                                    @if(isset($team->social_links['facebook']) && $team->social_links['facebook'])
                                        <a href="{{ $team->social_links['facebook'] }}" target="_blank" 
                                           class="inline-flex items-center px-3 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition duration-150 ease-in-out">
                                            <i class="fab fa-facebook mr-2"></i>
                                            Facebook
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Information -->
        <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Detail</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $team->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Posisi/Jabatan</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $team->position }}</dd>
                    </div>
                    @if($team->email)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Alamat Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $team->email }}</dd>
                        </div>
                    @endif
                    @if($team->phone)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $team->phone }}</dd>
                        </div>
                    @endif
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            @if($team->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-times mr-1"></i>
                                    Nonaktif
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Urutan Tampil</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $team->sort_order }}</dd>
                    </div>
                </dl>

                @if($team->bio)
                    <div class="mt-6">
                        <dt class="text-sm font-medium text-gray-500 mb-2">Bio/Deskripsi</dt>
                        <dd class="text-sm text-gray-900 leading-relaxed">{{ $team->bio }}</dd>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="lg:col-span-1">
        <!-- Status Info -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Status & Info</h3>
            </div>
            <div class="px-6 py-4 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Status Anggota</span>
                    @if($team->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check mr-1"></i>
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <i class="fas fa-times mr-1"></i>
                            Nonaktif
                        </span>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Urutan Tampil</span>
                    <span class="text-sm font-medium text-gray-900">{{ $team->sort_order }}</span>
                </div>

                @if($team->photo)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Foto Profil</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-check mr-1"></i>
                            Ada
                        </span>
                    </div>
                @else
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Foto Profil</span>
                        <span class="text-sm text-gray-500">Belum ada</span>
                    </div>
                @endif

                <hr class="border-gray-200">

                <div class="space-y-3">
                    <div>
                        <span class="text-sm text-gray-500">Dibuat</span>
                        <p class="text-sm text-gray-900">{{ $team->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Terakhir Diupdate</span>
                        <p class="text-sm text-gray-900">{{ $team->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
            </div>
            <div class="px-6 py-4 space-y-3">
                <a href="{{ route('admin.teams.edit', $team) }}" 
                   class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Profil
                </a>
                
                @if($team->email)
                    <a href="mailto:{{ $team->email }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 transition duration-150 ease-in-out">
                        <i class="fas fa-envelope mr-2"></i>
                        Kirim Email
                    </a>
                @endif
                
                <button type="button" 
                        onclick="openDeleteModal()"
                        class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 transition duration-150 ease-in-out">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Anggota
                </button>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Preview Frontend</h3>
                <p class="text-sm text-gray-500">Tampilan di halaman website</p>
            </div>
            <div class="p-6">
                <div class="bg-gray-50 rounded-lg p-4 border-2 border-dashed border-gray-200">
                    <div class="text-center">
                        @if($team->photo)
                            <img class="w-20 h-20 object-cover rounded-full mx-auto mb-3" 
                                 src="{{ Storage::url($team->photo) }}" 
                                 alt="{{ $team->name }}">
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400 text-2xl"></i>
                            </div>
                        @endif
                        
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ $team->name }}</h4>
                        <p class="text-xs text-blue-600 mb-2">{{ $team->position }}</p>
                        
                        @if($team->bio)
                            <p class="text-xs text-gray-600 mb-3">{{ Str::limit($team->bio, 80) }}</p>
                        @endif

                        @if($team->linkedin || $team->twitter || $team->instagram)
                            <div class="flex justify-center space-x-2">
                                @if($team->linkedin)
                                    <a href="#" class="text-blue-600 hover:text-blue-700">
                                        <i class="fab fa-linkedin text-sm"></i>
                                    </a>
                                @endif
                                @if($team->twitter)
                                    <a href="#" class="text-blue-400 hover:text-blue-500">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                @endif
                                @if($team->instagram)
                                    <a href="#" class="text-pink-600 hover:text-pink-700">
                                        <i class="fab fa-instagram text-sm"></i>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Anggota Tim</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus <strong>{{ $team->name }}</strong> dari tim?
            </p>
            <div class="bg-gray-50 p-3 rounded-lg mb-4">
                <p class="text-sm text-gray-600">
                    <strong>Posisi:</strong> {{ $team->position }}
                </p>
            </div>
            <p class="text-sm text-red-600 text-center mb-6">
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                    Batal
                </button>
                <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endpush
@endsection
