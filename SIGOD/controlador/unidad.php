<?php

class Unidad extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }
// ==============================VISTAS=====================================

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('unidad/registrar');
    }

    public function Registros()
    {
        $trayecto              = $this->model->Trayecto();
        $this->vista->trayecto = $trayecto;

        $eje              = $this->model->Ejes();
        $this->vista->eje = $eje;

        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('unidad/registrar');
    }

    public function Consultas()
    {

        $eje                   = $this->model->Ejes();
        $this->vista->eje      = $eje;
        $unidad                = $this->model->Unidades();
        $this->vista->unidad   = $unidad;
        $trayecto              = $this->model->Trayecto();
        $this->vista->trayecto = $trayecto;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('unidad/consultar');
    }
// ==============================FUNCIONES=====================================

    public function Nuevo()
    {
        $nombre_unidad = ($_POST['nombre_unidad'] !== "") ? $_POST['nombre_unidad'] : null;
        $trayecto      = ($_POST['trayecto'] !== "") ? $_POST['trayecto'] : null;
        $fase          = ($_POST['fase'] !== "") ? $_POST['fase'] : null;

        $id_eje_formacion = ($_POST['id_eje_formacion'] !== "") ? $_POST['id_eje_formacion'] : null;

        if ($this->model->Registrar(
            [
                'nombre_unidad'    => $nombre_unidad,
                'trayecto'         => $trayecto,
                'fase'             => $fase,
                'id_eje_formacion' => $id_eje_formacion,
            ]
        )) {
            $this->mensaje = 'La unidad curricular ' . $nombre_unidad . ' ha sido registrada exitosamente.';
        } else {
            $this->mensaje = 'Ha ocurrido un error.';
        }

        $this->Consultas();
        echo '<script type="text/javascript">
                    swal({
                    title: "¡Éxito!",
                    text: "' . $this->mensaje . '",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                });</script>  ';

        return false;

    }

    public function Eliminar($param)
    {

        if ($this->model->Eliminar_unidad($param[0])) {
            $this->mensaje = 'Unidad Curricular eliminada exitosamente';
        } else {
            $this->mensaje = 'No se han encontrado Seccion con ese ID';
        }

        $this->Consultas();
        echo '<script type="text/javascript">
                    swal({
                    title: "¡Éxito!",
                    text: "' . $this->mensaje . '",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                });</script>  ';
        return false;
    }

    public function DynamicSearch()
    {
        $clave     = $_POST['clave'];
        $existente = $this->model->BusquedaDinamica($clave);
        if ($existente == "" || $existente == null) {
            echo 0;
        } else {
            foreach ($existente as $e) {
                $mouseOv  = "this.style.color='#A60303'";
                $mouseOut = "this.style.color='red'";
                $trayect  = "";
                $function = "'unidad','" . $e['id_unidad_curricular'] . "','" . $e['nombre_unidad'] . "'";
                switch ($e['trayecto']) {
                    case 1:
                        $trayect = "Trayecto I";
                        break;
                    case 2:
                        $trayect = "Trayecto II";
                        break;
                    case 3:
                        $trayect = "Trayecto III";
                        break;
                    case 4:
                        $trayect = "Trayecto IV";
                        break;
                    default:
                        $trayect = 'Trayecto Inicial';
                        break;
                };
                $trMouseOv  = "this.style.background='#BDD8ED'";
                $trMouseOut = "this.style.background='white'";
                $tr         = '<tr  onmouseover="' . $trMouseOv . '" onmouseout="' . $trMouseOut . '">
                 <td>' . $e['nombre_unidad'] . '</td>
                 <td>' . $trayect . '</td>
                 <td style="text-align: center">
                 <a title="Editar unidad curricular" class="mdi mdi-pencil-box" type="button" href="javascript:void(0)" aria-hidden="true" style="font-size: 30px; " data-placement="bottom" data-target="#actualizar" data-toggle="modal"></a>


                <a title="Eliminar unidad curricular" onmouseover="' . $mouseOv . '" onmouseout="' . $mouseOut . '" class="mdi mdi-delete" style="font-size: 30px; color: red; " type="button" onclick="deleteElement(' . $function . ')"></a>
                                            </td>
                                        </tr>';
                echo $tr;
            }

        }
    }

    public function Editar()
    {
        $unidad     = $_POST['UC'];
        $nombreUnid = $unidad['nombre'];
        $trayecto   = $unidad['trayecto'];
        $fase       = $unidad['fase'];
        $eje        = $unidad['eje'];
        $id         = $unidad['id'];

        if ($this->model->Actualizar(
            [
                'nombre'   => $nombreUnid,
                'trayecto' => $trayecto,
                'fase'     => $fase,
                'eje'      => $eje,
                'idUnid'   => $id,
            ]
        )) {
            echo 1;
        }
    }
}
?>