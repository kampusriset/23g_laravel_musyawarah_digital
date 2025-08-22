<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_reactions', function (Blueprint $table) {
            $table->increments('id_reaction');
            $table->unsignedInteger('obrolan_id');
            $table->unsignedInteger('warga_id');
            $table->enum('reaction_type', ['like','love','laugh','angry','sad']);
            $table->timestamps();

            $table->foreign('obrolan_id')->references('id_obrolan')->on('obrolan')->onDelete('cascade');
            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_reactions');
    }
};
