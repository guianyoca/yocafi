<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $nombre_apellido="$nombre $apellido";

    
    $id=$_GET['id'];
  
    $sql2 = "DELETE FROM integrantes WHERE id='$id'";
    $resultado2 = $mysqli->query($sql2);

   
   

  echo "<script>
alert('Su Turno Fue Cancelado');
window.location.href='mis_turnos.php';
</script>";

?>