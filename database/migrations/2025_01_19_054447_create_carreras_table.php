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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            /* fecha */
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('lugar')->nullable();
            $table->string('distancia')->nullable();
            $table->string('imagen')->nullable();
            /* precio */
            $table->decimal('precio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
