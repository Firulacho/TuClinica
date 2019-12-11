<aside class="main-sidebar">
    
    <section class="sidebar">
      
      <ul class="sidebar-menu">
      
        <li>
        
          <a href="http://localhost/clinica/inicio">
          
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        
        <li>
          <a href="http://localhost/clinica/Ver-especialidades">
          
            <i class="fa fa-medkit"></i>
            <span>Especialidades</span>
          </a>
        </li>

        <li>
        <?php
            echo'<a href="http://localhost/clinica/historial/'.$_SESSION["id"].'">';
        ?>
          <i class="fa fa-calendar-check-o"></i>
            <span>Historial</span>
          </a>
        </li>

      </ul>

    </section>
    
  </aside>