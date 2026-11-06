@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('subtitle', 'Tambah produk baru untuk ditampilkan di PPKD Sticker')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Nama Produk *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Slug (optional)</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Deskripsi Singkat</label>
            <input type="text" name="brief_description" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi</label>
            <textarea name="description" cols="30" rows="10" class="d-none form-control">{{ old('description') }}</textarea>
        </div>
        <div id="editor">
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input type="number" name="price" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Carton</label>
                    <input type="number" name="price_art_cartoon" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Paper</label>
                    <input type="number" name="price_art_paper" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Hvs</label>
                    <input type="number" name="price_hvs" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Doff</label>
                    <input type="number" name="price_doff" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Glossy</label>
                    <input type="number" name="price_glossy" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Potong (Min 5x5 cm)</label>
                    <input type="number" name="cutting-price" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto Produk</label>

            <div id="image-inputs-container">
                <div class="input-group mb-2 image-row">
                    <input type="file" name="images[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-outline-danger remove-input" style="display: none;">Hapus</button>
                </div>
            </div>

            <button type="button" id="add-image-btn" class="btn btn-sm btn-secondary mt-1">+ Tambah Kolom Foto</button>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
        <script>
            document.getElementById('add-image-btn').addEventListener('click', function() {
                const container = document.getElementById('image-inputs-container');

                const newRow = document.createElement('div');
                newRow.className = 'input-group mb-2 image-row';
                newRow.innerHTML = `
            <input type="file" name="images[]" class="form-control" accept="image/*">
            <button type="button" class="btn btn-outline-danger remove-input">Hapus</button>
        `;
                container.appendChild(newRow);

                updateRemoveButtons();
            });

            document.getElementById('image-inputs-container').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-input')) {
                    e.target.closest('.image-row').remove();
                    updateRemoveButtons();
                }
            });

            function updateRemoveButtons() {
                const rows = document.querySelectorAll('.image-row');
                rows.forEach((row, index) => {
                    const removeBtn = row.querySelector('.remove-input');
                    if (rows.length === 1) {
                        removeBtn.style.display = 'none';
                    } else {
                        removeBtn.style.display = 'block';
                    }
                });
            }
        </script>
    </form>


@endsection
