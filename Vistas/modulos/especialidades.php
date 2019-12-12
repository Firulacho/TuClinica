<?php

if($_SESSION["rol"] != "Recepcionista" && $_SESSION["rol"] != "Administrador"){

    echo'<script>
        window.location = "inicio";
    </script>';

    return;
    
}

?>

<div class="content-wrapper">

    <section class="content-header">
    
        <h1>Gestor de Especialidades</h1>
    </section>

    <section class="content">
    
        <div class="box">
        
            <div class="box-header">
            
                <form method="post">
                
                    <div class="col-md-6 col-xs-12">
                    
                        <input type="text" class="form-control" name="especialidadNuevo" placeholder="Ingrese Nueva Especialidad" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear Especialidad</button>
                </form>

                <?php

                    $crearE = new EspecialidadesC();
                    $crearE -> CrearEspecialidadC();
                ?>
            </div>

            <div class="box-body">
            
                <table class="table table-bordered table-hover table-striped dt-responsive DT">
                
                    <thead>
                    
                        <tr>
                        
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                        $columna=null;
                        $valor=null;

                        $resultado=EspecialidadesC::VerEspecialidadesC($columna, $valor);

                        foreach ($resultado as $key => $value) {

                            echo'<tr>
                        
                                    <td>'.($key+1).'</td>

                                    <td>'.$value["nombre"].'</td>

                                    <td>
                                    
                                        <div class="btn-group">
                                        
                                            <a href="http://localhost/clinica/editar-Especialidad/'.$value["id"].'">
                                            
                                                <button class="btn btn-success"><i class="fa fa-pencil"></i>Editar</button>
                                            </a>

                                            <a href="http://localhost/clinica/especialidades/'.$value["id"].'">
                                            
                                                <button class="btn btn-danger"><i class="fa fa-times"></i>Borrar</button>
                                            </a>
                                        </div>
                                    </td>

                                </tr>';
                            # code...
                        }
                    ?>
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php

$borrarE = new EspecialidadesC();
$borrarE -> BorrarEspecialidadC();
?>