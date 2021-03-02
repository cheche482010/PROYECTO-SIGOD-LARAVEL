<?php

class Disponibilidad_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO disponilidades (nombre_disponibilidad, turno, dia_disponibilidad) VALUES (:nombre_disponibilidad, :turno, :dia_disponibilidad)');

            $datos->execute([
                'nombre_disponibilidad' => $data['nombre_disponibilidad'],
                'turno'                 => $data['turno'],
                'dia_disponibilidad'    => $data['dia_disponibilidad'],
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function Disponilidades()
    {

        $tabla            = "SELECT * FROM disponilidades ORDER BY id_disponilidad ASC";
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

    public function Eliminar_Disponibilidad($id_disponilidad)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM disponilidades WHERE id_disponilidad = :id_disponilidad');
            $query->execute(['id_disponilidad' => $id_disponilidad]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE disponilidades SET nombre_disponibilidad = :nombre_disponibilidad, turno = :turno, dia_disponibilidad = :dia_disponibilidad WHERE id_disponilidad =:id_disponilidad");

            $datos->execute([
                'nombre_disponibilidad' => $data['nombre_disponibilidad'],
                'turno'                 => $data['turno'],
                'dia_disponibilidad'    => $data['dia_disponibilidad'],
                'id_disponilidad'       => $data['id_disponilidad'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

}
?>