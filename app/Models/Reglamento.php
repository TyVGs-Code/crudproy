<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reglamento extends Model
{
    protected $table = 'reglamento';
    protected $primaryKey = 'id_regl';

    protected $fillable = ['origen', 'obligacion', 'tipo'];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'reglamento_categoria', 'reglamento_id', 'categoria_id');
    }
}