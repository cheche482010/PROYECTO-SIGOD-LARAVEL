<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades_Curriculares extends Model
{
    protected $table = 'unidades_curriculares';
    protected $primaryKey = "id_unidad_curricular";
    protected $fillable = ['nombre_unidad', 'trayecto', 'fase', 'id_eje_formacion'];
}
