<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruccione extends Model
{
    protected $table = 'instrucciones'; // Nombre de la tabla
    protected $primaryKey = 'Id_ins';   // Llave primaria
    public $timestamps = false;         // Deshabilitar timestamps automáticos

    protected $fillable = [
        'Codigo', 'Nomins', 'FechRev', 'FechEmi', 'FechProx', 'EstRev', 
         'ClasInstr', 'Nivel', 'Estado', 'Procedimiento',
        'Programa', 'Lista', 'Cuestionario', 'Guia', 'Ciclo', 'Diagrama', 
        'Desarrollo', 'Portada', 'ResRev'  // Asegúrate de incluir 'ResRev' en fillable
    ];

    // Relación con el modelo Usuario
    public function Usuario()
    {
        return $this->belongsTo(Usuario::class, 'ResRev', 'Id_usu'); // Relación con el modelo Usuario
    }

    public function formatos()
    {
        return $this->hasMany(Formato::class, 'Ins', 'Id_ins');
    }

}
