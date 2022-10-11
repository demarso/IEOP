<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}


include "conexao.php";
$ano = $_SESSION["AnoLetivo"];
$cont = 0;
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(50,70,50,50);


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

			include "conexao.php";
			
			
	$sql0 = "SELECT Matricula, Nome FROM aluno WHERE Turma = '9º Ano' ORDER BY Nome";
			$resultado0 = mysqli_query($conexao,$sql0) or die (mysql_error());
			
			while ($linha0 = mysqli_fetch_array($resultado0))
			{ 
				$matric = $linha0['Matricula'];
				$nome2 = $linha0['Nome'];
				$dados = array();
$pdf->addJpegFromFile('img/logo_ieop2.jpg',40,$pdf->y-60,60,60,"center");				
$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("<b>                 Jardim Escola Pedacinho do Céu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                   Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                   Portaria de Autorização - nº 798 - D.O. 25/11/1998.\n\n",11);
$pdf->ezText("<b>\nNOTAS DOS ALUNOS DO 9º Ano</b> - $ano\n\n",14,array('justification'=>'center'));
$pdf->ezText("\n");$pdf->ezText("\n");		
	$pdf->ezText("<b>Nome: </b>$nome2         <b>Matricula: </b>$matric\n",12,array('justification'=>'center'));			
			

					
			$sql = "SELECT * FROM notas WHERE  Matricula = '$matric' && Ano = '$ano'";
			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				$materia = $linha['Materia'];
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
			
$dados[] = array('<b>Matéria</b>'=>$materia,'<b>1º Bim</b>'=>$nota1,'<b>2º Bim</b>'=>$nota2,'<b>3º Bim</b>'=>$nota3,'<b>4º Bim</b>'=>$nota4,'<b>Soma</b>'=>$soma,'<b>Média</b>'=>$media);
}

$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Materia'=>array('width'=>30),'1º Bim'=>array('width'=>30),'2º Bim'=>array('width'=>50),'3º Bim'=>array('width'=>50),'4º Bim'=>array('width'=>50),'Soma'=>array('width'=>50),'Média'=>array('width'=>50))));
$pdf->ezText("\n");$pdf->ezText("\n");

	$pdf->ezNewPage();
 
}
	
$pdf->ezStream();

?>