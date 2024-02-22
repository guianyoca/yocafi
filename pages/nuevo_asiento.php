<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $sql2 = "SELECT * FROM asientos";
    $resultado2 = $mysqli->query($sql2);
	
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
        <div id="layoutSidenav">
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container mt-4"> 
                    <h1 class="text-center">Agregar Nuevo Asiento Contable</h1>
                </div>
                
<div class="container mt-5">
    <form method="post" action="registra_asiento.php">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre_asiento">Asiento Nombre:</label>
                    <input type="text" class="form-control" id="nombre_asiento" name="nombre_asiento" autocomplete="off" onkeyup="mayus(this);" required>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="codigo_asiento">Codigo del Asiento:</label>
                    <input type="number" class="form-control" id="codigo_asiento" name="codigo_asiento" autocomplete="off" required>
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