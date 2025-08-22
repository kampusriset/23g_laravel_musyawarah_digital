<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usulan_kegiatan', function (Blueprint $table) {
            $table->increments('id_usulan');
            $table->unsignedInteger('warga_id');
            $table->unsignedInteger('agenda_id');
            $table->string('judul_usulan');
            $table->text('deskripsi')->nullable();
            $table->decimal('anggaran_estimasi', 15, 2)->nullable();
            $table->enum('status_usulan', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
            $table->foreign('agenda_id')->references('id_agenda')->on('agenda')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usulan_kegiatan');
    }
};
