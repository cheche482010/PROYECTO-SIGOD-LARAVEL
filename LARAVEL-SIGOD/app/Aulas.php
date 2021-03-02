<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    protected $fillable = ['numero', 'nombre_aula', 'ubicacion','asignacion','capacidad'];
}
