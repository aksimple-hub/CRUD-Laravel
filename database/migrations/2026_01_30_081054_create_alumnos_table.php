<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre'); // Coincide con el name="Nombre" del form
            $table->string('Apellido');
            $table->string('SegundoApellido')->nullable(); // nullable por si alguien no tiene
            $table->string('DNI')->unique(); // unique para que no se repita
            $table->string('Correo')->unique();
            $table->string('Telefono')->nullable();
            $table->string('Direccion')->nullable();
            $table->string('Foto')->nullable(); // Aquí guardaremos la ruta de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
