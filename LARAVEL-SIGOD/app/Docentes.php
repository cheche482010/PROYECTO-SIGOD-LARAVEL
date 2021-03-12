<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = "cedula";
    protected $fillable = [
    	'cedula',
    	'primer_nombre',
    	'segundo_nombre',
    	'primer_apellido',
    	'segundo_apellido',
    	'correo',
    	'direccion',
    	'telefono',
    	'id_municipio',
    	'id_ingreso',
    	'id_categoria',
    	'id_relacion_laboral',
    	'id_dedicacion',
    	'id_area',
    	'id_concurso',
    	'titulo_pregrado'
    ];
    public function postedBy()
      {
         return $this->belongsTo('App\Docentes');
      }
}
