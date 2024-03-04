<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
    $sql = "SELECT * FROM servicios";
    $resultado = $mysqli->query($sql);

    $sql2 = "SELECT * FROM tipos_socios";
    $resultado2 = $mysqli->query($sql2);

    $sql3 = "SELECT * FROM sectores_laborales";
    $resultado3 = $mysqli->query($sql3);
	
?>

<?php
    include "header.php";
?>
<script>
    $(document).ready(function(){
      // Desactivar el autocompletado para todos los inputs
      $('input').attr('autocomplete', 'off');
    });

    function mayus(e) {
    e.value = e.value.toUpperCase();
}
  </script>
    <body class="sb-nav-fixed">
    <?php
    include "nav_principal.php";
    ?>
        <div id="layoutSidenav">a
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container mt-4"> 
                    <h1 class="text-center">Agregar Nueva Reserva</h1>
                </div>
                
<div class="container mt-5">
    <form method="post" action="registra_afiliado.php">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" onkeyup="mayus(this);" required>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" autocomplete="off" onkeyup="mayus(this);" required>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dni">N° de DNI</label>
                    <input type="number" class="form-control" id="dni" name="dni" autocomplete="off" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="socio">Socio</label>
                    <select class="form-control" name="socio">
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>    
                </div>
            </div>
            <div class="col-md-4">
                    <label for="servicio">Servicio</label>
                    <select class="form-control" name="servicio">
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['servicio']; ?>"><?php echo $row['servicio']; ?></option>
                        <?php } ?>
                    </select>
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Servicio</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="hora_servicio">Hora de Servicio</label>
                    <input type="time" class="form-control" id="hora_servicio" name="hora_servicio" required>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" rows="5" cols="50" name="descripcion"></textarea>
                </div>
            </div> 
 
        </div>
        <div class="container mt-4 text-center">
            <button type="submit" class="btn btn-lg btn-primary mx-auto">Registrar</button>
        </div>
    </form>
</div>
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