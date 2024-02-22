<?php
require 'conexion.php';

session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$usuario_carga = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

$nombre_asiento=$_POST['nombre_asiento'];
$codigo_asiento=$_POST['codigo_asiento'];

	$query2="INSERT INTO asientos (codigo, nombre) VALUES ('$codigo_asiento','$nombre_asiento')";
    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='contabilidad.php';
</script>";


?>