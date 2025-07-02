@extends('layouts.admin')

@section('title', 'Detail Layanan')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Layanan</h1>
            <p class="mt-1 text-sm text-gray-600">{{ Str::limit($service->title, 60) }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.services.edit', $service) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit Layanan
            </a>
            <button type="button"
                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out"
                onclick="openDeleteModal({{ $service->id }}, '{{ addslashes($service->title) }}')">
                <i class="fas fa-trash mr-2"></i>
                Hapus
            </button>
            <a href="{{ route('admin.services.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Service Content -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            @if ($service->image)
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}"
                        class="w-full h-64 object-cover">
                </div>
            @endif

            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    @if ($service->is_featured)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i>
                            Unggulan
                        </span>
                    @endif

                    @if ($service->is_active)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check mr-1"></i>
                            Aktif
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <i class="fas fa-times mr-1"></i>
                            Nonaktif
                        </span>
                    @endif

                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $service->created_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900">{{ $service->title }}</h1>
            </div>

            <div class="p-6">
                @if ($service->short_description)
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-quote-left text-blue-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-blue-700 font-medium">Deskripsi Singkat</p>
                                <p class="text-blue-600 mt-1">{{ $service->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! $service->description !!}
                </div>

                @php
                    $features = explode("\n", strip_tags($service->description));
                    $features = array_filter(array_map('trim', $features));
                    $features = array_slice($features, 0, 5); // Tampilkan max 5 fitur
                @endphp
                @if (count($features) > 0)
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Fitur Layanan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($features as $feature)
                                @if (!empty($feature) && strlen($feature) > 10)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-gray-900">{{ Str::limit($feature, 100) }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Additional Details -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Layanan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Urutan Tampil:</div>
                        <div class="text-gray-800">{{ $service->sort_order }}</div>
                    </div>
                    @if ($service->price_range)
                        <div class="mb-4">
                            <div class="text-sm text-gray-500 mb-1">Rentang Harga:</div>
                            <div class="text-lg font-medium text-blue-600">{{ $service->price_range }}</div>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Tanggal Dibuat:</div>
                        <div class="text-gray-800">{{ $service->created_at->format('d M Y H:i') }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Terakhir Diperbarui:</div>
                        <div class="text-gray-800">{{ $service->updated_at->format('d M Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Information -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO & Meta</h3>
            <div class="space-y-4">
                <div>
                    <span class="text-sm text-gray-500">Meta Title:</span>
                    <div class="text-gray-800 mt-1">{{ $service->meta_title ?: 'Belum diatur' }}</div>
                </div>
                <div>
                    <span class="text-sm text-gray-500">Meta Description:</span>
                    <div class="text-gray-800 mt-1">{{ $service->meta_description ?: 'Belum diatur' }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="flex flex-col space-y-2">
                <a href="{{ route('admin.services.edit', $service) }}"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg text-center transition">
                    <i class="fas fa-edit mr-2"></i>Edit Layanan
                </a>
                <a href="{{ route('admin.services.index') }}"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg text-center transition">
                    <i class="fas fa-list mr-2"></i>Kembali ke Daftar
                </a>
            </div>
        </div>

        <!-- Service Statistics -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Statistik</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Status:</span>
                    @if ($service->is_active)
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
                    <span class="text-sm text-gray-500">Unggulan:</span>
                    @if ($service->is_featured)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i>
                            Ya
                        </span>
                    @else
                        <span class="text-xs text-gray-600">Tidak</span>
                    @endif
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
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Layanan</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus layanan <strong id="deleteServiceTitle"></strong>?
            </p>
            <p class="text-sm text-red-600 text-center mb-6">
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
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
function openDeleteModal(id, title) {
    document.getElementById('deleteServiceTitle').textContent = title;
    document.getElementById('deleteForm').action = `/admin/services/${id}`;
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
