<?php
require('fpdf.php');
$pdf =new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(180,20,'pakernia',0,1,'R');
$pdf->Cell(170,20,'OSWIADCZENIE O WYPOWIEDZENIU UMOWY',0,1,'R');
$pdf->SetFont('Arial','',13);
$pdf->Cell(20,10,'Ja, nizej podpisany(a) ...................................................................................................................',0,1);
$pdf->Cell(20,10,'zamieszkaly(a) pod adresem: .......................................................................................................',0,1);
$pdf->Cell(20,10,'.......................................................................................................................................................',0,1);
$pdf->Cell(20,10,'posiadajacy(a) karte klubowa o numerze: .................................................................................... ',0,1);
$pdf->Cell(20,10,'oswiadczam, iz wypowiadam* umowe o korzystanie z uslug klubu fitness PAKERNIA, zawarta
',0,1);
$pdf->Cell(20,10,'w dniu .........................................',0,1);
$pdf->Cell(180,10,'..........................',0,1,'R');
$pdf->Cell(180,10,'(data i podpis)',0,0,'R');
$pdf->Output();


?>