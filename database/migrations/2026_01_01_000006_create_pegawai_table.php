<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->foreignId('agama_id')->constrained('agama')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('golongan_id')->constrained('golongan')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('eselon_id')->constrained('eselon')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('jabatan_id')->constrained('jabatan')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('unit_kerja_id')->constrained('unit_kerja')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('tempat_tugas');
            $table->string('no_hp', 25);
            $table->string('npwp', 30)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
