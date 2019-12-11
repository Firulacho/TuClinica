<?php

class CitasC{

    //Pedir cita paciente
    public function EnviarCitaC(){

        if(isset($_POST["Pid"])){

            $tablaBD = "tbl_citas";

            $Pid = substr($_GET["url"], 12);

            $datosC = array("Pid"=>$_POST["Pid"]
                            ,"PAid"=>$_POST["PAid"]
                            ,"nyaC"=>$_POST["nyaC"]
                            ,"Cid"=>$_POST["Cid"]
                            ,"rutC"=>$_POST["rutC"]
                            ,"fyhIC"=>$_POST["fyhIC"]
                            ,"fyhFC"=>$_POST["fyhFC"]);

            $resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "Profesional/"'.$Pid.';
                </script>';
                # code...
            }
        }
    }

    //Mostrar Citas
    public function VerCitasC(){

        $tablaBD = "tbl_citas";

        $resultado = CitasM::VerCitasM($tablaBD);

        return $resultado;
    }
}