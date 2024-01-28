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
        Schema::create('fluxo_demanda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idDemanda')->references('id')->on('demanda');
            $table->string('grupoFluxoOrigem', 12)->references('grupo')->on('grupo_fluxo_origem');
            $table->string('fluxoOrigem')->references('fluxo')->on('fluxo');
            $table->string('acao')->nullable();
            $table->string('eventoAcao')->nullable();
            $table->string('interface')->nullable();
            $table->integer('msgFluxoDestino')->nullable();
            $table->string('fluxoDestino')->references('fluxo')->on('fluxo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fluxo_demanda', function (Blueprint $table) {
            $table->dropForeign(['idDemanda']);
            $table->dropForeign(['grupoFluxoOrigem']);
            $table->dropForeign(['fluxoOrigem']);
            $table->dropForeign(['fluxoDestino']);
        });
        Schema::dropIfExists('fluxo_demanda');
    }
};
