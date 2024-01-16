<?php
require 'conexion.php';

session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
    $id = $_SESSION['id'];
	$usuario_carga = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$domicilio=$_POST['domicilio'];
$departamento=$_POST['departamento'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$estado_civil=$_POST['estado_civil'];
$genero=$_POST['genero'];
$tipo_socio=$_POST['tipo_socio'];
$servicio_salud=$_POST['servicio_salud'];
$sector_laboral=$_POST['sector_laboral'];
$num_padron=$_POST['num_padron'];
$fecha_ingreso=$_POST['fecha_ingreso'];
$observacion=$_POST['observacion'];
$estado="HABILITADO";
$fecha_creada=date("d-m-Y"); 
$hora_creada=date("H:i:s");

$query = "SELECT dni FROM afiliado_titular WHERE dni='$dni'";
$resultado = $mysqli->query($query);
$num = $resultado->num_rows;

if($num===0){

	$query2="INSERT INTO afiliado_titular (nombre, apellido, dni, fecha_nacimiento, domicilio, telefono, email, departamento, estado_civil, genero, tipo_socio, servicio_salud, padron, sector_laboral, usuario_carga, estado, observacion) VALUES ('$nombre','$apellido','$dni','$fecha_nacimiento','$domicilio','$telefono','$email','$departamento','$estado_civil','$genero','$tipo_socio','$servicio_salud','$num_padron','$sector_laboral','$usuario_carga','$estado','$observacion')";
    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='ver_afiliados.php';
</script>";

} else{
	echo "<script>
alert('El DNI ya se encuentra registrado');
window.location.href='nuevo_afiliado.php';
</script>";
}
?>