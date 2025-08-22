<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->increments('id_warga');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nama_lengkap');
            $table->enum('gender', ['L', 'P'])->nullable(); // L = Laki-laki, P = Perempuan
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->enum('role', ['warga', 'admin'])->default('warga');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->timestamp('password_reset_expires')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
