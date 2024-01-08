<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
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