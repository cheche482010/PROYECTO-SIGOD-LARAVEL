<?php

class Reporte extends Controlador
{
    public function __construct() 
    {
        parent::__construct();
        $this->vista->mensaje = "";
    } 
 
    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();#
        $this->vista->Cargar_Vistas('reporte/PDF/aulario'); 
    }

    public function Reporte_Horario_Secciones()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/Hseccion'); 
    }

    public function FOD()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/FOD'); 
    }

    public function Declaracion_Jurada()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/Djurada'); 
    }

    public function Reporte_Horario_Docente()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/Hdocente'); 
    }

    public function Reporte_Listado_Docente() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/Ldocente'); 
    }
    public function Reporte_Listado_Seccion() 
    {
        $trayecto             = $this->model->Trayecto(); 
        $this->vista->trayecto = $trayecto;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/Lseccion'); 
    }

    public function Aulario()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reporte/aulario'); 
    }

// =====================================================================
    // controladores de PDF
// =====================================================================
    public function Reporte_PDF_Listado_Docente() 
    {
        $this->vista->Cargar_Vistas('reporte/PDF/listadoDocente'); 
    }
    public function Reporte_PDF_ListadoDocentes_Notas() 
    {
        $this->vista->Cargar_Vistas('reporte/PDF/listadoDocenteNotas'); 
    }

    public function Reporte_PDF_Listado_Seccion() 
    {
        $this->vista->Cargar_Vistas('reporte/PDF/listadoSeccion'); 
    }

    public function Reporte_PDF_Horario_Seccion()
    {
        $this->vista->Cargar_Vistas('reporte/PDF/horarioSeccion'); 
    }

    public function Reporte_PDF_Aulario()
    {
        $this->vista->Cargar_Vistas('reporte/PDF/aulario'); 
    }

    public function Reporte_PDF_Horario_Docente()
    {
        $this->vista->Cargar_Vistas('reporte/PDF/horarioDocente'); 
    }
    public function Reporte_PDF_Formato_Organizacion_Docente()
    {
        $this->vista->Cargar_Vistas('reporte/PDF/FormatoOrganizacionDocente'); 
    }
    public function Reporte_PDF_Declaracion_Jurada()
    {
        $this->vista->Cargar_Vistas('reporte/PDF/DeclaracionJurada'); 
    }

    
} 
?>