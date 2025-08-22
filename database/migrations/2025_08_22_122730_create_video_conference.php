<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_conference', function (Blueprint $table) {
            $table->increments('id_conference');
            $table->unsignedInteger('agenda_id');
            $table->string('room_id')->unique();
            $table->string('room_name');
            $table->unsignedInteger('host_id');
            $table->string('meeting_password')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('max_participants')->default(0);
            $table->boolean('is_recording_enabled')->default(false);
            $table->string('recording_url')->nullable();
            $table->enum('status', ['scheduled','active','ended'])->default('scheduled');
            $table->integer('participant_count')->default(0);
            $table->timestamps();

            $table->foreign('agenda_id')->references('id_agenda')->on('agenda')->onDelete('cascade');
            $table->foreign('host_id')->references('id_warga')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_conference');
    }
};
