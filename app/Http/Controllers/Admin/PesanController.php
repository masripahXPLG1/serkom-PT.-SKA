<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);
        return view('admin.pesan.index', compact('pesans'));
    }

    public function show(Pesan $pesan)
    {
        if (! $pesan->dibaca) {
            $pesan->update(['dibaca' => true]);
        }
        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}