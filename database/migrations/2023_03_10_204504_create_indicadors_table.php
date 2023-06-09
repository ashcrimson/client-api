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
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombreIndicador');
            $table->string('codigoIndicador');
            $table->string('unidadMedidaIndicador');
            $table->float('valorIndicador');
            $table->timestamp('fechaIndicador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadors');
    }
};
