<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id_agenda');
            $table->unsignedInteger('notulen_id');
            $table->string('judul_agenda');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('tempat')->nullable();
            $table->enum('status', ['draft','aktif','selesai'])->default('draft');
            $table->timestamps();

            $table->foreign('notulen_id')->references('id_notulen')->on('notulen')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
