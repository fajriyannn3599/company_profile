@extends('layouts.admin')

@section('title', 'Kelola Layanan')


@section('content')
<div class="mb-6">        
@include('admin.service-categories._table', ['categories' => $service_categories])
</div>
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Layanan</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola layanan yang ditawarkan perusahaan</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.services.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
            <i class="fas fa-plus mr-2"></i>
            Tambah Layanan
        </a>
    </div>
</div>
</div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-blue-500 rounded-md">
                            <i class="fas fa-cogs text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Layanan</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $services->total() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-green-500 rounded-md">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Aktif</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $services->where('is_active', true)->count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-yellow-500 rounded-md">
                            <i class="fas fa-star text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Unggulan</dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ $services->where('is_featured', true)->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-purple-500 rounded-md">
                            <i class="fas fa-calendar text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Bulan Ini</dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ $services->where('created_at', '>=', now()->startOfMonth())->count() }}</dd>
                        </dl>
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
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Layanan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kategori
                        </th>
                        <!-- <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Harga Mulai
                        </th> -->
                        <!-- <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th> -->
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Urutan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dibuat
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($services as $service)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($service->image)
                                        <div class="flex-shrink-0 h-12 w-12"> <img class="h-12 w-12 rounded-lg object-cover"
                                                src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}">
                                        </div>
                                    @elseif($service->icon)
                                        <div
                                            class="flex-shrink-0 h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="{{ $service->icon }} text-blue-600"></i>
                                        </div>
                                    @else
                                        <div
                                            class="flex-shrink-0 h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-cog text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $service->title }}
                                            @if ($service->is_featured)
                                                <span
                                                    class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-star mr-1"></i>
                                                    Unggulan
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($service->short_description ?? $service->description, 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($service->serviceCategory)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-red-800">
                                        {{ $service->serviceCategory->name }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Tanpa Kategori
                                    </span>
                                @endif
                            </td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                                @if ($service->price_range)
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $service->price_range }}
                                    </div>
                                @else
                                    <span class="text-sm text-gray-500 italic">Belum diset</span>
                                @endif
                            </td> -->
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
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
                            </td> -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $service->sort_order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $service->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.services.show', $service) }}"
                                        class="inline-flex items-center px-3 py-1 bg-gray-100 border border-transparent rounded-md font-medium text-xs text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                                        <i class="fas fa-eye mr-1"></i>
                                        Lihat
                                    </a>
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 border border-transparent rounded-md font-medium text-xs text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <button type="button"
                                        onclick="openDeleteModal({{ $service->id }}, '{{ addslashes($service->title ?? $service->name) }}')"
                                        class="inline-flex items-center px-3 py-1 bg-red-100 border border-transparent rounded-md font-medium text-xs text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-cogs text-gray-300 text-5xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada layanan</h3>
                                    <p class="text-gray-500 mb-4">Mulai menambahkan layanan pertama</p>
                                    <a href="{{ route('admin.services.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700">
                                        <i class="fas fa-plus mr-2"></i>
                                        Tambah Layanan
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($services->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $services->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeDeleteModal()" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Hapus Layanan
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" id="deleteMessage">Apakah Anda yakin ingin menghapus layanan ini?</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Ya, Hapus
                    </button>
                </form>
                <button type="button" onclick="closeDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>


    @push('scripts')
        <script>
            function openDeleteModal(id, title) {
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                const message = document.getElementById('deleteMessage');

                form.action = `/admin/services/${id}`;
                message.textContent = `Apakah Anda yakin ingin menghapus layanan "${title}"?`;

                modal.classList.remove('hidden');
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.add('hidden');
            }

            // Close modal with ESC key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeDeleteModal();
                }
            });
        </script>
    @endpush
@endsection
