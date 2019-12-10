<?php

class PacientesC{

    //Crear Pacientes
    public function CrearPacienteC(){

        if (isset($_POST["rolPA"])) {

            $tablaBD = "tbl_pacientes";

            $datosC = array("apellido"=>$_POST["apellido"]
                            ,"nombre"=>$_POST["nombre"]
                            ,"rut"=>$_POST["rut"]
                            ,"usuario"=>$_POST["usuario"]
                            ,"clave"=>$_POST["clave"]
                            ,"nombre"=>$_POST["nombre"]
                            ,"rol"=>$_POST["rolPA"]);

            $resultado = PacientesM::CrearPacienteM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "pacientes";
                </script>';
                # code...
            }
            # code...
        }

    }

    //Ver Pacientes
    static public function VerPacientesC($columna, $valor){

        $tablaBD = "tbl_pacientes";

        $resultado = PacientesM::VerPacientesM($tablaBD, $columna, $valor);

        return $resultado;
    }

    //Borrar Pacientes
    public function BorrarPacienteC(){

        if(isset($_GET["PAid"])){

            $tablaBD = "tbl_pacientes";

            $id = $_GET["PAid"];

            if ($_GET["imgPA"] != "") {

                unlink($_GET["imgPA"]);
                
            }

            $resultado = PacientesM::BorrarPacienteM($tablaBD, $id);

            if ($resultado == true) {

                echo '<script>
                    window.location = "pacientes";
                </script>';
                # code...
            }
        }
    }

    //Actualizar Pacientes

    public function ActualizarPacienteC(){

        if (isset($_POST["PAid"])) {

            $tablaBD = "tbl_pacientes";

            $datosC = array("id"        =>$_POST["PAid"]
                            ,"apellido" =>$_POST["apellidoEditar"]
                            ,"nombre"   =>$_POST["nombreEditar"]
                            ,"rut"      =>$_POST["rutEditar"]
                            ,"usuario"  =>$_POST["usuarioEditar"]
                            ,"clave"    =>$_POST["claveEditar"]);
            # code...
            $resultado = PacientesM::ActualizarPacienteM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "pacientes";
                </script>';
                # code...
            }
        }

    }
    
}
