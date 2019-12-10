<?php

class EspecialidadesC{

    //Crear Especialidades
    public function CrearEspecialidadC(){

        if (isset($_POST["especialidadNuevo"])) {

            $tablaBD = "tbl_especialidades";

            $especialidad = array("nombre"=>$_POST["especialidadNuevo"]);

            $resultado = EspecialidadesM::CrearEspecialidadM($tablaBD, $especialidad);

            if($resultado == true){

                echo'
                <script>
                    window.location = "http://localhost/clinica/especialidades";
                </script>
                ';
            }
        }
    }

    //Ver Especialidades
    static public function VerEspecialidadesC($columna, $valor){

        $tablaBD = "tbl_especialidades";

        $resultado = EspecialidadesM::VerEspecialidadesM($tablaBD, $columna, $valor);
        
        return $resultado;
    }

    //Borrar Especialidades
    public function BorrarEspecialidadC(){

        if(substr($_GET["url"], 15)){
            $tablaBD = "tbl_especialidades";

            $id= substr($_GET["url"], 15);

            $resultado = EspecialidadesM::BorrarEspecialidadM($tablaBD, $id);

            if($resultado == true){

                echo'
                <script>
                    window.location = "http://localhost/clinica/especialidades";
                </script>
                ';
            }
        }
    }

    //Editar Especialidades

    public function EditarEspecialidadesC(){

        $tablaBD = "tbl_especialidades";

        $id = substr($_GET["url"], 20);

        $resultado = EspecialidadesM::EditarEspecialidadesM($tablaBD, $id);

        echo '<div class="form-group">
                    
                <h2>Nombre:</h2>
                <input type="text" class="form-control input-lg" name="especialidadEditar" value="'.$resultado["nombre"].'">
                <input type="hidden" class="form-control input-lg" name="Eid" value="'.$resultado["id"].'">

                <br>

                <button type="submit"class="btn btn-success">Guardar Cambios</button>
            </div>';

    }

    //Actualizar Especialidades
    public function ActualizarEspecialidadesC(){

        if (isset($_POST["especialidadEditar"])) {
            
            $tablaBD = "tbl_especialidades";

            $datosC = array("id"=>$_POST["Eid"], "nombre"=>$_POST["especialidadEditar"] );

            $resultado = EspecialidadesM::ActualizarEspecialidadesM($tablaBD, $datosC);

            if($resultado == true){

                echo'
                <script>
                    window.location = "http://localhost/clinica/especialidades";
                </script>
                ';
            }
        }

    }
}