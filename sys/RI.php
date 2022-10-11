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


//$cols = array('formulario'=>"Formul�rio",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descri��o','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclus�o','observacao'=>'Obs');

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                 Jardim Escola Pedacinho do C�u     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                   Rua Dona Castorina, n� 93 - Vila Oper�ria - Nova Igua�u - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                   Portaria de Autoriza��o - n� 798 - D.O. 25/11/1998.",11);
$pdf->ezText("<b>\nRELA��O DE INADIMPLENTES  -  TURMA: $turma</b> - $ano",14,array('justification'=>'center'));

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
				if ($linha['Jan'] == 'N�o' && date('m')>1)
					$inad = $linha['Matricula'];
				if ($linha['Fev'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Mar'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Abr'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Mai'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Jun'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Jul'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Ago'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Sete'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];	
				if ($linha['Outu'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
				if ($linha['Nove'] == 'N�o' && date('m')<=12)
					$inad = $linha['Matricula'];
			

$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matr�cula'=>array('width'=>70),'Nome'=>array('width'=>10))));
}
			
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matr�cula'=>array('width'=>70),'Nome'=>array('width'=>10))));

$pdf->ezStream();

?>