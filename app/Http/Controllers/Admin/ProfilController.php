<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = Profil::data();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'siapa_kami' => 'required|string',
            'visi'       => 'required|string',
            'misi'       => 'required|string',
        ]);

        Profil::data()->update($data);

        return redirect()->route('admin.profil.edit')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}