<?php

if($_SESSION["id"] != substr($_GET["url"], 10)){

    echo'<script>
        window.location = "inicio";
    </script>';

    return;
    
}

?>

<div class="content-wrapper">

    <section class="content-header">
    
        <h1>Historial de citas</h1>
    </section>

    <section class="content">
    
        <div class="box">
        
            <div class="box-body">
            
                <table class="table table-bordered table-hover table-striped DT">
                
                    <thead>
                    
                        <tr>
                        
                            <th>Fecha y Hora</th>
                            <th>Profesional</th>
                            <th>Especialidad</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                            $resultado = CitasC::VerCitasC();

                            foreach ($resultado as $key => $value) {

                                if ($_SESSION["rut"]==$value["rut"]) {
                                    echo'<tr>

                                        <td>'.$value["inicio"].'</td>';

                                        $columna= "id";
                                        $valor = $value["id_profesional"];

                                        $profesional = ProfesionalesC::ProfesionalC($columna, $valor);

                                        echo '<td>'.$profesional["nombre"].' '.$profesional["apellido"].' </td>';

                                        $columna= "id";
                                        $valor = $value["id_profesional"];

                                        $especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                                        echo '<td>'.$especialidad["nombre"].' </td>';
                                        
                                        
                                    echo'</tr> ';
                                }    
                                
                                
                            }

                        
                        ?>

                        
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


