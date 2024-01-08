<?php
	
	require "pages/conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM usuarios WHERE correo='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['clave'];
			
			$pass_c = $password;
			
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['usuario'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: pages/principal.php");
				
			} else {
			
			echo "<script>
alert('La Contraseña es Incorrecta');
window.location.href='index.php';
</script>";
			
			}
			
			
			} else {
			echo "<script>
alert('El Usuario No Existe');
window.location.href='index.php';
</script>";
		}
		
		
		
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>YOCAFI</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">ACCEDER A YOCAFI</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingrese su usuario" required /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Contraseña</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingrese su Contraseña" required /></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><!-- <a class="small" href="password.html">Olvido su Contraseña?</a> -->
											<div class="card-body text-center">
											<button type="submit" class="btn btn-primary">Ingresar</button>
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <a href="http://www.yocatech.com">YocaTech 2021</a></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Termino &amp; Condiciones</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
	</body>
</html>
