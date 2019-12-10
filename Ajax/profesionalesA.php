<?php
require_once "../Controladores/profesionalesC.php";
require_once "../Modelos/profesionalesM.php";

class ProfesionalesA{

    public $Pid;

    public function EditarProfesionalA(){

        $columna = "id";
        $valor = $this->Pid;

        $resultado = ProfesionalesC::ProfesionalC($columna, $valor);

        echo json_encode($resultado);

    }
}

if (isset($_POST["Pid"])) {

    $eP = new ProfesionalesA();
    $eP -> Pid = $_POST["Pid"];
    $eP -> EditarProfesionalA();
    # code...
}