<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias'; // Nombre de la tabla

    protected $primaryKey = 'id_cat'; // Cambiar la clave primaria

    protected $fillable = [
        'Categoria', // Nombre de la categoría
        'Nivel',     // Nivel de la categoría
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'Fk_cat', 'id_cat');
    }

    public function reglamentos()
    {
        return $this->belongsToMany(Reglamento::class, 'categoria_reglamento', 'categoria_id', 'reglamento_id');
    }



}

