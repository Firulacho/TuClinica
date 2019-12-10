<?php

require_once "ConexionBD.php";

class EspecialidadesM extends ConexionBD{

    //Crear Especialidades
    static public function CrearEspecialidadM($tablaBD, $especialidad){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre) VALUES(:nombre)");

        $pdo->bindParam(":nombre", $especialidad["nombre"],PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;
            # code...
        }else {
            return false;
        }

        $pdo->close();
        $pdo=null;

    }

    //Ver Especialidades
    static public function VerEspecialidadesM($tablaBD, $columna, $valor){

        if ($columna == null) {

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            return $pdo->fetchAll();

            # code...
        }else {
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo->fetch();
        }
    }

    //Borrar Especialidades
    static public function BorrarEspecialidadM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id=:id");

        $pdo->bindParam(":id", $id,PDO::PARAM_INT);

        if ($pdo->execute()) {

            return true;
            # code...
        }else {
            return false;
        }

        $pdo->close();
        $pdo=null;
    }

    //Editar Especialidades
    static public function EditarEspecialidadesM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre FROM $tablaBD WHERE id=:id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo ->close();
        $pdo=null;
    }

    //Actualizar Especialidades

    static public function ActualizarEspecialidadesM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id=:id");

        $pdo->bindParam(":id", $datosC["id"],PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;
            # code...
        }else {
            return false;
        }

        $pdo->close();
        $pdo=null;
    }
}