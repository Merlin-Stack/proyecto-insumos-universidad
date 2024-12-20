<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Mover titulo a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Productos Prestados ',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(50,10,'ID',1,0,'C',0);
    $this->Cell(50,10,'Nombre_P',1,0,'C',0);
	$this->Cell(40,10,'Nombre_i',1,0,'C',0);
	$this->Cell(40,10,'Cantidad',1,1,'C',0);
  
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

$conexion = mysqli_connect("localhost", "root", "", "rol");
$consulta = "SELECT * FROM insumos_p";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(50,10,$row['id'],1,0,'C',0); /**50(numero de pixeles o de ancho), 10(largo o alto) */
	$pdf->Cell(50,10,$row['nombre_p'],1,0,'C',0);
	$pdf->Cell(40,10,$row['nombre_i'],1,0,'C',0);
	$pdf->Cell(40,10,$row['cantidad'],1,1,'C',0);

} 


	$pdf->Output();
?>