<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [
            'produks'  => Produk::latest()->take(6)->get(),
            'artikels' => Artikel::latest()->take(3)->get(),
            'galeris'  => Galeri::latest()->take(10)->get(),        ]);
    }

    public function profil()
{
    return view('public.profil', ['profil' => Profil::data()]);
}

    public function produk()
    {
        return view('public.produk', ['produks' => Produk::latest()->paginate(9)]);
    }

    public function galeri()
    {
        return view('public.galeri', ['galeris' => Galeri::latest()->paginate(9)]);
    }

    public function artikel()
    {
        return view('public.artikel', ['artikels' => Artikel::latest()->paginate(9)]);
    }

    public function artikelDetail(Artikel $artikel)
    {
        return view('public.artikel-detail', compact('artikel'));
    }

    public function kirimPesan(Request $request)
    {
        $data = $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string|max:1000',
        ]);

        Pesan::create($data);

        return redirect(route('home') . '#kontak')
        ->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}