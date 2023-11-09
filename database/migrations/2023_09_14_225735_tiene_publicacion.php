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
        Schema::create('Tiene_Publicacion', function (Blueprint $table) {
            $table->unsignedBigInteger('publicacion_id');
            $table->unsignedBigInteger('user_ci');
            $table->timestamps();
            $table->foreign('publicacion_id')->references('id')->on('publicacion')->onDelete('cascade');
            $table->foreign('user_ci')->references('ci')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
