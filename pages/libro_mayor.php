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
                    <h1 class="text-center">Filtro Libro Mayor</h1>
                </div>
                
<div class="container mt-5">
    <form method="post" action="mostrar_libro_mayor.php">
        <div class="row">
            <div class="col-md-4">
                        <label for="concepto">Concepto:</label>
                        <select class="form-control" name="concepto">
                            <?php while ($row = $resultado2->fetch_assoc()) { ?>
                                <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_desde">Fecha desde:</label>
                    <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_hasta">Fecha hasta:</label>
                    <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" required>
                </div>
            </div>
    
        </div>
        <div class="container mt-4 text-center">
            <button type="submit" class="btn btn-lg btn-primary mx-auto">Filtrar</button>
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