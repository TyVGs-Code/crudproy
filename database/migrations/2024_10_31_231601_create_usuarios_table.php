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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usu');
            $table->string('Ficha', 50)->index();
            $table->string('Nombre', 60);
            $table->string('Appa', 60);
            $table->string('Apma', 60);
            $table->dateTime('Nac');
            $table->string('RFC', 13)->index();
            $table->foreignId('Fk_cat')->constrained('categorias', 'id_cat')->unsigned();
            $table->foreignId('Fk_sectores')->default(1)->constrained('sectores', 'id_sect')->unsigned();
            $table->string('Correo2', 30)->nullable()->default('');
            $table->string('Correo', 30)->index();
            $table->string('Telefono', 12);
            $table->string('Password', 255);
            $table->string('Tiposangre', 5)->default('');
            $table->date('Vacofic');
            $table->date('Vacprog');
            $table->string('Jornada', 5);
            $table->enum('Camisa', ['S', 'M', 'L', 'XL'])->notNullable();
            $table->enum('Pantalon', ['28', '30', '32', '34'])->notNullable();
            $table->enum('Zapatos', ['6', '7', '8', '9'])->notNullable();
            $table->string('Condmedica', 100)->notNullable();
            $table->char('Estatus', 1)->notNullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
