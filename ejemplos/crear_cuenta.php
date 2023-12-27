<?php
require 'conexion.php';

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$dni=$_POST['dni'];
$email=$_POST['email'];
$clave=$_POST['clave'];
$reclave=$_POST['reclave'];
$tipo_usuario=2;
$fecha_creada=date("d-m-Y"); 
$hora_creada=date("H:i:s");

$query = "SELECT dni FROM usuarios WHERE dni='$dni'";
$resultado = $mysqli->query($query);
$num = $resultado->num_rows;

if($num===0){


if ($clave==$reclave){

$query2 = "SELECT nro_documento_afiliado FROM afiliados WHERE nro_documento_afiliado ='$dni'";
$resultado2 = $mysqli->query($query2);
$num2 = $resultado2->num_rows;

if($num2>0){
	$query3="INSERT INTO usuarios (nombre,apellido,telefono,dni,email,clave,tipo_usuario,fecha_cargada,hora_cargada) VALUES ('$nombre','$apellido','$telefono','$dni','$email','$clave','$tipo_usuario','$fecha_creada','$hora_creada')";
    $resultado3 = $mysqli->query($query3);

    echo "<script>
alert('Se Registro Con Exito!');
window.location.href='index.php';
</script>";

} else{
	
	header("Location: ../registro_gym_error.php");
} 


}else{
    
   echo "<script>
alert('Las contraseñas no coinciden');
window.location.href='register.php';
</script>";

}
} else{
	echo "<script>
alert('El DNI ya se encuentra registrado');
window.location.href='index.php';
</script>";
}
?>