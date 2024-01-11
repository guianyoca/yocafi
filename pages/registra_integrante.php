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
$nombre_titular=$_POST['nombre_titular'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$genero=$_POST['genero'];
$vinculo=$_POST['vinculo'];
$estado="HABILITADO";
$fecha_creada=date("d-m-Y"); 
$hora_creada=date("H:i:s");

$query = "SELECT dni FROM integrantes WHERE dni='$dni'";
$resultado = $mysqli->query($query);
$num = $resultado->num_rows;

if($num===0){

	$query2="INSERT INTO integrantes (id_titular, nombre, apellido, dni, fecha_nacimiento, genero, vinculo, usuario_carga) VALUES ('$id_titular','$nombre','$apellido','$dni','$fecha_nacimiento','$genero','$vinculo','$usuario_carga')";
    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='ver_afiliados.php';
</script>";

} else{
	echo "<script>
alert('El DNI ya se encuentra registrado');
window.location.href='nuevo_integrante.php';
</script>";
}
?>