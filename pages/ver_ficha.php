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
    
                    <h1 class="text-center">Ficha de Afiliado</h1>    
    <?php while ($row = $resultado->fetch_assoc()) { ?>
      
            <div class="container">
                <div class="row">
                    <div class='col'>
                    <a href="ver_integrantes.php?id=<?php echo $row['id']; ?>"class='btn btn-info col-12'>Integrantes</a>
                    </div>
                    <div class='col'>
                    <a href="ver_documentos.php?id=<?php echo $row['id']; ?>"class='btn btn-info col-12'>Documentos digitales</a>
                    </div>
                    <div class='col'>
                    <a href="ver_ficha.php?id=<?php echo $row['id']; ?>"class='btn btn-info col-12'>Ver Ficha</a>
                    </div>
                    
                </div>
            </div> 

 <div class="container mt-5">           
  <table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <td><?php echo $row['nombre']; ?></td>
    </tr>
    <tr>
        <th>Apellido</th>
        <td><?php echo $row['apellido']; ?></td>
    </tr>
    <tr>
        <th>N° de DNI</th>
        <td><?php echo $row['dni']; ?></td>
    </tr>
    <tr>
        <th>Fecha de Nacimiento</th>
        <td><?php echo $row['fecha_nacimiento']; ?></td>
    </tr>
    <tr>
        <th>Domicilio</th>
        <td><?php echo $row['domicilio']; ?></td>
    </tr>
    <tr>
        <th>Departamento</th>
        <td><?php echo $row['departamento']; ?></td>
    </tr>
    <tr>
        <th>N° de Telefono</th>
        <td><?php echo $row['telefono']; ?></td>
    </tr>
    <tr>
        <th>Correo Electronico</th>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <th>Estado Civil</th>
        <td><?php echo $row['estado_civil']; ?></td>
    </tr>
    <tr>
        <th>Género</th>
        <td><?php echo $row['genero']; ?></td>
    </tr>
    <tr>
        <th>Tipo de Socio</th>
        <td><?php echo $row['tipo_socio']; ?></td>
    </tr>
    <tr>
        <th>N° de Padrón</th>
        <td><?php echo $row['padron']; ?></td>
    </tr>
    <tr>
        <th>Sector Laboral</th>
        <td><?php echo $row['sector_laboral']; ?></td>
    </tr>
    <tr>
        <th>Observación</th>
        <td><?php echo $row['observacion']; ?></td>
    </tr>
    <tr>
        <th>Fecha de Ingreso</th>
        <td><?php echo $row['fecha_carga']; ?></td>
    </tr>
    <tr>
        <th>Hora de ingreso</th>
        <td><?php echo $row['hora_carga']; ?></td>
    </tr>
    <tr>
        <th>Usuario que lo ingresa</th>
        <td><?php echo $row['usuario_carga']; ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?php echo $row['estado']; ?></td>
    </tr>
    <tr>
        <th>Fecha de Estado</th>
        <td><?php echo $row['fecha_estado']; ?></td>
    </tr>
    <tr>
        <th>Hora de Estado</th>
        <td><?php echo $row['hora_estado']; ?></td>
    </tr>
    <tr>
        <th>Fecha de Baja</th>
        <td><?php echo $row['fecha_baja']; ?></td>
    </tr>
    <tr>
        <th>Hora de Baja</th>
        <td><?php echo $row['hora_baja']; ?></td>
    </tr>
  </table>
</div>
   
</tr>
                    <?php } ?>

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
