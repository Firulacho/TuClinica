<?php

require_once "ConexionBD.php";

class CitasM extends ConexionBD{

    //pedir Cita paciente
    static public function EnviarCitaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_profesional, id_especialidad, id_paciente, nyaPA, rut, inicio, fin)
                                            VALUES (:id_profesional, :id_especialidad, :id_paciente, :nyaPA, :rut, :inicio, :fin) ");

        $pdo -> bindParam("id_profesional"      , $datosC["Pid"], PDO::PARAM_INT);
        $pdo -> bindParam("id_especialidad"     , $datosC["Cid"], PDO::PARAM_INT);
        $pdo -> bindParam("id_paciente"         , $datosC["PAid"], PDO::PARAM_INT);

        $pdo -> bindParam("nyaPA"               , $datosC["nyaC"], PDO::PARAM_STR);
        $pdo -> bindParam("rut"                 , $datosC["rutC"], PDO::PARAM_STR);
        $pdo -> bindParam("inicio"              , $datosC["fyhIC"], PDO::PARAM_STR);
        $pdo -> bindParam("fin"                 , $datosC["fyhFC"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
            # code...
        }

        $pdo->close();
        $pdo=null;

    }

    //Mostrar Citas
    static public function VerCitasM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo ->fetchAll();

        $pdo->close();
        $pdo=null;


    }
}