<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'foto'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori'   => 'required|in:' . implode(',', Produk::KATEGORI),
            'judul'      => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $data['foto'] = $request->file('foto')->store('produk', 'public');
        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori'   => 'required|in:' . implode(',', Produk::KATEGORI),
            'judul'      => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($produk->foto);
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        Storage::disk('public')->delete($produk->foto);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}