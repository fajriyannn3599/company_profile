@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Pesan</h1>
                <p class="mt-1 text-sm text-gray-600">{{ $message->subject }}</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                @if(!$message->is_read)
                    <form action="{{ route('admin.messages.mark-read', $message) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            <i class="fas fa-check mr-2"></i>
                            Tandai Sudah Dibaca
                        </button>
                    </form>
                @endif

                <button type="button"
                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out"
                    onclick="openDeleteModal({{ $message->id }}, '{{ addslashes($message->subject) }}')">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus
                </button>

                <a href="{{ route('admin.messages.index') }}"
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
            <!-- Message Content -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">{{ $message->subject }}</h2>
                        @if(!$message->is_read)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-circle mr-1" style="font-size: 6px;"></i>
                                Belum Dibaca
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i>
                                Sudah Dibaca
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    <div class="prose max-w-none">
                        <p class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Sender Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengirim</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Nama</label>
                        <p class="mt-1 text-gray-900">{{ $message->name }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Jenis Produk</label>
                        <p class="mt-1 text-gray-900">{{ $message->service->title ?? '-' }}</p>
                    </div>
                    @if($message->service->id == 13)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Jenis Kendaraan</label>
                            <p class="mt-1 text-gray-900">{{ $message->jenis_kendaraan ?? '-' }}</p>
                        </div>
                    @endif
                    <div>
                        <label class="text-sm font-medium text-gray-500">Lokasi</label>
                        <p class="mt-1 text-gray-900">{{ $message->lokasi }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Nilai Pembiayaan</label>
                        <p class="mt-1 text-gray-900">{{ $message->nilai_pembiayaan }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1">
                            <a href="mailto:{{ $message->email }}"
                                class="text-blue-600 hover:text-blue-700">{{ $message->email }}</a>
                        </p>
                    </div>

                    @if($message->phone)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Telepon</label>
                            <p class="mt-1">
                                <a href="tel:{{ $message->phone }}"
                                    class="text-blue-600 hover:text-blue-700">{{ $message->phone }}</a>
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Message Details -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Pesan</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Tanggal Diterima</label>
                        <p class="mt-1 text-gray-900">{{ $message->created_at->format('d M Y H:i') }}</p>
                    </div>

                    @if($message->is_read && $message->read_at)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Dibaca Pada</label>
                            <p class="mt-1 text-gray-900">{{ $message->read_at->format('d M Y H:i') }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-500">Status</label>
                        <p class="mt-1">
                            @if($message->is_read)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Sudah Dibaca
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-circle mr-1" style="font-size: 6px;"></i>
                                    Belum Dibaca
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="flex flex-col space-y-3">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg text-center transition">
                        <i class="fas fa-envelope mr-2"></i>Email Langsung
                    </a>

                    @if($message->phone)
                        <a href="tel:{{ $message->phone }}"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg text-center transition">
                            <i class="fas fa-phone mr-2"></i>Telepon
                        </a>
                    @endif

                    <a href="{{ route('admin.messages.index') }}"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg text-center transition">
                        <i class="fas fa-list mr-2"></i>Kembali ke Daftar
                    </a>
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
                <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Pesan</h3>
                <p class="text-sm text-gray-500 text-center mb-4">
                    Apakah Anda yakin ingin menghapus pesan <strong id="deleteMessageTitle"></strong>?
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
            function openDeleteModal(id, subject) {
                document.getElementById('deleteMessageTitle').textContent = subject;
                document.getElementById('deleteForm').action = `/admin/messages/${id}`;
                document.getElementById('deleteModal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }

            // Close modal when clicking outside
            document.getElementById('deleteModal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closeDeleteModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeDeleteModal();
                }
            });
        </script>
    @endpush
@endsection