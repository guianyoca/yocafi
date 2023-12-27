<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];

    $dni = $_SESSION['dni'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $id=$_GET['id'];
    $dni=$_GET['dni'];
    $fecha=$_GET['fecha'];
    $turno=$_GET['turno'];
    $estado=$_GET['estado'];


    $fecha_cargada=date("d-m-Y");
    $hora_cargada=date("H:i:s");


    $sql = "INSERT INTO asistencias (nombre, apellido, dni, fecha, turno, estado, fecha_cargada, hora_cargada)VALUES ('$nombre', '$apellido','$dni','$fecha','$turno','$estado' ,'$fecha_cargada','$hora_cargada')";
    $resultado = $mysqli->query($sql);
     
    $sql2 = "UPDATE turnos_asignados SET estado='$estado' WHERE id='$id'"; 
    $resultado2 = $mysqli->query($sql2);
    

  echo "<script>
alert('Dio $estado al Turno');
window.location.href='asistencia_dia.php';
</script>";

    
?>