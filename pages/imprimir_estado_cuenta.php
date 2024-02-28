<?php
require('../assets/fpdf/fpdf.php');
session_start();
$usuario = $_SESSION['usuario'];

$id=$_GET['id'];
require ("conexion.php");
$query1 = "SELECT * FROM afiliado_titular WHERE id='$id'";
$resultado1 = $mysqli->query($query1);
global $nombre_completo;
global $dni;
while ($row1=$resultado1->fetch_assoc()) {
    $nombre_completo=$row1['nombre'].' '.$row1['apellido'];
    $dni=$row1['dni'];
}
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    global $nombre_completo;
    global $dni;
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
    // Salto de línea
    $this->Ln(30);
    // Título
    $this->Cell(200,10,'Estado de Cuenta del Afiliado: '.$nombre_completo,0,0,'C');
    $this->Ln(10);
    $this->Cell(119,10,'DNI: '.$dni,0,0,'C');
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


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',6);


$query2 = "SELECT * FROM aportes WHERE id_titular='$id' ORDER BY fecha_carga DESC LIMIT 10";
$resultado2 = $mysqli->query($query2);

$pdf->Cell(25,10,'Concepto:',1,0,'C',0);
$pdf->Cell(60,10,'Descripcion:',1,0,'C',0);
$pdf->Cell(25,10,'Deuda:',1,0,'C',0);
$pdf->Cell(25,10,'Pago:',1,0,'C',0);
$pdf->Cell(25,10,'Saldo:',1,0,'C',0);
$pdf->Cell(25,10,'Fecha:',1,0,'C',0);
$pdf->Ln(10);

while ($row2=$resultado2->fetch_assoc()) {
    
    
	$pdf->Cell(25,10,$row2['concepto'],1,0,'C',0);
	$pdf->Cell(60,10,$row2['descripcion'],1,0,'C',0);
    $pdf->Cell(25,10,$row2['deuda'],1,0,'C',0);
    $pdf->Cell(25,10,$row2['pago'],1,0,'C',0);
    $pdf->Cell(25,10,$row2['saldo'],1,0,'C',0);
    $fecha_carga = $row2['fecha_carga'];
    $timestamp1 = strtotime($fecha_carga);
    $fecha_formateada1 = date('d-m-Y', $timestamp1);
	$pdf->Cell(25,10,$fecha_formateada1,1,0,'C',0);

} 
$fecha=date('d-m-Y');
$pdf->Ln(10);
$pdf->Cell(80,10,'Fecha de Impresion: '.$fecha,0,0,'C',0);
$pdf->Ln(10);
$pdf->Cell(80,10,'Atendido por: '.$usuario,0,0,'C',0);

	$pdf->Output();
?>