<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}

include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(50,70,50,50);

require_once("conexao.php");

$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$recup1 = $_POST["Recup1"];
$situacao = $_POST["Situacao"];
$ano = $_SESSION["AnoLetivo"];
$mes = date('m');
$pdf->addJpegFromFile('img/logo_ieop2.jpg',35,$pdf->y-60,60,60,"center");

//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14,array('justification'=>'center'));// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("<b>Jardim Escola Pedacinho do Céu</b>",12,array('justification'=>'center'));
$pdf->ezText("<b>CNPJ: 86.737.210/0001-82</b>",12,array('justification'=>'center'));
$pdf->ezText("Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11,array('justification'=>'center'));
//$pdf->ezText("Portaria de Autorização - nº 798 - D.O. 25/11/1998.",11,array('justification'=>'center'));
$pdf->ezText("<b>\nBOLETIM ESCOLAR</b> - $ano",14,array('justification'=>'center'));
$pdf->ezText("\n");

$sql1 = "SELECT id,Matricula,Nome,Segmento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";
$resultado1 = mysql_query($sql1) or die (mysql_error());
while ($linha1 = mysql_fetch_array($resultado1))
{
	$id = $linha1['id'];
	$matricula = $linha1['Matricula'];
	$nome2 = $linha1['Nome'];
	$seg = $linha1['Segmento'];
	
	//$turma = $linha1['Turma'];
	//$foto = $linha1['Foto'];
};
$sqlRes = "SELECT Resultado, Turma FROM histMatr WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc' && Ano = '$ano'";
$resultadoRes = mysql_query($sqlRes) or die (mysql_error());
while ($linhaRes = mysql_fetch_array($resultadoRes))
{
	$turma = $linhaRes['Turma'];
	$resultado = $linhaRes['Resultado'];
    if(empty($resultado))
	   $query = mysql_query($sql = "UPDATE histMatr SET Resultado='$situacao' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc' && Ano = '$ano'") or die(mysql_error()); 
	if($turma == "1º Ano") { $turma = "1º"; $turma2 = "111";}
	if($turma == "2º Ano") { $turma = "2º"; $turma2 = "121";}
	if($turma == "3º Ano") { $turma = "3º"; $turma2 = "131";}
	if($turma == "4º Ano") { $turma = "4º"; $turma2 = "141";}
	if($turma == "5º Ano") { $turma = "5º"; $turma2 = "151";}
	if($turma == "6º Ano") { $turma = "6º"; $turma2 = "161";}
	if($turma == "7º Ano") { $turma = "7º"; $turma2 = "171";}
	if($turma == "8º Ano") { $turma = "8º"; $turma2 = "181";}
	if($turma == "9º Ano") { $turma = "9º"; $turma2 = "191";}
};
	
//$pdf->addJpegFromFile($foto,480,$pdf->y-75,70,85,"right");
$pdf->ezText("<b>Nome:</b> $nome2",14);	
$pdf->ezText("\n<b>Matrícula:</b> $matricula       <b>Ano de Escolaridade:</b> $turma    <b>Turma:</b> $turma2",12);
//$pdf->ezText("\n<b>Nascimento:</b> $nascimento    <b>Certidão:</b> $certidao    <b>Sangue:</b> $sangue    <b>Cor/Raça:</b> $raca",12);
//$pdf->ezText("\n<b>Naturalidade:</b> $natural    <b>Nacionalidade:</b> $nacional",12);
//$pdf->ezText("\n<b>Pai:</b> $pai    <b>Profissão:</b> $profpai",12);
//$pdf->ezText("\n<b>Mãe:</b> $mae    <b>Profissão:</b> $profmae",12);
//$pdf->ezText("\n<b>Endereço:</b> $endereco    <b>CEP</b> $cep    <b>Telefone:</b> $telefone",12);
//$pdf->ezText("\n<b>Bairro:</b> $bairro    <b>Cidade:</b> $cidade    <b>Estado:</b> $estado",12);
//$pdf->ezText("\n<b>O Aluno foi matriculado na turma:</b> $turma                              <b>Em:</b> $data1",12);

$pdf->ezText("\n");

//$pdf->ezText("<b>RENOVAÇÃO DE MATRÍCULA\n</b>",14,array('justification'=>'center'));



$cont = 0;

$sql2 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano'";
$resultado2 = mysql_query($sql2) or die (mysql_error());

while ($linha2 = mysql_fetch_array($resultado2))
{
	$cont = $cont + 1;
	$materia = $linha2['Materia'];
	$nota1 = $linha2['Bim1'];
	$nota2 = $linha2['Bim2'];
	$nota3 = $linha2['Bim3'];
	$nota4 = $linha2['Bim4'];
	$recfin = $linha2['RecFin'];
		if($materia <> "Comportamento" && $materia <> "Faltas"){
	 		$totnota = $nota1 + $nota2 + $nota3 + $nota4;
	 		$totnota = number_format(round($totnota * 2 )/ 2,1);
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
	if($nota1 <> '-') 
		$media = $nota1;
	if($nota2 <> '-')
		$media = ($nota1 + $nota2)/2;
	if($nota3 <> '-')
		$media = ($nota1 + $nota2 + $nota3)/3;
	if($nota4 <> '-')
		$media = ($nota1 + $nota2 + $nota3 + $nota4)/4;
	if($mes <= 12){
		$mediaf = $mediaf + $media;	
		$mediafinal = $mediaf / ($cont-1);
		$mostramedia = number_format(round($media * 2 )/ 2,1);
	}
	else
		$mediafinal = '-';

	 if($materia == 'Faltas'){
	 	$mostramedia = $nota1 + $nota2 + $nota3 + $nota4;
		$mostramedia = 'Total de  '.$mostramedia;
		$recfin = '-';
	 }
	 if($materia == 'Comportamento'){
	  	$media = '-';
		//$mediafinal = '-';
		$mostramedia = '-';
		$recfin = '-';
	 }
	if($media < 6 && $materia <> 'Faltas' && $nota2 <> '-' && $materia <> 'Comportamento' && $recup1 == 'Sim' && empty($recfin))
	 $recup = 'Recuperação';
	 else if($media >= 6 || $recfin >= 6 && $nota4 <> '-')
	 $recup = 'Aprovado';
	 else if($recfin < 6 && $recfin < 6 && $materia <> 'Faltas' && $nota2 <> '-' && $materia <> 'Comportamento')
	 $recup = 'Reprovado';
	 else
	 $recup = '-';
	// if($mes >= 10 && $totnota >= 24)
	// $recup = 'Aprovado(a)';
	 
	  if($materia == 'Faltas'){
		  $faltas1 = 0; $faltas2 = 0; $faltas3 = 0; $faltas4 = 0;
	 	  $media = ($nota1 + $nota2 + $nota3 + $nota4); $recup = '-';
		}
		
	  if($materia == 'Comportamento' && $mes > 10){
	   	 $media = $mediafinal;
		 $recup = '-';
	  }
     if($nota1<6)
		  $nota1a = "<b>$nota1</b>";
		  else
		  $nota1a = "$nota1";
	  if($nota2<6)
		  $nota2a = "<b>$nota2</b>";
		  else
		  $nota2a = "$nota2";
	  if($nota3<6)
		  $nota3a = "<b>$nota3</b>";
		  else
		  $nota3a = "$nota3";
	  if($nota4<6)
		  $nota4a = "<b>$nota4</b>";
		  else
		  $nota4a = "$nota4";
	  if($materia == 'Faltas'){
	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";
	  }
	   if($materia == 'Comportamento'){
	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";
	  }


if ($seg == 2 || $seg == 3){
	  $dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>Faltas 1</b>'=>$faltas1,'<b>2º Bim</b>'=>$nota2a,'<b>Faltas 2</b>'=>$faltas2,'<b>3º Bim</b>'=>$nota3a,'<b>Faltas 3</b>'=>$faltas3,'<b>4º Bim</b>'=>$nota4a,'<b>Faltas 4</b>'=>$faltas4,'<b>Pontos</b>'=>$totnota,'<b>Média</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);
	   $totfaltas = ' Total de Faltas '; $tot = ' '; $totfal = $ftotal;
 }
 	 
if ($seg == 1){
	$dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>2º Bim</b>'=>$nota2a,'<b>3º Bim</b>'=>$nota3a,'<b>4º Bim</b>'=>$nota4a,'<b>Pontos</b>'=>$totnota,'<b>Média</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);
	$totfaltas = ' Total de Faltas '; $tot = ' '; $totfal = $ftotal;
	}
	
 $dados2[] = array('<b>FALTAS</b>'=>$totfaltas,'<b>1º Bim</b>'=>$fb1,'<b>2º Bim</b>'=>$fb2,'<b>3º Bim</b>'=>$fb3,'<b>4º Bim</b>'=>$fb4,'<b>NO ANO</b>'=>$ftotal);
}


$sql3 = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' && Ano = '$ano'";
$resultado3 = mysql_query($sql3) or die (mysql_error());

while ($linha3 = mysql_fetch_array($resultado3))
{
	$cont = $cont + 1;
	$materiaD = $linha3['Materia'];
	$turmad = $linha3['Turma'];
	$dep1 = $linha3['Bim1'];
	$dep2 = $linha3['Bim2'];
	$dep3 = $linha3['Bim3'];
	$dep4 = $linha3['Bim4'];
	$totdep = $dep1 + $dep2 + $dep3 + $dep4;
	$faltadep1 = $linha3['Faltas1'];
	$faltadep2 = $linha3['Faltas2'];
	$faltadep3 = $linha3['Faltas3'];
	$faltadep4 = $linha3['Faltas4'];

	$media = '-';
	
	if($dep1 <> '-') 
		$mediaDep = $dep1;
	if($dep2 <> '-')
		$mediaDep = ($dep1 + $dep2)/2;
	if($dep3 <> '-')
		$mediaDep = ($dep1 + $dep2 + $dep3)/3;
	if($dep4 <> '-')
		$mediaDep = ($dep1 + $dep2 + $dep3 + $dep4)/4;
	if($mes > 10){
		$mediaD = $mediaDep;	
		$mediaFD = $mediaD / ($cont-1);
		$mostramediaD = number_format(round($mediaD * 2 )/ 2,1);
	}
	else{
		$mediadep = '';
		$resultDep = '';
	}
	if($mediaDep < 6 && $nota2 <> '-' && $recup1 == 'Sim')
	 $recupDep = 'Recuperação';
	 else 
	 $recupDep = '';

$dados3[] = array('<b>Disciplina</b>'=>$materiaD,'<b>1º Bim</b>'=>$dep1,'<b>Faltas 1º</b>'=>$faltadep1,'<b>2º Bim</b>'=>$dep2,'<b>Faltas 2º</b>'=>$faltadep2,'<b>3º Bim</b>'=>$dep3,'<b>Faltas 3º</b>'=>$faltadep3,'<b>4º Bim</b>'=>$dep4,'<b>Faltas 4º</b>'=>$faltadep4,'<b>Pontos</b>'=>$totdep,'<b>Média</b>'=>$mostramediaD,'<b>Status</b>'=>$recupDep);
}

if ($seg == 1){
$pdf->ezTable($dados,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Pontos'=>array('width'=>10),'Média'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));
$pdf->ezText("\n");
}
if ($seg == 2 || $seg == 3){
$pdf->ezTable($dados,'','',array('xPos'=>15,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'Faltas 1'=>array('width'=>10),'2º Bim'=>array('width'=>10),'Faltas 2'=>array('width'=>10),'3º Bim'=>array('width'=>10),'Faltas 3'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Faltas 4'=>array('width'=>10),'Pontos'=>array('width'=>10),'Média'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));
$pdf->ezText("\n");
$pdf->ezTable($dados2,'','',array('xPos'=>15,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('FALTAS'=>array('width'=>40),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'NO ANO'=>array('width'=>30))));
}
$pdf->ezText("\n");
if(!empty($dados3))
	$pdf->ezText("<b>DEPENDÊNCIA  -  Tuma:  $turmad</b>\n");
$pdf->ezTable($dados3,'','',array('xPos'=>20,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('Disciplina'=>array('width'=>30),'1º Bim'=>array('width'=>10),'F Dep 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'F Dep 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'F Dep 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'F Dep 4º'=>array('width'=>10),'Pontos'=>array('width'=>10),'Média Final'=>array('width'=>10),'Resultado'=>array('width'=>10))));

if(!empty($situacao))
   $pdf->ezText("Situação: $situacao",12,array('justification'=>'center'));
   
$pdf->ezText("\n");
$pdf->ezText("-----------------------------------------------------------------------------------------------",12,array('justification'=>'center'));
$pdf->ezText("Esta parte deverá ser preenchida, destacada e devolvida à coordenação da escola",10,array('justification'=>'center'));
$pdf->ezText("\n");
$pdf->ezText("Responsável: _____________________________________________________________\n",12);
$pdf->ezText("Nome do Aluno:  $nome2\n",12);
$pdf->ezText("Ano de Escolaridade: $turma    Turma: $turma2                        Data recebida  _____/____/____",12);

$pdf->ezStream();
?>