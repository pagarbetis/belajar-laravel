<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Belajar Laravel' }}</title>
</head>

<body>
    <h1>Belajar matematika dasar</h1>
    <a href="{{ route('tambah') }}">Penjumlahan</a>
    <a href="{{ route('pengurangan') }}">Pengurangan</a>
    <a href="{{ route('bagi') }}">Bagi-bagian</a>
    <a href="{{ route('perkalian') }}">Perkalian</a>
    <a href="{{ url()->previous() }}">Kembali</a>

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
</body>

</html>
