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

    //Iniciar Sesión  Profesional
    public function IngresarProfesionalC(){

        if (isset($_POST["usuario-Ing"])) {
                   
            if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])) {
                
                $tablaBD="tbl_profesionales";
                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                $resultado = ProfesionalesM::IngresarProfesionalM($tablaBD,$datosC);

                if ($resultado["usuario"]== $_POST["usuario-Ing"] && $resultado["clave"]== $_POST["clave-Ing"]) {

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"]         = $resultado["id"];
                    $_SESSION["usuario"]    = $resultado["usuario"];
                    $_SESSION["clave"]      = $resultado["clave"];
                    $_SESSION["apellido"]   = $resultado["apellido"];
                    $_SESSION["nombre"]     = $resultado["nombre"];
                    $_SESSION["sexo"]        = $resultado["sexo"];
                    $_SESSION["foto"]       = $resultado["foto"];
                    $_SESSION["rol"]        = $resultado["rol"];

                    echo'<script>
                        window.location = "inicio";
                    </script>';
                    # code...
                }
            }
        }
    }

    //Ver Perfil Profesional
    public function VerPerfilProfesionalC(){

        $tablaBD = "tbl_profesionales";

        $id = $_SESSION["id"];

        $resultado = ProfesionalesM::VerPerfilProfesionalM($tablaBD, $id);

        echo'<tr>
                    
                <td>'.$resultado["usuario"].'</td>
                <td>'.$resultado["clave"].'</td>
                <td>'.$resultado["nombre"].'</td>
                <td>'.$resultado["apellido"].'</td>';

                if ($resultado["foto"] == "") {

                    echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';
                }else{
                    echo'<td><img src="'.$resultado["foto"].'" width="40px"></td>';
                }

                $columna = "id";
                $valor = $resultado["id_especialidad"];

                $especialidad = EspecialidadesC::VerEspecialidadesC($columna,$valor);

                echo '<td>'.$especialidad["nombre"].'</td>';
                                
                echo'   <td>
                    
                        Desde: '.$resultado["horarioEntrada"].'
                        <br>
                        Hasta: '.$resultado["horarioSalida"].'
                    </td>

                <td>
                
                    <a href="http://localhost/clinica/perfil-P/'.$resultado["id"].'">
                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                    </a>
                </td>

            </tr>';
    }

    //Editar Perfil Profesional
    public function EditarPerfilProfesionalC(){

        $tablaBD = "tbl_profesionales";
        $id = $_SESSION["id"];

        $resultado = ProfesionalesM::VerPerfilProfesionalM($tablaBD, $id);

        echo '<form method="post" enctype="multipart/form-data">
            
                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <h2>Nombre:</h2>
                        <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'"">
                        <input type="hidden" name="Pid" value="'.$resultado["id"].'"">

                        <h2>Apellido:</h2>
                        <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'"">

                        <h2>Usuario:</h2>
                        <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'"">
                        
                        <h2>Contraseña:</h2>
                        <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'"">';


                        $columna = "id";
                        $valor = $resultado["id_especialidad"];

                        $especialidad = EspecialidadesC::VerEspecialidadesC($columna,$valor);

                        echo '<h2>Especialidad Actual:'.$especialidad["nombre"].'</h2>
                            <h3>Cambiar Especialidad:</h3>
                            <select class="input-lg" name="especialidadPerfil">';
                            $columna = null;
                            $valor = null;

                            $especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                            foreach ($especialidad as $key => $value) {

                                echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option> ';
                            }
                            
                        echo'</select>

                        <div class="form-group">

                            <h2>Horario</h2>
                            Desde: <input type="time" class="input-lg" name="hePerfil" 
                                value="'.$resultado["horarioEntrada"].'">
                            Hasta: <input type="time" class="input-lg" name="hsPerfil" 
                                value="'.$resultado["horarioSalida"].'">

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <br><br>

                        <input type="file" name="imgPerfil">
                        <br>';

                        if($resultado["foto"]==""){

                            echo'<img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive"
                            width="200px">';
                        }else {
                            echo'<img src="http://localhost/clinica/'.$resultado["foto"].'" class="img-responsive"
                            width="200px">';
                        }

                        

                        echo'<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

                        <br><br>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>

                </div>
                
            </form>';

    }

    //Actualizar Perfil Profesional
    public function ActualizarPerfilProfesionalC(){

        if (isset($_POST["Pid"])) {

            $rutaImg = $_POST["imgActual"];

            if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {

                if (!empty($_POST["imgActual"])) {

                    unlink($_POST["imgActual"]);
                }

                if ($_FILES["imgPerfil"]["type"] == "image/png") {

                    $nombre = mt_rand(100,999);

                    $rutaImg = "Vistas/img/Profesionales/Pro-".$nombre.".png";

                    $foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

                    imagepng($foto, $rutaImg);
                    # code...
                }

                if ($_FILES["imgPerfil"]["type"]== "image/jpeg") {

                    $nombre = mt_rand(100,999);

                    $rutaImg = "Vistas/img/Profesionales/Pro-".$nombre.".jpg";

                    $foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

                    imagejpeg($foto, $rutaImg);
                    # code...
                }
            }
            $tablaBD = "tbl_profesionales";

            $datosC = array(  "id"              =>$_POST["Pid"]
                            , "nombre"          =>$_POST["nombrePerfil"]
                            , "apellido"        =>$_POST["apellidoPerfil"]
                            , "usuario"         =>$_POST["usuarioPerfil"]
                            , "clave"           =>$_POST["clavePerfil"]
                            , "especialidad"    =>$_POST["especialidadPerfil"]
                            , "horarioEntrada"  =>$_POST["hePerfil"]
                            , "horarioSalida"   =>$_POST["hsPerfil"]
                            , "foto"            =>$rutaImg);

            $resultado = ProfesionalesM::ActualizarPerfilProfesionalM($tablaBD, $datosC);
            
            if ($resultado==true) {

                echo ' <script>
                    window.location = "http://localhost/clinica/perfil-P/'.$resultado["id"].'";
                </script>';
            }

            
        }
    }

}

