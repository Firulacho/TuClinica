<?php

    if ($_SESSION["rol"] != "Profesional") {

        echo'<script>
            window.location = "inicio";
        </script>';

        return;
        
    }

?>

<div class="content-wrapper">

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                    $editarPerfil = new ProfesionalesC();
                    $editarPerfil -> EditarPerfilProfesionalC();
                    $editarPerfil -> ActualizarPerfilProfesionalC();
                ?>

                

            </div>

        </div>

    </section>

</div>