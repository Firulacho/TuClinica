<?php
require_once "../Controladores/pacientesC.php";
require_once "../Modelos/pacientesM.php";

class PacientesA{

    public $PAid;

    public function EditarPacienteA(){

        $columna = "id";
        $valor = $this->PAid;

        $resultado = PacientesC::VerPacientesC($columna, $valor);

        echo json_encode($resultado);

    }

    public $Norepetir;

	public function NoRepetirUsuarioA(){

		$columna = "usuario";
		$valor = $this->Norepetir;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);

	}
}

if (isset($_POST["PAid"])) {

    $ePA = new PacientesA();
    $ePA -> PAid = $_POST["PAid"];
    $ePA -> EditarPacienteA();
    # code...
}

if(isset($_POST["Norepetir"])){

	$noRepetirU = new PacientesA();
	$noRepetirU -> Norepetir = $_POST["Norepetir"];
	$noRepetirU -> NoRepetirUsuarioA();

}