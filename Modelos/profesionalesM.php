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

    //Iniciar Sesión  Profesional
    static public function IngresarProfesionalM($tablaBD,$datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id
                                        FROM $tablaBD WHERE usuario = :usuario ");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo->execute();
        return $pdo->fetch();

        $pdo->close();
        $pdo=null;
    }

    //Ver Perfil Profesional
    static public function VerPerfilProfesionalM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id, horarioEntrada, horarioSalida, id_especialidad
                                        FROM $tablaBD WHERE id = :id ");

        $pdo -> bindParam(":id", $id, PDO::PARAM_STR);

        $pdo->execute();
        return $pdo->fetch();

        $pdo->close();
        $pdo=null;
    }

    //ACtualizar Perfil Profesional

    static public function ActualizarPerfilProfesionalM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD 
                                            SET id_especialidad=:id_especialidad, 
                                                apellido=:apellido, 
                                                nombre=:nombre, 
                                                foto=:foto, 
                                                usuario=:usuario, 
                                                clave=:clave,
                                                horarioEntrada=:horarioEntrada, 
                                                horarioSalida=:horarioSalida 
                                            WHERE id=:id");

        $pdo->bindParam(":id"               ,$datosC["id"],PDO::PARAM_INT);                                            
        $pdo->bindParam(":id_especialidad"  ,$datosC["especialidad"],PDO::PARAM_INT);
        $pdo->bindParam(":apellido"         ,$datosC["apellido"],PDO::PARAM_STR);
        $pdo->bindParam(":nombre"           ,$datosC["nombre"],PDO::PARAM_STR);
        $pdo->bindParam(":usuario"          ,$datosC["usuario"],PDO::PARAM_STR);
        $pdo->bindParam(":clave"            ,$datosC["clave"],PDO::PARAM_STR);
        $pdo->bindParam(":foto"             ,$datosC["foto"],PDO::PARAM_STR);
        $pdo->bindParam(":horarioEntrada"   ,$datosC["horarioEntrada"],PDO::PARAM_STR);
        $pdo->bindParam(":horarioSalida"    ,$datosC["horarioSalida"],PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
            # code...
        }
        
        $pdo->close();
        $pdo=null;

    }






}