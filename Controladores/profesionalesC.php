<?php

class ProfesionalesC{

    //Crear Profesionales
    public function CrearProfesionalC(){

        if (isset($_POST["rolP"])) {
            
            $tablaBD = "tbl_profesionales";

            $datosC = array("rol"               =>$_POST["rolP"]
                            , "apellido"        =>$_POST["apellido"]
                            , "nombre"          =>$_POST["nombre"]
                            , "sexo"            =>$_POST["sexo"]
                            , "id_especialidad" =>$_POST["especialidad"]
                            , "usuario"         =>$_POST["usuario"]
                            , "clave"           =>$_POST["clave"]);

            $resultado = ProfesionalesM::CrearProfesionalM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "profesionales";
                </script>';
                # code...
            }
        }


    }

    //Mostrar Profesionales

    static public function VerProfesionalesC($columna, $valor){

        $tablaBD = "tbl_profesionales";

        $resultado = ProfesionalesM::VerProfesionalesM($tablaBD, $columna, $valor);

        return $resultado;
    }

    //Editar Profesional
    static public function ProfesionalC($columna, $valor){

        $tablaBD = "tbl_profesionales";

        $resultado = ProfesionalesM::ProfesionalM($tablaBD, $columna, $valor);

        return $resultado;
    }

    //Actualizar Profesional
    static public function ActualizarProfesionalC(){

        if (isset($_POST["Pid"])) {
            
            $tablaBD="tbl_profesionales";

            $datosC = array("id"=>$_POST["Pid"]
                            ,"apellido"=>$_POST["apellidoEditar"]
                            ,"nombre"=>$_POST["nombreEditar"]
                            ,"sexo"=>$_POST["sexoEditar"]
                            ,"usuario"=>$_POST["usuarioEditar"]
                            ,"clave"=>$_POST["claveEditar"]);

            $resultado = ProfesionalesM::ActualizarProfesionalM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "profesionales";
                </script>';
                # code...
            }
        }
    }

    //Borrar Profesional
    public function BorrarProfesionalC(){

        if (isset($_GET["Pid"])) {

            $tablaBD = "tbl_profesionales";

            $id = $_GET["Pid"];

            if ($_GET["imgP"] != "") {

                unlink($_GET["imgP"]);
                # code...
            }

            $resultado = ProfesionalesM::BorrarProfesionalM($tablaBD, $id);

            if ($resultado == true) {

                echo '<script>
                    window.location = "profesionales";
                </script>';
                # code...
            }
        }
    }

}

