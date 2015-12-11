<?php
    session_name("sistema-spe");
    session_start();
    if( ! isset($_SESSION["usuario"])){
        header("location:index.php");        
    } 
    
     $nombreUsuario = ucwords(strtolower($_SESSION["usuario"]));
     $cargo = ucwords(strtolower($_SESSION["cargo"]));
     $cuenta = ucwords(strtolower($_SESSION["cuenta"]));
     $clave = ucwords(strtolower($_SESSION["clave"]));
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SISPE: Perfil</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../util/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../util/lte/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../util/lte/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->
    <link href="../util/lte/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet"/>
    
    <!-- Extilos extras-->
    <link href="../util/lte/css/extras.css" rel="stylesheet" type="text/css" />
    
    <!-- Ionicons -->
    <link href="../util/lte/css/ionicons.css" rel="stylesheet" type="text/css" />
    
    <!-- Theme style -->
    <link href="../util/lte/skins/_all-skins.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <?php
        include 'cabecera.php';
      ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
            include 'menu.php';
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

    <!-- INICIO: Contenido de la página -->
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PERFIL DE USUARIO
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Principal</a></li>
            <li><a href="#">Cabecera</a></li>
            <li class="active">Perfil</li>
          </ol>
        </section>
        
        
                
        <!-- INICIO del formulario modal Correos -->
        <form name="frmgrabar" id="frmgrabar" method="post" action="/">
                <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edición de Correo</h4>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-3">
                                  <p><input type="text" name="txtcodigocorreo" id="txtcodigocorreo" class="form-control" readonly=""><p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-7">
                                  <p><input type="email" name="txtcorreos" id="txtcorreos" class="form-control" placeholder="Nombre del Correo" required=""><p>
                              </div>
                          </div>                      
                          
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success" aria-hidden="true">Aceptar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncerrar">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
            </form>
        <!-- FIN del formulario modal -->
        
        <!-- INICIO del formulario modal Telefonos -->
        <form name="frmgrabarTelefono" id="frmgrabarTelefono" method="post" action="/">
                <div class="modal fade" id="myModale" role="dialog" aria-labelledby="myModalLabele" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edición de Teléfono</h4>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-3">
                                  <p><input type="text" name="txtcodigotelefono" id="txtcodigotelefono" class="form-control" readonly=""><p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-8" >
                                  <div class="form-inline">
                                      <label>Operador:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
                                  <select class="form-control-static" name="cbooperador_modal" id="cbooperador_modal" required="" >
                                      <option value="0"> Movistar </option>
                                      <option value="1"> Claro </option>
                                      <option value="2"> Bitel </option>
                                      <option value="3"> Entel </option>
                                      <option value="4"> Tuenti </option>                               
                                  </select>
                                  </div>
                              </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-inline">
                                  <label>Número: &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
                                  <input type="text" name="txtnumero" id="txtnumero" class="form-control-static"  required="">
                                  </div>
                              </div>
                          </div>                      
                          
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success" aria-hidden="true">Aceptar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncerrare">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
            </form>
        <!-- FIN del formulario modal -->
        <!-- Main content -->
        <section class="content">        
            
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" align="center" ><!--Iniio de Columna-->
                            <div>
                                <img src="../util/imagenes/1.png"  class="img-circle" alt="User Image">
                            </div>
                            <div>
                                <h3 class="text-danger"> <?php echo $cargo; ?></h3>
                            </div><!--Fin de Columna-->
                        </div>   
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Nombres: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>   
                                <input type="text"  style="border-style:hidden" id="txtnombres"  name="txtnombres"  readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Apellidos: &nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                <input type="text"   style="border-style:hidden" id="txtapellidos"  name="txtapellidos" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>DNI: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="text"   style="border-style:hidden" id="txtdni"  name="txtdni"  readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <select id="cbotelefono" name="cbotelefono" style="border-style:hidden" >
                                    
                                </select>
                                <a href="javascript:void();" onclick = "EditarTelefonos()" data-toggle="modal" data-target="#myModale"><i class="fa fa-edit text-green"></i></a>
                            </div>
                            <div class="form-group">
                                <label>Correo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <select id="cbocorreo" name="cbocorreo" style="border-style:hidden" >
                                    
                                </select> 
                               <a href="javascript:void();" onclick = "EditarCorreo()" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit text-green"></i></a>

                            </div>
                            <div class="form-group">
                                <label>Area: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="text"  style="border-style:hidden" id="txtarea"  name="txtarea"  readonly=""/>
                            </div>
                        </div>
                    </div>             
                </div><!-- /.box-header -->                
              </div><!-- /.box -->              
              <div class="box">
                <div class="box-body">
                    <div id="listado">
                        
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <!-- FIN: Contenido de la página -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
          <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="principal.php">Sistema SISPE</a>.</strong> Todos los derechos reservados.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../util/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../util/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    
    <!-- DATA TABLE -->
    <script src="../util/lte/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../util/lte/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- SlimScroll -->
    <script src="../util/lte/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../util/lte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../util/lte/js/app.js" type="text/javascript"></script>
    <!-- Temas -->
    <script src="../util/lte/js/demo.js" type="text/javascript"></script>
    
    <script src="js/permisos.js"></script>
    <script src="js/perfil.js"></script>
    
  </body>
</html>