<?php

class Horario extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }
// ==============================VISTAS=====================================

    public function RHD() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('horario/docente/registrar'); 
    }
    public function CHD() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('horario/docente/consultar'); 
    } 

    // ---------------------------------------------------------

    public function RHS() 
    {
        $trayecto             = $this->model->Trayecto(); 
        $this->vista->trayecto = $trayecto;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('horario/seccion/registrar'); 
    }
    public function CHS() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('horario/seccion/consultar'); 
    }


    public function Calendario() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('horario/calendario'); 
    }

    
// ==============================FUNCIONES=====================================

}
?>