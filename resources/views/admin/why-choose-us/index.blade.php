@extends('layouts.admin')

@section('title', 'Mengapa Memilih Kami')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mengapa Memilih Kami</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola alasan mengapa klien memilih layanan kami</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.why-choose-us.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-plus mr-2"></i>
                Tambah Item
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-list text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Total Item</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $whyChooseUs->total() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Aktif</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $whyChooseUs->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-pause text-gray-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Nonaktif</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $whyChooseUs->where('is_active', false)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white shadow-sm border border-gray-200 rounded-lg">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Item
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Icon & Warna
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Urutan
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($whyChooseUs as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-{{ $item->color }}-100 rounded-xl flex items-center justify-center">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-{{ $item->color }}-600 text-lg"></i>
                                        @else
                                            <i class="fas fa-star text-{{ $item->color }}-600 text-lg"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->title }}
                                    </div>
                                    <div class="text-sm text-gray-500 mt-1">
                                        {{ Str::limit($item->description, 80) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $item->color }}-100 text-{{ $item->color }}-800">
                                    {{ ucfirst($item->color) }}
                                </span>
                                @if($item->icon)
                                    <div class="text-xs text-gray-500 mt-1">{{ $item->icon }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->is_active)
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
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->sort_order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.why-choose-us.show', $item) }}" 
                                   class="text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.why-choose-us.edit', $item) }}" 
                                   class="text-blue-400 hover:text-blue-600 transition duration-150 ease-in-out"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="text-red-400 hover:text-red-600 transition duration-150 ease-in-out focus:outline-none"
                                        title="Hapus"
                                        onclick="openDeleteModal({{ $item->id }}, '{{ $item->title }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-star text-gray-300 text-5xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada item</h3>
                                <p class="text-gray-500 mb-4">Mulai menambahkan alasan mengapa klien memilih Anda</p>
                                <a href="{{ route('admin.why-choose-us.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Item Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($whyChooseUs->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $whyChooseUs->links() }}
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Item</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus item <strong id="deleteItemTitle"></strong>?
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
    document.getElementById('deleteItemTitle').textContent = title;
    document.getElementById('deleteForm').action = `/admin/why-choose-us/${id}`;
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
