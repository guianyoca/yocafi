<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

    $fecha1=date('d-m-Y');
    $fecha2=date('d-m-Y', strtotime($fecha1. ' + 1 days'));
    $fecha3=date('d-m-Y', strtotime($fecha2. ' + 1 days'));
    $dias = array('Lunes' , 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo' );
    $mes = array('Enero' , 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    setlocale(LC_ALL, "es_ES");

    $fechaescrita1=$dias[date("w",strtotime($fecha1)-1)] .(" ") .date("d",strtotime($fecha1)) .(" ") .$mes[date("m",strtotime($fecha1))-1] .(" del ") .date("Y",strtotime($fecha1));
    $fechaescrita2=$dias[date("w",strtotime($fecha2)-1)] .(" ") .date("d",strtotime($fecha2)) .(" ") .$mes[date("m",strtotime($fecha2))-1] .(" del ") .date("Y",strtotime($fecha2));
    $fechaescrita3=$dias[date("w",strtotime($fecha3)-1)] .(" ") .date("d",strtotime($fecha3)) .(" ") .$mes[date("m",strtotime($fecha3))-1] .(" del ") .date("Y",strtotime($fecha3));
    
    $hora_acual= date("H:i");

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema DSS</title>
        <link rel="stylesheet" type="" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="" href="css/estilos.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script type="text/javascript">

      function tiempoReal()
      {
        var tabla = $.ajax({
          url:'turnos_gym.php',
          dataType:'text',
          async:false
        }).responseText;

        document.getElementById("miTabla").innerHTML = tabla;
      }
      setInterval(tiempoReal, 6000);
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" id=miTabla>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">Sistema DSS</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
                </div>
            </form>-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuraci車n</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                  
                  
        <div class="dss-fondo">
          
          
                    <div class="row" style="margin-left: 30px; margin-right: 25px;">
                    
    <ul  class="list-group col-xs-12 col-sm-12 col-md-4"><h3 class="text-center "><span class="badge badge-secondary"><?php echo $fechaescrita1; ?></span></h3>
     
      
        <center>
            
    

          <?php 
          $sql1 = "SELECT * FROM contador_horarios WHERE fecha='$fecha1'";
          $resultado1 = $mysqli->query($sql1);
          while($row = mysqli_fetch_array($resultado1)){ 
            // ($row = $resultado->fetch_assoc());
                        if (($row['disponibles']>0)&&($row['turno']>=$hora_acual)) {
            $id=$row['id'];


          ?>  
        <a style="border: 1px solid #7C7A79; border-radius: 6px; margin-top: 2px; line-height:19px;"  href="confirma_turno.php?turno=<?php echo $row['turno']; ?>&fecha=<?php echo $fecha1; ?>&id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action list-group-item-secondary"><?echo $fechaescrita1;?><br><b><?php
        echo $row['turno']; ?></b>
        <br>
         
         <span class="badge badge-primary badge-pill"><?php echo $row['disponibles']; ?> Disponibles</span>
        </a>

        
   
        
      <?}
        elseif ($row['disponibles']==0) 
        {
          if($row['turno']>=$hora_acual){?>
        <a style="border: 1px solid #7C7A79;background:#F7767F; border-radius: 6px; margin-top: 2px; line-height:19px" class="list-group-item list-group-item list-group-item-secondary"><?echo $fechaescrita1;?><br><del><?php
        echo $row['turno']; ?></del>
        <br>
         
         <span class="badge badge-danger badge-pill"> Cupos Agotados</span>
        </a>
        
         <? } } } ?>
        </center>
        
</ul>
<ul class="list-group col-xs-12 col-sm-12 col-md-4"><h3 class="text-center "><span class="badge badge-secondary"><?php echo $fechaescrita2; ?></span></h3>
    
       <center>
            
    

          <?php 

          $sql2 = "SELECT * FROM contador_horarios WHERE fecha='$fecha2'";
          $resultado2 = $mysqli->query($sql2);
          while($row = mysqli_fetch_array($resultado2)){ 
            // ($row = $resultado->fetch_assoc());
            
            if ($row['disponibles']>0) {
            
          ?>  
        <a style="border: 1px solid #7C7A79; border-radius: 6px;  margin-top: 2px; line-height:19px; " href="confirma_turno.php?turno=<?php echo $row['turno']; ?>&fecha=<?php echo $fecha2; ?>&id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action list-group-item-secondary"><?echo $fechaescrita2;?><br><b><?php
        echo $row['turno']; ?></b>
      <br>
         <span class="badge badge-primary badge-pill"><?php echo $row['disponibles']; ?> Disponibles</span>
        </a>
        <?php }else
        {?>
        <a style="border: 1px solid #7C7A79;background:#F7767F; border-radius: 6px; margin-top: 2px; line-height:19px;" class="list-group-item list-group-item list-group-item-secondary"><?echo $fechaescrita2;?><br><del><?php
        echo $row['turno']; ?></del>
        <!--<br>-->
         
        <!-- <img style="width:80px; color-text:green; " src="img/arbol.png">-->
        <!-- <br>-->
        <!-- <span class="badge badge-success badge-pill"> FELICIDADES</span>-->
         
        <!--</a>-->
        <br>
           
         
         <span class="badge badge-danger badge-pill"> Cupos Agotados</span>
        
         
         <!--<span class="badge badge-danger badge-pill"> Cupos Agotados</span>-->
        </a>
        
        
         <? }} ?>
        </center>

</ul>
<ul class="list-group col-xs-12 col-sm-12 col-md-4"><h3 class="text-center "><span class="badge badge-secondary"><?php echo  $fechaescrita3; ?></span></h3>
    
    <center>
            
    

          <?php 
          $sql3 = "SELECT * FROM contador_horarios WHERE fecha='$fecha3'";
          $resultado3 = $mysqli->query($sql3);
          while($row = mysqli_fetch_array($resultado3)){ 
            // ($row = $resultado->fetch_assoc());
            
            if ($row['disponibles']>0) {
            
          ?>  
        <a style="border: 1px solid #7C7A79; border-radius: 6px; margin-top: 2px; line-height:19px;" href="confirma_turno.php?turno=<?php echo $row['turno']; ?>&fecha=<?php echo $fecha3; ?>&id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action list-group-item-secondary"><?echo $fechaescrita3;?><br><b><?php
        echo $row['turno']; ?></b>
      <br>
         <span class="badge badge-primary badge-pill"><?php echo $row['disponibles']; ?> Disponibles</span>
        </a>
        <?php }else
        {?>
        <a style="border: 1px solid #7C7A79;background:#F7767F; border-radius: 6px; margin-top: 2px; line-height:19px;" class="list-group-item list-group-item list-group-item-secondary"><?echo $fechaescrita3;?><br><del><?php
        echo $row['turno']; ?></del>
        
         
        <br>
           
         
         <span class="badge badge-danger badge-pill"> Cupos Agotados</span>
        </a>
        
        
         <? }} ?>
        </center>
         
</ul>
 </div>
 
</div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; YocaTech 2021</div>
                            <div>
                                <a href="https://www.divisionserviciossociales.com.ar">WEB OFICIAL</a>
                                &middot;
                               <!--  <a href="#">Terminos &amp; Condiciones</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
