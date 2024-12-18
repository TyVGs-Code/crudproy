<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglamentoCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('reglamento_categoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reglamento_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('reglamento_id')
                  ->references('id_regl')
                  ->on('reglamento')
                  ->onDelete('cascade');

            $table->foreign('categoria_id')
                  ->references('id_cat')
                  ->on('categorias')
                  ->onDelete('cascade');

            // Índice único para evitar duplicados
            $table->unique(['reglamento_id', 'categoria_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reglamento_categoria');
    }

}
