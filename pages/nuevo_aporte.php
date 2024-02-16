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
                    <h1 class="text-center">Agregar Nueva Movimiento de Aporte</h1>
                </div>
                
<div class="container mt-5">
    <form method="post" action="registra_aporte.php">
        <input type="hidden" name="id_titular" value="<?php echo $id_titular; ?>">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="concepto">Concepto:</label>
                    <select class="form-control" name="concepto">
                        <option value="CUOTA SOCIO">CUOTA SOCIO</option>
                        <option value="CUOTA COLATERAL">CUOTA COLATERAL</option>
                        <option value="PROVEDURIA">PROVEDURIA</option>
                        <option value="CAMPING">CAMPING</option>
                        <option value="OTRO">OTRO</option>
                    </select>  
                </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo_aporte">Tipo:</label>
                    <select class="form-control" name="tipo_aporte">
                        <option value="CUOTA SOCIO">DEUDA</option>
                        <option value="HABILITA">PAGO</option>
                    </select>  
                </div>
            </div> 

            <div class="col-md-4">
                <div class="form-group">
                    <label for="monto">Monto:</label>
                    $<input type="number" class="form-control" id="monto" name="monto" autocomplete="off" required>
                </div>
            </div> 

            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" class="form-control" required>
                    </textarea>   
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