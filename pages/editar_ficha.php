<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	require 'conexion.php';
    $id = $_SESSION['id'];
	$usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
    $ficha = $_GET['id'];
	
    $sql = "SELECT * FROM departamentos_sj";
    $resultado = $mysqli->query($sql);

    $sql2 = "SELECT * FROM tipos_socios";
    $resultado2 = $mysqli->query($sql2);

    $sql3 = "SELECT * FROM sectores_laborales";
    $resultado3 = $mysqli->query($sql3);

    $sql4 = "SELECT * FROM afiliado_titular WHERE id='$ficha'";
    $resultado4 = $mysqli->query($sql4);
	
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
                    <h1 class="text-center">Editar Afiliado</h1>
                </div>
                <?php while ($row4 = $resultado4->fetch_assoc()) { ?>             
<div class="container mt-5">
    <form method="post" action="actualiza_afiliado.php">
    <input type="hidden" name="id_titular" value="<?php echo $ficha; ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control alert-primary" id="nombre" name="nombre" autocomplete="off" onkeyup="mayus(this);" value='<?php echo $row4['nombre']; ?>' required>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control alert-primary" id="apellido" name="apellido" autocomplete="off" onkeyup="mayus(this);" value='<?php echo $row4['apellido']; ?>' required>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dni">N° de DNI</label>
                    <input type="number" class="form-control alert-primary" id="dni" name="dni" autocomplete="off" value='<?php echo $row4['dni']; ?>' required>
                </div>
            </div>  
            <div class="col-md-2">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control alert-primary" id="fecha_nacimiento" name="fecha_nacimiento" 
                    <?php $fechaDesdeBD = $row4['fecha_nacimiento'];
                    $fechaObj = DateTime::createFromFormat('Y-m-d', $fechaDesdeBD);
                    if ($fechaObj !== false) {
                        // Formatea la fecha en el nuevo formato (d/m/Y)
                        $fechaFormateada = $fechaObj->format('d/m/Y');
                        
                    }
                ?>value='<?php echo $fechaFormateada; ?>' required>
                    <?php echo $fechaFormateada; ?>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control alert-primary" id="domicilio" name="domicilio" autocomplete="off" onkeyup="mayus(this);" value='<?php echo $row4['domicilio']; ?>' required>
                </div>
            </div> 
            <div class="col-md-4">
                    <label for="departamento">Departamento</label>
                    <select class="form-control alert-primary" name="departamento">
                            <option value='<?php echo $row4['departamento']; ?>' selected><?php echo $row4['departamento']; ?></option>
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                        <?php } ?>
                    </select>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" class="form-control alert-primary" id="telefono" name="telefono" autocomplete="off" value='<?php echo $row4['telefono']; ?>' required>
                </div>
            </div>   
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control alert-primary" id="email" name="email" autocomplete="off" value='<?php echo $row4['email']; ?>'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control alert-primary" name="estado_civil">
                    <option value='<?php echo $row4['estado_civil']; ?>' selected><?php echo $row4['estado_civil']; ?></option>
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
                    <select class="form-control alert-primary" name="genero">
                    <option value='<?php echo $row4['genero']; ?>' selected><?php echo $row4['genero']; ?></option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="OTRO">OTRO</option>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo_socio">Tipo de Socio</label>
                    <select class="form-control alert-primary" name="tipo_socio">
                    <option value="<?php echo $row4['tipo_socio']; ?>" selected><?php echo $row4['tipo_socio']; ?></option>
                    <?php while ($row2 = $resultado2->fetch_assoc()) { ?>
                        <option value="<?php echo $row2['tipo']; ?>"><?php echo $row2['tipo']; ?></option>
                    <?php } ?>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="servicio_salud">Servicio de Salud</label>
                    <select class="form-control alert-primary" name="servicio_salud">
                    <option value="<?php echo $row4['servicio_salud']; ?>" selected><?php echo $row4['servicio_salud']; ?></option>
                        <option value="NO">NO</option>
                        <option value="SI">SI</option>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sector_laboral">Sector Laboral</label>
                    <select class="form-control alert-primary" name="sector_laboral">
                    <option value="<?php echo $row4['sector_laboral']; ?>" selected><?php echo $row4['sector_laboral']; ?></option>
                    <?php while ($row3 = $resultado3->fetch_assoc()) { ?>
                        <option value="<?php echo $row3['centro']; ?>"><?php echo $row3['centro']; ?></option>
                    <?php } ?>
                    </select>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="num_padron">N° de Padron</label>
                    <input type="number" class="form-control alert-primary" id="num_padron" name="num_padron" autocomplete="off" value="<?php echo $row4['padron']; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="servicio_salud">Estado</label>
                    <select class="form-control alert-primary" name="estado">
                    <option value="<?php echo $row4['estado']; ?>" selected><?php echo $row4['estado']; ?></option>
                        <option value="HABILITADO">HABILITADO</option>
                        <option value="DESHABILITADO">DESHABILITADO</option>
                    </select>  
                </div>
            </div>
        </div>
        <div class="container mt-4 text-center">
            <button type="submit" class="btn btn-lg btn-primary mx-auto">Registrar</button>
        </div>
    </form>
</div>
<?php } ?>
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