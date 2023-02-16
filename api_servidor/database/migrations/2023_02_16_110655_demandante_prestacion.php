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
        Schema::create('demandantes_prestacion', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('prestacion_id');
            $table->foreign('prestacion_id')->references('id')->on('prestaciones');
            $table->unsignedBigInteger('demandante_id');
            $table->foreign('demandante_id')->references('id')->on('demandantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
