<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    
    $usuario = $_SESSION['usuario'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

    $id=$_GET['id'];
    $fecha_estado=date('Y-m-d');
    $hora_estado=date('H:i:s');
  
    $sql2 = "UPDATE comprobantes SET estado='ANULADO',fecha_estado='$fecha_estado', hora_estado='$hora_estado',usuario_estado='$usuario'  WHERE id='$id'";
    
    $resultado2 = $mysqli->query($sql2);

   
   

  echo "<script>
alert('Comprobante Anulado');
window.location.href='comprobantes_todos.php';
</script>";

?>