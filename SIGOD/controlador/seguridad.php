<?php

class Seguridad extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('seguridad/index');
    }

    public function Roles()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('seguridad/rol/index');
    }

    public function Bitacora()
    {
        $this->Seguridad_de_Session();
        $datos             = $this->model->Consultar_Bitacora(); 
        $this->vista->datos = $datos; 
        $this->vista->Cargar_Vistas('seguridad/bitacora/index');
    }

    public function Permisos()
    {

        $permisosUser              = $this->model->permisosUser();
        $this->vista->permisosUser = $permisosUser;
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('seguridad/permisos/index');
    }

    public function Modulos()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('seguridad/modulos/index');
    }

    public function DynamicSearch()
    {
        $clave     = $_POST['clave'];
        $existente = $this->model->BusquedaDinamica($clave);
        if ($existente == "" || $existente == null) {
            echo 0;
        } else {
            foreach ($existente as $e) {

                $function  = "'" . $e['cedula'] . "','" . $e['rol_inicio'] . "'";
                $function2 = "'" . $e['rol_inicio'] . "','" . $e['cedula'] . "','" . $e['contrasenia'] . "'";

                $trMouseOv  = "this.style.background='#BDD8ED'";
                $trMouseOut = "this.style.background='white'";
                $tr         = '<tr onmouseover="' . $trMouseOv . '" onmouseout="' . $trMouseOut . '">
                 <td>' . $e['nombre'] . " " . $e['apellido'] . ' (' . $e['cedula'] . ')</td>
                 <td>' . $e['rol_inicio'] . '</td>
                 <td style="text-align: center">

               <a data-toggle="modal" data-target="#change-rolUser" href="javascript:void(0)"  style="font-size: 25px" class="mdi mdi-pencil" onclick="rolUserSelected(' . $function2 . ')"></a>
                        &nbsp;&nbsp;
                 <a data-toggle="modal" data-target="#permisos-ver" href="javascript:void(0)" style="font-size:25px;" class="mdi mdi-eye" onclick="chargePermisos(' . $function . ')"></a>
                                            </td>
                                        </tr>';
                echo $tr;
            }

        }
    }

    public function cambiarRegistrar()
    {
        $idPUM   = $_POST['idPUM'];
        $permiso = $_POST['permiso'];
        if ($permiso == 1) {
            $newPermiso = 0;
        } else {
            $newPermiso = 1;
        }
        $existente = $this->model->obtenerPermisoUsuario($idPUM);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $e) {
                if ($this->model->actualizarPermisos(
                    ['usuario'                   => $e['usuario'],
                        'modulo'                     => $e['modulo'],
                        'consultar'                  => $e['consultar'],
                        'registrar'                  => $newPermiso,
                        'modificar'                  => $e['modificar'],
                        'reportar'                   => $e['reportar'],
                        'eliminar'                   => $e['eliminar'],
                        'id_permisos_usuario_modulo' => $idPUM,
                    ]
                )) {
                    switch ($e['modulo']) {
                        case 1:
                            $_SESSION['moduloUsuarios']['registrar'] = $newPermiso;
                            break;
                        case 2:
                            $_SESSION['moduloSecciones']['registrar'] = $newPermiso;
                            break;
                        case 3:
                            $_SESSION['moduloDocentes']['registrar'] = $newPermiso;
                            break;
                        case 4:
                            $_SESSION['moduloAulas']['registrar'] = $newPermiso;
                            break;
                        case 5:
                            $_SESSION['moduloCohortes']['registrar'] = $newPermiso;
                            break;
                        case 6:
                            $_SESSION['moduloUC']['registrar'] = $newPermiso;
                            break;
                        case 7:
                            $_SESSION['moduloHorarios']['registrar'] = $newPermiso;
                            break;
                        case 8:
                            $_SESSION['moduloSeguridad']['registrar'] = $newPermiso;
                            break;
                        case 9:
                            $_SESSION['moduloReportes']['registrar'] = $newPermiso;
                            break;
                        case 10:
                            $_SESSION['moduloNecesidades']['registrar'] = $newPermiso;
                            break;

                        default:
                            # code...
                            break;
                    }
                    echo 1;
                }
            }
        }
    }

    public function cambiarConsultar()
    {
        $idPUM   = $_POST['idPUM'];
        $permiso = $_POST['permiso'];
        if ($permiso == 1) {
            $newPermiso = 0;
        } else {
            $newPermiso = 1;
        }
        $existente = $this->model->obtenerPermisoUsuario($idPUM);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $e) {
                if ($this->model->actualizarPermisos(
                    ['usuario'                   => $e['usuario'],
                        'modulo'                     => $e['modulo'],
                        'consultar'                  => $newPermiso,
                        'registrar'                  => $e['registrar'],
                        'modificar'                  => $e['modificar'],
                        'reportar'                   => $e['reportar'],
                        'eliminar'                   => $e['eliminar'],
                        'id_permisos_usuario_modulo' => $idPUM,
                    ]
                )) {
                    switch ($e['modulo']) {
                        case 1:
                            $_SESSION['moduloUsuarios']['consultar'] = $newPermiso;
                            break;
                        case 2:
                            $_SESSION['moduloSecciones']['consultar'] = $newPermiso;
                            break;
                        case 3:
                            $_SESSION['moduloDocentes']['consultar'] = $newPermiso;
                            break;
                        case 4:
                            $_SESSION['moduloAulas']['consultar'] = $newPermiso;
                            break;
                        case 5:
                            $_SESSION['moduloCohortes']['consultar'] = $newPermiso;
                            break;
                        case 6:
                            $_SESSION['moduloUC']['consultar'] = $newPermiso;
                            break;
                        case 7:
                            $_SESSION['moduloHorarios']['consultar'] = $newPermiso;
                            break;
                        case 8:
                            $_SESSION['moduloSeguridad']['consultar'] = $newPermiso;
                            break;
                        case 9:
                            $_SESSION['moduloReportes']['consultar'] = $newPermiso;
                            break;
                        case 10:
                            $_SESSION['moduloNecesidades']['consultar'] = $newPermiso;
                            break;

                        default:
                            # code...
                            break;
                    }
                    echo 1;
                }
            }
        }
    }

    public function cambiarRolUser()
    {
        $cedula      = $_POST['cedula'];
        $rol         = $_POST['rol'];
        $contrasenia = $_POST['contrasenia'];
        $existente   = $this->model->obtenerUser($cedula);
        $nuevoRol;

        foreach ($existente as $e) {
            if ($rol == 'sin cambios') {
                $nuevoRol = $e['rol_inicio'];
            } else {
                $nuevoRol = $rol;
            }

            if ($this->model->changeRol([
                'cedula'      => $e['cedula'],
                'nombre'      => $e['nombre'],
                'apellido'    => $e['apellido'],
                'fecha_n'     => $e['fecha_n'],
                'correo'      => $e['correo'],
                'contrasenia' => $contrasenia,
                'estado'      => $e['estado'],
                'rol_inicio'  => $nuevoRol,
            ])) {
                $existente = $this->model->obtenerPermisoUsuarioCedula($cedula);
                foreach ($existente as $e) {
                    switch ($rol) {
                        case 'Usuario':
                            switch ($e['modulo']) {
                                case 1:

                                    //usuarios//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '0',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '0',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoUsuarios = [
                                        'consultar' => '0',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '0',
                                    ];
                                    break;

                                case 2:

                                    //secciones//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoSecciones = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 3:

                                    //docentes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoDocentes = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 4:

                                    //aulas//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoAulas = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 5:

                                    //Cohortes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoCohortes = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 6:

                                    //unidades Curriculares//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoUC = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 7:

                                    //Horarios//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoHorarios = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 8:

                                    //Seguridad//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '0',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '0',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoSeguridad = [
                                        'consultar' => '0',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '0',
                                    ];
                                    break;

                                case 9:

                                    //Reportes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoReportes = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;
                                case 10:

                                    //Necesidades//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoNecesidades = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                default:
                                    # code...
                                    break;
                            }

                            break;
                        case 'Administrador':
                            switch ($e['modulo']) {
                                case 1:

                                    //usuarios//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '0',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '0',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoUsuarios = [
                                        'consultar' => '0',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '0',
                                    ];
                                    break;

                                case 2:

                                    //secciones//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoSecciones = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 3:

                                    //docentes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '1',
                                        'modificar'                  => '1',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '1',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoDocentes = [
                                        'consultar' => '1',
                                        'registrar' => '1',
                                        'modificar' => '1',
                                        'eliminar'  => '1',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 4:

                                    //aulas//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '1',
                                        'modificar'                  => '1',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '1',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);

                                    $permisoAulas = [
                                        'consultar' => '1',
                                        'registrar' => '1',
                                        'modificar' => '1',
                                        'eliminar'  => '1',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 5:

                                    //Cohortes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoCohortes = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 6:

                                    //unidades Curriculares//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoUC = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 7:

                                    //Horarios//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '1',
                                        'modificar'                  => '1',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '1',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoHorarios = [
                                        'consultar' => '1',
                                        'registrar' => '1',
                                        'modificar' => '1',
                                        'eliminar'  => '1',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                case 8:

                                    //Seguridad//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '0',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '0',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoSeguridad = [
                                        'consultar' => '0',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '0',
                                    ];
                                    break;

                                case 9:

                                    //Reportes//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '1',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoReportes = [
                                        'consultar' => '1',
                                        'registrar' => '1',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;
                                case 10:

                                    //Necesidades//

                                    $this->model->actualizarPermisos([
                                        'usuario'                    => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '0',
                                        'modificar'                  => '0',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '0',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]);
                                    $permisoNecesidades = [
                                        'consultar' => '1',
                                        'registrar' => '0',
                                        'modificar' => '0',
                                        'eliminar'  => '0',
                                        'reportar'  => '1',
                                    ];
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                            break;
                        case 'Super Usuario':
                            for ($i = 0; $i < count($existente); $i++) {
                                $this->model->actualizarPermisos(
                                    ['usuario'                   => $e['usuario'],
                                        'modulo'                     => $e['modulo'],
                                        'consultar'                  => '1',
                                        'registrar'                  => '1',
                                        'modificar'                  => '1',
                                        'reportar'                   => '1',
                                        'eliminar'                   => '1',
                                        'id_permisos_usuario_modulo' => $e['id_permisos_usuario_modulo'],
                                    ]
                                );

                            }

                            $permisoUsuarios = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoSecciones = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoDocentes = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoAulas = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoCohortes = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoUC = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoHorarios = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoReportes = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoNecesidades = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];

                            $permisoSeguridad = [
                                'consultar' => '1',
                                'registrar' => '1',
                                'modificar' => '1',
                                'eliminar'  => '1',
                                'reportar'  => '1',
                            ];
                            break;

                        default:
                            break;
                    }
                    $_SESSION['moduloUsuarios']    = $permisoUsuarios;
                    $_SESSION['moduloSecciones']   = $permisoSecciones;
                    $_SESSION['moduloDocentes']    = $permisoDocentes;
                    $_SESSION['moduloAulas']       = $permisoAulas;
                    $_SESSION['moduloCohortes']    = $permisoCohortes;
                    $_SESSION['moduloUC']          = $permisoUC;
                    $_SESSION['moduloHorarios']    = $permisoHorarios;
                    $_SESSION['moduloSeguridad']   = $permisoSeguridad;
                    $_SESSION['moduloReportes']    = $permisoReportes;
                    $_SESSION['moduloNecesidades'] = $permisoNecesidades;
                }

            }
        }
    }

    public function cambiarModificar()
    {
        $idPUM   = $_POST['idPUM'];
        $permiso = $_POST['permiso'];
        if ($permiso == 1) {
            $newPermiso = 0;
        } else {
            $newPermiso = 1;
        }
        $existente = $this->model->obtenerPermisoUsuario($idPUM);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $e) {
                if ($this->model->actualizarPermisos(
                    ['usuario'                   => $e['usuario'],
                        'modulo'                     => $e['modulo'],
                        'consultar'                  => $e['consultar'],
                        'registrar'                  => $e['registrar'],
                        'modificar'                  => $newPermiso,
                        'reportar'                   => $e['reportar'],
                        'eliminar'                   => $e['eliminar'],
                        'id_permisos_usuario_modulo' => $idPUM,
                    ]
                )) {
                    switch ($e['modulo']) {
                        case 1:
                            $_SESSION['moduloUsuarios']['modificar'] = $newPermiso;
                            break;
                        case 2:
                            $_SESSION['moduloSecciones']['modificar'] = $newPermiso;
                            break;
                        case 3:
                            $_SESSION['moduloDocentes']['modificar'] = $newPermiso;
                            break;
                        case 4:
                            $_SESSION['moduloAulas']['modificar'] = $newPermiso;
                            break;
                        case 5:
                            $_SESSION['moduloCohortes']['modificar'] = $newPermiso;
                            break;
                        case 6:
                            $_SESSION['moduloUC']['modificar'] = $newPermiso;
                            break;
                        case 7:
                            $_SESSION['moduloHorarios']['modificar'] = $newPermiso;
                            break;
                        case 8:
                            $_SESSION['moduloSeguridad']['modificar'] = $newPermiso;
                            break;
                        case 9:
                            $_SESSION['moduloReportes']['modificar'] = $newPermiso;
                            break;
                        case 10:
                            $_SESSION['moduloNecesidades']['modificar'] = $newPermiso;
                            break;

                        default:
                            # code...
                            break;
                    }
                    echo 1;
                }
            }
        }
    }

    public function cambiarReportar()
    {
        $idPUM   = $_POST['idPUM'];
        $permiso = $_POST['permiso'];
        if ($permiso == 1) {
            $newPermiso = 0;
        } else {
            $newPermiso = 1;
        }
        $existente = $this->model->obtenerPermisoUsuario($idPUM);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $e) {
                if ($this->model->actualizarPermisos(
                    ['usuario'                   => $e['usuario'],
                        'modulo'                     => $e['modulo'],
                        'consultar'                  => $e['consultar'],
                        'registrar'                  => $e['registrar'],
                        'modificar'                  => $e['modificar'],
                        'reportar'                   => $newPermiso,
                        'eliminar'                   => $e['eliminar'],
                        'id_permisos_usuario_modulo' => $idPUM,
                    ]
                )) {
                    switch ($e['modulo']) {
                        case 1:
                            $_SESSION['moduloUsuarios']['reportar'] = $newPermiso;
                            break;
                        case 2:
                            $_SESSION['moduloSecciones']['reportar'] = $newPermiso;
                            break;
                        case 3:
                            $_SESSION['moduloDocentes']['reportar'] = $newPermiso;
                            break;
                        case 4:
                            $_SESSION['moduloAulas']['reportar'] = $newPermiso;
                            break;
                        case 5:
                            $_SESSION['moduloCohortes']['reportar'] = $newPermiso;
                            break;
                        case 6:
                            $_SESSION['moduloUC']['reportar'] = $newPermiso;
                            break;
                        case 7:
                            $_SESSION['moduloHorarios']['reportar'] = $newPermiso;
                            break;
                        case 8:
                            $_SESSION['moduloSeguridad']['reportar'] = $newPermiso;
                            break;
                        case 9:
                            $_SESSION['moduloReportes']['reportar'] = $newPermiso;
                            break;
                        case 10:
                            $_SESSION['moduloNecesidades']['reportar'] = $newPermiso;
                            break;

                        default:
                            # code...
                            break;
                    }
                    echo 1;
                }
            }
        }
    }

    public function cambiarEliminar()
    {
        $idPUM   = $_POST['idPUM'];
        $permiso = $_POST['permiso'];
        if ($permiso == 1) {
            $newPermiso = 0;
        } else {
            $newPermiso = 1;
        }
        $existente = $this->model->obtenerPermisoUsuario($idPUM);
        if ($existente == "" || $existente == null) {} else {
            foreach ($existente as $e) {
                if ($this->model->actualizarPermisos(
                    ['usuario'                   => $e['usuario'],
                        'modulo'                     => $e['modulo'],
                        'consultar'                  => $e['consultar'],
                        'registrar'                  => $e['registrar'],
                        'modificar'                  => $e['modificar'],
                        'reportar'                   => $e['reportar'],
                        'eliminar'                   => $newPermiso,
                        'id_permisos_usuario_modulo' => $idPUM,
                    ]
                )) {
                    switch ($e['modulo']) {
                        case 1:
                            $_SESSION['moduloUsuarios']['eliminar'] = $newPermiso;
                            break;
                        case 2:
                            $_SESSION['moduloSecciones']['eliminar'] = $newPermiso;
                            break;
                        case 3:
                            $_SESSION['moduloDocentes']['eliminar'] = $newPermiso;
                            break;
                        case 4:
                            $_SESSION['moduloAulas']['eliminar'] = $newPermiso;
                            break;
                        case 5:
                            $_SESSION['moduloCohortes']['eliminar'] = $newPermiso;
                            break;
                        case 6:
                            $_SESSION['moduloUC']['eliminar'] = $newPermiso;
                            break;
                        case 7:
                            $_SESSION['moduloHorarios']['eliminar'] = $newPermiso;
                            break;
                        case 8:
                            $_SESSION['moduloSeguridad']['eliminar'] = $newPermiso;
                            break;
                        case 9:
                            $_SESSION['moduloReportes']['eliminar'] = $newPermiso;
                            break;
                        case 10:
                            $_SESSION['moduloNecesidades']['eliminar'] = $newPermiso;
                            break;

                        default:
                            # code...
                            break;
                    }
                    echo 1;
                }
            }
        }
    }

    public function obtenerPermisos()
    {
        $cedula    = $_POST['usuario'];
        $existente = $this->model->PermisosUserCedula($cedula);
        if ($existente == "" || $existente == null) {
            echo 0;
        } else {
            foreach ($existente as $e) {
                $modulo = '';
                switch ($e['modulo']) {
                    case 1:
                        $modulo = 'Usuarios';
                        break;

                    case 2:
                        $modulo = 'Secciones';
                        break;
                    case 3:
                        $modulo = 'Docentes';
                        break;
                    case 4:
                        $modulo = 'Aulas';
                        break;
                    case 5:
                        $modulo = 'Cohorte';
                        break;
                    case 6:
                        $modulo = 'UC';
                        break;
                    case 7:
                        $modulo = 'Horarios';
                        break;
                    case 8:
                        $modulo = 'Seguridad';
                        break;
                    case 9:
                        $modulo = 'Reportes';
                        break;
                    case 10:
                        $modulo = 'Necesidades';
                        break;
                    default:
                        # code...
                        break;
                }

                $onmouseOverRed   = "this.style.color='#6B1212'";
                $onmouseOutRed    = "this.style.color='#C83535' ";
                $onmouseOverGreen = "this.style.color='#255E0D'";
                $onmouseOutGreen  = "this.style.color='#6BD249' ";

                if ($e['registrar'] != 1) {
                    $registrar = '<a title="Otorgar permiso"  class="mdi mdi-plus-circle" style="font-size: 30px; color:#C83535; " onmouseover="' . $onmouseOverRed . '" onmouseout="' . $onmouseOutRed . '"></a>';
                } else {
                    $registrar = '<a title="Quitar permiso"  class="mdi mdi-minus-circle" style="font-size: 30px; color:#6BD249; " onmouseover="' . $onmouseOverGreen . '" onmouseout="' . $onmouseOutGreen . '"></a>';
                }

                if ($e['consultar'] != 1) {
                    $consultar = '<a title="Otorgar permiso"  class="mdi mdi-plus-circle" style="font-size: 30px; color:#C83535; " onmouseover="' . $onmouseOverRed . '" onmouseout="' . $onmouseOutRed . '"></a>';
                } else {
                    $consultar = '<a title="Quitar permiso"  class="mdi mdi-minus-circle" style="font-size: 30px; color:#6BD249; " onmouseover="' . $onmouseOverGreen . '" onmouseout="' . $onmouseOutGreen . '"></a>';
                }

                if ($e['modificar'] != 1) {
                    $modificar = '<a title="Otorgar permiso"  class="mdi mdi-plus-circle" style="font-size: 30px; color:#C83535; " onmouseover="' . $onmouseOverRed . '" onmouseout="' . $onmouseOutRed . '"></a>';
                } else {
                    $modificar = '<a title="Quitar permiso"  class="mdi mdi-minus-circle" style="font-size: 30px; color:#6BD249; " onmouseover="' . $onmouseOverGreen . '" onmouseout="' . $onmouseOutGreen . '"></a>';
                }

                if ($e['reportar'] != 1) {
                    $reportar = '<a title="Otorgar permiso"  class="mdi mdi-plus-circle" style="font-size: 30px; color:#C83535; " onmouseover="' . $onmouseOverRed . '" onmouseout="' . $onmouseOutRed . '"></a>';
                } else {
                    $reportar = '<a title="Quitar permiso"  class="mdi mdi-minus-circle" style="font-size: 30px; color:#6BD249; " onmouseover="' . $onmouseOverGreen . '" onmouseout="' . $onmouseOutGreen . '"></a>';
                }

                if ($e['eliminar'] != 1) {
                    $eliminar = '<a title="Otorgar permiso"  class="mdi mdi-plus-circle" style="font-size: 30px; color:#C83535; " onmouseover="' . $onmouseOverRed . '" onmouseout="' . $onmouseOutRed . '"></a>';
                } else {
                    $eliminar = '<a title="Quitar permiso"  class="mdi mdi-minus-circle" style="font-size: 30px; color:#6BD249; " onmouseover="' . $onmouseOverGreen . '" onmouseout="' . $onmouseOutGreen . '"></a>';
                }

                $tr = '<tr><td style="text-align:center">' . $modulo . '</td><td style="text-align:center"><div style="cursor:pointer" onclick="cambiarRegistrar(' . $e['registrar'] . ',' . $e['id_permisos_usuario_modulo'] . ',' . $cedula . ')">' . $registrar . '</div></td><td style="text-align:center"><div style="cursor:pointer" onclick="cambiarConsultar(' . $e['consultar'] . ',' . $e['id_permisos_usuario_modulo'] . ',' . $cedula . ')">' . $consultar . '</div></td><td style="text-align:center"><div style="cursor:pointer" onclick="cambiarModificar(' . $e['modificar'] . ',' . $e['id_permisos_usuario_modulo'] . ',' . $cedula . ')">' . $modificar . '</div></td><td style="text-align:center"><div style="cursor:pointer" onclick="cambiarReportar(' . $e['reportar'] . ',' . $e['id_permisos_usuario_modulo'] . ',' . $cedula . ')">' . $reportar . '</div></td><td style="text-align:center"><div style="cursor:pointer" onclick="cambiarEliminar(' . $e['eliminar'] . ',' . $e['id_permisos_usuario_modulo'] . ',' . $cedula . ')">' . $eliminar . '</div></td></tr><br>';
                echo $tr;

            }
        }
    }

}
?>