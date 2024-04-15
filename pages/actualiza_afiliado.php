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
$estado=$_POST['estado'];
$fecha_edicion=date("d-m-Y"); 
$hora_edicion=date("H:i:s");



	$query2="UPDATE afiliado_titular SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nacimiento='$fecha_nacimiento', domicilio='$domicilio', telefono='$telefono', email='$email', departamento='$departamento', estado_civil='$estado_civil', genero='$genero', tipo_socio='$tipo_socio', servicio_salud='$servicio_salud', padron='$num_padron', sector_laboral='$sector_laboral', estado='$estado', fecha_edicion='$fecha_edicion', hora_edicion='$hora_edicion', usuario_edita='$usuario_carga' WHERE id='$id_titular'";

    $resultado2 = $mysqli->query($query2);
    
    echo "<script>
alert('Se Actualizo Con Exito!');
window.location.href='ver_afiliados.php';
</script>";

?>