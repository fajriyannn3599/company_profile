@extends('layouts.admin')

@section('title', 'Detail Lowongan Pekerjaan')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.jobs.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Lowongan Pekerjaan</h1>
                <p class="mt-1 text-sm text-gray-600">{{ $job->title }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Job Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Lowongan</h3>
                        <div class="flex items-center space-x-2">
                            @if($job->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times mr-1"></i>
                                    Non-Aktif
                                </span>
                            @endif
                            
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst(str_replace('-', ' ', $job->type)) }}
                            </span>
                            
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ ucfirst($job->level) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Posisi</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium">{{ $job->title }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Departemen</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->department ?? 'N/A' }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Lokasi</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->location }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tipe Pekerjaan</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('-', ' ', $job->type)) }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Level</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($job->level) }}</dd>
                        </div>
                        
                        @if($job->salary_range)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Salary Range</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium text-green-600">{{ $job->salary_range }}</dd>
                        </div>
                        @endif
                        
                        @if($job->deadline)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Deadline</dt>
                            <dd class="mt-1 text-sm">
                                @if($job->deadline->isPast())
                                    <span class="text-red-600 font-medium">
                                        {{ $job->deadline->format('d M Y') }} (Expired)
                                    </span>
                                @else
                                    <span class="text-green-600 font-medium">
                                        {{ $job->deadline->format('d M Y') }}
                                    </span>
                                @endif
                            </dd>
                        </div>
                        @endif
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Slug URL</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">{{ $job->slug }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Job Description -->
            @if($job->short_description)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Deskripsi Singkat</h3>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700">{{ $job->short_description }}</p>
                </div>
            </div>
            @endif

            @if($job->description)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Deskripsi Lengkap</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="prose max-w-none">
                        {!! $job->description !!}
                    </div>
                </div>
            </div>
            @endif

            <!-- Requirements -->
            @if($job->requirements)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Requirements</h3>
                </div>
                <div class="px-6 py-4">
                    <ul class="list-disc list-inside space-y-2">
                        @if(is_array($job->requirements))
                            @foreach($job->requirements as $requirement)
                                <li class="text-gray-700">{{ $requirement }}</li>
                            @endforeach
                        @else
                            <li class="text-gray-700">{{ $job->requirements }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif

            <!-- Responsibilities -->
            @if($job->responsibilities)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Tanggung Jawab</h3>
                </div>
                <div class="px-6 py-4">
                    <ul class="list-disc list-inside space-y-2">
                        @if(is_array($job->responsibilities))
                            @foreach($job->responsibilities as $responsibility)
                                <li class="text-gray-700">{{ $responsibility }}</li>
                            @endforeach
                        @else
                            <li class="text-gray-700">{{ $job->responsibilities }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif

            <!-- Benefits -->
            @if($job->benefits)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Benefits</h3>
                </div>
                <div class="px-6 py-4">
                    <ul class="list-disc list-inside space-y-2">
                        @if(is_array($job->benefits))
                            @foreach($job->benefits as $benefit)
                                <li class="text-gray-700">{{ $benefit }}</li>
                            @endforeach
                        @else
                            <li class="text-gray-700">{{ $job->benefits }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif

            <!-- Applications -->
            @if($job->applications && $job->applications->count() > 0)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Pelamar ({{ $job->applications->count() }})</h3>
                        <a href="{{ route('admin.job-applications.index') }}?job={{ $job->id }}"
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="space-y-3">
                        @foreach($job->applications->take(5) as $application)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600 text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $application->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $application->email }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @switch($application->status)
                                        @case('pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                            @break
                                        @case('reviewed')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Reviewed
                                            </span>
                                            @break
                                        @case('accepted')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Accepted
                                            </span>
                                            @break
                                        @case('rejected')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Rejected
                                            </span>
                                            @break
                                    @endswitch
                                    <a href="{{ route('admin.job-applications.show', $application) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- SEO Information -->
            @if($job->meta_title || $job->meta_description)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">SEO Meta</h3>
                </div>
                <div class="px-6 py-4">
                    <dl class="space-y-4">
                        @if($job->meta_title)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Meta Title</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->meta_title }}</dd>
                        </div>
                        @endif
                        
                        @if($job->meta_description)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Meta Description</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->meta_description }}</dd>
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
                    <a href="{{ route('admin.jobs.edit', $job) }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Lowongan
                    </a>
                    
                    @if($job->applications->count() > 0)
                        <a href="{{ route('admin.job-applications.index') }}?job={{ $job->id }}"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-users mr-2"></i>
                            Lihat Pelamar ({{ $job->applications->count() }})
                        </a>
                    @endif
                    
                    <button type="button"
                        onclick="openDeleteModal({{ $job->id }}, '{{ addslashes($job->title) }}')"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Lowongan
                    </button>
                    
                    <a href="{{ route('admin.jobs.index') }}"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Job Statistics -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Statistik</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Total Pelamar:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $job->applications->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Pending:</span>
                        <span class="text-sm font-medium text-yellow-600">{{ $job->applications->where('status', 'pending')->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Reviewed:</span>
                        <span class="text-sm font-medium text-blue-600">{{ $job->applications->where('status', 'reviewed')->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Accepted:</span>
                        <span class="text-sm font-medium text-green-600">{{ $job->applications->where('status', 'accepted')->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Rejected:</span>
                        <span class="text-sm font-medium text-red-600">{{ $job->applications->where('status', 'rejected')->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Job Info -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Sistem</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">ID:</span>
                        <span class="text-gray-900 font-mono">{{ $job->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Dibuat:</span>
                        <span class="text-gray-900">{{ $job->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Diperbarui:</span>
                        <span class="text-gray-900">{{ $job->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                    @if($job->salary_min || $job->salary_max)
                    <div class="flex justify-between">
                        <span class="text-gray-500">Salary:</span>
                        <span class="text-gray-900">
                            @if($job->salary_min && $job->salary_max)
                                {{ number_format($job->salary_min, 0, ',', '.') }} - {{ number_format($job->salary_max, 0, ',', '.') }}
                            @elseif($job->salary_min)
                                Min: {{ number_format($job->salary_min, 0, ',', '.') }}
                            @elseif($job->salary_max)
                                Max: {{ number_format($job->salary_max, 0, ',', '.') }}
                            @endif
                        </span>
                    </div>
                    @endif
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
                            Hapus Lowongan
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="deleteMessage">
                                Apakah Anda yakin ingin menghapus lowongan ini?
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
            function openDeleteModal(id, title) {
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                const message = document.getElementById('deleteMessage');

                form.action = `/admin/jobs/${id}`;
                message.textContent = `Apakah Anda yakin ingin menghapus lowongan "${title}"?`;

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
