<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul_kegiatan')->nullable()->change();
            $table->string('kategori')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul_kegiatan')->nullable(false)->change();
            $table->string('kategori')->nullable(false)->change();
        });
    }
};