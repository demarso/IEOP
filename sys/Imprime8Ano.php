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


$pdf->addJpegFromFile('img/logo_ieop2.jpg',40,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                 Jardim Escola Pedacinho do Céu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                   Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                   Portaria de Autorização - nº 798 - D.O. 25/11/1998.\n\n",11);
$pdf->ezText("<b>\nLISTA DOS ALUNOS DA TURMA: 8º Ano</b> - $ano\n\n",14,array('justification'=>'center'));

			include "conexao.php";
			$cont = 1;
			
	$sq = "SELECT a.Matricula as mat, a.Nome as nom, a.Nascimento as nasc, a.Status as stat, a.Turma as tur, h.Chamada as cham FROM aluno a, histMatr h WHERE a.Matricula = h.Matricula && h.Ano='$ano' && a.Turma = '8º Ano' ORDER BY h.Chamada";
			$resultado = mysqli_query($conexao,$sq) or die (mysql_error());
			$cont = 1;
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				$chamada = $linha['cham'];
				$matric = $linha['mat'];
				$nome2 = $linha['nom'];
				$nascimento = $linha['nasc'];	
				$status = $linha['stat'];
				$turma = $linha['tur'];

$dados[] = array('<b>Nº</b>'=>$chamada,'<b>Matrícula</b>'=>$matric,'<b>Nome</b>'=>$nome2,'<b>Nascimento</b>'=>$nascimento,'<b>Status</b>'=>$status,'<b>Turma</b>'=>$turma);
$cont = $cont + 1;
}
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Nº'=>array('width'=>50),'Matrícula'=>array('width'=>50),'Nome'=>array('width'=>50),'Nascimento'=>array('width'=>50),'Status'=>array('width'=>50),'Turma'=>array('width'=>50))));

	
$pdf->ezStream();

?>