<?php

if($_SESSION["rol"] != "Paciente"){

    echo'<script>
        window.location = "inicio";
    </script>';

    return;
    
}

?>

<div class="content-wrapper">

    <section class="content-header">
    
        <h1>Elija una especialidad : </h1>
    </section>

    <section class="content">
    
        <div class="box">
        
             <div class="box-body">

                <?php 

                    $columna = null;
                    $valor = null;

                    $resultado = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                    foreach ($resultado as $key => $value) {

                        echo'<div class="col-lg-6 col-xs-6">
                                
                                <div class="small-box bg-aqua">
            
                                    <div class="inner">
                                    
                                        <h3>'.$value["nombre"].'</h3>';

                                    $columna = "id_especialidad";
                                    $valor = $value["id"];

                                    $profesionales = ProfesionalesC::VerProfesionalesC($columna, $valor);

                                    foreach ($profesionales as $key => $value) {

                                        echo'<a href="Profesional/'.$value["id"].'" style="color:black";>
                                        <h4>'.$value["nombre"].' '.$value["apellido"].'</h4></a>';
                                        
                                    }
                        
                                  echo'  </div>
                                </div>
                            </div>';
                        
                    }

                ?>
            
               
            </div>

        </div>

    </section>

</div>
