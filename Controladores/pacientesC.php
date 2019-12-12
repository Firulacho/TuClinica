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

    //Ingreso Pacientes
    public function IngresarPacienteC(){

        if (isset($_POST["usuario-Ing"])) {
                   
            if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])) {
                
                $tablaBD="tbl_pacientes";
                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                $resultado = PacientesM::IngresarPacienteM($tablaBD,$datosC);

                if ($resultado["usuario"]== $_POST["usuario-Ing"] && $resultado["clave"]== $_POST["clave-Ing"]) {

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"]         = $resultado["id"];
                    $_SESSION["usuario"]    = $resultado["usuario"];
                    $_SESSION["clave"]      = $resultado["clave"];
                    $_SESSION["apellido"]   = $resultado["apellido"];
                    $_SESSION["nombre"]     = $resultado["nombre"];
                    $_SESSION["rut"]        = $resultado["rut"];
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

    //Ver Perfil Paciente
    public function VerPerfilPacienteC(){

        $tablaBD="tbl_pacientes";

        $id=$_SESSION["id"];

        $resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);

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
                
                echo'<td>'.$resultado["rut"].'</td>

                <td>
                
                    <a href="http://localhost/clinica/perfil-Pa/'.$resultado["id"].'">
                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                    </a>
                </td>

            </tr>';
        
    }

    //Editar Perfil Paciente

    public function EditarPerfilPacienteC(){

        $tablaBD = "tbl_pacientes";

        $id= $_SESSION["id"];

        $resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);

        echo'<form method="post" enctype="multipart/form-data">
            
                <div class="row">
                
                    <div class="col-md-6 col-xs-12">
                    
                        <h2>Nombre:</h2>
                        <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
                        <input type="hidden" class="input-lg" name="PAid" value="'.$resultado["id"].'">

                        <h2>Apellido:</h2>
                        <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

                        <h2>Usuario:</h2>
                        <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

                        <h2>Clave:</h2>
                        <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">
                        
                        <h2>Rut:</h2>
                        <input type="text" class="input-lg" name="rutPerfil" value="'.$resultado["rut"].'">
                    </div>

                    <div class="col-md-6 col-xs-12">
                    
                        <br><br>

                        <input type="file" name="imgPerfil" >
                        <br>';

                        if ($resultado["foto"] != "") {

                            echo'<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px" class="img-responsive">';
                            # code...
                        }else {
                            echo'<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px" class="img-responsive">';
                        }

                        

                        echo'

                        <input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

                        <br><br>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                    </div>
                </div>
            </form>';
    }

    //Actualizar Perfil Paciente
    public function ActualizarPerfilPacienteC(){

        If(isset($_POST["PAid"])){

            $rutaImg = $_POST["imgActual"];

            if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {

                if (!empty($_POST["imgActual"])) {
                    
                    unlink($_POST["imgActual"]);
                }
                
                if ($_FILES["imgPerfil"][type] == "image/png") {

                    $nombre = mt_rand(100,999);

                    $rutaImg = "Vistas/img/Pacientes/paciente".$nombre.".png";

                    $foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

                    imagepng($foto, $rutaImg);
                    # code...
                }

                if ($_FILES["imgPerfil"][type] == "image/jpeg") {

                    $nombre = mt_rand(100,999);

                    $rutaImg = "Vistas/img/Pacientes/paciente".$nombre.".jpg";

                    $foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

                    imagejpg($foto, $rutaImg);
                    # code...
                }
                
            }

            $tablaBD = "tbl_pacientes";

            $datosC = array("id"=>$_POST["PAid"]
                            , "nombre"      =>$_POST["nombrePerfil"]
                            , "apellido"    =>$_POST["apellidoPerfil"]
                            , "usuario"     =>$_POST["usuarioPerfil"]
                            , "clave"       =>$_POST["clavePerfil"]
                            , "rut"         =>$_POST["rutPerfil"]
                            , "foto"        =>$rutaImg);

            $resultado = PacientesM::ActualizarPerfilPacienteM($tablaBD, $datosC);

            if ($resultado == true) {

                echo'<script>
                    window.location = "http://localhost/clinica/perfil-Pa/'.$_SESSION["id"].'";
                </script>';
                
            }    
        }
    }
}
