<?php

class Seguridad_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }
    public function Consultar_Bitacora() 
    {

        $tabla = "SELECT * FROM bitacoras";

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
    public function permisosUser()
    {

        $tabla            = "SELECT DISTINCT PUM.usuario,U.* from permisos_usuario_modulo PUM, usuarios U WHERE PUM.usuario = U.cedula";
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
        $tabla            = "SELECT DISTINCT PUM.usuario,U.* from permisos_usuario_modulo PUM, usuarios U WHERE U.nombre LIKE '$clave%' AND PUM.usuario = U.cedula OR U.apellido LIKE '$clave%' AND PUM.usuario = U.cedula OR U.cedula LIKE '$clave%' AND PUM.usuario = U.cedula ";
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

    public function PermisosUserCedula($usuario)
    {

        $tabla            = "SELECT  * from permisos_usuario_modulo WHERE usuario=$usuario";
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

    public function obtenerPermisoUsuario($idPUM)
    {

        $tabla            = "SELECT  * from permisos_usuario_modulo WHERE id_permisos_usuario_modulo=$idPUM";
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

    public function obtenerPermisoUsuarioCedula($cedula)
    {

        $tabla            = "SELECT  * from permisos_usuario_modulo WHERE usuario=$cedula";
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

    public function obtenerUser($cedula)
    {

        $tabla            = "SELECT  * from usuarios WHERE cedula=$cedula";
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

    public function changeRol($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE usuarios SET
                nombre      =   :nombre,
                apellido    =   :apellido,
                fecha_n     =   :fecha_n,
                correo      =   :correo,
                contrasenia =   :contrasenia,
                estado      =   :estado,
                rol_inicio  = :rol_inicio

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

    public function actualizarPermisos($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE permisos_usuario_modulo SET
                usuario     =   :usuario,
                modulo      =   :modulo,
                consultar   =   :consultar,
                registrar   =   :registrar,
                modificar   =   :modificar,
                reportar    =   :reportar,
                eliminar    =   :eliminar

                WHERE id_permisos_usuario_modulo =:id_permisos_usuario_modulo"
            );

            $query->execute([
                'usuario'                    => $data['usuario'],
                'modulo'                     => $data['modulo'],
                'consultar'                  => $data['consultar'],
                'registrar'                  => $data['registrar'],
                'modificar'                  => $data['modificar'],
                'reportar'                   => $data['reportar'],
                'eliminar'                   => $data['eliminar'],
                'id_permisos_usuario_modulo' => $data['id_permisos_usuario_modulo'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

}
?>