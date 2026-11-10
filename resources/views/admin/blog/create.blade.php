@extends('admin.layouts.app')
@section('title', 'Tambah Blog')
@section('subtitle', 'Tambah Blog baru')

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="" class="form-label-custom">Kategori Blog</label>
            <select name="blog_category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('blog_category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Blog</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $blog->name ?? '') }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $blog->slug ?? '') }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Deskripsi Singkat</label>
            <textarea name="brief_description" class="form-control" rows="3" required>{{ old('brief_description', $blog->brief_description ?? '') }}</textarea>
            @error('brief_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Konten</label>
            <textarea name="content" class="d-none form-control" rows="6" required>{{ old('content', $blog->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div id="editor">

        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Penulis</label>
            <input type="text" class="form-control" name="author" required value="{{ old('author', $blog->author ?? '') }}">
            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Cover Blog</label>
            <input type="file" class="form-control" name="cover_path">
            @error('cover_path')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
    </form>
@endsection