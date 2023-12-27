<?php
session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
}
    
    require 'conexion.php';  
    $dni = $_POST['dni'];

    $query88 = "SELECT dni FROM usuarios WHERE dni='$dni'";
    $resultado88 = $mysqli->query($query88);
    $num88 = $resultado88->num_rows;

if(($num88===1)&&($dni!=NULL)){  

       
$query="UPDATE usuarios SET clave='1111' WHERE dni='$dni'";
        $resultado = $mysqli->query($query);


echo "<script>
alert('Se blanqueo la clave sera ahora: 1111');
window.location.href='turnos_gym.php';
</script>"; 

 } else{
    echo "<script>
alert('El dni no existe');
window.location.href='blanquear_clave.php';
</script>";
}

    
?>