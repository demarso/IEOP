<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}


include "conexao.php";
$ano = date('Y');
$cont = 0;
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(50,70,50,50);


$pdf->addJpegFromFile('img/logo_ieop2.jpg',40,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                 Jardim Escola Pedacinho do Céu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                   Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                   Portaria de Autorização - nº 798 - D.O. 25/11/1998.\n\n",11);
$pdf->ezText("<b>\nRELAÇÃO DE INADIMPLENTES  -  TURMA: 1º Ano</b> - $ano\n\n",14,array('justification'=>'center'));

			include "conexao.php";
			$cont = 1;
			
	$sql0 = "SELECT Matricula, Nome FROM aluno WHERE Turma = '3º Período'";
			$resultado0 = mysqli_query($conexao,$sql0) or die (mysql_error());
			
			while ($linha0 = mysqli_fetch_array($resultado0))
			{ 
				$matric = $linha0['Matricula'];
				$nome = $linha0['Nome'];
			
			$sql = "SELECT * FROM pagamento WHERE Matricula = '$matric' && Ano = '$ano'";
			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				if ($linha['Jan'] == 'Não' && date('m')>1)
					$inad = $linha['Matricula'];
				if ($linha['Fev'] == 'Não' && date('m')>2)
					$inad = $linha['Matricula'];
				if ($linha['Mar'] == 'Não' && date('m')>3)
					$inad = $linha['Matricula'];
				if ($linha['Abr'] == 'Não' && date('m')>4)
					$inad = $linha['Matricula'];	
				if ($linha['Mai'] == 'Não' && date('m')>5)
					$inad = $linha['Matricula'];
				if ($linha['Jun'] == 'Não' && date('m')>6)
					$inad = $linha['Matricula'];	
				if ($linha['Jul'] == 'Não' && date('m')>7)
					$inad = $linha['Matricula'];	
				if ($linha['Ago'] == 'Não' && date('m')>8)
					$inad = $linha['Matricula'];
				if ($linha['Set'] == 'Não' && date('m')>9)
					$inad = $linha['Matricula'];	
				if ($linha['Out'] == 'Não' && date('m')>10)
					$inad = $linha['Matricula'];
				if ($linha['Nov'] == 'Não' && date('m')>11)
					$inad = $linha['Matricula'];
			

$dados[] = array('<b>Matrícula</b>'=>$inad,'<b>Nome</b>'=>$nome);
}}
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matrícula'=>array('width'=>30),'Nome'=>array('width'=>50))));

	
$pdf->ezStream();

?>