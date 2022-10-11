<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}


include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];
$turma = $_SESSION["turma"];
$cont = 0;
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(50,70,50,50);


$pdf->addJpegFromFile('img/logo_ieop.jpg',40,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                 Jardim Escola Pedacinho do Céu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                   Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                   Portaria de Autorização - nº 798 - D.O. 25/11/1998.",11);
$pdf->ezText("<b>\nRELAÇÃO DE INADIMPLENTES  -  TURMA: $turma</b> - $ano",14,array('justification'=>'center'));

			include "conexao.php";
			$cont = 1;
			$sql = "SELECT * FROM pagamento WHERE Ano = '$ano'";
			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
			$con = 2; $n = 1;
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
				else
				 $bgcolor = "bgcolor='#FFFFCC'"; 
				if ($linha['Jan'] == 'Não' && date('m')>1)
					$inad = $linha['Matricula'];
				if ($linha['Fev'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Mar'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Abr'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Mai'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Jun'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Jul'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Ago'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Sete'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Outu'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Nove'] == 'Não' && date('m')<=12)
					$inad = $linha['Matricula'];
			

$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matrícula'=>array('width'=>70),'Nome'=>array('width'=>10))));
}
			
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matrícula'=>array('width'=>70),'Nome'=>array('width'=>10))));

$pdf->ezStream();

?>