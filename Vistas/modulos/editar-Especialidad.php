<?php

if($_SESSION["rol"] != "Recepcionista"){

    echo'<script>
        window.location = "inicio";
    </script>';

    return;
    
}

?>

<div class="content-wrapper">

    <section class="content-header">
    
        <h1>Editar Especialidad</h1>
    </section>

    <section class="content">
    
        <div class="box">
        
            <div class="box-body">
            
                <form method="post">

                <?php

                    $editarEspecialidad = new EspecialidadesC();
                    $editarEspecialidad -> EditarEspecialidadesC();
                    $editarEspecialidad -> ActualizarEspecialidadesC();
                ?>
                
                    
                </form>
            </div>
        </div>
    </section>
</div>