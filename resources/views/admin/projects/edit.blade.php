@extends('layouts.admin')

@section('title', 'Edit Proyek')

@section('content')
<div class="mb-6">
    <div class="flex items-center">
        <a href="{{ route('admin.projects.index') }}" class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Proyek</h1>
            <p class="mt-1 text-sm text-gray-600">Perbarui data portofolio proyek</p>
        </div>
    </div>
</div>
<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Proyek</h3>
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" placeholder="Masukkan judul proyek">
                        @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror" placeholder="slug-proyek">
                        @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="project_category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="project_category_id" id="project_category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('project_category_id') border-red-500 @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('project_category_id', $project->project_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('project_category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="short_description" id="short_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('short_description') border-red-500 @enderror" placeholder="Deskripsi singkat proyek">{{ old('short_description', $project->short_description) }}</textarea>
                        @error('short_description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="8" class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror" placeholder="Deskripsi lengkap proyek">{{ old('description', $project->description ?? '') }}</textarea>
                        @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO & Meta</h3>
                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $project->meta_title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_title') border-red-500 @enderror" placeholder="Meta title untuk SEO">
                        @error('meta_title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_description') border-red-500 @enderror" placeholder="Meta description untuk SEO">{{ old('meta_description', $project->meta_description) }}</textarea>
                        @error('meta_description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pengaturan</h3>
                <div class="space-y-4">
                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Klien</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('client_name') border-red-500 @enderror" placeholder="Nama klien">
                        @error('client_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="project_url" class="block text-sm font-medium text-gray-700 mb-2">URL Proyek</label>
                        <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('project_url') border-red-500 @enderror" placeholder="https://">
                        @error('project_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('start_date') border-red-500 @enderror">
                            @error('start_date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('end_date') border-red-500 @enderror">
                            @error('end_date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label for="technologies" class="block text-sm font-medium text-gray-700 mb-2">Teknologi yang Digunakan</label>
                        <input type="text" name="technologies" id="technologies" value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('technologies') border-red-500 @enderror" placeholder="Contoh: Laravel, Vue.js, MySQL">
                        @error('technologies')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">Proyek Unggulan</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktifkan Proyek</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Gambar & Galeri</h3>
                <div class="mb-4">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @if($project->featured_image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($project->featured_image) }}" alt="Gambar Utama" class="h-24 rounded-lg border">
                        </div>
                    @endif
                    @error('featured_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700 mb-2">Galeri Gambar (bisa lebih dari satu)</label>
                    <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @if($project->gallery)
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach(json_decode($project->gallery, true) as $img)
                                <img src="{{ Storage::url($img) }}" alt="Galeri" class="h-16 rounded border">
                            @endforeach
                        </div>
                    @endif
                    @error('gallery')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="flex flex-col space-y-3">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    document.getElementById('title').addEventListener('input', function(e) {
        const slug = e.target.value.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9\-]/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet" />
<style>
.note-editable ul { list-style-type: disc; margin-left: 1.5em; }
.note-editable ol { list-style-type: decimal; margin-left: 1.5em; }
.note-editable li { margin-bottom: 0.25em; }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    $(function() {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endpush
@endsection
