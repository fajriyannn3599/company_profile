@extends('layouts.admin')

@section('title', 'Detail Item - Mengapa Memilih Kami')

@section('content')
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.why-choose-us.index') }}" 
               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $whyChooseUs->title }}</h1>
                <p class="mt-1 text-sm text-gray-600">Detail item mengapa memilih kami</p>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.why-choose-us.edit', $whyChooseUs) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <!-- Header with Icon -->
            <div class="flex items-start space-x-4 mb-6">
                <div class="w-16 h-16 bg-{{ $whyChooseUs->color }}-100 rounded-2xl flex items-center justify-center">
                    @if($whyChooseUs->icon)
                        <i class="{{ $whyChooseUs->icon }} text-{{ $whyChooseUs->color }}-600 text-2xl"></i>
                    @else
                        <i class="fas fa-star text-{{ $whyChooseUs->color }}-600 text-2xl"></i>
                    @endif
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $whyChooseUs->title }}</h2>
                    <div class="flex items-center space-x-3">
                        @if($whyChooseUs->is_active)
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
                        <span class="text-sm text-gray-500">Urutan: {{ $whyChooseUs->sort_order }}</span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 leading-relaxed">{{ $whyChooseUs->description }}</p>
                </div>
            </div>

            <!-- Technical Details -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Teknis</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Icon Class</dt>
                        <dd class="mt-1 text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">
                            {{ $whyChooseUs->icon ?: 'fas fa-star (default)' }}
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Warna Tema</dt>
                        <dd class="mt-1">
                            @php
                                $colorNames = [
                                    'blue' => 'Biru',
                                    'green' => 'Hijau', 
                                    'purple' => 'Ungu',
                                    'yellow' => 'Kuning',
                                    'red' => 'Merah',
                                    'indigo' => 'Indigo',
                                    'pink' => 'Pink',
                                    'gray' => 'Abu-abu'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $whyChooseUs->color }}-100 text-{{ $whyChooseUs->color }}-800">
                                {{ $colorNames[$whyChooseUs->color] ?? $whyChooseUs->color }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Urutan Tampilan</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $whyChooseUs->sort_order }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            @if($whyChooseUs->is_active)
                                <span class="text-green-600 font-medium">Aktif - Tampil di website</span>
                            @else
                                <span class="text-gray-600 font-medium">Nonaktif - Tersembunyi</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Preview Card -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview di Website</h3>
            
            <!-- Mock preview -->
            <div class="bg-gray-50 rounded-xl p-6 text-center">
                <div class="w-16 h-16 bg-{{ $whyChooseUs->color }}-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    @if($whyChooseUs->icon)
                        <i class="{{ $whyChooseUs->icon }} text-{{ $whyChooseUs->color }}-600 text-2xl"></i>
                    @else
                        <i class="fas fa-star text-{{ $whyChooseUs->color }}-600 text-2xl"></i>
                    @endif
                </div>
                <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $whyChooseUs->title }}</h4>
                <p class="text-sm text-gray-600">{{ Str::limit($whyChooseUs->description, 80) }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.why-choose-us.edit', $whyChooseUs) }}" 
                   class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Item
                </a>
                <button type="button" 
                        onclick="openDeleteModal()" 
                        class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Item
                </button>
            </div>
        </div>

        <!-- Metadata -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h3>
            <dl class="space-y-3">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Dibuat</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $whyChooseUs->created_at->format('d M Y, H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Terakhir Diubah</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $whyChooseUs->updated_at->format('d M Y, H:i') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 font-mono">#{{ $whyChooseUs->id }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Item</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus item <strong>"{{ $whyChooseUs->title }}"</strong>?
            </p>
            <p class="text-sm text-red-600 text-center mb-6">
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                    Batal
                </button>
                <form action="{{ route('admin.why-choose-us.destroy', $whyChooseUs) }}" method="POST" class="inline">
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
