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
$descripcion=$_POST['descripcion'];
$documento=$_FILES["documento"]["name"];
$ubicacion = "documentos/" . $documento;
move_uploaded_file($_FILES["documento"]["tmp_name"], $ubicacion);

	$query2="INSERT INTO documentos (id_titular, descripcion, ubicacion, usuario_carga) VALUES ('$id_titular','$descripcion','$ubicacion','$usuario_carga')";
    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='ver_afiliados.php';
</script>";


?>