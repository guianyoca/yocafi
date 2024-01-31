<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $id_titular=$_GET['id'];
    $nombre_titular=$_GET['nombre_titular'];
	
	
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
                    <h1 class="text-center">Agregar Nuevo Documento</h1>
                </div>
                
<div class="container mt-5">
    <form method="post" action="guardar_documento.php" enctype="multipart/form-data">
        <input type="hidden" name="id_titular" value="<?php echo $id_titular; ?>">
        <input type="hidden" name="nombre_titular" value="<?php echo $nombre_titular; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción 1</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" autocomplete="off" onkeyup="mayus(this);" required>
                </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion2">Descripción 2</label>
                    <select class="form-control" name="descripcion2">
                        <option value="DNI">DNI</option>
                        <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                        <option value="ACTA DE DEFUNCION">ACTA DE DEFUNCION</option>
                    </select>  
                </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="file" name="documento" id="documento" class="form-control" required >
                </div>
            </div>         
    
        </div>
        <div class="container mt-4 text-center">
            <button type="submit" class="btn btn-lg btn-primary mx-auto">Guardar</button>
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