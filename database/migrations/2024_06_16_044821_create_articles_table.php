<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perintah untuk membuat tabel
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai Primary Key
            $table->string('title'); // Kolom untuk menyimpan judul artikel
            $table->text('content'); // Kolom untuk menyimpan konten artikel
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Jalankan rollback untuk menghapus tabel jika perlu
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
