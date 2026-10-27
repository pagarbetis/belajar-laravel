@extends('admin.layouts.app')
@section('title', 'Tambah User')
@section('subtitle', 'Buat akun baru dengan akses ke panel admin')

@section('content')
    <form action="{{ route('admin.user.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Email</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Password</label>
            <input type="text" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
    </form>
@endsection
