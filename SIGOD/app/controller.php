<?php

class Controlador
{

    public function __construct()
    {
        $this->vista = new Vista();
    }

    public function Cargar_Modelo($model)
    {
        $url = 'modelo/' . $model . '_class.php';
        $bitacora = 'modelo/bitacora_class.php';
        

        if (file_exists($url) && file_exists($bitacora)) {
            require $url;   require $bitacora;

            $modelName   = $model . '_Class';
            $this->model = new $modelName();

            $modelName2   = 'Bitacora_Class';
            $this->Bitacora = new $modelName2();

        }
    }

    public function Seguridad_de_Session()
    {
        @session_start();
        $var = $_SESSION['cedula']; 
        if ($var == null || $var == '') {
            session_start();
            session_destroy();
            $this->vista->Cargar_Vistas('login/index'); 
            die();
        }
    }

    public function Obtener_Ip_Usuario()
    {
        $direccion_IP = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $direccion_IP = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $direccion_IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $direccion_IP = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $direccion_IP = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $direccion_IP = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $direccion_IP = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $direccion_IP = $_SERVER['REMOTE_ADDR'];
        } else {
            $direccion_IP = 'DESCONOCIDA';
        }

        return $direccion_IP;
    }


    
}
?>