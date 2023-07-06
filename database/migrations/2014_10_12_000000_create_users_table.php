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
        Schema::create('users', function (Blueprint $table) {
            $table->id('ci')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('username')->unique();
            $table->boolean('reportado')->default(false);
            $table->boolean('suspendido')->default(false);
            $table->unsignedBigInteger('likes_id');
            $table->unsignedBigInteger('comments_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('id_publicaciones')->references('id')->on('publicaciones');
            $table->foreign('id_comments')->references('id')->on('comments');
            $table->foreign('id_likes')->references('id')->on('likes');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
