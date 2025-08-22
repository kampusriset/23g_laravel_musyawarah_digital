<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->increments('id_notulen');
            $table->string('judul_musyawarah');
            $table->integer('total_hadir')->default(0);
            $table->integer('total_undangan')->default(0);
            $table->text('catatan')->nullable();
            $table->text('hasil_keputusan')->nullable();
            $table->enum('status', ['draft','selesai','ditunda'])->default('draft');
            $table->unsignedInteger('admin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notulen');
    }
};
