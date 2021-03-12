<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
	protected $table = 'actividades';
	protected $primaryKey = "id_actividad";
    protected $fillable = ['id_tipo_actividad', 'descripcion_actividad', 'id_dependencia'];

    public function Actividad()
    {
        return $this->BelongsTo('App\Actividades', 'id_actividad');
        
    } 
}
