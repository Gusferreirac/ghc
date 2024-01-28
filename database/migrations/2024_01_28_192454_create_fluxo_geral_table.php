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
        Schema::create('fluxo_geral', function (Blueprint $table) {
            $table->id('seq');
            $table->string('grupo', 12)->references('grupo')->on('grupo_fluxo_origem');
            $table->integer('msgFluxoOrigem')->nullable();
            $table->string('fluxoOrigem')->references('fluxo')->on('fluxo');
            $table->string('aguardarFluxo')->nullable();
            $table->string('acao')->nullable();
            $table->string('eventoAcao')->nullable();
            $table->string('interface')->nullable();
            $table->string('acaoFluxo')->nullable();
            $table->integer('msgFluxoDestino')->nullable();
            $table->string('fluxoDestino')->references('fluxo')->on('fluxo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fluxo_geral', function (Blueprint $table) {
            $table->dropForeign(['grupo']);
            $table->dropForeign(['fluxoOrigem']);
            $table->dropForeign(['fluxoDestino']);
        });
        Schema::dropIfExists('fluxo_geral');
    }
};
