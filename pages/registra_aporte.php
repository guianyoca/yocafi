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
    $monto=-$monto;
    $sql = "SELECT saldo FROM aportes WHERE id_titular = $id_titular ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $ultimoSaldo = $row["saldo"];
    $saldo=$ultimoSaldo+$monto;
}
    $query1="INSERT INTO aportes (id_titular, concepto, descripcion, deuda, saldo, usuario_carga) VALUES ('$id_titular','$concepto','$descripcion','$monto','$saldo','$usuario_carga')";
    $resultado1 = $mysqli->query($query1);

}else{
    $sql2 = "SELECT saldo FROM aportes WHERE id_titular = $id_titular ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql2);
if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $ultimoSaldo = $row["saldo"];
    $saldo=$ultimoSaldo+$monto;
}
    $query2="INSERT INTO aportes (id_titular, concepto, descripcion, pago, saldo, usuario_carga) VALUES ('$id_titular','$concepto','$descripcion','$monto','$saldo','$usuario_carga')";
    $resultado2 = $mysqli->query($query2);

    $query1a="INSERT INTO comprobantes (id_titular, monto, concepto, descripcion, usuario_carga) VALUES ('$id_titular','$monto','$concepto','$descripcion','$usuario_carga')";
    $resultado1a = $mysqli->query($query1a);
}
    
    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='estados_cuentas.php';
</script>";


?>