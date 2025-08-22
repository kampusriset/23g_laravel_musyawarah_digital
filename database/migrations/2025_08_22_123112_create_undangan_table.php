<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('undangan', function (Blueprint $table) {
            $table->increments('id_undangan');
            $table->unsignedInteger('agenda_id');
            $table->unsignedInteger('warga_id');
            $table->enum('status_kehadiran', ['hadir','tidak hadir','pending'])->default('pending');
            $table->timestamp('waktu_konfirmasi')->nullable();
            $table->timestamps();

            $table->foreign('agenda_id')->references('id_agenda')->on('agenda')->onDelete('cascade');
            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('undangan');
    }
};
