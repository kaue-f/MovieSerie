<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->references('id')->on('users');
            $table->string('titulo');
            $table->text('capa');
            $table->string('genero');
            $table->integer('temporada');
            $table->integer('episodio');
            $table->date('lancamento');
            $table->dateTime('duracaoEpisodio');
            $table->string('classificacao');
            $table->text('sinopse');
            $table->boolean('finalizou');
            $table->string('nota');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
