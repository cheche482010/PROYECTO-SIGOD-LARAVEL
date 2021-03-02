<?php

require_once(PDF.'tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PNF en Informatica');
$pdf->SetTitle('Listado de Docentes');
$pdf->SetSubject('Impresion en TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->setCellPaddings(0,0,0,0);
$pdf->SetAutoPageBreak(TRUE, 0);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->AddPage();

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

ob_start();

?> 
<!-- TITULO -->
<?php 
$pdf->Cell(0, 0, 'TRAYECTO I', 0, 1, 'C', 0, '', 0);
?>
<p></p>
<p style="text-align: center;">IN1112</p>

	<table border="1" width="600px;">
		<thead>
			<tr>
				<th style="border-bottom: 1px solid white;" width="15px;"></th>
				<th style="text-align: center;">
					Hora
				</th>
				<th style="text-align: center;">
					Lunes 
				</th>
				<th style="text-align: center;">
					Martes
				</th>
				<th style="text-align: center;">
					Miercoles
				</th>
				<th style="text-align: center;">
					Jueve
				</th>
				<th style="text-align: center;">
					Viernes
				</th>
				<th style="text-align: center;">
					Sabado
				</th>
			</tr>

		</thead>
		<tbody>
			<tr style="text-align: center;">
				<td rowspan="7" width="15px;">
					MAÑANA
				</td>
				<td>
					8:00 a 8:40
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					8:40 a 9:20
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					9:20 a 10:00
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					10:00 a 10:40
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					10:40 a 11:20
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					11:20 a 12:00
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
		</tbody>
	</table>

<p style="text-align: center;">IN3111</p>

	<table border="1"  width="600px;">
		<thead>
			<tr>
				<th style="border-bottom: 1px solid white;" width="15px;"></th>
				<th style="text-align: center;">
					Hora
				</th>
				<th style="text-align: center;">
					Lunes 
				</th>
				<th style="text-align: center;">
					Martes
				</th>
				<th style="text-align: center;">
					Miercoles
				</th>
				<th style="text-align: center;">
					Jueve
				</th>
				<th style="text-align: center;">
					Viernes
				</th>
				<th style="text-align: center;">
					Sabado
				</th>
			</tr>
		</thead>
		<tbody>
			<tr style="text-align: center;">
				<td rowspan="7" width="15px;">
					TARDE
				</td>
				<td>
					1:00 a 1:40
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					1:40 a 2:20
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					2:20 a 3:00
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					3:00 a 3:40
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					3:40 a 4:20
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<tr style="text-align: center;">
				<td>
					4:20 a 5:00
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
		</tbody>
	</table>

<?php

$html=ob_get_clean();
$pdf->writeHTML($html, true, 0, true, true);
ob_end_clean();
$pdf->Output('Horario-Seccion.pdf', 'I');

?>