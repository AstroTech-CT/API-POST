<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publicacion_id');
            $table->unsignedBigInteger('user_ci');
            $table->timestamps();
        
            $table->foreign('publicacion_id')->references('id')->on('publicaciones')->onDelete('cascade');
            $table->foreign('user_ci')->references('ci')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
