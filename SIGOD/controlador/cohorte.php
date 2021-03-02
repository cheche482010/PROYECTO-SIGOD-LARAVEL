<?php

class Cohorte extends Controlador
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
        $this->vista->Cargar_Vistas('cohorte/registrar');
    }

    public function Registros()
    {
        $unidades              = $this->model->UnidadesCurriculares();
        $this->vista->unidades = $unidades;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('cohorte/registrar');
    }

    public function Consultas()
    {
        $cohorte              = $this->model->Cohortes();
        $this->vista->cohorte = $cohorte;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('cohorte/consultar');
    }

    public function Nuevo()
    {
        $numero_cohorte      = ($_POST['cohorte'] !== "") ? $_POST['cohorte'] : null;
        $fecha_cohorte       = ($_POST['fecha'] !== "") ? $_POST['fecha'] : null;
        $descripcion_cohorte = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : null;

        if ($this->model->Registrar(
            [
                'numero_cohorte'      => $numero_cohorte,
                'fecha_cohorte'       => $fecha_cohorte,
                'descripcion_cohorte' => $descripcion_cohorte,
            ]
        )) {
            $this->mensaje = 'El cohorte ' . $numero_cohorte . ' ha sido registrado exitosamente.';
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

    public function DynamicSearch()
    {
        $clave     = $_POST['clave'];
        $existente = $this->model->BusquedaDinamica($clave);
        if ($existente == "" || $existente == null) {
            echo 0;
        } else {
            foreach ($existente as $e) {

                $function   = "'cohorte','" . $e['id_cohorte'] . "','" . $e['numero_cohorte'] . "'";
                $a          = "";
                $trMouseOv  = "this.style.background='#BDD8ED'";
                $trMouseOut = "this.style.background='white'";
                if ($e['activo'] == 0) {
                    $mouseOv  = "this.style.color='#0E5214'";
                    $mouseOut = "this.style.color='green'";
                    $a        = '<a title="Desactivar cohorte" onmouseover="' . $mouseOv . '" onmouseout="' . $mouseOut . '" class="mdi mdi-minus-circle" style="font-size:30px;  cursor:pointer; color:green;" type="button" onclick="deleteElement(' . $function . ')" ></a>';

                } else {

                    $mouseOv  = "this.style.color='#A60303'";
                    $mouseOut = "this.style.color='red'";
                    $a        = '<a title="Activar cohorte" onmouseover="' . $mouseOv . '" onmouseout="' . $mouseOut . '" class="mdi mdi-plus-circle" style="font-size: 30px; color: red; cursor:pointer " type="button" onclick="ActivarCohorte(' . $e['id_cohorte'] . ')"></a>';
                }

                $tr = '<tr onmouseover="' . $trMouseOv . '" onmouseout="' . $trMouseOut . '">
                 <td>' . $e['numero_cohorte'] . '</td>
                 <td>' . $e['fecha_cohorte'] . '</td>
                  <td>' . $e['descripcion_cohorte'] . '</td>
                 <td style="text-align: center">
                 <a title="Editar cohorte" class="mdi mdi-pencil-box" type="button" href="javascript:void(0)" aria-hidden="true" style="font-size: 30px; " data-placement="bottom" data-target="#actualizar" data-toggle="modal"></a>
                    ' . $a . '
                                            </td>
                                        </tr>';
                echo $tr;
            }

        }
    }

    public function guardarAjax()
    {
        $cohorte = $_POST['cohorte'];
        if ($this->model->Registrar(
            [
                'numero_cohorte'      => $cohorte['nroCohorte'],
                'fecha_cohorte'       => $cohorte['fechaCohorte'],
                'descripcion_cohorte' => $cohorte['descripcion'],
            ]
        )) {
            $id_cohorte = $this->model->idCohorte();
            foreach ($id_cohorte as $id) {
                $id_coho = $id['MAX(id_cohorte)'];
            }

            echo $id_coho;
        } else {
            echo 0;
        }
    }

    public function guardarAjaxUc()
    {
        $cohorteUC = $_POST['cohorteUC'];
        if ($this->model->RegistrarCohorteUc(
            [
                'unidad'  => $cohorteUC['idUC'],
                'cohorte' => $cohorteUC['idCohorte'],
                'codigo'  => $cohorteUC['codigoUC'],
                'horas'   => $cohorteUC['horasUC'],
            ]
        )) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function Desactivar($id)
    {
        $existente = $this->model->BusquedaCohorte($id[0]);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $c) {
                if ($this->model->Desactivar_cohorte(
                    [
                        "id_cohorte"          => $id[0],
                        "numero_cohorte"      => $c['numero_cohorte'],
                        "fecha_cohorte"       => $c['fecha_cohorte'],
                        "descripcion_cohorte" => $c['descripcion_cohorte'],
                        "activo"              => 1,

                    ]
                )) {
                    $mensaje = 'Se ha desactivado el cohorte';
                    $this->Consultas();
                    echo '<script type="text/javascript">
                    swal({
                    title: "¡Éxito!",
                    text: "' . $mensaje . '",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                });</script>  ';
                }
            }}}

    public function Activar($id)
    {
        $existente = $this->model->BusquedaCohorte($id[0]);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $c) {
                if ($this->model->Desactivar_cohorte(
                    [
                        "id_cohorte"          => $id[0],
                        "numero_cohorte"      => $c['numero_cohorte'],
                        "fecha_cohorte"       => $c['fecha_cohorte'],
                        "descripcion_cohorte" => $c['descripcion_cohorte'],
                        "activo"              => 0,

                    ]
                )) {
                    $mensaje = 'El cohorte ha sido activado';
                    $this->Consultas();
                    echo '<script type="text/javascript">
                    swal({
                    title: "¡Éxito!",
                    text: "' . $mensaje . '",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                });</script>  ';
                }
            }}}

}
?> 