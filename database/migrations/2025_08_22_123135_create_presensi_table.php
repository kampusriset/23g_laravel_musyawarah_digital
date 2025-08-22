<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('id_presensi');
            $table->unsignedInteger('agenda_id');
            $table->unsignedInteger('warga_id');
            $table->timestamp('waktu_hadir')->nullable();
            $table->string('metode_presensi')->nullable();
            $table->timestamps();

            $table->foreign('agenda_id')->references('id_agenda')->on('agenda')->onDelete('cascade');
            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
