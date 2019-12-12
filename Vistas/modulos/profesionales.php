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
    
        <h1>Gestor de Profesionales</h1>
    </section>

    <section class="content">
    
        <div class="box">
        
            <div class="box-header">
            
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearProfesional">Crear Profesional</button>

            </div>

            <div class="box-body">
            
                <table class="table table-bordered table-hover table-striped dt-responsive DT">
                
                    <thead>
                    
                        <tr>
                        
                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>foto</th>
                            <th>Especialidad</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $columna=null;
                        $valor=null;

                        $resultado=ProfesionalesC::VerProfesionalesC($columna, $valor);

                        foreach ($resultado as $key => $value) {

                            echo'<tr>
                        
                                    <td>'.($key+1).'</td>

                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>';

                                    if ($value["foto"] == "") {

                                        echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';
                                        # code...
                                    }else {
                                        echo'<td><img src="'.$value["foto"].'" width="40px"></td>';
                                    }

                                    $columna = "id";
                                    $valor = $value["id_especialidad"];

                                    $especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                                    echo'<td>'.$especialidad["nombre"].'</td>

                                    <td>'.$value["usuario"].'</td>

                                    <td>'.$value["clave"].'</td>

                                    

                                    <td>
                                    
                                        <div class="btn-group">
                                        
                                            <button class="btn btn-success EditarProfesional" Pid="'.$value["id"].'" 
                                            data-toggle="modal" data-target="#EditarProfesional"><i class="fa fa-pencil"></i>Editar</button>
                                            
                                            <button class="btn btn-danger EliminarProfesional" Pid="'.$value["id"].'"
                                            imgP="'.$value["foto"].'"><i class="fa fa-times"></i>Borrar</button>
                                            
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

<div class="modal fade" rol="dialog" id="CrearProfesional">

    <div class="modal-dialog">
    
         <div class="modal-content">
         
                    <form method="post" role="form">
                    
                        <div class="modal-body">
                        
                            <div class="box-body">
                            
                                <div class="form-group">
                                
                                    <h2>Apellido</h2>

                                    <input type="text" class="form-control input-lg" name="apellido" required>

                                    <input type="hidden" name="rolP" value="Profesional">

                                </div>

                                <div class="form-group">
                                
                                    <h2>Nombre</h2>

                                    <input type="text" class="form-control input-lg" name="nombre" required>

                                    

                                </div>

                                <div class="form-group">
                                
                                    <h2>Sexo:</h2>
                                    <select  class="form-control input-lg" name="sexo">

                                        <option>Seleccionar...</option>
                                    
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                
                                    <h2>Especialidad:</h2>

                                    <select  class="form-control input-lg" name="especialidad">
                                        <option>Seleccionar...</option>

                                        <?php

                                            $columna = null;
                                            $valor=null;

                                            $resultado = EspecialidadesC::VerEspecialidadesC($columna, $valor);

                                            foreach ($resultado as $key => $value) {

                                                echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                # code...
                                            }
                                        ?>
                                    
                                        
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                
                                    <h2>Usuario</h2>

                                    <input type="text" class="form-control input-lg" name="usuario" required>

                                </div>

                                <div class="form-group">
                                
                                    <h2>Contraseña</h2>

                                    <input type="text" class="form-control input-lg" name="clave" required>

                                    

                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                    <?php
                        $crear = new ProfesionalesC();
                        $crear -> CrearProfesionalC();
                    ?>
                    
                    </form>    
         </div>               
    </div>                    
</div>

<div class="modal fade" rol="dialog" id="EditarProfesional">

    <div class="modal-dialog">
    
         <div class="modal-content">
         
                    <form method="post" role="form">
                    
                        <div class="modal-body">
                        
                            <div class="box-body">
                            
                                <div class="form-group">
                                
                                    <h2>Apellido</h2>

                                    <input type="text" class="form-control input-lg" id="apellidoEditar" name="apellidoEditar" required>

                                    <input type="hidden" id="Pid"name="Pid" >

                                </div>

                                <div class="form-group">
                                
                                    <h2>Nombre</h2>

                                    <input type="text" class="form-control input-lg" id="nombreEditar" name="nombreEditar" required>

                                    

                                </div>

                                <div class="form-group">
                                
                                    <h2>Sexo:</h2>
                                    <select  class="form-control input-lg"  name="sexoEditar" required="">

                                        <option id="sexoEditar"></option>
                                    
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>

                                

                                <div class="form-group">
                                
                                    <h2>Usuario</h2>

                                    <input type="text" class="form-control input-lg" id="usuarioEditar" name="usuarioEditar" required>

                                </div>

                                <div class="form-group">
                                
                                    <h2>Contraseña</h2>

                                    <input type="text" class="form-control input-lg" id="claveEditar" name="claveEditar" required>

                                    

                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                    <?php
                        $actualizar = new ProfesionalesC();
                        $actualizar -> ActualizarProfesionalC();
                    ?>
                    
                    </form>    
         </div>               
    </div>                    
</div>

<?php

$borrarP = new ProfesionalesC();
$borrarP -> BorrarProfesionalC();
?>