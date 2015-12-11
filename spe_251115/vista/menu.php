<section class="sidebar">
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar"/>
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <ul class="sidebar-menu">
        <li class="header">MENÚ PRINCIPAL</li>
        
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>MANTENIMIENTOS</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="cargo.php" id="cargos" onclick="Pintar()"><i class="fa fa-crosshairs" ></i> Cargos</a></li>
            <li><a href="institucion.php" id="areas" onclick="Pintar()"><i class="fa fa-qrcode"></i> Institución</a></li>
            <li><a href="personal.php" id="personal" onclick="Pintar()"><i class="fa fa-users"></i> Personal</a></li>
            </ul>
        </li>
        
        <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>OPERACIONES</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">            
                 <li><a href="#"><i class="fa fa-book"></i> Plan Desarrollo Concertado </a></li>
                  <li><a href="#"><i class="fa fa-book"></i> Plan Estratégico Institucional</a></li>
                  <li><a href="#"><i class="fa fa-calendar"></i> Plan Operativo Institucional</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>REPORTES </span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-file-text"></i> Exportar PRDC</a></li>
              <li><a href="#"><i class="fa fa-file-text"></i> Exportar PEI</a></li>
              <li><a href="#"><i class="fa fa-file-text"></i> Exportar POI</a></li>
            </ul>
          </li>     

          <li class="treeview">
            <a href="#">
              <i class="fa fa-gears"></i> <span>ADMINISTRACIÓN</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-user"></i> Usuarios</a></li>
              <li><a href="#"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
              <li><a href="#"><i class="fa fa-server"></i> Permisos</a></li>
            </ul>
          </li>
    </ul>
</section>
<script src="js/permisos.js"></script>