<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            // $table->string('username')->unique();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->enum('jk',['Laki-Laki','Perempuan'])->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama',['Islam','Kristen','Katolik','Buddha','Hindu','Konghucu']);
            $table->string('pendidikan');
            $table->string('jenis_pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
