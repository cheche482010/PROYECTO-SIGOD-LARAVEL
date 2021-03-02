<?php

class Unidad_Class extends Modelo
{

    private $trayecto;
    private $nombre;

    public function setunidad($trayecto, $nombre)
    {
        $this->trayecto = $trayecto;
        $this->nombre   = $nombre;

    }
    public function getTracyecto()
    {
        return $this->trayecto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function Trayecto()
    {

        $tabla            = "SELECT * FROM trayectos ORDER BY id_trayecto ASC";
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

    public function Ejes()
    {

        $tabla            = "SELECT * FROM ejes_formacion ORDER BY id_eje_formacion ASC";
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
        $tabla            = "SELECT * FROM unidades_curriculares WHERE nombre_unidad LIKE  '$clave%' OR trayecto LIKE  '$clave%'  ORDER BY nombre_unidad ASC ";
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

    public function Registrar($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO unidades_curriculares (nombre_unidad, trayecto, fase,  id_eje_formacion) VALUES (:nombre_unidad, :trayecto, :fase,:id_eje_formacion)
                ');

            $datos->execute([
                'nombre_unidad'    => $data['nombre_unidad'],
                'trayecto'         => $data['trayecto'],
                'fase'             => $data['fase'],
                'id_eje_formacion' => $data['id_eje_formacion'],
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function Unidades()
    {

        $tabla            = "SELECT * FROM unidades_curriculares ORDER BY nombre_unidad ASC";
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

    public function Eliminar_unidad($idunidad)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM unidades_curriculares WHERE id_unidad_curricular = :id_unidad_curricular');
            $query->execute(['id_unidad_curricular' => $idunidad]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE unidades_curriculares SET nombre_unidad=:nombre_unidad, trayecto=:trayecto,fase=:fase, id_eje_formacion=:id_eje_formacion WHERE id_unidad_curricular =:id_unidad_curricular");

            $query->execute([
                'nombre_unidad'        => $data['nombre'],
                'trayecto'             => $data['trayecto'],
                'fase'                 => $data['fase'],
                'id_eje_formacion'     => $data['eje'],
                'id_unidad_curricular' => $data['idUnid'],

            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

}

?>