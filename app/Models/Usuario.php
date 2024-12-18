<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_usu'; // Define la clave primaria

    protected $fillable = [
        'Ficha',
        'Nombre',
        'Appa',
        'Apma',
        'Nac',
        'RFC',
        'Fk_cat',
        'Correo',
        'Correo2',
        'Telefono',
        'Password',
        'Tiposangre',
        'Vacofic',
        'Vacprog',
        'Jornada',
        'Camisa',
        'Pantalon',
        'Zapatos',
        'Condmedica',
        'Estatus',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'Fk_cat', 'id_cat');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'Fk_sectores', 'id_sect');
    }
}
