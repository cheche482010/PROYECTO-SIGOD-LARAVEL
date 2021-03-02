<?php

class Necesidad_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO necesidades (periodo, nombre_aula) VALUES (:periodo, :descripcion');

            $datos->execute([
                'periodo'     => $data['periodo'],
                'descripcion' => $data['descripcion'],
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function Necesidades()
    {

        $tabla            = "SELECT * FROM necesidades ORDER BY periodo ASC";
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

    public function Eliminar_Necesidad($id_necesidad)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM necesidades WHERE id_necesidad = :id_necesidad');
            $query->execute(['id_necesidad' => $id_necesidad]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE necesidades SET periodo=:periodo, descripcion=:descripcion WHERE id_necesidad =:id_necesidad");

            $datos->execute([
                'periodo'      => $data['periodo'],
                'descripcion'  => $data['descripcion'],
                'id_necesidad' => $data['id_necesidad'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

}
?>