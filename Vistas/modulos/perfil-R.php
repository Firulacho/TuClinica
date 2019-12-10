<?php

    if ($_SESSION["rol"] != "Recepcionista") {

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

                $editarPerfil = new RecepcionistasC();
                $editarPerfil -> EditarPerfilRecepcionistaC();
                $editarPerfil -> ActualizarPerfilRecepcionistaC();
            ?>

                
            </div>
        </div>
    </section>
</div>