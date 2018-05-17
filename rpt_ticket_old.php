<?php

include("fpdf/fpdf.php");
//include("conexion.php");

class PDF extends FPDF
{
var $widths;
var $aligns;

/*function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
			$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
*/
function Header()
{

	$this->SetFont('Arial','',10);
	$this->Text(10,10,'Agencia Lia',0,'C', 0);
	//$this->Text(20,14,'Caracas - Distrito Capital',0,'C', 0);
	//$this->Image('images/ospino.jpg' , 30 ,16, 20 , 25,'JPG');
	//$this->Image('images/banderaospino.jpg' , 220 ,16, 25 , 30,'JPG');
	//$this->Text(10,48,'Servicio Municipal de Administracion',0,'C', 0);	
	//$this->SetFont('Arial','B',16);
	//$this->Text(85,30,'Alcaldia Bolivariana del Municipio Ospino',0,'C', 0);
	//$this->Text(80,36,'Estado de Cuenta de Actividades Economicas',0,'C', 0); 
	//$this->Ln(1);
}

function Footer()
{
	/*$this->SetY(-3);
	$this->SetFont('Arial','B',8);
	$this->Cell(20,10,'Numeros',0,0,'L');*/

}

}

	include("conexion.php");
	
	$sorteo_jug = $_POST['sorteo_jug'];
  
  	$monto_jug  = $_POST['monto_jug'];
  
  	$animalito_jug  = $_POST['animalito_jug'];
  
 	$animalitoletra  = $_POST['animalitoletra'];
 	
	$nuevoserial  = $_POST['nuevoserial'];

	//$paciente= $_GET['id'];
	//$con = new DB;
	//$pacientes = $con->conectar();	
	
	//$strConsulta = "SELECT * from pacientes where id_paciente =  '$paciente'";
	
	//$pacientes = mysql_query($strConsulta);
	
	//$fila = mysql_fetch_array($pacientes);

	//$pdf=new PDF('L','mm','Letter'); array(595.28,841.89)
	//$pdf=new PDF('L','mm',array(200,400));
	$pdf=new PDF('P','mm',array(75,85));
	//$format=array(20,40);
	//$pdf->fwPt=$format[0];//ancho del formato de página en puntos
	//$pdf->fhPt=$format[1];//alto del formato de página en puntos
	$pdf->Open();
	$pdf->AddPage();
	//$pdf->SetMargins(5,5,5);
	//$pdf->Ln(3);

   $pdf->SetFont('Arial','',8);
   $pdf->Cell(3,10,'Ticket: '.$nuevoserial,1,1);
   //$pdf->Cell(0,6,'Razon Social: '.$razon,0,1);
	//$pdf->Cell(0,6,'Nombre: '.$fila['nombre'].' '.$fila['apellido_paterno'].' '.$fila['apellido_materno'],0,1);
	//$pdf->Cell(0,6,'Sexo: '.$fila['sexo'],0,1); 
	//$pdf->Cell(0,6,'Direccion: '.$direccion,0,1); 
	
	//$pdf->Ln(1);
	
	//$pdf->SetWidths(array(5, 10, 15));
	//$pdf->SetFont('Arial','B',8);
	//$pdf->SetFillColor(85,107,47);
    //$pdf->SetTextColor(255);

	//for($i=0;$i<1;$i++){
		//$pdf->Row(array('Fecha de Emision', 'Fecha de Cancelacion', 'Monto'));
	//}

	//$historial = $con->conectar();
		//Serial,Fecha,Sorteo,Animalito,Num_animalito,Monto,Total  and ID_OBJ='PIC' ORDER BY CUOTA
		
	$query = "select Serial,Fecha,Sorteo,Animalito,Num_animalito,Monto,Total from jugadas"; 
                //"from jugadas WHERE Serial = '".$nuevoserial."'"; 
    
    //$pdf->SetFont('Arial','',6);    
    
    $pdf->Cell(10,10,'LOTTO ACTIVO: ',0,1);   
	
	$result = mysqli_query($con,$query);
	
	$saldo=0;    
   //Asignacion del nro patente 
   //$id_instancia_saldo = $nro_patente;
		
	while($row = mysqli_fetch_array($result)) {
		
	/*$strConsulta = "SELECT consultas_medicas.fecha_consulta, consultas_medicas.consultorio, consultas_medicas.diagnostico, medicos.nombre_medico 
	FROM consultas_medicas 
	Inner Join pacientes ON consultas_medicas.id_paciente = pacientes.id_paciente 
	Inner Join medicos ON consultas_medicas.id_medico = medicos.id_medico
	WHERE pacientes.id_paciente = '$paciente'";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);*/
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(10,8,' '.$row['Num_animalito'].' '.$row['Animalito'],0,0);
			$pdf->Ln(5);
			/*if($i%2 == 1)
			{
				
				//$pdf->SetFillColor(15,255,153);
    			//$pdf->SetTextColor(0);
    			
				//$pdf->Row(array($row['Serial'], $row['Fecha'], $row['Sorteo'], $row['Animalito'],$row['Num_animalito'], $row['Monto']));
			}
			else
			{
				//$pdf->SetFillColor(10,204,51);
    			//$pdf->SetTextColor(0);
				//$pdf->Row(array($row['Serial'], $row['Fecha'], $row['Sorteo'], $row['Animalito'],$row['Num_animalito'], $row['Monto']));
			
			}*/
			
			//$saldo=$saldo+$row['Monto'];
		}

//$saldo=$cargo-$abono;

$pdf->Multicell(10,30," Total:".$saldo."",1,'R');


$pdf->Output("rpt_ticket.pdf",'F');

echo "<script language='javascript'>window.open('rpt_ticket.pdf','_self','');</script>";

//$pdf->Output();

?>
