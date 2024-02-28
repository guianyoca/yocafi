<?php
require('../assets/fpdf/fpdf.php');
session_start();
$usuario = $_SESSION['usuario'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
    $this->Image('logo_cesap.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'CESAP ',0,0,'C');
    $this->SetFont('Arial','B',10);
    $this->Ln(10);
    $this->Cell(200,10,'Domicilio: Calle Entre Rios 532 Sur Ciudad. Capital. San Juan ',0,0,'C');
    $this->Ln(10);
    $this->Cell(135,10,'Telefono: 264 4272167',0,0,'C');
    $this->Ln(25);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(60,10,'Ficha de Afiliado ',0,0,'C');
    // Salto de línea
    $this->Ln(15);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}
$id=$_GET['id'];
require ("conexion.php");
$query = "SELECT * FROM afiliado_titular WHERE id='$id'";
$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row=$resultado->fetch_assoc()) {
    
    $pdf->Cell(80,10,'Nombre:',1,0,'C',0);
	$pdf->Cell(80,10,$row['nombre'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Apellido:',1,0,'C',0);
	$pdf->Cell(80,10,$row['apellido'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'DNI:',1,0,'C',0);
	$pdf->Cell(80,10,$row['dni'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Fecha de Nacimiento:',1,0,'C',0);
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $timestamp1 = strtotime($fecha_nacimiento);
    $fecha_formateada1 = date('d-m-Y', $timestamp1);
	$pdf->Cell(80,10,$fecha_formateada1,1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Domicilio::',1,0,'C',0);
	$pdf->Cell(80,10,$row['domicilio'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Departamento:',1,0,'C',0);
	$pdf->Cell(80,10,$row['departamento'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Telefono:',1,0,'C',0);
	$pdf->Cell(80,10,$row['telefono'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Email:',1,0,'C',0);
	$pdf->Cell(80,10,$row['email'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Estado Civil:',1,0,'C',0);
	$pdf->Cell(80,10,$row['estado_civil'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Genero:',1,0,'C',0);
	$pdf->Cell(80,10,$row['genero'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Tipo de Socio:',1,0,'C',0);
	$pdf->Cell(80,10,$row['tipo_socio'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Padron:',1,0,'C',0);
	$pdf->Cell(80,10,$row['padron'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Estado:',1,0,'C',0);
	$pdf->Cell(80,10,$row['estado'],1,0,'C',0);
    $pdf->Ln(10);
    $pdf->Cell(80,10,'Fecha de Carga:',1,0,'C',0);
    $fecha_carga = $row['fecha_carga'];
    $timestamp2 = strtotime($fecha_carga);
    $fecha_formateada2 = date('d-m-Y', $timestamp2);
	$pdf->Cell(80,10,$fecha_formateada2,1,0,'C',0);
    $pdf->Ln(10);

} 
$fecha=date('d-m-Y');
$pdf->Ln(10);
$pdf->Cell(80,10,'Fecha de Impresion: '.$fecha,0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(80,10,'Atendido por: '.$usuario,0,0,'C',0);

	$pdf->Output();
?>