<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';

    $id = $_SESSION['id'];
    $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $hoysql=date('Y-m-d');
    $hoy=date('d-m-Y');


    $sql = "SELECT afiliado_titular.*, comprobantes.*
    FROM afiliado_titular
    JOIN comprobantes ON afiliado_titular.id = comprobantes.id_titular
    WHERE comprobantes.fecha_carga='$hoysql'";
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
                    <h1 class="text-center">Comprobantes Del dia de hoy <?php echo $hoy; ?></h1>    
    
    <div class="container">
       <div class="row-12">
           <div class="col-lg-12 m-2">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Monto</th>
                        <th>Concepto</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['dni']; ?></td>
                        <td><?php echo $row['monto']; ?></td>
                        <td><?php echo $row['concepto']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td <?php if($row['estado']=='PENDIENTE'){?> class='alert-warning'<?php }elseif($row['estado']=='PAGADO'){ ?> class='alert-success'<?php }else{?>class='alert-danger'<?php } ?>><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['fecha_carga']; ?></td>
                        <td><?php echo $row['hora_carga']; ?></td>
                        <td><?php echo $row['usuario_carga']; ?></td>
                        

                         <td>
                         <?php if ($row['estado']=='PENDIENTE'){?>   
                         <a href="aceptar_comprobante.php?id=<?php echo $row['id']; ?>&id_titular=<?php echo $row['id_titular']; ?>&concepto=<?php echo $row['concepto']; ?>&descripcion=<?php echo $row['descripcion']; ?>&monto=<?php echo $row['monto']; ?>"class='btn btn-success col-6 mr-2'>Aceptar</a><a href="anular_comprobante.php?id=<?php echo $row['id']; ?>"class='btn btn-danger col-6 mr-2'>Anular</a></td>
                           <?php }?> 
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
