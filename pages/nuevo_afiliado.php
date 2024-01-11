<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
    $sql = "SELECT * FROM departamentos_sj";
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
        <div id="layoutSidenav">
           <?php
           include "inc_nav.php";
           ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container mt-4"> 
                    <h1 class="text-center">Agregar Nuevo Afiliado</h1>
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
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio" autocomplete="off" onkeyup="mayus(this);" required>
                </div>
            </div> 
            <div class="col-md-4">
                    <label for="departamento">Departamento</label>
                    <select class="form-control" name="departamento">
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                        <?php } ?>
                    </select>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" autocomplete="off" required>
                </div>
            </div>   
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" name="estado_civil">
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADO">CASADO</option>
                        <option value="DIVORCIADO">DIVORCIADO</option>
                        <option value="VIUDO">VIUDO</option>
                    </select>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="genero">Genero</label>
                    <select class="form-control" name="genero">
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="OTRO">OTRO</option>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo_socio">Tipo de Socio</label>
                    <select class="form-control" name="tipo_socio">
                    <?php while ($row2 = $resultado2->fetch_assoc()) { ?>
                        <option value="<?php echo $row2['tipo']; ?>"><?php echo $row2['tipo']; ?></option>
                    <?php } ?>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sector_laboral">Sector Laboral</label>
                    <select class="form-control" name="sector_laboral">
                    <?php while ($row3 = $resultado3->fetch_assoc()) { ?>
                        <option value="<?php echo $row3['centro']; ?>"><?php echo $row3['centro']; ?></option>
                    <?php } ?>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="num_padron">N° de Padron</label>
                    <input type="number" class="form-control" id="num_padron" name="num_padron" autocomplete="off" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha Ingreso</label>
                    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="observacion">Observación</label>
                    <textarea name='observacion' class="form-control" autocomplete="off"></textarea> 
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