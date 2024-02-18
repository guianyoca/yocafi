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
                    <h1 class="text-center">Agregar Nuevo Movimiento Contable</h1>
                    <div class="row">
                            <div class='col p-5'>
                            <a href="nuevo_documento.php"class='btn btn-primary col-4'>Agregar Asiento +</a>
                            </div>
                        </div>
                </div>
                
<div class="container mt-5">
    <form method="post" action="registra_aporte.php">
        <input type="hidden" name="id_titular" value="<?php echo $id_titular; ?>">
        <div class="row">

        <div class="col-md-4">
                <div class="form-group">
                    <label for="asiento">Concepto (Asiento):</label>
                    <select class="form-control" name="asiento">
                    <?php while ($row2 = $resultado2->fetch_assoc()) { ?>
                        <option value="<?php echo $row2['nombre']; ?>"><?php echo $row2['nombre']; ?></option>
                    <?php } ?>
                    </select>  
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo_asiento">Tipo:</label>
                    <select class="form-control" name="tipo_aporte">
                        <option value="DEBE">DEBE</option>
                        <option value="HABER">HABER</option>
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