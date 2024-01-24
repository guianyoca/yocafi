<?php
require('../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Ficha de Afiliado ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(80,10,'Nombre',1,0,'C',0);
	$this->Cell(50,10,'Apellido',1,0,'C',0);
	$this->Cell(50,10,'DNI',1,1,'C',0);
  
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
	$pdf->Cell(80,10,$row['nombre'],1,0,'C',0);
	$pdf->Cell(50,10,$row['apellido'],1,0,'C',0);
	$pdf->Cell(50,10,$row['dni'],1,1,'C',0);

} 


	$pdf->Output();
?>