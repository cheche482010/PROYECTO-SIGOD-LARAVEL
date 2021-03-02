<?php

class Cohorte_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO cohortes (numero_cohorte, fecha_cohorte, descripcion_cohorte) VALUES (:numero_cohorte, :fecha_cohorte, :descripcion_cohorte)');

            $datos->execute([
                'numero_cohorte'      => $data['numero_cohorte'],
                'fecha_cohorte'       => $data['fecha_cohorte'],
                'descripcion_cohorte' => $data['descripcion_cohorte'],
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function RegistrarCohorteUc($data)
    {

        try {

            $datos = $this->conexion->prepare('INSERT INTO unidades_curriculares_cohortes (id_unidad_curricular, id_cohorte, codigo_unidad,hora_unidad) VALUES(:id_unidad_curricular,:id_cohorte,:codigo_unidad,:hora_unidad)');

            $datos->execute([
                'id_unidad_curricular' => $data['unidad'],
                'id_cohorte'           => $data['cohorte'],
                'codigo_unidad'        => $data['codigo'],
                'hora_unidad'          => $data['horas'],
            ]);

            return true;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function BusquedaCohorte($id)
    {

        $tabla            = "SELECT * FROM cohortes WHERE id_cohorte=$id";
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

    public function idCohorte()
    {
        $tabla            = "SELECT MAX(id_cohorte) FROM cohortes ";
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

    public function Desactivar_cohorte($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE cohortes SET numero_cohorte=:numero_cohorte, fecha_cohorte=:fecha_cohorte, descripcion_cohorte=:descripcion_cohorte, activo=:activo WHERE id_cohorte =:id_cohorte");

            $query->execute([
                'id_cohorte'          => $data['id_cohorte'],
                'numero_cohorte'      => $data['numero_cohorte'],
                'fecha_cohorte'       => $data['fecha_cohorte'],
                'descripcion_cohorte' => $data['descripcion_cohorte'],
                'activo'              => $data['activo'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Activar_cohorte($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE cohortes SET numero_cohorte=:numero_cohorte, fecha_cohorte=:fecha_cohorte, descripcion_cohorte=:descripcion_cohorte, activo=:activo WHERE id_cohorte =:id_cohorte");

            $query->execute([
                'id_cohorte'          => $data['id_cohorte'],
                'numero_cohorte'      => $data['numero_cohorte'],
                'fecha_cohorte'       => $data['fecha_cohorte'],
                'descripcion_cohorte' => $data['descripcion_cohorte'],
                'activo'              => $data['activo'],
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Cohortes()
    {

        $tabla            = "SELECT * FROM cohortes ORDER BY numero_cohorte ASC";
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

    public function UnidadesCurriculares()
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

    public function BusquedaDinamica($clave)
    {
        $tabla            = "SELECT * FROM cohortes WHERE numero_cohorte LIKE  '$clave%' OR descripcion_cohorte LIKE  '$clave%'  ORDER BY numero_cohorte ASC ";
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

}
?> 