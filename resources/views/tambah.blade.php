@extends('belajar')
@section('content')
    <form action="{{ route('actionTambah') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">angka1</label>
            <input type="number" name="angka1" placeholder="Masukan angka">
        </div>
        <br>
        <div class="form-group">
            <label for="">angka2</label>
            <input type="number" name="angka2" placeholder="Masukan angka">
        </div>
        <br>
        <div>
            <button type="submit">Jumlahkan</button>
        </div>
    </form>
    <br>
    <h1>Hasilnya adalah {{ $jumlah ?? 0 }}</h1>
@endsection
