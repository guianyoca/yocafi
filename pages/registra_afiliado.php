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
$estado="HABILITADO";
$fecha_creada=date("Y-m-d"); 
$hora_creada=date("H:i:s");

$query = "SELECT dni FROM afiliado_titular WHERE dni='$dni'";
$resultado = $mysqli->query($query);
$num = $resultado->num_rows;

if($num===0){

	$query2="INSERT INTO afiliado_titular (nombre, apellido, dni, fecha_nacimiento, domicilio, telefono, email, departamento, estado_civil, genero, tipo_socio, servicio_salud, padron, sector_laboral, usuario_carga, estado, fecha_carga, hora_carga) VALUES ('$nombre','$apellido','$dni','$fecha_nacimiento','$domicilio','$telefono','$email','$departamento','$estado_civil','$genero','$tipo_socio','$servicio_salud','$num_padron','$sector_laboral','$usuario_carga','$estado','$fecha_creada','$hora_creada')";
    $resultado2 = $mysqli->query($query2);

	$query3="SELECT id
	FROM afiliado_titular
	ORDER BY id DESC
	LIMIT 1";
	$resultado3 = $mysqli->query($query3);
	if ($resultado3->num_rows > 0) {
		$row = $resultado3->fetch_assoc();
		$id_titular=$row["id"];
	}

	$query4="SELECT valor_servicio
	FROM tipos_socios
	WHERE tipo='$tipo_socio'";
	$resultado4 = $mysqli->query($query4);
	if ($resultado4->num_rows > 0) {
		$row4 = $resultado4->fetch_assoc();
		$valor_servicio=$row4["valor_servicio"];
	}

	$meses = array(
		1 => "ENERO",
		2 => "FEBRERO",
		3 => "MARZO",
		4 => "ABRIL",
		5 => "MAYO",
		6 => "JUNIO",
		7 => "JULIO",
		8 => "AGOSTO",
		9 => "SEPTIEMBRE",
		10 => "OCTUBRE",
		11 => "NOVIEMBRE",
		12 => "DICIEMBRE"
	);
	
	$mesConPalabra = $meses[date("n")];
	$anoConNumero = date("Y");   


    $concepto="CUOTA SOCIO";
    $tipo_aporte="DEUDA";
    $monto_servicio=$valor_servicio;
    $descripcion="DEUDA DE CUOTA MES $mesConPalabra $anoConNumero";


    $query1="INSERT INTO aportes (id_titular, concepto, descripcion, deuda, saldo, usuario_carga) VALUES ('$id_titular','$concepto','$descripcion','$monto_servicio','-$monto_servicio','$usuario_carga')";
    $resultado1 = $mysqli->query($query1);

    
    $query1a="INSERT INTO comprobantes (id_titular, monto, concepto, descripcion, usuario_carga) VALUES ('$id_titular','$monto_servicio','$concepto','$descripcion','$usuario_carga')";
    $resultado1a = $mysqli->query($query1a);


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