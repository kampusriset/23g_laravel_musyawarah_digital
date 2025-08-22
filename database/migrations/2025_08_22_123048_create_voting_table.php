<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voting', function (Blueprint $table) {
            $table->increments('id_voting');
            $table->unsignedInteger('usulan_id');
            $table->unsignedInteger('warga_id');
            $table->enum('pilihan', ['setuju','tidak','abstain']);
            $table->text('komentar')->nullable();
            $table->timestamps();

            $table->foreign('usulan_id')->references('id_usulan')->on('usulan_kegiatan')->onDelete('cascade');
            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voting');
    }
};
