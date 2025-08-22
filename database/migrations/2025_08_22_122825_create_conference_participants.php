<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conference_participants', function (Blueprint $table) {
            $table->increments('id_participant');
            $table->unsignedInteger('conference_id');
            $table->unsignedInteger('warga_id');
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('left_at')->nullable();
            $table->integer('duration_minutes')->default(0);
            $table->boolean('is_host')->default(false);
            $table->boolean('is_moderator')->default(false);
            $table->string('connection_quality')->nullable();
            $table->timestamps();

            $table->foreign('conference_id')->references('id_conference')->on('video_conference')->onDelete('cascade');
            $table->foreign('warga_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conference_participants');
    }
};
