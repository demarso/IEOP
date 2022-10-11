<?php

 require("include/arruma_link.php");

session_start();

if (! isset($_SESSION['id'])){

header("Location: index.php?erro=1");

exit;

}





include "conexao.php";

$ano = $_SESSION["AnoLetivo"];

$turma = $_POST["Turma"];

if($turma == "1 Ano" || $turma == "2 Ano" || $turma == "3 Ano" || $turma == "4 Ano" || $turma == "5 Ano")

	$materia = $_POST["Materia1a5"];

if($turma == "6 Ano" || $turma == "7 Ano" || $turma == "8 Ano")

	$materia = $_POST["Materia6a8"];

if($turma == "9 Ano")

	$materia = $_POST["Materia9"];

$cont = 0;

include_once 'Cezpdf.php';
$pdf = new CezPDF('a4');

    if($turma == "1 Ano") { $turmaa = "1º Ano"; $turma2 = "111";}

	if($turma == "2 Ano") { $turmaa = "2º Ano"; $turmab = "121";}

	if($turma == "3 Ano") { $turmaa = "3º Ano"; $turmab = "131";}

	if($turma == "4 Ano") { $turmaa = "4º Ano"; $turmab = "141";}

	if($turma == "5 Ano") { $turmaa = "5º Ano"; $turmab = "151";}

	if($turma == "6 Ano") { $turmaa = "6º Ano"; $turmab = "161";}

	if($turma == "7 Ano") { $turmaa = "7º Ano";  $turmab = "171";}

	if($turma == "8 Ano") { $turmaa = "8º Ano"; $turmab = "181";}

	if($turma == "9 Ano") { $turmaa = "9º Ano"; $turmab = "191";}

$pdf->addJpegFromFile('img/logo_ieop2.jpg',25,$pdf->y-60,60,60,"center");

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                 Jardim Escola Pedacinho do Ceu     CNPJ: 86.737.210/0001-82</b>",12);

$pdf->ezText("                   Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);

$pdf->ezText("                   Portaria de Autorizacao - nº 798 - D.O. 25/11/1998.\n\n",11);

$pdf->ezText("<b>NOTAS DOS ALUNOS DO $turmaa</b>");	
$pdf->ezText("<b>Ano: $ano");


			include "conexao.php";

			

			

	$sql0 = "SELECT Matricula, Nome, Chamada FROM histMatr WHERE Turma = '$turma' and Ano = '$ano' and Status <> 'Inativo' ORDER BY Chamada";

			$resultado0 = mysqli_query($conexao,$sql0) or die (mysql_error());

			

			while ($linha0 = mysqli_fetch_array($resultado0))

			{ 

				$matric = $linha0['Matricula'];

				$nome2 = $linha0['Nome'];

				$chamada = $linha0['Chamada'];

								

			



					

			$sql = "SELECT * FROM notas WHERE  Matricula = '$matric' && Ano = '$ano' && Materia = '$materia'";

			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

			while ($linha = mysqli_fetch_array($resultado))

			{ 

				$nota1 = $linha['Bim1'];

				$nota2 = $linha['Bim2'];

				$nota3 = $linha['Bim3'];

				$nota4 = $linha['Bim4'];

			    $soma = $nota1 + $nota2 + $nota3 + $nota4;

				

				if($nota2 == '-')

					$media = $soma;

				  elseif($nota3 == '-')

					$media = $soma/2;

				  elseif($nota4 == '-')

					$media = $soma/3;	

				  else	

					$media = $soma/4;	

				

	 			$soma = number_format($soma, 1, ',', '.');

				$media = number_format($media, 1, ',', '.');

				if ($materia == 'Comportamento' || $materia == 'Faltas') {$soma ='-'; $media = '-';}				

	

			



$dados[] = array('<b>Chamada</b>'=>$chamada,'<b>Nome</b>'=>$nome2,'<b>1º Bim</b>'=>$nota1,'<b>2º Bim</b>'=>$nota2,'<b>3º Bim</b>'=>$nota3,'<b>4º Bim</b>'=>$nota4,'<b>Soma</b>'=>$soma,'<b>Media</b>'=>$media);

}}

$pdf->ezText(" <b>Materia: </b>$materia\n",16,array('justification'=>'center'));

$pdf->ezText("\n");

$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Chamada'=>array('width'=>20),'Nome'=>array('width'=>30),'1º Bim'=>array('width'=>30),'2º Bim'=>array('width'=>50),'3º Bim'=>array('width'=>50),'4º Bim'=>array('width'=>50),'Soma'=>array('width'=>50),'Média'=>array('width'=>50))));

$pdf->ezText("\n");$pdf->ezText("\n");

	

$pdf->ezStream();



?>