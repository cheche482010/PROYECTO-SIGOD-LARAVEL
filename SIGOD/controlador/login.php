<?php

require_once 'vista/private/securimage/securimage.php';

class Login extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    }

    public function Cargar_Vistas()
    {

        $this->vista->Cargar_Vistas('login/index');
    }

    public function Ingresar()
    {   
        if (isset($_POST['cedula']) && $_POST['password'] !== "" && $_POST['captcha'] !== "") {

            session_start();

            $cedula          = ($_POST['cedula'] !== "") ? $_POST['cedula'] : null;
            $contrasenia     = ($_POST['password'] !== "") ? $_POST['password'] : null;
            $captcha         = $_POST['captcha'];
            $session_captcha = $_SESSION["captcha"];

            $fecha       = date("Y") . "-" . date("m") . "-" . date("d");
            $hora_inicio = date("h") . ":" . date("i") . ":" . date("s") . " " . date("A");

            switch (date("l")) {
                case "Monday":$dia = "Lunes";
                    break;
                case "Thuesday":$dia = "Martes";
                    break;
                case "Wednesday":$dia = "Miercoles";
                    break;
                case "Thursday":$dia = "Jueves";
                    break;
                case "Friday":$dia = "Viernes";
                    break;
                case "Saturday":$dia = "Sábado";
                    break;
                default:$dia = "Domingo";
                    break;
            }

            $acciones    = "Inicio Sesion";
            $hora_salida = "Usuario Posee La Sesion Abierta.";

            $datos = $this->model->datosUsuario();
            
            $securimage = new Securimage();
            
            foreach ($datos as $tabla_usuario) {
                if ($tabla_usuario['cedula'] == $cedula && $tabla_usuario['contrasenia'] == $contrasenia) {
                    if ($securimage->check($captcha) == true) {
                        if ($this->Bitacora->Registro_De_Inicio(
                            [
                                'cedula'      => $cedula,
                                'fecha'       => $fecha,
                                'dia'         => $dia,
                                'hora_inicio' => $hora_inicio,
                                'acciones'    => $acciones,
                                'hora_salida' => $hora_salida,
                            ]
                        )) {
                            echo '';

                        } else {
                            echo '';
                        }

                        $_SESSION['nombre']     = $tabla_usuario['nombre'];
                        $_SESSION['apellido']   = $tabla_usuario['apellido'];
                        $_SESSION['fecha_n']    = $tabla_usuario['fecha_n'];
                        $_SESSION['correo']     = $tabla_usuario['correo'];
                        $_SESSION['estado']     = $tabla_usuario['estado'];
                        $_SESSION['rol_inicio'] = $tabla_usuario['rol_inicio'];

                         $this->vista->Cargar_Vistas('inicio/index');

                    } else {
                        $this->vista->mensaje = "Captcha Inconrrecto, Inntente de Nuevo.";
                        session_start();
                        session_destroy();
                         $this->vista->Cargar_Vistas('login/index');
                    }

                }
            }

        } else {
            $this->vista->mensaje = "El Captcha NO Puede Estar Vacio, Inntente de Nuevo.";
            session_start();
            session_destroy();
            $this->vista->Cargar_Vistas('login/index');
        }

    }

    public function Salir()
    {

        session_start();
        session_destroy();

        $hora_salida = date("h") . ":" . date("i") . ":" . date("s") . " " . date("A");

        foreach ($this->Bitacora->Consultar_ID_Bitacora() as $key => $value) {
            $id_bitacora = $value['id_bitacora'];
        }

        if ($this->Bitacora->Registro_De_Salida(
            [
                'hora_salida' => $hora_salida,
                'id_bitacora' => $id_bitacora,
            ]
        )) {
            echo '';
        } else {
            echo '';
        }

        $this->vista->Cargar_Vistas('login/index');

    }

    public function Verificar_Usuario($cedula, $contrasenia)
    {

        if ($this->model->Usuario_Existe($cedula, $contrasenia)) {
            echo 'correcto';
            $this->set_Usuario_Actual($_POST['cedula'], $_POST['password']);
            return true;
        } else {
            $this->mensaje = 'Datos incorrectos.';
            header('location:' . constant('URL') . "login/");
            return false;
        }
    }

    public function set_Usuario_Actual($cedula, $contrasenia)
    {
        $_SESSION['cedula']      = $cedula;
        $_SESSION['contrasenia'] = $contrasenia;

    }

}
?>