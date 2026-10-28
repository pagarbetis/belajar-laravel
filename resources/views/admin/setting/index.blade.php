@extends('admin.dashboard.index')
@section('title', 'Pengaturan Website')
@section('subtitle',
    'Konfigurasi indentitas website,
    logo, kontak dan informasi profil')

@section('content')

    <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <ul class="nav nav-tabs mb-3" id="defaultTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    <i class="bi bi-house-door me-1"></i> Pengaturan Umum
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">
                    <i class="bi bi-telephone me-1"></i> Kontak & Lokasi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="messages-tab" data-bs-toggle="tab"
                    data-bs-target="#messages-tab-pane" type="button" role="tab" aria-controls="messages-tab-pane"
                    aria-selected="false" tabindex="-1">
                    <i class="bi bi-chat-dots me-1"></i> Media Sosial
                </button>
            </li>
        </ul>

        <div class="tab-content text-muted-green small" id="defaultTabsContent">
            <div class="tab-pane fade active show mt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <h5 class="fw-bold text-main mb-1">Pengaturan Umum</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lembaga / Nama Website</label>
                    <input type="text" class="form-control" name="site_name"
                        value="{{ old('site_name', $setting['site_name']->value) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tagline Website</label>
                    <input type="text" class="form-control" name="site_tagline" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi Singkat</label>
                    <textarea name="site_description" class="form-control" cols="30" rows="10" id=""></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Logo Website</label>
                    <input type="file" name="site_log">
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h5 class="fw-bold text-main mb-3">Kontak dan Lokasi</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Nomer Telpon Utama</label>
                    <input type="text" class="form-control" name="phone" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email Upload</label>
                    <input type="text" class="form-control" name="email_upload" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <textarea class="form-control" cols="30" rows="10" name="address" value=""></textarea>
                </div>
            </div>
            <div class="tab-pane fade" id="messages-tab-pane" role="tabpanel" aria-labelledby="messages-tab"
                tabindex="0">
                <h5 class="fw-bold text-main mb-1">Sosial Media</h5>
                <div class="mb-3">
                    <label for="" class="form-label">Url Shopee</label>
                    <input type="text" class="form-control" name="url_shopee" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Facebook</label>
                    <input type="text" class="form-control" name="url_facebook" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Instagram</label>
                    <input type="text" class="form-control" name="url_instagram" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Youtube</label>
                    <input type="text" class="form-control" name="url_youtube" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Url Tiktok</label>
                    <input type="text" class="form-control" name="url_tiktok" value="">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn-custom btn-custom-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
