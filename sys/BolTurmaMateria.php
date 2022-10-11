<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}


include "conexao.php";
$turma = $_POST["Turma"];
$materia = $_POST["Materia"];

$ano = $_SESSION["AnoLetivo"];
$mes = date("m");
$cont = 0;
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(50,70,50,50);


$pdf->addJpegFromFile('img/logo_ieop2.jpg',35,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14,array('justification'=>'center'));// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("<b>Jardim Escola Pedacinho do Céu</b>",12,array('justification'=>'center'));
$pdf->ezText("<b>CNPJ: 86.737.210/0001-82</b>",12,array('justification'=>'center'));
$pdf->ezText("Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11,array('justification'=>'center'));
//$pdf->ezText("Portaria de Autorização - nº 798 - D.O. 25/11/1998.",11,array('justification'=>'center'));
$pdf->ezText("<b>\nBOLETIM ESCOLAR</b> - $ano",14,array('justification'=>'center'));
$pdf->ezText("\n");

$sql1 = "SELECT Matricula, Nome, Turma, Segmento FROM aluno WHERE Turma = '$turma'";

$resultado1 = mysql_query($sql1) or die (mysql_error());
$ano2 = $_SESSION["AnoLetivo"];
while ($linha1 = mysql_fetch_array($resultado1))
{
	$matricula = $linha1['Matricula'];
	$nome2 = $linha1['Nome'];
	$turma2 = $linha1['Turma'];
	$seg = $linha1['Segmento'];

$cont = 0;
$pdf->ezText("$matricula  $nome2   $turma2   $seg",12);
$sql2 = "SELECT * FROM notas WHERE Matricula = '$matricula' AND Ano = '$ano2' AND Materia = '$materia'";
$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());

while ($linha2 = mysqli_fetch_array($resultado2))
{
	$cont = $cont + 1;
	$nota1 = $linha2['Bim1'];
	$nota2 = $linha2['Bim2'];
	$nota3 = $linha2['Bim3'];
	$nota4 = $linha2['Bim4'];
	$recfin = $linha2['RecFin'];
		if($materia <> "Comportamento" && $materia <> "Faltas"){
	 		$totnota = $nota1 + $nota2 + $nota3 + $nota4;
			 $totnota = number_format($totnota, 1, ',', '.');
		}
		 else
			 $totnota = "-";
	$faltas1 = $linha2['Faltas1'];
	$faltas2 = $linha2['Faltas2'];
	$faltas3 = $linha2['Faltas3'];
	$faltas4 = $linha2['Faltas4'];
	$fb1 = $fb1 + $faltas1;
	$fb2 = $fb2 + $faltas2;
	$fb3 = $fb3 + $faltas3;
	$fb4 = $fb4 + $faltas4;
	$ftotal = $fb1 + $fb2 + $fb3 + $fb4;
	$mediafinal = -1;
	$media = '-';


if ($seg == 2 || $seg == 3){
	  $dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>Faltas 1º</b>'=>$faltas1,'<b>2º Bim</b>'=>$nota2a,'<b>Faltas 2º</b>'=>$faltas2,'<b>3º Bim</b>'=>$nota3a,'<b>Faltas 3º</b>'=>$faltas3,'<b>4º Bim</b>'=>$nota4a,'<b>Faltas 4º</b>'=>$faltas4,'<b>Pontos</b>'=>$totnota,'<b>Média</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);
	   $totfaltas = ' Total de Faltas '; $tot = ' '; $totfal = '   ';
 }
 	 
if ($seg == 1){
	$dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>2º Bim</b>'=>$nota2a,'<b>3º Bim</b>'=>$nota3a,'<b>4º Bim</b>'=>$nota4a,'<b>Pontos</b>'=>$totnota,'<b>Média</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);
	}
}}
if ($seg == 1){

$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Pontos'=>array('width'=>10),'Média'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));
}
if ($seg == 2 || $seg == 3){
 
$pdf->ezTable($dados,'','',array('xPos'=>20,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'Faltas 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'Faltas 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'Faltas 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Faltas 4º'=>array('width'=>10),'Pontos'=>array('width'=>10),'Média'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));
$pdf->ezText("\n");
}


$pdf->ezStream();

?>