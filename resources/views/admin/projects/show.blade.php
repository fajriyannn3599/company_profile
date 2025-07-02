@extends('layouts.admin')

@section('title', 'Detail Proyek')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Proyek</h1>
            <p class="mt-1 text-sm text-gray-600">{{ Str::limit($project->title, 60) }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.projects.edit', $project) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit Proyek
            </a>
            <button type="button"
                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out"
                onclick="openDeleteModal({{ $project->id }}, '{{ addslashes($project->title) }}')">
                <i class="fas fa-trash mr-2"></i>
                Hapus
            </button>
            <a href="{{ route('admin.projects.index') }}"
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
        <!-- Project Content -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            @if($project->featured_image)
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}"
                        class="w-full h-64 object-cover">
                </div>
            @endif

            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    @if($project->category)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-tag mr-1"></i>
                            {{ $project->category->name }}
                        </span>
                    @endif

                    @if($project->is_featured)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i>
                            Unggulan
                        </span>
                    @endif

                    @if($project->is_active)
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

                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $project->created_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900">{{ $project->title }}</h1>
            </div>

            <div class="p-6">
                @if($project->short_description)
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-quote-left text-blue-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-blue-700 font-medium">Deskripsi Singkat</p>
                                <p class="text-blue-600 mt-1">{{ $project->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! $project->description !!}
                </div>

                @if($project->gallery && count(json_decode($project->gallery, true)) > 0)
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Galeri Proyek</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(json_decode($project->gallery, true) as $img)
                                <div class="aspect-w-1 aspect-h-1">
                                    <img src="{{ Storage::url($img) }}" alt="Galeri" 
                                         class="w-full h-32 object-cover rounded-lg border border-gray-200">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>    <!-- Sidebar -->
    <div class="lg:col-span-1">
        <!-- Project Stats -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Detail</h3>
            </div>
            <div class="p-6">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Slug URL</dt>
                        <dd class="mt-1 text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">
                            {{ $project->slug }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                        <dd class="mt-1">
                            @if($project->category)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $project->category->name }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">Tidak ada kategori</span>
                            @endif
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Klien</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->client_name ?? '-' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">URL Proyek</dt>
                        <dd class="mt-1 text-sm">
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="text-blue-600 hover:underline break-all">
                                    {{ $project->project_url }}
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tanggal Mulai</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->start_date ? $project->start_date->format('d M Y') : '-' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tanggal Selesai</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->end_date ? $project->end_date->format('d M Y') : '-' }}
                        </dd>
                    </div>                    <div>
                        <dt class="text-sm font-medium text-gray-500">Teknologi</dt>
                        <dd class="mt-1">
                            @if($project->technologies && is_array($project->technologies) && count($project->technologies) > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach($project->technologies as $tech)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-sm text-gray-500">-</span>
                            @endif
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Urutan Tampil</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->sort_order }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Dibuat</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->created_at->format('d M Y, H:i') }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Diperbarui</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $project->updated_at->format('d M Y, H:i') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- SEO Information -->
        @if($project->meta_title || $project->meta_description)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi SEO</h3>
                </div>
                <div class="p-6">
                    <dl class="space-y-4">
                        @if($project->meta_title)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Meta Title</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $project->meta_title }}</dd>
                            </div>
                        @endif

                        @if($project->meta_description)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Meta Description</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $project->meta_description }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
        @endif

        <!-- Actions -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
            </div>
            <div class="p-6">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('admin.projects.edit', $project) }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Proyek
                    </a>
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Lihat Proyek
                        </a>
                    @endif
                    <button type="button"
                        onclick="openDeleteModal({{ $project->id }}, '{{ addslashes($project->title) }}')"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Proyek
                    </button>
                    <a href="{{ route('admin.projects.index') }}"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeDeleteModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Hapus Proyek
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" id="deleteMessage">
                            Apakah Anda yakin ingin menghapus proyek ini?
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

@push('styles')
<style>
/* Styling untuk konten proyek yang dibuat dengan Summernote */
.prose ul { list-style-type: disc; margin-left: 1.5em; }
.prose ol { list-style-type: decimal; margin-left: 1.5em; }
.prose li { margin-bottom: 0.25em; }
.prose p { margin-bottom: 1em; }
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 { 
    font-weight: bold; 
    margin: 1.5em 0 0.75em 0; 
    line-height: 1.2;
}
.prose h1 { font-size: 2em; }
.prose h2 { font-size: 1.75em; }
.prose h3 { font-size: 1.5em; }
.prose h4 { font-size: 1.25em; }
.prose img { 
    max-width: 100%; 
    height: auto; 
    border-radius: 0.5rem;
    margin: 1em 0;
}
.prose blockquote {
    border-left: 4px solid #e5e7eb;
    padding-left: 1rem;
    margin: 1em 0;
    font-style: italic;
}
.prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 1em 0;
}
.prose th, .prose td {
    border: 1px solid #e5e7eb;
    padding: 0.5rem;
    text-align: left;
}
.prose th {
    background-color: #f9fafb;
    font-weight: bold;
}
.prose a {
    color: #3b82f6;
    text-decoration: underline;
}
.prose a:hover {
    color: #1d4ed8;
}
</style>
@endpush

@push('scripts')
<script>
function openDeleteModal(id, title) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    const message = document.getElementById('deleteMessage');
    
    form.action = `/admin/projects/${id}`;
    message.textContent = `Apakah Anda yakin ingin menghapus proyek "${title}"?`;
    
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
