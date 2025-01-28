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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->enum('categoria', ['5km', '10km'])->nullable();
            $table->enum('genero', ['femenil', 'varonil'])->nullable();
            $table->string('numero_corredor')->nullable();
            $table->enum('talla_playera', ['XS', 'S', 'M', 'L', 'XL', 'XXL'])->nullable();
            $table->string('captura_transferencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
