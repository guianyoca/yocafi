<?php
session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
}
    
    require 'conexion.php';  
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $dni = $_SESSION['dni'];
    $fecha = $_GET['fecha'];
    $turno = $_GET['turno'];
    $id = $_GET['id'];
    $col_cantidad=1;


    $fecha_cargada=date("d-m-Y"); 
    $hora_cargada=date("H:i:s");

    $mensaje="El dia $fecha a las $turno";

    $query88 = "SELECT dni FROM turnos_asignados WHERE dni='$dni' AND fecha='$fecha'";
    $resultado88 = $mysqli->query($query88);
    $num88 = $resultado88->num_rows;

if(($num88===0)&&($dni!=NULL)){  

       
$query="INSERT INTO turnos_asignados (nombre,apellido,dni,fecha,turno,fecha_cargada,hora_cargada) VALUES ('$nombre','$apellido','$dni','$fecha','$turno','$fecha_cargada','$hora_cargada')";
        $resultado = $mysqli->query($query);

$query5="INSERT INTO turnos_historial (nombre,apellido,dni,fecha,turno,fecha_cargada,hora_cargada) VALUES ('$nombre','$apellido','$dni','$fecha','$turno','$fecha_cargada','$hora_cargada')";
        $resultado5 = $mysqli->query($query5);        
        
$query222="UPDATE contador_horarios SET  disponibles=disponibles-1 WHERE fecha='$fecha' AND turno='$turno'";
    $resultado222 = $mysqli->query($query222);

echo "<script>
alert('Su Turno Fue Confirmado $mensaje');
window.location.href='turnos_gym.php';
</script>"; 

 } else{
    echo "<script>
alert('Usted ya tiene turno este dia');
window.location.href='turnos_gym.php';
</script>";
}

    
?>