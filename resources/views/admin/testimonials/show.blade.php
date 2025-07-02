@extends('layouts.admin')

@section('title', 'Detail Testimonial')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Testimonial</h1>
            <p class="mt-1 text-sm text-gray-600">Lihat detail testimonial dari {{ $testimonial->client_name }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.testimonials.index') }}" 
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
        <!-- Testimonial Content -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Konten Testimonial</h3>
                    <div class="flex items-center space-x-2">
                        @if($testimonial->is_featured)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-star mr-1"></i>
                                Unggulan
                            </span>
                        @endif
                        @if($testimonial->is_active)
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
                <div class="prose max-w-none">
                    <blockquote class="text-lg text-gray-700 italic border-l-4 border-blue-500 pl-6 py-4 bg-blue-50 rounded-r-lg">
                        "{{ $testimonial->testimonial }}"
                    </blockquote>
                </div>

                @if($testimonial->rating)
                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Rating:</h4>
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                @else
                                    <i class="far fa-star text-gray-300 text-xl"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-lg font-medium text-gray-700">({{ $testimonial->rating }}/5)</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Client Information -->
        <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Klien</h3>
            </div>
            <div class="px-6 py-4">
                <div class="flex items-start space-x-4">
                    @if($testimonial->client_photo)
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20 rounded-full object-cover" 
                                 src="{{ Storage::url($testimonial->client_photo) }}" 
                                 alt="{{ $testimonial->client_name }}">
                        </div>
                    @else
                        <div class="flex-shrink-0 h-20 w-20 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-400 text-2xl"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $testimonial->client_name }}</h4>
                        @if($testimonial->client_position || $testimonial->client_company)
                            <div class="text-gray-600 mb-4">
                                @if($testimonial->client_position)
                                    <div class="text-sm font-medium">{{ $testimonial->client_position }}</div>
                                @endif
                                @if($testimonial->client_company)
                                    <div class="text-sm">{{ $testimonial->client_company }}</div>
                                @endif
                            </div>
                        @endif
                        
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                                <dd class="text-sm text-gray-900">{{ $testimonial->client_name }}</dd>
                            </div>
                            @if($testimonial->client_position)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Posisi/Jabatan</dt>
                                    <dd class="text-sm text-gray-900">{{ $testimonial->client_position }}</dd>
                                </div>
                            @endif
                            @if($testimonial->client_company)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Perusahaan</dt>
                                    <dd class="text-sm text-gray-900">{{ $testimonial->client_company }}</dd>
                                </div>
                            @endif
                            @if($testimonial->rating)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Rating</dt>
                                    <dd class="text-sm text-gray-900">{{ $testimonial->rating }}/5 ⭐</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>
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
                    <span class="text-sm text-gray-500">Status</span>
                    @if($testimonial->is_active)
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
                    <span class="text-sm text-gray-500">Unggulan</span>
                    @if($testimonial->is_featured)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i>
                            Ya
                        </span>
                    @else
                        <span class="text-sm text-gray-500">Tidak</span>
                    @endif
                </div>

                @if($testimonial->rating)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Rating</span>
                        <div class="flex items-center">
                            @for($i = 1; $i <= $testimonial->rating; $i++)
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                            @endfor
                            <span class="ml-1 text-sm text-gray-600">({{ $testimonial->rating }})</span>
                        </div>
                    </div>
                @endif

                <hr class="border-gray-200">

                <div class="space-y-3">
                    <div>
                        <span class="text-sm text-gray-500">Dibuat</span>
                        <p class="text-sm text-gray-900">{{ $testimonial->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Terakhir Diupdate</span>
                        <p class="text-sm text-gray-900">{{ $testimonial->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
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
                        @if($testimonial->client_photo)
                            <img class="w-16 h-16 object-cover rounded-full mx-auto mb-3" 
                                 src="{{ Storage::url($testimonial->client_photo) }}" 
                                 alt="{{ $testimonial->client_name }}">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400 text-xl"></i>
                            </div>
                        @endif
                        
                        @if($testimonial->rating)
                            <div class="flex justify-center space-x-1 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-gray-300 text-sm"></i>
                                    @endif
                                @endfor
                            </div>
                        @endif

                        <blockquote class="text-sm text-gray-700 italic mb-3">
                            "{{ Str::limit($testimonial->testimonial, 100) }}"
                        </blockquote>

                        <div class="text-center">
                            <div class="font-semibold text-gray-900 text-sm">{{ $testimonial->client_name }}</div>
                            @if($testimonial->client_position || $testimonial->client_company)
                                <div class="text-xs text-gray-500">
                                    @if($testimonial->client_position && $testimonial->client_company)
                                        {{ $testimonial->client_position }} - {{ $testimonial->client_company }}
                                    @elseif($testimonial->client_position)
                                        {{ $testimonial->client_position }}
                                    @else
                                        {{ $testimonial->client_company }}
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
            </div>
            <div class="px-6 py-4 space-y-3">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                   class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Testimonial
                </a>
                
                <button type="button" 
                        onclick="openDeleteModal()"
                        class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 transition duration-150 ease-in-out">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Testimonial
                </button>
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
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Testimonial</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus testimonial dari <strong>{{ $testimonial->client_name }}</strong>?
            </p>
            <div class="bg-gray-50 p-3 rounded-lg mb-4">
                <p class="text-sm text-gray-600">"{{ Str::limit($testimonial->testimonial, 100) }}"</p>
            </div>
            <p class="text-sm text-red-600 text-center mb-6">
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                    Batal
                </button>
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
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
