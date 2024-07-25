<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cover_id');
            $table->unsignedBigInteger('trailer_id');
            //$table->unsignedBigInteger('video_id');
            //$table->unsignedBigInteger('user_id');
            $table->string('title', 60);
            $table->text('summary')->max(500);
            $table->string('sipnosis');
            $table->smallInteger('year');
            $table->string('director', 80);
            $table->smallInteger('duration'); // form en minutos
            $table->tinyText('age');
            $table->timestamps();

            $table->foreign('cover_id')->references('id')->on('covers');
            $table->foreign('trailer_id')->references('id')->on('trailers');
            //$table->foreign('video_id')->references('id')->on('videos');
            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
