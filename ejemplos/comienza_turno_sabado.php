<?php
require 'conexion.php';
$fecha = date("d-m-Y", strtotime($_POST['fecha']));

$fecha = date("d-m-Y", strtotime($_POST['fecha']));
$query465 = "SELECT fecha FROM contador_horarios WHERE fecha ='$fecha'";
    $resultado465 = $mysqli->query($query465);
    $num465 = $resultado465->num_rows;

if($num465===0){ 

$disponibles=7;

 $turno1="08:00HS - 09:30HS";
 $turno2="10:00HS - 11:30HS";
 $turno3="12:00HS - 13:30HS";


$query1="INSERT INTO contador_horarios (fecha, turno, disponibles) VALUES ('$fecha','$turno1','$disponibles')";
$resultado1 = $mysqli->query($query1);

$query2="INSERT INTO contador_horarios (fecha, turno, disponibles) VALUES ('$fecha','$turno2','$disponibles')";
$resultado2 = $mysqli->query($query2);

$query3="INSERT INTO contador_horarios (fecha, turno, disponibles) VALUES ('$fecha','$turno3','$disponibles')";
$resultado3 = $mysqli->query($query3);



echo "<script>
alert('Cargo nuevo turno - Sábado');
window.location.href='turno_nuevo.php';
</script>";

}else {
    echo "<script>
alert('Esa Fecha Ya fue Cargada');
window.location.href='turno_nuevo.php';
</script>";
}
?>