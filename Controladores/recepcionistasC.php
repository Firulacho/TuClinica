<?php

class RecepcionistasC{

    //Ingreso Recepcionistas
    public function IngresarRecepcionistaC(){

        if(isset($_POST["usuario-Ing"])){

            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])){

                $tablaBD = "tbl_recepcionista";

                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                $resultado = RecepcionistasM::IngresarRecepcionistaM($tablaBD, $datosC);

                if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];

                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];

                    echo'<script>
                        window.location = "inicio";
                    </script>';

                }else{
                    echo '<div class="alert alert-danger">Error al Ingresar </div>';
                }
            }
        }

    }
    //Ver Perfil Recepcionistas
    public function VerPerfilRecepcionistaC(){

        $tablaBD="tbl_recepcionista";

        $id = $_SESSION["id"];

        $resultado = RecepcionistasM::VerPerfilRecepcionistaM($tablaBD, $id);

        echo'<tr>

                <td>'.$resultado["usuario"].'</td>

                <td>'.$resultado["clave"].'</td>

                <td>'.$resultado["nombre"].'</td>

                <td>'.$resultado["apellido"].'</td>';

                if ($resultado["foto"] != "") {
                    echo'<td><img src="'.$resultado["foto"].'" class="img-responsive" width="40px"></td>';
                }else{
                    echo'<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';
                }

                

                echo '<td>

                    <a href="http://localhost/clinica/perfil-R/'.$resultado["id"].'">

                        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                    </a>
                </td>
                
            </tr>';

    }

    //Editar Perfil Recepcionista
    public function EditarPerfilRecepcionistaC(){

        $tablaBD="tbl_recepcionista";

        $id = $_SESSION["id"];

        $resultado = RecepcionistasM::VerPerfilRecepcionistaM($tablaBD, $id);

        echo'<form method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <h2>Nombre:</h2>
                        <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
                        <input type="hidden" class="input-lg" name="idPerfil" value="'.$resultado["id"].'">

                        <h2>Apellido:</h2>
                        <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

                        <h2>Usuario:</h2>
                        <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

                        <h2>Contraseña:</h2>
                        <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <br><br>

                        <input type="file" name="imgPerfil">

                        <br>';

                        if ($resultado["foto"] == "") {
                            echo'<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px;">';
                        }else{

                            echo'<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px;">';

                        }
                        
                        echo'<input type="hidden" name="imgActual" value="'.$resultado["foto"].'"> 

                        <br><br>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </div>
            </form>';


    }

    //Actualizar Perfil Recepcionista
    public function ActualizarPerfilRecepcionistaC(){

        if (isset($_POST["idPerfil"])) {

            $rutaImg = $_POST["imgActual"];

            if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {
                
                if (!empty($_POST["imgActual"])) {

                    unlink($_POST["imgActual"]);
                    # code...
                }
                if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {

                    $nombre = mt_rand(10,99);

                    $rutaImg = "Vistas/img/Recepcionistas/R-".$nombre.".jpg";

                    $foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

                    imagejpeg($foto, $rutaImg);
                    
                }

                if ($_FILES["imgPerfil"]["type"] == "image/png") {

                    $nombre = mt_rand(10,99);

                    $rutaImg = "Vistas/img/Recepcionistas/R-".$nombre.".png";

                    $foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

                    imagepng($foto, $rutaImg);
                    
                }
            }

            $tablaBD = "tbl_recepcionista";

            $datosC = array("id"=>$_POST["idPerfil"]
                            , "usuario"=>$_POST["usuarioPerfil"]
                            , "apellido"=>$_POST["apellidoPerfil"]
                            , "nombre"=>$_POST["nombrePerfil"]
                            , "clave"=>$_POST["clavePerfil"]
                            , "foto"=>$rutaImg);

            $resultado = RecepcionistasM::ActualizarPerfilRecepcionistaM($tablaBD,$datosC);

            if ($resultado == true) {

                echo '<script>
                    window.location = "http://localhost/clinica/perfil-R/'.$_SESSION["id"].'";
                </script>';
                # code...
            }
            # code...
        }
    }
}