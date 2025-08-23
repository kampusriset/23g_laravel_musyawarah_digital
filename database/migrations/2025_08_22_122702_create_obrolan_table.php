<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obrolan', function (Blueprint $table) {
            $table->increments('id_obrolan');
            $table->unsignedInteger('warga_id');
            $table->unsignedInteger('agenda_id')->nullable();
            $table->text('pesan');
            $table->enum('tipe_pesan', ['text','image','file','system'])->default('text');
            $table->unsignedInteger('parent_id')->nullable();
            $table->boolean('is_edited')->default(false);
            $table->timestamp('edited_at')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('file_size')->nullable();
            $table->json('mentioned_users')->nullable();
            $table->timestamps();

            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
            // $table->foreign('agenda_id')->references('id_agenda')->on('agenda')->onDelete('cascade');
            $table->foreign('parent_id')->references('id_obrolan')->on('obrolan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obrolan');
    }
};
