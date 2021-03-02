<?php

class Necesidad extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }

    public function Cargar_Vistas()
    {
    	$this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('necesidad/registrar'); 
    } 

    public function Registros()  
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('necesidad/registrar'); 
    }

    public function Consultas()  
    {
        // $necesidad             = $this->model->Necesidades(); 
        // $this->vista->necesidad = $necesidad;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('necesidad/consultar'); 
    }
// ==============================FUNCIONES=====================================

    // public function Nuevo()
    // {
    //     $periodo      = ($_POST['periodo']      !== "") ? $_POST['periodo']     : null;
    //     $descripcion  = ($_POST['descripcion']  !== "") ? $_POST['descripcion'] : null;
        

    //     if ($this->model->Registrar(
    //         [
    //             'periodo'       => $periodo,
    //             'descripcion'  => $descripcion
    //         ]
    //     )) 
    //     {
    //         $this->mensaje = 'Necesidad Registrada Exitosamente!.';
    //     } else 
    //     {
    //         $this->mensaje = 'Ha ocurrido un error.';
    //     }

    //      $this->Seguridad_de_Session();
    //      $this->vista->Cargar_Vistas('Necesidad/registrar'); 

    //      echo '<script type="text/javascript">swal("Exito!", "'.$this->mensaje.'", "success");</script>  ';

    //     return false;

    // }

    // public function Eliminar($param)
    // {

    //     if ($this->model->Eliminar_Necesidad($param[0])) {
    //         $this->mensaje = 'necesidad eliminada exitosamente';
    //     } else {
    //         $this->mensaje = 'No se han encontrado necesidad con ese ID';
    //     }

    //     $this->Consultas() ;
    //                 echo '<script type="text/javascript">               
    //                 swal({
    //                 title: "¡Éxito!",
    //                 text: "'.$this->mensaje.'",
    //                 type: "success",
    //                 showConfirmButton:false,
    //                 timer:2000
    //             });</script>  ';
    //     return false;
    // }

    // public function Editar($param)
    // {

    //     $periodo      = ($_POST['periodo']      !== "") ? $_POST['periodo']     : null;
    //     $descripcion  = ($_POST['descripcion']  !== "") ? $_POST['descripcion'] : null;

    //     $id_necesidad = $param[0];

    //     if ($this->model->Actualizar([
    //         'periodo'            => $periodo,
    //         'descripcion'        => $descripcion
    //         'id_necesidad'       => $id_necesidad
    //     ])) {
    //         $this->mensaje = 'Necesidad actualizada exitosamente!.';
    //     } else {
    //         $this->mensaje = 'Ha ocurrido un error.';
    //     }

    //     echo '<script type="text/javascript">swal("Exito!", "'.$this->mensaje.'", );</script>  ';

    //     return false;
    // }

}
?>  