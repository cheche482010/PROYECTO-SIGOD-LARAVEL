<?php
class Disponibilidad extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('disponibilidad/index'); 
    }

    public function Registros()  
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('disponibilidad/registrar'); 
    }

    public function Consultas()  
    {
        $this->Seguridad_de_Session(); 
        $disponilidad             = $this->model->Disponilidades(); 
        $this->vista->disponilidad = $disponilidad;
        $this->vista->Cargar_Vistas('disponibilidad/consultar'); 
    }

    public function Nuevo()
    {
        $nombre_disponibilidad = ($_POST['nombre_disponibilidad']      !== "") ? $_POST['nombre_disponibilidad']      : null;
        $turno                 = ($_POST['turno'] !== "") ? $_POST['turno'] : null;
        $dia_disponibilidad    = ($_POST['dia_disponibilidad']   !== "") ? $_POST['dia_disponibilidad']   : null;

        if ($this->model->Registrar(
            [
                'nombre_disponibilidad' => $nombre_disponibilidad,
                'turno'                 => $turno,
                'dia_disponibilidad'    => $dia_disponibilidad
            ]
        )) 
        {
            $this->mensaje = 'Disponibilidad Registrada Exitosamente!.';
        } else 
        {
            $this->mensaje = 'Ha ocurrido un error.';
        }

         $this->Registros(); 

         echo '<script type="text/javascript">swal("Exito!", "'.$this->mensaje.'", "success");</script>  ';

        return false;

    }

    public function Eliminar($param)
    {

        if ($this->model->Eliminar_Disponibilidad($param[0])) {
            $this->mensaje = 'Disponibilidad eliminada exitosamente';
        } else {
            $this->mensaje = 'No se han encontrado aula con ese ID';
        }

        echo '<script type="text/javascript">swal("Exito!", "'.$this->mensaje.'", );</script>  ';

        $this->Consultas() ;
        return false;
    }


    public function Editar($param)
    {

        $nombre_disponibilidad = ($_POST['nombre_disponibilidad']      !== "") ? $_POST['nombre_disponibilidad']      : null;
        $turno                 = ($_POST['turno'] !== "") ? $_POST['turno'] : null;
        $dia_disponibilidad    = ($_POST['dia_disponibilidad']   !== "") ? $_POST['dia_disponibilidad']   : null;

        $id_disponilidad = $param[0];

        if ($this->model->Actualizar([
            'nombre_disponibilidad' => $nombre_disponibilidad,
            'turno'                 => $turno,
            'dia_disponibilidad'    => $dia_disponibilidad,
            'id_disponilidad'       => $id_disponilidad
        ])) {
            $this->mensaje = 'Seccion actualizado exitosamente!.';
        } else {
            $this->mensaje = 'Ha ocurrido un error.';
        }

        echo '<script type="text/javascript">swal("Exito!", "'.$this->mensaje.'", );</script>  ';

        return false;
    }

}
?>