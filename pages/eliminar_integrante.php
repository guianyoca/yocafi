<?php
    
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    require 'conexion.php';
      
    $id=$_GET['id'];
  
    $sql2 = "DELETE FROM integrantes WHERE id='$id'";
    $resultado2 = $mysqli->query($sql2);

   
   

  echo "<script>
alert('Integrante Fue Eliminado');
window.location.href='ver_afiliados.php';
</script>";

?>