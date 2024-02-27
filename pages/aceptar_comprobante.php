<?php

    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    
    $usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $id=$_GET['id'];
    $id_titular=$_GET['id_titular'];
    $concepto=$_GET['concepto'];
    $descripcion=$_GET['descripcion'];
    $monto=$_GET['monto'];
    $id=$_GET['id'];

    $fecha_estado=date('Y-m-d');
    $hora_estado=date('H:i:s');

    $sql2 = "SELECT saldo FROM aportes WHERE id_titular = $id_titular ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql2);
if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $ultimoSaldo = $row["saldo"];
    $saldo=$ultimoSaldo+$monto;
}
  
    $sql2 = "UPDATE comprobantes SET estado='PAGADO',fecha_estado='$fecha_estado', hora_estado='$hora_estado',usuario_estado='$usuario'  WHERE id='$id'";
    
    $resultado2 = $mysqli->query($sql2);

   
    $sql3 = "INSERT INTO aportes (id_titular, concepto, descripcion, pago, saldo, usuario_carga) VALUES ('$id_titular','$concepto','$descripcion','$monto','$saldo','$usuario')";
    
    $resultado3 = $mysqli->query($sql3);


  echo "<script>
alert('Comprobante Pagado');
window.location.href='comprobantes_todos.php';
</script>";

?>
