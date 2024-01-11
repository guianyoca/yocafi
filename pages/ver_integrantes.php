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
    $ficha=$_GET['id'];

    $sql = "SELECT * FROM afiliado_titular WHERE id='$ficha'";
    $resultado = $mysqli->query($sql);
    while ($row = $resultado->fetch_assoc()) {
        $id_titular=$row['id_titular'];
        $nombre_titular=$row['nombre'].' '.$row['apellido'];
    }
    $sql2 = "SELECT * FROM integrantes WHERE id_titular='$ficha'";
    $resultado2 = $mysqli->query($sql2);
    
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
    
                    <h1 class="text-center">Integrantes del Afiliado <?php echo $nombre_titular; ?></h1>    
                    <div class="container">
                        <div class="row">
                            <div class='col'>
                            <a href="nuevo_integrante.php?id=<?php echo $ficha; ?>"class='btn btn-primary col-6'>Nuevo Integrante +</a>
                            </div>
                            <div class='col'>
                            <a href="#"class='btn btn-primary col-6'>Imprimir</a>
                            </div>
                        </div>
                    </div>        
    
      

 <div class="container mt-5">           
  <table class="table table-bordered table-primary">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>N° de DNI</th>
        <th>Fecha de Nacimiento</th>
        <th>Genero</th>
        <th>Vinculo</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>
    <?php while ($row2 = $resultado2->fetch_assoc()) { ?>
    <tr>
    
        <td><?php echo $row2['nombre']; ?></td>
        <td><?php echo $row2['apellido']; ?></td>
        <td><?php echo $row2['dni']; ?></td>
        <td><?php echo $row2['fecha_nacimiento']; ?></td>
        <td><?php echo $row2['genero']; ?></td>
        <td><?php echo $row2['vinculo']; ?></td>
        <td><?php echo $row2['vinculo']; ?></td>
        <td><a href="nuevo_integrante.php?id=<?php echo $row2['id']; ?>"class='btn btn-primary'>Editar</a>
        <a href="nuevo_integrante.php?id=<?php echo $row2['id']; ?>"class='btn btn-danger'>Eliminar</a></td>
        
    </tr>
    <?php } ?>
  </table>
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