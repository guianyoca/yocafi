<?php
require 'conexion.php';
$dni=$_POST['dni'];

$query = "SELECT nro_documento_afiliado FROM afiliados WHERE nro_documento_afiliado ='$dni'";
$resultado = $mysqli->query($query);
$num = $resultado->num_rows;

$query2= "SELECT dni FROM usuarios WHERE dni='$dni'";
$resultado2= $mysqli->query($query2);
$num2= $resultado2->num_rows;

if($num2===0){

if($num>0){
    header("Location: register.php");   
}else{
	
	header("Location: ../registro_gym_error.php");

} 


}else{ 

	echo "<script>
alert('El DNI ya se encuentra registrado');
window.location.href='index.php';
</script>";
} 

?>