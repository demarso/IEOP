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

include_once 'Cezpdf.php';
$pdf = new CezPDF('a4');

//$pdf->selectFont('./fonts/Helvetica.afm');
//$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
//$pdf -> ezSetMargins(50,70,50,50);


$pdf->addJpegFromFile('img/logo_ieop.jpg',35,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>                  INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>                    Jardim Escola Pedacinho do Ceu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("                      Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11);
$pdf->ezText("                      Portaria de Autorizacao - nº 798 - D.O. 25/11/1998.\n\n",11);
$pdf->ezText("<b>   RELACAO DE INADIMPLENTES",14);	
$pdf->ezText("   TURMA: 9º Ano",12);
$pdf->ezText("   Ano: $ano\n",12);

			include "conexao.php";
			$cont = 1;
			
	$sql0 = "SELECT Matricula FROM histMatr WHERE Turma = '9 Ano' && Ano = '$ano'";
			$resultado0 = mysqli_query($conexao,$sql0) or die (mysql_error());
			
			while ($linha0 = mysqli_fetch_array($resultado0))
			{ 
				$matric = $linha0['Matricula'];
					
			$sql = "SELECT * FROM pagamento WHERE  Matricula = '$matric' && Ano = '$ano'";
			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				 $inad = '';
				if($ano == date('Y')){
				if ($linha['Jan'] == 'Nao' && date('m') > 1){
					$inad = $linha['Matricula'];
					$pgjan = $linha['Jan'];}
					else if($linha['Jan'] == 'Sim' || $linha['Jan'] == 'xxx')
					$pgjan = $linha['Jan'];
					else
					$pgjan = "-";
				if ($linha['Fev'] == 'Nao' && date('m') > 2){
					$inad = $linha['Matricula'];
					$pgfev = $linha['Fev'];}
					else if($linha['Fev'] == 'Sim' || $linha['Fev'] == 'xxx')
					$pgfev = $linha['Fev'];
					else
					$pgfev = "-";
				if ($linha['Mar'] == 'Nao' && date('m') > 3){
					$inad = $linha['Matricula'];
					$pgmar= $linha['Mar'];}
					else if($linha['Mar'] == 'Sim' || $linha['Mar'] == 'xxx')
					$pgmar = $linha['Mar'];
					else
					$pgmar = "-";
				if ($linha['Abr'] == 'Nao' && date('m') > 4){
					$inad = $linha['Matricula'];
					$pgabr = $linha['Abr'];}
					else if($linha['Abr'] == 'Sim' || $linha['Abr'] == 'xxx')
					$pgabr = $linha['Abr'];
					else
					$pgabr = "-";
				if ($linha['Mai'] == 'Nao' && date('m') > 5){
					$inad = $linha['Matricula'];
					$pgmai = $linha['Mai'];}
					else if($linha['Mai'] == 'Sim'|| $linha['Mai'] == 'xxx')
					$pgmai = $linha['Mai'];
					else
					$pgmai = "-";
				if ($linha['Jun'] == 'Nao' && date('m') > 6){
					$inad = $linha['Matricula'];
					$pgjun = $linha['Jun'];}
					else if($linha['Jun'] == 'Sim' || $linha['Jun'] == 'xxx')
					$pgjun = $linha['Jun'];
					else
					$pgjun = "-";	
				if ($linha['Jul'] == 'Nao' && date('m') > 7){
					$inad = $linha['Matricula'];
					$pgjul = $linha['Jul'];}
					else if($linha['Jul'] == 'Sim' || $linha['Jul'] == 'xxx')
					$pgjul = $linha['Jul'];
					else
					$pgjul = "-";
				if ($linha['Ago'] == 'Nao' && date('m') > 8){
					$inad = $linha['Matricula'];
					$pgago = $linha['Ago'];}
					else if($linha['Ago'] == 'Sim' || $linha['Ago'] == 'xxx')
					$pgago = $linha['Ago'];
					else
					$pgago = "-";
				if ($linha['Sete'] == 'Nao' && date('m') > 9){
					$inad = $linha['Matricula'];
					$pgsete = $linha['Sete'];}
					else if($linha['Sete'] == 'Sim' || $linha['Sete'] == 'xxx')
					$pgsete =$linha['Sete'];
					else
					$pgsete = "-";
				if ($linha['Outu'] == 'Nao' && date('m') > 10){
					$inad = $linha['Matricula'];
					$pgoutu = $linha['Outu'];}
					else if($linha['Outu'] == 'Sim' || $linha['Outu'] == 'xxx')
					$pgoutu =$linha['Outu'];
					else
					$pgoutu = "-";
				if ($linha['Nove'] == 'Nao' && date('m') > 11){
					$inad = $linha['Matricula'];
					$pgnove = $linha['Nove'];}
					else if($linha['Nove'] == 'Sim' || $linha['Nove'] == 'xxx')
					$pgnove = $linha['Nove'];
					else
					$pgnove = "-";
				if ($linha['Deze'] == 'Nao' && date('m') == 12){
					$inad = $linha['Matricula'];
					$pgdeze = $linha['Deze'];}
					else if($linha['Deze'] == 'Sim' || $linha['Deze'] == 'xxx')
					$pgdeze =$linha['Deze'];
					else
					$pgdeze = "-";
				}
				else{
				if ($linha['Jan'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgjan = $linha['Jan'];}
					else if($linha['Jan'] == 'Sim' || $linha['Jan'] == 'xxx')
					$pgjan = $linha['Jan'];
					else
					$pgjan = "-";
				if ($linha['Fev'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgfev = $linha['Fev'];}
					else if($linha['Fev'] == 'Sim' || $linha['Fev'] == 'xxx')
					$pgfev = $linha['Fev'];
					else
					$pgfev = "-";
				if ($linha['Mar'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgmar= $linha['Mar'];}
					else if($linha['Mar'] == 'Sim' || $linha['Mar'] == 'xxx')
					$pgmar = $linha['Mar'];
					else
					$pgmar = "-";
				if ($linha['Abr'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgabr = $linha['Abr'];}
					else if($linha['Abr'] == 'Sim' || $linha['Abr'] == 'xxx')
					$pgabr = $linha['Abr'];
					else
					$pgabr = "-";
				if ($linha['Mai'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgmai = $linha['Mai'];}
					else if($linha['Mai'] == 'Sim' || $linha['Mai'] == 'xxx')
					$pgmai = $linha['Mai'];
					else
					$pgmai = "-";
				if ($linha['Jun'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgjun = $linha['Jun'];}
					else if($linha['Jun'] == 'Sim' || $linha['Jun'] == 'xxx')
					$pgjun = $linha['Jun'];
					else
					$pgjun = "-";	
				if ($linha['Jul'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgjul = $linha['Jul'];}
					else if($linha['Jul'] == 'Sim' || $linha['Jul'] == 'xxx')
					$pgjul = $linha['Jul'];
					else
					$pgjul = "-";
				if ($linha['Ago'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgago = $linha['Ago'];}
					else if($linha['Ago'] == 'Sim' || $linha['Ago'] == 'xxx')
					$pgago = $linha['Ago'];
					else
					$pgago = "-";
				if ($linha['Sete'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgsete = $linha['Sete'];}
					else if($linha['Sete'] == 'Sim' || $linha['Sete'] == 'xxx')
					$pgsete =$linha['Sete'];
					else
					$pgsete = "-";
				if ($linha['Outu'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgoutu = $linha['Outu'];}
					else if($linha['Outu'] == 'Sim' || $linha['Outu'] == 'xxx')
					$pgoutu =$linha['Outu'];
					else
					$pgoutu = "-";
				if ($linha['Nove'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgnove = $linha['Nove'];}
					else if($linha['Nove'] == 'Sim' || $linha['Nove'] == 'xxx')
					$pgnove = $linha['Nove'];
					else
					$pgnove = "-";
				if ($linha['Deze'] == 'Nao'){
					$inad = $linha['Matricula'];
					$pgdeze = $linha['Deze'];}
					else if($linha['Deze'] == 'Sim' || $linha['Deze'] == 'xxx')
					$pgdeze =$linha['Deze'];
					else
					$pgdeze = "-";
				} 
				
			$sql2 = "SELECT Nome FROM aluno WHERE Matricula = '$inad' && Status = 'Ativo'";
			$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
			
			while ($linha2 = mysqli_fetch_array($resultado2))
			{ 
				$nome2 = $linha2['Nome'];
				

$dados[] = array('<b>Matricula</b>'=>$inad,'<b>Nome</b>'=>$nome2,'<b>Jan</b>'=>$pgjan,'<b>Fev</b>'=>$pgfev,'<b>Mar</b>'=>$pgmar,'<b>Abr</b>'=>$pgabr,'<b>Mai</b>'=>$pgmai,'<b>Jun</b>'=>$pgjun,'<b>Jul</b>'=>$pgjul,'<b>Ago</b>'=>$pgago,'<b>Set</b>'=>$pgsete,'<b>Out</b>'=>$pgoutu,'<b>Nov</b>'=>$pgnove,'<b>Dez</b>'=>$pgdeze);
}}}
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Matricula'=>array('width'=>30),'Nome'=>array('width'=>50),'Jan'=>array('width'=>50),'Fev'=>array('width'=>50),'Mar'=>array('width'=>50),'Abr'=>array('width'=>50),'Mai'=>array('width'=>50),'Jun'=>array('width'=>50),'Jul'=>array('width'=>50),'Ago'=>array('width'=>50),'Set'=>array('width'=>50),'Out'=>array('width'=>50),'Nov'=>array('width'=>50),'Dez'=>array('width'=>50))));
if(empty ($dados))
	$pdf->ezText("<b>\n\nNao HÁ INADIMPLENTES PARA ESTA TURMA ATÉ ESTE MÊS</b>\n",14,array('justification'=>'center'));
	
$pdf->ezStream();

?>