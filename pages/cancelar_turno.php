<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $nombre_apellido="$nombre $apellido";

    $dni = $_SESSION['dni'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
    $id=$_GET['id'];
    $dni=$_GET['dni'];
    $fecha=$_GET['fecha'];
    $turno=$_GET['turno'];

    // date_default_timezone_set('America/Argentina/Buenos_Aires');

    $fecha_cargada=date("d-m-Y");
    $hora_cargada=date("H:i:s");

    $sql3 = "UPDATE contador_horarios SET  disponibles=disponibles+1 WHERE fecha='$fecha' AND turno='$turno'";
    $resultado3 = $mysqli->query($sql3); 
    
    $sql = "INSERT INTO turnos_cancelados (nombre_apellido, dni, fecha, turno, fecha_cargada, hora_cargada)VALUES ('$nombre_apellido','$dni','$fecha','$turno','$fecha_cargada','$hora_cargada')";
    $resultado = $mysqli->query($sql);


    $sql8 = "SELECT * FROM turnos_asignados WHERE dni='$dni'";
    $resultado8 = $mysqli->query($sql8);
    while($row = mysqli_fetch_array($resultado8)){
    $cantidad=$row[0];
    };
    $sql2 = "DELETE FROM turnos_asignados WHERE id='$id'";
    $resultado2 = $mysqli->query($sql2);

   
   

  echo "<script>
alert('Su Turno Fue Cancelado');
window.location.href='mis_turnos.php';
</script>";

    
?>