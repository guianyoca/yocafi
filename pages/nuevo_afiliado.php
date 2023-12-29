<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
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
                <div class="container mt-5">
    <form>
        <div class="row">
            <div class="col-md-6">
                <!-- Primeras cinco entradas de texto -->
                <div class="form-group">
                    <label for="campo1">Campo 1</label>
                    <input type="text" class="form-control" id="campo1" name="campo1">
                </div>
                <div class="form-group">
                    <label for="campo2">Campo 2</label>
                    <input type="text" class="form-control" id="campo2" name="campo2">
                </div>
                <!-- ... Repite esto para los campos 3, 4 y 5 -->
            </div>
            <div class="col-md-6">
                <!-- Segundas cinco entradas de texto -->
                <div class="form-group">
                    <label for="campo6">Campo 6</label>
                    <input type="text" class="form-control" id="campo6" name="campo6">
                </div>
                <div class="form-group">
                    <label for="campo7">Campo 7</label>
                    <input type="text" class="form-control" id="campo7" name="campo7">
                </div>
                <!-- ... Repite esto para los campos 8, 9 y 10 -->
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
				</main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; YocaTech 2021</div>
                            <div>
                                <a href="https://www.divisionserviciossociales.com.ar">WEB OFICIAL</a>
                                &middot;
                               <!--  <a href="#">Terminos &amp; Condiciones</a> -->
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
	</body>
</html>