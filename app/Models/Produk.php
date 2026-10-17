<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public const KATEGORI = ['Mobile Apps', 'Website', 'Web Base App'];

    protected $fillable = ['judul', 'foto', 'kategori', 'keterangan'];
}