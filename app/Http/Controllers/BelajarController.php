<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $title = 'Belajar Laravel asik';

        return view('belajar', compact('title'));
    }

    public function tambah()
    {
        $title = 'Penjumlahan';

        return view('tambah', compact('title'));
    }
    public function actionTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function pengurangan()
    {
        $title = 'Pengurangan';

        return view('pengurangan', compact('title'));
    }
    public function actionPengurangan(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 - $angka2;
        return view('pengurangan', compact('jumlah'));
    }

    public function bagi()
    {
        $title = 'Bagi';

        return view('bagi', compact('title'));
    }
    public function actionBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 / $angka2;
        return view('bagi', compact('jumlah'));
    }

    public function perkalian()
    {
        $title = 'Perkalian';

        return view('perkalian', compact('title'));
    }
    public function actionPerkalian(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 * $angka2;
        return view('perkalian', compact('jumlah'));
    }

}
