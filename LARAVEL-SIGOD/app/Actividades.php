<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $fillable = ['id_tipo_actividad', 'descripcion_actividad', 'id_dependencia'];
} 
