<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_user')->references('id')->on('users');
            $table->string("titulo");
            $table->text('capa');
            $table->string('genero');
            $table->date('lancamento');
            $table->dateTime('duracao');
            $table->string('classificacao');
            $table->text('sinopse');
            $table->boolean('finalizou');
            $table->string('nota');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
