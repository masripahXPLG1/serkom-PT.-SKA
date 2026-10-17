<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Pesan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalProduk'    => Produk::count(),
            'totalArtikel'   => Artikel::count(),
            'totalGaleri'    => Galeri::count(),
            'totalPesan'     => Pesan::count(),
            'pesanBaru'      => Pesan::where('dibaca', false)->count(),
            'perKategori'    => Produk::selectRaw('kategori, count(*) as total')
                                    ->groupBy('kategori')->pluck('total', 'kategori'),
            'produkTerbaru'  => Produk::latest()->take(4)->get(),
            'artikelTerbaru' => Artikel::latest()->take(4)->get(),
            'pesanTerbaru'   => Pesan::latest()->take(5)->get(),
            'galeriTerbaru'  => Galeri::latest()->take(6)->get(),
        ]);
    }
}