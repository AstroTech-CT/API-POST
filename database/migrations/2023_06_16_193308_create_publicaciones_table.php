<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('contenido')->nullable();
            $table->json('tematica'); 
            $table->json('locacion');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('likes_id');
            $table->unsignedBigInteger('comments_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('likes_id')->references('id')->on('likes');
            $table->foreign('comments_id')->references('id')->on('comments');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}