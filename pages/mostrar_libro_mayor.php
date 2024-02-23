<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';

    $id = $_SESSION['id'];
    $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $hoy=date('d-m-Y');

    $concepto=$_POST['concepto'];
    $fecha_desde=$_POST['fecha_desde'];
    $fecha_hasta=$_POST['fecha_hasta'];

    $sql = "SELECT * FROM contabilidad WHERE concepto='$concepto' AND fecha_carga BETWEEN '$fecha_desde' AND '$fecha_hasta'";
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
                    <h1 class="text-center">Libro Mayor</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Concepto</th>
                        <th>Descripcion</th>
                        <th>Debe</th>
                        <th>Haber</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   $debe=0;
                   $haber=0;
                   while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['concepto']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['debe']; ?></td>
                        <td><?php echo $row['haber']; ?></td>
                        <td><?php echo $row['fecha_carga']; ?></td>
                        <td><?php echo $row['hora_carga']; ?></td>
                        <td><?php echo $row['usuario_carga']; ?></td>
                        <?php $debe=$debe+$row['debe'];
                                $haber=$haber+$row['haber'];
                        ?>

                         <td><a href="anular_asiento.php?id=<?php echo $row['id']; ?>"class='btn btn-danger col-12 mr-2'>Anular</a></td>
                   
                    </tr>
                    <?php } ?>
                </tbody>
            </table>  
           </div>
       </div> 
       <?php
$saldo = $haber - $debe;
$clase_estilo = $saldo >= 0 ? "text-success" : "text-danger";

echo "<h1>El Saldo entre $fecha_desde hasta $fecha_hasta del concepto $concepto es: <span class='$clase_estilo'>$saldo</span></h1>";
?>

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
