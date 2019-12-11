<?php

if($_SESSION["id"] != substr($_GET["url"], 6)){

    echo'<script>
        window.location = "inicio";
    </script>';

    return;
    
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <?php
            $columna = "id";
            $valor = substr($_GET["url"], 6);

            $resultado = ProfesionalesC::ProfesionalC($columna, $valor);

            echo '<h1>Profesional: '.$resultado["nombre"].' '.$resultado["apellido"].'</h1>';
            
            $columna = "id";
            $valor = $resultado["id_especialidad"];

            $especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

            echo '<br>
            <h1>Especialidad de: '.$especialidad["nombre"].'</h1>';

        ?>
    
        
        
    </section>

    <section class="content">
    
        <div class="box">
        
             <div class="box-body">

             <div id="calendar"></div>
            
            </div>
        </div>
    </section>
</div>

<div class="modal fade" rol="dialog" id="CitaModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-body">

                    <div class="box-body">

                        <?php
                            $columna = "id";
                            $valor = substr($_GET["url"], 6);

                            $resultado = ProfesionalesC::ProfesionalC($columna, $valor);

                            echo' <div class="form-group">

                                        

                                        <input type="hidden" name="Pid" value="'.$resultado["id"].'">
                                        
                                        
                                    </div>';

                                    $columna = "id";
                                    $valor = $resultado["id_especialidad"];

                                    $especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                                    echo '<div class="form-group">

                                            <input type="hidden" name="Cid" value="'.$especialidad["id"].'">   
                                        
                                        </div>';
                        ?>

                        <div class="form-group">

                            <h2>Seleccionar Paciente</h2>

                            <?php
                                echo'<select name="nombrePA" class="form-control input-lg">

                                <option>Paciente...</option>';

                                $columna = null;
                                $valor = null;

                                $resultado = PacientesC::VerPacientesC($columna, $valor);

                                foreach ($resultado as $key => $value) {

                                    echo'<option value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["nombre"].' '.$value["apellido"].'</option>';
                                    # code...
                                }
                            ?>

                            

                                
                            </select>
                        </div>

                        <div class="form-group">

                            <h2>Rut: </h2>
                            <input type="text" class="form-control input-lg"  name="rutPA" value="">
                           
                        </div>            

                        <div class="form-group">

                            <h2>Fecha: </h2>
                            <input type="text" class="form-control input-lg"  id="fechaC" value="" readonly>
                           
                        </div>

                        <div class="form-group">

                            <h2>Hora: </h2>
                            <input type="text" class="form-control input-lg"  id="horaC" value="" readonly>
                           
                        </div>

                        <div class="form-group">

                            <input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>
                            <input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>
                           
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Pedir Cita</button>

                    <button type="button" class="btn btn-danger">Cancelar Cita</button>
                </div>

                <?php
                    $enviarC = new CitasC();
                    $enviarC -> PedirCitaProfesionalC();
                ?>
            </form>
        </div>
    </div>


</div>
