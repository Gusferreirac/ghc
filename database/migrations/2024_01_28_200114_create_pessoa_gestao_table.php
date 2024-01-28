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
        Schema::create('pessoa_gestao', function (Blueprint $table) {
            $table->foreignId('idDemanda')->references('id')->on('demanda');
            $table->foreignId('idPessoa')->references('id')->on('people');
            $table->foreignId('idAtuacao')->references('id')->on('atuacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_gestao');
    }
};
