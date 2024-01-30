<?php
require 'conexion.php';

session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$usuario_carga = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

$id_titular=$_POST['id_titular'];
$tipo_observacion=$_POST['tipo_observacion'];
$observacion=$_POST['observacion'];

	$query2="INSERT INTO observaciones (id_titular, observacion, tipo_observacion, usuario_carga) VALUES ('$id_titular','$observacion','$tipo_observacion','$usuario_carga')";
    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='ver_afiliados.php';
</script>";


?>