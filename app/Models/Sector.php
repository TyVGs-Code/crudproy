<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores'; // Nombre de la tabla

    protected $primaryKey = 'id_sect'; // Clave primaria
    protected $fillable = [
        'Nombre',        // Nombre del sector
        'Personal_sect', // Personal del sector
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'Fk_sectores', 'id_sect');
    }
}
