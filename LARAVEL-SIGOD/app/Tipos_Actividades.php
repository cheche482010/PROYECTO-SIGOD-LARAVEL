<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_Actividades extends Model
{
	protected $table = 'tipos_actividades';
	protected $primaryKey = "id_tipo_actividad";
    protected $fillable = ['nombre_actividad'];
}
 