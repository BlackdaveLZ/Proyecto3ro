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
        Schema::create('ususarios_curso', function (Blueprint $table) {
            $table->id('usc_id');
            $table->foreignId('usu_id')->references('usu_id')->on('users');
            $table->foreignId('cur_id')->references('cur_id')->on('cursos');
            $table->date('usc_fecha_registro');
            $table->date('usc_fecha_fin');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ususarios_curso');
    }
};
