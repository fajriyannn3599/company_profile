@extends('layouts.admin')

@section('title', 'Detail Lamaran Pekerjaan')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.job-applications.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Lamaran Pekerjaan</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap lamaran dari {{ $jobApplication->name }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Applicant Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Pelamar</h3>
                        @switch($jobApplication->status)
                            @case('pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    Pending
                                </span>
                                @break
                            @case('reviewed')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-eye mr-1"></i>
                                    Reviewed
                                </span>
                                @break
                            @case('accepted')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Accepted
                                </span>
                                @break
                            @case('rejected')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times mr-1"></i>
                                    Rejected
                                </span>
                                @break
                            @default
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ ucfirst($jobApplication->status) }}
                                </span>
                        @endswitch
                    </div>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->name }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="mailto:{{ $jobApplication->email }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $jobApplication->email }}
                                </a>
                            </dd>
                        </div>
                        
                        @if($jobApplication->phone)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $jobApplication->phone }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $jobApplication->phone }}
                                </a>
                            </dd>
                        </div>
                        @endif
                        
                        @if($jobApplication->portfolio_url)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Portfolio URL</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="{{ $jobApplication->portfolio_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                    {{ $jobApplication->portfolio_url }}
                                    <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                </a>
                            </dd>
                        </div>
                        @endif
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tanggal Apply</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->created_at->format('d M Y H:i') }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                @switch($jobApplication->status)
                                    @case('pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i>
                                            Pending
                                        </span>
                                        @break
                                    @case('reviewed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-eye mr-1"></i>
                                            Reviewed
                                        </span>
                                        @break
                                    @case('accepted')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i>
                                            Accepted
                                        </span>
                                        @break
                                    @case('rejected')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-times mr-1"></i>
                                            Rejected
                                        </span>
                                        @break
                                    @default
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ ucfirst($jobApplication->status) }}
                                        </span>
                                @endswitch
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Cover Letter -->
            @if($jobApplication->cover_letter)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Cover Letter</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="prose max-w-none">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $jobApplication->cover_letter }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Notes -->
            @if($jobApplication->notes)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Catatan Internal</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="prose max-w-none">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $jobApplication->notes }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Job Details -->
            @if($jobApplication->jobListing)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Detail Posisi</h3>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Posisi</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium">{{ $jobApplication->jobListing->title }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Departemen</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->jobListing->department ?? 'N/A' }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Lokasi</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->jobListing->location ?? 'N/A' }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tipe Pekerjaan</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($jobApplication->jobListing->type ?? 'N/A') }}</dd>
                        </div>
                        
                        @if($jobApplication->jobListing->salary_range)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Salary Range</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->jobListing->salary_range }}</dd>
                        </div>
                        @endif
                        
                        @if($jobApplication->jobListing->deadline)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Deadline</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $jobApplication->jobListing->deadline->format('d M Y') }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Actions -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi</h3>
                <div class="flex flex-col space-y-3">
                    @if($jobApplication->resume_path)
                        <a href="{{ Storage::url($jobApplication->resume_path) }}" target="_blank"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-download mr-2"></i>
                            Download Resume
                        </a>
                    @endif
                    
                    <a href="mailto:{{ $jobApplication->email }}"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-envelope mr-2"></i>
                        Kirim Email
                    </a>
                    
                    @if($jobApplication->phone)
                        <a href="tel:{{ $jobApplication->phone }}"
                            class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-phone mr-2"></i>
                            Telepon
                        </a>
                    @endif
                    
                    <button type="button"
                        onclick="openDeleteModal({{ $jobApplication->id }}, '{{ addslashes($jobApplication->name) }}')"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Lamaran
                    </button>
                    
                    <a href="{{ route('admin.job-applications.index') }}"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Application Info -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Lamaran</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">ID:</span>
                        <span class="text-gray-900 font-mono">{{ $jobApplication->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Diterima:</span>
                        <span class="text-gray-900">{{ $jobApplication->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Diperbarui:</span>
                        <span class="text-gray-900">{{ $jobApplication->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                onclick="closeDeleteModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Hapus Lamaran
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="deleteMessage">
                                Apakah Anda yakin ingin menghapus lamaran ini?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                            Ya, Hapus
                        </button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function openDeleteModal(id, name) {
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                const message = document.getElementById('deleteMessage');

                form.action = `/admin/job-applications/${id}`;
                message.textContent = `Apakah Anda yakin ingin menghapus lamaran dari "${name}"?`;

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
