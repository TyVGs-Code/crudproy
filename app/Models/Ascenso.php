<?php

// Ascenso.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ascenso extends Model
{
    use HasFactory;

    protected $table = 'ascensos'; // Nombre de la tabla
    protected $primaryKey = 'id_ase'; // Clave primaria

    protected $fillable = [
        'Fk_ascendido',
        'Fk_vacante',
        'Fechainicio',
        'Fechafin',
        'estatus',
    ];

    // Relación con el modelo Usuario para el ascendido
    public function ascendido()
    {
        return $this->belongsTo(Usuario::class, 'Fk_ascendido', 'id_usu');
    }

    // Relación con el modelo Usuario para la vacante
    public function vacante()
    {
        return $this->belongsTo(Usuario::class, 'Fk_vacante', 'id_usu');
    }
}

