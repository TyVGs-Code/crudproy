<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaact extends Model
{
    //
    use HasFactory;
    protected $table = 'evaact';
    protected $primaryKey = 'Id_eva';
    public $timestamps = false;
    protected $fillable = [
        'NomAct',
        'Fecha',
        'Clasificacion',
        'Tipo',
        'Frecuencia',
        'Status',
        'Archivo',
        'Fk_ins',
        'Fk_cat'
    ];

    // Definir las relaciones con las tablas Fk_ins y Fk_cat si existen
    public function instruccion()
    {
        return $this->belongsTo(\App\Models\Instruccione::class, 'Fk_ins', 'Id_ins');
    }

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'Fk_cat', 'id_cat');
    }

}
