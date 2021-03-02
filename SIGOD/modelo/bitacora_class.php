<?php

class Bitacora_Class extends Modelo
{

    private $id_bitacora;
    private $cedula;
    private $fecha;
    private $dia;
    private $hora_inicio;
    private $acciones;
    private $hora_salida; 

    public function __construct() 
    {
        parent::__construct();
    }
    public function set_Inicio_Sesion($cedula, $fecha, $dia, $hora_inicio, $acciones, $hora_salida)
    {

        $this->cedula       = $cedula;
        $this->fecha        = $fecha;
        $this->dia          = $dia;
        $this->hora_inicio  = $hora_inicio;
        $this->acciones     = $acciones;
        $this->hora_salida  = $hora_salida; 
    }

    public function Consultar_ID_Bitacora() 
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

    public function Registro_De_Inicio($data)
    { 

        $sql     = 'INSERT INTO bitacoras (cedula, fecha, dia, hora_inicio, acciones, hora_salida) VALUES (:cedula, :fecha, :dia, :hora_inicio, :acciones, :hora_salida)'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'cedula'          => $data['cedula'],
                'fecha'           => $data['fecha'],
                'dia'             => $data['dia'],
                'hora_inicio'     => $data['hora_inicio'],
                'acciones'        => $data['acciones'],
                'hora_salida'     => $data['hora_salida'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }

    public function Registro_De_Salida($data)
    { 

        $sql     = 'UPDATE bitacoras SET hora_salida =:hora_salida WHERE id_bitacora = :id_bitacora'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'hora_salida'     => $data['hora_salida'],
                'id_bitacora'     => $data['id_bitacora'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }

}
?>