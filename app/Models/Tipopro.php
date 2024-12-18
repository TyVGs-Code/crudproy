<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipopro extends Model
{
    protected $table = 'tipopro';
    protected $primaryKey = 'Id_tp';
    public $timestamps = false;

    protected $fillable = ['TipoPro', 'Clave'];
}
