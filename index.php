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
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
    	<link href="assets/css/style.css" rel="stylesheet">
        <title>YOCAFI</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <body>
        
				<section class="form-01-main">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png">
                </a>
              </div>
              <form action='index.php' method='post'>
              <div class="form-group">
                  <input id="usuario" name="usuario" class="form-control _ge_de_ol" type="text" placeholder="Usuario" required="" aria-required="true">
              </div>

              <div class="form-group">                                              
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

              <div class="form-group">
                <div class="btn_uy">
                  <span><input type="submit" class="btn-ingresar"></span>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
				
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-dark">
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
	</body>
</html>
