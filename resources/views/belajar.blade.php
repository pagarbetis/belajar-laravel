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
</body>
</html>