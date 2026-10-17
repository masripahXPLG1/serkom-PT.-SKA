<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['siapa_kami', 'visi', 'misi'];

    /**
     * Profil hanya punya satu baris data.
     * Jika belum ada, dibuat otomatis dengan isi awal.
     */
    public static function data(): self
    {
        return static::first() ?? static::create([
            'siapa_kami' => "PT. SKA (Solusi Koneksi Anda) adalah perusahaan penyedia layanan koneksi, infrastruktur jaringan, dan solusi teknologi informasi. Kami membantu perusahaan, instansi, dan institusi pendidikan mendapatkan layanan yang andal, mulai dari perencanaan hingga pendampingan setelah layanan berjalan.\nDengan tim yang berpengalaman dan pendekatan yang berorientasi pada kebutuhan pelanggan, kami berkomitmen menghadirkan layanan jaringan, fiber optic, dan cloud server dengan kualitas terbaik.",
            'visi'       => 'Menjadi mitra teknologi dan koneksi terpercaya yang mendorong kemajuan bisnis dan institusi di Indonesia.',
            'misi'       => "Menyediakan layanan jaringan yang stabil dan aman.\nMemberikan solusi sesuai kebutuhan pelanggan.\nMenjaga kualitas melalui dukungan purna jual yang responsif.\nTerus berinovasi mengikuti perkembangan teknologi.",
        ]);
    }
}