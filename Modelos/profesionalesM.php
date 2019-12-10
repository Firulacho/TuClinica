<?php

require_once "ConexionBD.php";

class ProfesionalesM extends ConexionBD{

    //Crear Profesionales
    static public function CrearProfesionalM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO 
                                            $tablaBD(apellido, nombre , sexo, id_especialidad, usuario, clave, rol) 
                                            VALUES(:apellido, :nombre , :sexo, :id_especialidad, :usuario, :clave, :rol)");

        $pdo ->bindParam(":apellido"        , $datosC["apellido"],PDO::PARAM_STR);
        $pdo ->bindParam(":nombre"          , $datosC["nombre"],PDO::PARAM_STR);
        $pdo ->bindParam(":sexo"            , $datosC["sexo"],PDO::PARAM_STR);
        $pdo ->bindParam(":id_especialidad" , $datosC["id_especialidad"],PDO::PARAM_INT);
        $pdo ->bindParam(":usuario"         , $datosC["usuario"],PDO::PARAM_STR);
        $pdo ->bindParam(":clave"           , $datosC["clave"],PDO::PARAM_STR);
        $pdo ->bindParam(":rol"             , $datosC["rol"],PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
            # code...
        }
        
        $pdo->close();
        $pdo=null;


    }

    //Mostrar Profesionales
    static public function VerProfesionalesM($tablaBD, $columna, $valor){

        if($columna != null){

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ");

            $pdo -> bindParam(":".$columna, $valor,PDO::PARAM_STR);

            $pdo ->execute();

            return $pdo -> fetchAll();
        }else{
            
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            
            $pdo ->execute();

            return $pdo -> fetchAll();
        }
        $pdo->close();
        $pdo=null;
    }

    //Editar Profesional
    static public function ProfesionalM($tablaBD, $columna, $valor){

        if($columna != null){

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ");

            $pdo -> bindParam(":".$columna, $valor,PDO::PARAM_STR);

            $pdo ->execute();

            return $pdo -> fetch();
        }
        $pdo->close();
        $pdo=null;
    }

    //Actualizar Profesionales
    static public function ActualizarProfesionalM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD 
                                           SET apellido=:apellido, nombre=:nombre, sexo = :sexo, usuario=:usuario, clave=:clave
                                           WHERE id= :id");

        $pdo->bindParam(":id"       ,$datosC["id"],PDO::PARAM_INT);
        $pdo->bindParam(":apellido" ,$datosC["apellido"],PDO::PARAM_STR);
        $pdo->bindParam(":nombre"   ,$datosC["nombre"],PDO::PARAM_STR);
        $pdo->bindParam(":sexo"     ,$datosC["sexo"],PDO::PARAM_STR);
        $pdo->bindParam(":usuario"  ,$datosC["usuario"],PDO::PARAM_STR);
        $pdo->bindParam(":clave"    ,$datosC["clave"],PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
            # code...
        }
        
        $pdo->close();
        $pdo=null;

    }

    //Eliminar Profesional
    static public function BorrarProfesionalM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");

        $pdo -> bindParam(":id", $id,PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
            # code...
        }
        
        $pdo->close();
        $pdo=null;
    }






}