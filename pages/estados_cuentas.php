<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';

    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $hoy=date('d-m-Y');


    $sql = "SELECT * FROM afiliado_titular";
    $resultado = $mysqli->query($sql);
    
?>

<?php
    include "header.php";
?>
    <body class="sb-nav-fixed">
    <?php
    include "nav_principal.php";
    ?>
        <div id="layoutSidenav">
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                    <h1 class="text-center">Estado de Cuentas</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['dni']; ?></td>
                        <td><?php echo $row['tipo_socio']; ?></td>

                      
                        <?php 
                         if ($row['estado']==1) {?>
                             <td style='background-color:#D4F7D4'><span class="badge badge-success badge-pill col-6"> Habilitado</span><a href="dar_habilitacion.php?id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>&apellido=<?php echo $row['apellido']; ?>&fecha=<?php echo $hoy; ?>&estado=<?php echo 'Suspendido'; ?>"class='btn btn-danger col-6'>Suspender</a></td>
                         <?php     
                         }elseif ($row['estado']==0) {?>
                             <td style='background-color:#F1D5D7'><span class="badge badge-danger badge-pill col-6"> Suspendido</span><a href="dar_habilitacion.php?id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>&apellido=<?php echo $row['apellido']; ?>&fecha=<?php echo $hoy; ?>&estado=<?php echo 'Habilitado'; ?>" class='btn btn-success col-6'>Habilitar</a></td>
                        <?php
                         } else {
                        ?>
                           <td> <a href="dar_habilitacion.php?id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>&apellido=<?php echo $row['apellido']; ?>&dni=<?php echo $row['dni']; ?>&telefono=<?php echo $row['telefono']; ?>&fecha=<?php echo $hoy; ?>&estado=<?php echo 'Habilitado'; ?>" class='btn btn-success col-6'>Habilitar</a><a href="dar_habilitacion.php?id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>&apellido=<?php echo $row['apellido']; ?>&dni=<?php echo $row['dni']; ?>&telefono=<?php echo $row['telefono']; ?>&fecha=<?php echo $hoy; ?>&estado=<?php echo 'Suspendido'; ?>"class='btn btn-danger col-6'>Suspender</a></td>
                        <?php } ?> 
                   
                    </tr>
                    <?php } ?>
                </tbody>
            </table>  
         
           </div>
       </div> 
    </div>
   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    

      
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            language: {
            url:'https://cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json'
            }
        });
    } );  
    
    </script>
                </main>
                <?php
                    include "footer.php";
                ?>
            </div>
        </div>
        <?php
           include "scripts_pie.php";
        ?>
    </body>
</html>
