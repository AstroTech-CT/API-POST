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
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('tematica');
            $table->string('locacion');
            $table->text('contenido');
            $table->unsignedBigInteger('user_ci');
            $table->timestamps();
        
            $table->foreign('user_ci')->references('ci')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
