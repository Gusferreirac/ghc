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
        Schema::dropIfExists('demanda');

        Schema::create('demanda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('titulo');
            $table->foreignId('pessoa_solicitante_id')->references('id')->on('people');
            $table->timestamp('data_solicitacao');
            $table->string('departamento');
            $table->string('descricao')->nullable();
            $table->boolean('ativa')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demanda', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['pessoa_solicitante_id']);
        });

        Schema::dropIfExists('demanda');
    }
};
