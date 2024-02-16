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
$concepto=$_POST['concepto'];
$tipo_aporte=$_POST['tipo_aporte'];
$monto=$_POST['monto'];
$descripcion=$_POST['descripcion'];

if ($tipo_aporte=='DEUDA') {
    $query1="INSERT INTO aportes (id_titular, concepto, descripcion, deuda, saldo, fecha_deuda, hora_deuda, usuario_deuda) VALUES ('$id_titular','$observacion','$tipo_observacion','$usuario_carga')";
    $resultado1 = $mysqli->query($query1);
}else{
    $query2="INSERT INTO aportes (id_titular, concepto, descripcion, pago, saldo, fecha_carga, hora_carga, usuario_carga) VALUES ('$id_titular','$observacion','$tipo_observacion','$usuario_carga')";
    $resultado2 = $mysqli->query($query2);
}
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='estados_cuentas.php';
</script>";


?>