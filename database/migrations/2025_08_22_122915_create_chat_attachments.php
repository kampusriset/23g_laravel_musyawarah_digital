<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_attachments', function (Blueprint $table) {
            $table->increments('id_attachment');
            $table->unsignedInteger('obrolan_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type');
            $table->integer('file_size');
            $table->string('thumbnail_path')->nullable();
            $table->integer('download_count')->default(0);
            $table->timestamps();

            $table->foreign('obrolan_id')->references('id_obrolan')->on('obrolan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_attachments');
    }
};
