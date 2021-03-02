<?php

class Usuario_Class extends Modelo
{

    private $nombre;
    private $apellido;
    private $cedula;
    private $correo;
    private $contrasenia;

    private $preguntaseguridad;
    private $estado;
    private $rol_inicio;

    public function setFormulario($nombre, $apellido, $cedula, $correo, $contrasenia, $estado, $rol_inicio)
    {

        $this->nombre      = $nombre;
        $this->apellido    = $apellido;
        $this->cedula      = $cedula;
        $this->correo      = $correo;
        $this->contrasenia = $contrasenia;
        $this->estado      = $estado;
        $this->rol_inicio  = $rol_inicio;

    }

    public function setFormularioS($nombre, $apellido, $cedula, $correo, $contrasenia)
    {
        $this->nombre      = $nombre;
        $this->apellido    = $apellido;
        $this->cedula      = $cedula;
        $this->correo      = $correo;
        $this->contrasenia = $contrasenia;

    }
    public function getFoto()
    {
        return $this->foto;}

    public function getNombre()
    {
        return $this->nombre;}

    public function getApellido()
    {
        return $this->apellido;}

    public function getCedula()
    {
        return $this->cedula;}

    public function getcorreo()
    {
        return $this->correo;}

    public function getContrasenia()
    {
        return $this->contrasenia;}

    public function getTipousuario()
    {
        return $this->tipousuario;}

    public function getSeguridad()
    {
        return $this->preguntaseguridad;}

    public function getEstado()
    {
        return $this->estado;}

    public function getRolInicio()
    {
        return $this - rol_inicio;}

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO usuarios (cedula, nombre, apellido, fecha_n, correo, contrasenia,estado,rol_inicio) VALUES (:cedula, :nombre, :apellido, :fecha_n, :correo, :contrasenia,:estado,:rol_inicio)');

            $datos->execute([
                'cedula'      => $data['cedula'],
                'nombre'      => $data['nombre'],
                'apellido'    => $data['apellido'],
                'fecha_n'     => $data['fecha_n'],
                'correo'      => $data['correo'],
                'contrasenia' => $data['contrasenia'],
                'estado'      => $data['estado'],
                'rol_inicio'  => $data['rol_inicio'],
                //   'status_usuario'=> $data['status_usuario']
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function Usuarios()
    {

        $tabla            = "SELECT * FROM usuarios ORDER BY nombre ASC";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function UsuariosBusqueda($ced)
    {

        $tabla            = "SELECT * FROM usuarios WHERE cedula=$ced";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function BusquedaDinamica($clave)
    {
        $tabla            = "SELECT * FROM usuarios WHERE cedula LIKE  '$clave%' OR nombre LIKE  '$clave%' OR apellido LIKE  '$clave%' ORDER BY nombre ASC ";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function Eliminar_usuario($cedula)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM usuarios WHERE cedula = :cedula');
            $query->execute(['cedula' => $cedula]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }
    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE usuarios SET
                nombre     =   :nombre,
                apellido =   :apellido,
                fecha_n =   :fecha_n,
                correo =   :correo,
                contrasenia =   :contrasenia,
                estado =   :estado,
                rol_inicio = :rol_inicio

                WHERE cedula =:cedula"
            );

            $query->execute([
                'cedula'      => $data['cedula'],
                'nombre'      => $data['nombre'],
                'apellido'    => $data['apellido'],
                'fecha_n'     => $data['fecha_n'],
                'correo'      => $data['correo'],
                'contrasenia' => $data['contrasenia'],
                'estado'      => $data['estado'],
                'rol_inicio'  => $data['rol_inicio'],

            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    //--------------PERMISOS DE USUARIO------------------//

    public function RegistrarPermisos($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO permisos_usuario_modulo (usuario, modulo,  consultar,registrar,modificar,reportar,eliminar) VALUES (:usuario, :modulo,  :consultar, :registrar, :modificar, :reportar, :eliminar)');

            switch ($data['rol']) {
                case "Super Usuario":
                    for ($i = 1; $i < 11; $i++) {
                        $datos->execute([
                            'usuario'   => $data['usuario'],
                            'modulo'    => $i,
                            'consultar' => '1',
                            'registrar' => '1',
                            'modificar' => '1',
                            'reportar'  => '1',
                            'eliminar'  => '1',
                        ]);
                    }
                    break;

                case "Administrador":
                    for ($i = 1; $i < 11; $i++) {
                        switch ($i) {
                            case 1:

                                //usuarios//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '0',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '0',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 2:

                                //secciones//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 3:

                                //docentes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '1',
                                    'modificar' => '1',
                                    'reportar'  => '1',
                                    'eliminar'  => '1',
                                ]);
                                break;

                            case 4:

                                //aulas//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '1',
                                    'modificar' => '1',
                                    'reportar'  => '1',
                                    'eliminar'  => '1',
                                ]);
                                break;

                            case 5:

                                //Cohortes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 6:

                                //unidades Curriculares//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 7:

                                //Horarios//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '1',
                                    'modificar' => '1',
                                    'reportar'  => '1',
                                    'eliminar'  => '1',
                                ]);
                                break;

                            case 8:

                                //Seguridad//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '0',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '0',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 9:

                                //Reportes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '1',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;
                            case 10:

                                //Necesidades//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            default:
                                # code...
                                break;
                        }
                    }

                    break;

                case "Usuario":
                    for ($i = 1; $i < 11; $i++) {
                        switch ($i) {
                            case 1:

                                //usuarios//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,

                                    'consultar' => '0',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '0',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 2:

                                //secciones//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 3:

                                //docentes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 4:

                                //aulas//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 5:

                                //Cohortes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 6:

                                //unidades Curriculares//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 7:

                                //Horarios//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 8:

                                //Seguridad//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '0',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '0',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            case 9:

                                //Reportes//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;
                            case 10:

                                //Necesidades//

                                $datos->execute([
                                    'usuario'   => $data['usuario'],
                                    'modulo'    => $i,
                                    'consultar' => '1',
                                    'registrar' => '0',
                                    'modificar' => '0',
                                    'reportar'  => '1',
                                    'eliminar'  => '0',
                                ]);
                                break;

                            default:
                                # code...
                                break;
                        }
                    }

                    break;

            }

            return true;

        } catch (PDOException $e) {
            return false;
        }

    }

    public function Permisos()
    {

        $tabla            = "SELECT * FROM permisos_usuario_modulo ORDER BY id_permisos_usuario_modulo ASC";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function PermisosBusqueda($ced)
    {

        $tabla            = "SELECT * FROM permisos_usuario_modulo WHERE usuario=$ced";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function Eliminar_permisos($usuario)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM permisos_usuario_modulo WHERE usuario = :usuario');
            $query->execute(['usuario' => $param]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public function ActualizarPermisos($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE permisos_usuario_modulo SET
                usuario      =   :usuario,
                modulo       =   :modulo,
                ver          =   :ver,
                consultar    =   :consultar,
                registrar    =   :registrar,
                modificar    =   :modificar,
                reportar     =   :reportar,
                eliminar     =   :eliminar,

                WHERE usuario =:usuario"
            );

            $datos->execute([
                'usuario'   => $data['usuario'],
                'modulo'    => $data['modulo'],
                'ver'       => $data['ver'],
                'consultar' => $data['consultar'],
                'registrar' => $data['registrar'],
                'modificar' => $data['modificar'],
                'reportar'  => $data['reportar'],
                'eliminar'  => $data['eliminar'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }
}
?>