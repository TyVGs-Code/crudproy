<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Anexos extends Model
{
    protected $table = 'anexos';
    protected $primaryKey = 'Id_ane';
    public $timestamps = false;
    protected $fillable = [
        'Permisos',
        'ApaMed',
        'Herramienta',
        'Duracion',
        'Archivo',
        'Fk_eva',
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaact::class, 'Fk_eva', 'Id_eva');
    }
}
