<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reglamento', function (Blueprint $table) {
            $table->id('id_regl')->unsigned();
            $table->string('origen', 60);
            $table->string('obligacion', 100);
            $table->string('tipo', 20);
            $table->timestamps();  // Aquí agregamos las columnas created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reglamento');
    }
};
