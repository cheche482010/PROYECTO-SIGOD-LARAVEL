<?php

class Docente extends Controlador
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
        $this->vista->Cargar_Vistas('docente/registrar');
    }

    public function Registros()
    {
        $municipios              = $this->model->Municipios();
        $this->vista->municipios = $municipios;

        $categorias              = $this->model->Categorias();
        $this->vista->categorias = $categorias;

        $dedicaciones              = $this->model->Dedicacion();
        $this->vista->dedicaciones = $dedicaciones;

        $relacionL              = $this->model->RelacionL();
        $this->vista->relacionL = $relacionL;

        $concurso              = $this->model->Concurso();
        $this->vista->concurso = $concurso;

        $areas              = $this->model->Areas();
        $this->vista->areas = $areas;

        $titulos              = $this->model->Titulos();
        $this->vista->titulos = $titulos;

        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('docente/registrar');
    }

    public function Consultas()
    {
        $docentes              = $this->model->Docentes();
        $this->vista->docentes = $docentes;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('docente/consultar');
    }

    public function Actualizacion()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('docente/actualizar');
    }

    // ==============================FUNCIONES=====================================

    public function BuscarExistenteAjax()
    {
        $cedula    = $_POST['cedula'];
        $existente = $this->model->DocentesBusqueda($cedula);
        if ($existente == "" || $existente == null) {
            echo 0;
        } else {
            echo "Este docente ya se encuentra registrado";
        }

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
                $function = "'docente','" . $e['cedula'] . "','" . $e['primer_nombre'] . " " . $e['primer_apellido'] . "'";

                $trMouseOv  = "this.style.background='#BDD8ED'";
                $trMouseOut = "this.style.background='white'";
                $tr         = '<tr onmouseover="' . $trMouseOv . '" onmouseout="' . $trMouseOut . '">
                 <td>' . $e['cedula'] . '</td>
                 <td>' . $e['primer_nombre'] . ' </td>
                 <td>' . $e['primer_apellido'] . '</td>
                 <td>' . $e['nombre_area'] . '</td>
                 <td>' . $e['nombre_categoria'] . '</td>
                 <td style="text-align: center">
                 <a title="Editar docente" class="mdi mdi-pencil-box" type="button" href="javascript:void(0)" aria-hidden="true" style="font-size: 30px; " data-placement="bottom" data-target="#actualizar" data-toggle="modal"></a>


                <a title="Eliminar docente" onmouseover="' . $mouseOv . '" onmouseout="' . $mouseOut . '" class="mdi mdi-delete" style="font-size: 30px; color: red; " type="button" onclick="deleteElement(' . $function . ')"></a>
                                            </td>
                                        </tr>';
                echo $tr;
            }

        }
    }

    public function Eliminar($param)
    {

        if ($this->model->Eliminar_docente($param[0])) {
            $this->mensaje = 'Docente eliminado exitosamente';
        } else {
            $this->mensaje = 'No se han encontrado Docente con ese ID';
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

    public function GuardarAjax()
    {
        $docente = $_POST['docente'];
        $ingreso = $_POST['ingreso'];
        $id_ing  = "";

        if ($this->model->RegistrarIngreso(
            [
                'anio_ingreso'  => $ingreso['fecha'],
                'post_traslado' => $ingreso['traslado'],
                'experiencia'   => $ingreso['experiencia'],
            ]
        )) {
            $id_ingreso = $this->model->idIngreso();
            foreach ($id_ingreso as $id) {
                $id_ing = $id['MAX(id_ingreso)'];
            }

            if ($this->model->RegistrarDocente(
                [
                    'cedula'              => $docente['cedula'],
                    'primer_nombre'       => $docente['nombre1'],
                    'segundo_nombre'      => $docente['nombre2'],
                    'primer_apellido'     => $docente['apellido1'],
                    'segundo_apellido'    => $docente['apellido2'],
                    'correo'              => $docente['correo'],
                    'direccion'           => $docente['direccion'],
                    'telefono'            => $docente['telefono'],
                    'id_municipio'        => $docente['municipio'],
                    'id_ingreso'          => $id_ing,
                    'id_categoria'        => $docente['categoria'],
                    'id_relacion_laboral' => $docente['relacionL'],
                    'id_dedicacion'       => $docente['dedicacion'],
                    'id_area'             => $docente['areas'],
                    'id_concurso'         => $docente['concurso'],

                ]
            )) {
                echo 1;

            }

        }

    }

    public function GuardarAjaxTitulos()
    {
        $titulo = $_POST['titulos'];
        $this->model->RegistrarTitulos([
            'cedula'      => $titulo['cedula'],
            'id_titulo'   => $titulo['idTitulo'],
            'descripcion' => $titulo['descripcionTitulo'],
        ]);
    }



}
?>