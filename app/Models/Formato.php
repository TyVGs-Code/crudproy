<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formato
 *
 * @property $Id_fmt
 * @property $Formato
 * @property $FechaC
 * @property $Ins
 *
 * @property Instruccione $instruccione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formato extends Model
{
    
    protected $perPage = 20;
    protected $table = 'formatos'; // Nombre de la tabla
    protected $primaryKey = 'Id_fmt'; // Nombre de la clave primaria
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Formato', 'FechaC', 'Ins', 'InstruccionFile'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instruccione()
    {
        return $this->belongsTo(\App\Models\Instruccione::class, 'Ins', 'Id_ins');
    }
    
}
