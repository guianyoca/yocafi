<?php
require 'conexion.php';

session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$usuario_carga = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $asiento=$_POST['asiento'];
    $tipo_asiento=$_POST['tipo_asiento'];
    $monto=$_POST['monto'];
    $descripcion=$_POST['descripcion'];

if ($tipo_asiento=='DEBE') {
   
    $query1="INSERT INTO contabilidad (concepto, descripcion, debe, usuario_carga) VALUES ('$asiento','$descripcion','$monto','$usuario_carga')";
    $resultado1 = $mysqli->query($query1);

}else{
   
$query1="INSERT INTO contabilidad (concepto, descripcion, haber, usuario_carga) VALUES ('$asiento','$descripcion','$monto','$usuario_carga')";
$resultado1 = $mysqli->query($query1);
}
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='contabilidad.php';
</script>";


?>