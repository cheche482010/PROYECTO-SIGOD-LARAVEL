<?php

class Inicio extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }

    public function Cargar_Vistas()
    {
    	$this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inicio/index'); 
    }

}
?> 