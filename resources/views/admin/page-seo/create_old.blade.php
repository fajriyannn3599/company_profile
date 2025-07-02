@extends('layouts.admin')

@section('title', 'Add Page SEO')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Page SEO</h1>
        <a href="{{ route('admin.page-seo.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.page-seo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="page_identifier">Page <span class="text-danger">*</span></label>
                            <select name="page_identifier" id="page_identifier" class="form-control @error('page_identifier') is-invalid @enderror" required>
                                <option value="">Select Page</option>
                                @foreach($pages as $key => $value)
                                    <option value="{{ $key }}" {{ old('page_identifier') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_identifier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Meta Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" maxlength="255" placeholder="Enter meta title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Recommended: 50-60 characters</small>
                </div>

                <div class="form-group">
                    <label for="description">Meta Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" 
                              rows="3" maxlength="500" placeholder="Enter meta description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Recommended: 150-160 characters</small>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" name="keywords" id="keywords" class="form-control @error('keywords') is-invalid @enderror" 
                           value="{{ old('keywords') }}" placeholder="keyword1, keyword2, keyword3">
                    @error('keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Separate keywords with commas</small>
                </div>

                <hr>

                <h5 class="mb-3">Open Graph Settings</h5>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="og_title">OG Title</label>
                            <input type="text" name="og_title" id="og_title" class="form-control @error('og_title') is-invalid @enderror" 
                                   value="{{ old('og_title') }}" maxlength="255" placeholder="Enter Open Graph title">
                            @error('og_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="og_image">OG Image</label>
                            <input type="file" name="og_image" id="og_image" class="form-control-file @error('og_image') is-invalid @enderror" 
                                   accept="image/*">
                            @error('og_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Recommended: 1200x630px</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="og_description">OG Description</label>
                    <textarea name="og_description" id="og_description" class="form-control @error('og_description') is-invalid @enderror" 
                              rows="3" maxlength="500" placeholder="Enter Open Graph description">{{ old('og_description') }}</textarea>
                    @error('og_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <h5 class="mb-3">Twitter Card Settings</h5>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="twitter_title">Twitter Title</label>
                            <input type="text" name="twitter_title" id="twitter_title" class="form-control @error('twitter_title') is-invalid @enderror" 
                                   value="{{ old('twitter_title') }}" maxlength="255" placeholder="Enter Twitter title">
                            @error('twitter_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="twitter_image">Twitter Image</label>
                            <input type="file" name="twitter_image" id="twitter_image" class="form-control-file @error('twitter_image') is-invalid @enderror" 
                                   accept="image/*">
                            @error('twitter_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Recommended: 1200x675px</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="twitter_description">Twitter Description</label>
                    <textarea name="twitter_description" id="twitter_description" class="form-control @error('twitter_description') is-invalid @enderror" 
                              rows="3" maxlength="500" placeholder="Enter Twitter description">{{ old('twitter_description') }}</textarea>
                    @error('twitter_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label for="schema_markup">Schema Markup (JSON-LD)</label>
                    <textarea name="schema_markup" id="schema_markup" class="form-control @error('schema_markup') is-invalid @enderror" 
                              rows="6" placeholder="Enter JSON-LD structured data">{{ old('schema_markup') }}</textarea>
                    @error('schema_markup')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Optional: Custom structured data for this page</small>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save SEO Settings
                    </button>
                    <a href="{{ route('admin.page-seo.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
