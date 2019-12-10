<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/recepcionistasC.php";
require_once "Modelos/recepcionistasM.php";

require_once "Controladores/especialidadesC.php";
require_once "Modelos/especialidadesM.php";

require_once "Controladores/profesionalesC.php";
require_once "Modelos/profesionalesM.php";

require_once "Controladores/pacientesC.php";
require_once "Modelos/pacientesM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

?>