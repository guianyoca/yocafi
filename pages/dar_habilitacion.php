<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];

    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $id=$_GET['id'];
    $dni=$_GET['dni'];
    $fecha=$_GET['fecha'];
    $telefono=$_GET['telefono'];
    $estado=$_GET['estado'];


    $fecha_cargada=date("d-m-Y");
    $hora_cargada=date("H:i:s");

     
    $sql2 = "UPDATE usuarios SET estado='$estado', fecha_estado='$fecha_cargada' WHERE id='$id'"; 
    $resultado2 = $mysqli->query($sql2);
    

  echo "<script>
alert('Se $estado al Usuario');
window.location.href='usuarios.php';
</script>";

    
?>