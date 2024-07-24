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
            $table->string('title', 60);
            $table->text('summary')->max(500);
            $table->string('sinopsis');
            $table->smallInteger('year');
            $table->string('director', 80);
            $table->smallInteger('duration'); // form en minutos
            $table->tinyText('age');

            $table->timestamps();
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
