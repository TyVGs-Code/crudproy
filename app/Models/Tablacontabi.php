<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablacontabi extends Model
{
    protected $table = 'tablacontabi';
    protected $primaryKey = 'id_tablaconta';
    public $timestamps = false;
    protected $fillable = [
        'Fk_usu',
        'Fk_cat',
        'Fk_ins',
        'FechComunic',
        'FechCumplim',
        'Fk_sect',
        'ListaCump',
        'ListaCom',
        'Cuestionario',
        'Ciclo',
        'Calificacion',
        'Aprobacion',
        'Observaciones',
        'Ciclo1',
        'Ciclo2',
        'Ciclo3',
        'Fk_evaluador',
        'Fk_super',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Fk_usu', 'id_usu');
    }

    public function categoria()
    {
        return $this->belongsTo(Usuario::class, 'Fk_cat', 'Fk_cat');
    }

    public function supervisador()
    {
        return $this->belongsTo(Usuario::class, 'Fk_super', 'id_usu');
    }

    public function evaluador()
    {
        return $this->belongsTo(Usuario::class, 'Fk_evaluador', 'id_usu');
    }

    public function sectores()
    {
        return $this->belongsTo(Sector::class, 'Fk_sect', 'id_sect');
    }

    public function instruccione()
    {
        return $this->belongsTo(Instruccione::class, 'Fk_ins', 'Id_ins');
    }
}
