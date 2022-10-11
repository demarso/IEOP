<?php
require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}


include "conexao.php";

include_once 'Cezpdf.php';
$pdf = new CezPDF('a4');

//$pdf->selectFont('./fonts/Helvetica.afm');
//$pdf->ezStartPageNumbers(570,10,10,'','',1);
//$pdf = new Cezpdf('a4','landscape');
//$pdf -> ezSetMargins(50,70,50,50);


function round_number( $valor )

{

	$decimais = 1;

	$fator = pow(10, $decimais);

	$valorArredondado = intval(($valor * $fator) + 0.5) / $fator;

	return $valorArredondado;

}



$nome2 = $_POST["Nome"];
$nome2a = $_POST["Nome"];

$nasc = $_POST["NascEx"];

$recup1 = $_POST["Recup1"];

$situacao = $_POST["Situacao"];

$ano = $_SESSION["AnoLetivo"];

$anoH = date("Y");

$mes = date("m");

$cont = 0;


//$pdf->selectFont('./fonts/Helvetica.afm');

$pdf->ezStartPageNumbers(570,10,10,'','',1);

//$pdf = new Cezpdf('a4','landscape');

$pdf -> ezSetMargins(50,70,50,50);





$pdf->addJpegFromFile('img/logo_ieop2.jpg',35,$pdf->y-60,60,60,"center");





//$cols = array('formulario'=>"Formul�rio",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descri��o','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclus�o','observacao'=>'Obs');



$pdf->ezText("<b>INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14,array('justification'=>'center'));// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>Jardim Escola Pedacinho do Ceu</b>",12,array('justification'=>'center'));

$pdf->ezText("<b>CNPJ: 86.737.210/0001-82</b>",12,array('justification'=>'center'));

$pdf->ezText("Rua Dona Castorina, n� 93 - Vila Oper�ria - Nova Igua�u - RJ - Tel: (21)2695-6355",11,array('justification'=>'center'));

//$pdf->ezText("Portaria de Autoriza��o - n� 798 - D.O. 25/11/1998.",11,array('justification'=>'center'));

$pdf->ezText("<b>\nBOLETIM ESCOLAR</b> - $ano",14,array('justification'=>'center'));

$pdf->ezText("\n");



$sql1 = "SELECT id,Matricula,Nome,Segmento,Turma,Foto FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc'";

$resultado1 = mysqli_query($conexao, $sql1) or die (mysql_error());

$ano2 = date('Y');

while ($linha1 = mysqli_fetch_array($resultado1))

{

	$id = $linha1['id'];

	$nome2 = $linha1['Nome'];

	$seg = $linha1['Segmento'];

	$matricula = $linha1['Matricula'];

    $query = mysqli_query($conexao, $sql = "UPDATE histMatr SET Resultado='$situacao' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc' && Ano = '$ano'") or die(mysql_error()); 	

	//$foto = $linha1['Foto'];

$sqlRes = "SELECT Resultado, Turma FROM histMatr WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc' && Ano = '$ano'";

$resultadoRes = mysqli_query($conexao, $sqlRes) or die (mysql_error());

while ($linhaRes = mysqli_fetch_array($resultadoRes))

{

	$turmaa = $linhaRes['Turma'];

	$resultado = $linhaRes['Resultado'];

    if(empty($resultado))

	   $query = mysqli_query($conexao, $sql = "UPDATE histMatr SET Resultado='$situacao' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc' && Ano = '$ano'") or die(mysql_error()); 	

	if($turmaa == "1 Ano") { $turma = "1�"; $turmab = "111";}

	if($turmaa == "2 Ano") { $turma = "2�"; $turmab = "121";}

	if($turmaa == "3 Ano") { $turma = "3�"; $turmab = "131";}

	if($turmaa == "4 Ano") { $turma = "4�"; $turmab = "141";}

	if($turmaa == "5 Ano") { $turma = "5�"; $turmab = "151";}

	if($turmaa == "6 Ano") { $turma = "6�"; $turmab = "161";}

	if($turmaa == "7 Ano") { $turma = "7�";  $turmab = "171";}

	if($turmaa == "8 Ano") { $turma = "8�"; $turmab = "181";}

	if($turmaa == "9 Ano") { $turma = "9�"; $turmab = "191";}

	 

//$pdf->addJpegFromFile($foto,480,$pdf->y-75,70,85,"right");

$pdf->ezText("<b>Nome:</b> $nome2a",14);	

 $pdf->ezText("\n<b>Matricula: $matricula",12);
 
 $pdf->ezText("Ano de Escolaridade: $turma",12);
 
 $pdf->ezText("Turma: $turmab</b>",12);

//$pdf->ezText("\n<b>Nascimento:</b> $nascimento    <b>Certid�o:</b> $certidao    <b>Sangue:</b> $sangue    <b>Cor/Ra�a:</b> $raca",12);

//$pdf->ezText("\n<b>Naturalidade:</b> $natural    <b>Nacionalidade:</b> $nacional",12);

//$pdf->ezText("\n<b>Pai:</b> $pai    <b>Profiss�o:</b> $profpai",12);

//$pdf->ezText("\n<b>M�e:</b> $mae    <b>Profiss�o:</b> $profmae",12);

//$pdf->ezText("\n<b>Endere�o:</b> $endereco    <b>CEP</b> $cep    <b>Telefone:</b> $telefone",12);

//$pdf->ezText("\n<b>Bairro:</b> $bairro    <b>Cidade:</b> $cidade    <b>Estado:</b> $estado",12);

//$pdf->ezText("\n<b>O Aluno foi matriculado na turma:</b> $turma                              <b>Em:</b> $data1",12);



$pdf->ezText("\n");



//$pdf->ezText("<b>RENOVA��O DE MATR�CULA\n</b>",14,array('justification'=>'center'));



}

}

$cont = 0;

$mediaf = 0;

$sql2 = "SELECT * FROM notas WHERE Matricula = '$matricula' AND Ano = '$ano' ORDER BY id";

$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());



while ($linha2 = mysqli_fetch_array($resultado2))

{

	$cont = $cont + 1;

	$materia = $linha2['Materia'];
   
    if($materia == 'Matematica')
    	$materia = 'Matem�tica';
    if($materia == 'Portugues')
    	$materia = 'Portugu�s';
    if($materia == 'Ingles')
    	$materia = 'Ingl�s';
    if($materia == 'Historia')
    	$materia = 'Hist�ria';
    if($materia == 'Educacao Fisica')
    	$materia = 'Educa��o F�sica';
    if($materia == 'Algebra')
    	$materia = '�lgebra';
    if($materia == 'Ed. Fisica')
    	$materia = 'Ed. F�sica';
    if($materia == 'Ciencias')
    	$materia = 'Ci�ncias';
    if($materia == 'Redacao')
    	$materia = 'Reda��o';
    if($materia == 'Fisica')
    	$materia = 'F�sica';
    if($materia == 'Quimica')
    	$materia = 'Qu�mica';


	$nota1 = $linha2['Bim1'];

	$nota2 = $linha2['Bim2'];

	$nota3 = $linha2['Bim3'];

	$nota4 = $linha2['Bim4'];
		
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 4;
		$media = ($nota1 + $nota2 + $nota3 + $nota4)/4;
	if($nota1 == '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 3;
		$media = ($nota2 + $nota3 + $nota4)/3;
	if($nota1 == '-' && $nota2 == '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 2;
		$media = ($nota3 + $nota4)/2;
	if($nota1 == '-' && $nota2 == '-' && $nota3 == '-' && $nota4 <> '-')
		//$quantNotas = 1;
		$media = $nota4;	
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 == '-')
		//$quantNotas = 3;
		$media = ($nota1 + $nota2 + $nota3)/3;
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 == '-' && $nota4 == '-')
		//$quantNotas = 2;
	    $media = ($nota1 + $nota2)/2;
	if($nota1 <> '-' && $nota2 == '-' && $nota3 == '-' && $nota4 == '-')
		//$quantNotas = 1;
		$media = $nota1;
				
	//$media = ($nota1 + $nota2 + $nota3 + $nota4)/$quantNotas;
	
	//$mostramedia = number_format($media,1, '.', '');
	
	//$mostramedia = number_format($media,2, '.', '');
	$mostramedia = number_format(round($media * 2 )/ 2,1);
	//$mostramedia = number_format($media,1, '.', '');

	$recfin = $linha2['RecFin'];

		if($materia <> "Comportamento" && $materia <> "Faltas"){

	 		$totnota = $nota1 + $nota2 + $nota3 + $nota4;

	 		$totnota = number_format($totnota,1, '.', '');

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

	//$media = '-';
/*
	if($nota1 <> '-') 

		$media = $quantNotas;

	if($nota2 <> '-')

		$media = ($nota1 + $nota2)/$quantNotas;

	if($nota3 <> '-')

		$media = ($nota1 + $nota2 + $nota3)/$quantNotas;

	if($nota4 <> '-') */

		


	if($mes > 11 && $nota1 <> '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 <> '-'){

	//	$mediaf = $mediaf + $media;	

	//	$mediafinal = $mediaf / ($cont - 1);
        
	//$mostramedia = number_format((double)$media,1, '.', '');
    $mostramedia = number_format(round($media * 2 )/ 2,1);
	}

	else{

		$mostramedia = '-';
		$mediafinal = '-';
	} 
	  

	 if($materia == 'Faltas'){

	 	$mostramedia = $nota1 + $nota2 + $nota3 + $nota4;

		$mostramedia = 'Total de  '.$mostramedia;

		$recfin = '';

	}

	 if($materia == 'Comportamento'){

	  	$media = '-';

		//$mediafinal = '-';

		$mostramedia = '-';

	 }

if($recup1 == 'Sim'){

	if($media < 6 && $materia <> 'Faltas' && $nota2 <> '-' && $materia <> 'Comportamento' && empty($recfin))

	 $recup = 'Recupera��o';

	 else if(($media >= 6 || $recfin >= 6) && $mes == 12 && $nota4 <> '-')

	 $recup = 'Aprovado';

	 else if(($media >= 6 || $recfin >= 6) && $ano < $anoH && $nota4 <> '-')

     $recup = 'Aprovado';

	 else if($recfin < 6 && $recfin < 6 && $mes == 12)

	 $recup = 'Reprovado';

	 else

	 $recup = '';

	// if($mes >= 10 && $totnota >= 24)

	// $recup = 'Aprovado(a)';

}

else{

	$recup = '-'; 

}

	  if($materia == 'Faltas')

	   	{/*$faltas1 = 0; $faltas2 = 0; $faltas3 = 0; $faltas4 = 0;*/

	 	  $media = ($nota1 + $nota2 + $nota3 + $nota4); $recup = '-';

		}

		

	  if($materia == 'Comportamento'){

	   	 $media = $mediafinal;

		 $recup = '-';

	  }
 // COLOCA EM NEGRITO AS M�DIAS ABAIXO DE 6
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
  // FIM NEGRITO		  

	  if($materia == 'Faltas'){

	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";}

	   if($materia == 'Comportamento'){

	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";}

	   

if ($seg == 2 || $seg == 3){

	  $dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1� Bim</b>'=>$nota1a,'<b>Faltas 1�</b>'=>$faltas1,'<b>2� Bim</b>'=>$nota2a,'<b>Faltas 2�</b>'=>$faltas2,'<b>3� Bim</b>'=>$nota3a,'<b>Faltas 3�</b>'=>$faltas3,'<b>4� Bim</b>'=>$nota4a,'<b>Faltas 4�</b>'=>$faltas4,'<b>Pontos</b>'=>$totnota,'<b>Media</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);

	   $totfaltas = ' Total de Faltas '; $tot = ' '; $totfal = $ftotal;

 }

 	 

if ($seg == 1){

	$dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1� Bim</b>'=>$nota1a,'<b>2� Bim</b>'=>$nota2a,'<b>3� Bim</b>'=>$nota3a,'<b>4� Bim</b>'=>$nota4a,'<b>Pontos</b>'=>$totnota,'<b>Media</b>'=>$mostramedia,'<b>Recup</b>'=>$recfin,'<b>Status</b>'=>$recup);

	$totfaltas = ' Total de Faltas '; $tot = ' '; $totfal = $ftotal;

	}



}



$sql3 = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";

$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());



while ($linha3 = mysqli_fetch_array($resultado3))

{

	$cont = $cont + 1;

	$materiaD = $linha3['Materia'];

	$turma1 = $linha3['Turma1'];

	$turma2 = $linha3['Turma2'];

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

	if($dep1 <> '-' && $dep2 == '-' && $dep3 == '-' && $dep4 == '-')
		$mediaDep = 1;
	if($dep1 == '-' && $dep2 <> '-' && $dep3 == '-' && $dep4 == '-')
		$mediaDep = ($dep1 + $dep2)/2;
	if($dep1 == '-' && $dep2 == '-' && $dep3 <> '-' && $dep4 == '-')
		$mediaDep = ($dep1 + $dep2 + $dep3)/3;
	if($dep1 == '-' && $dep2 == '-' && $dep3 == '-' && $dep4 <> '-')
		$mediaDep = ($dep1 + $dep2 + $dep3 + $dep4)/4;	
	

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
/*
	if($mediaDep < 6 && $nota2 <> '-' && $recup1 == 'Sim')

	 $recupDep = 'Recupera��o';

	 else if($mediaDep > 6 && $nota4 <> '-' && $mes == 12)

	 $recupDep = 'Aprovado';
	 
	 else
	 $recupDep = '';*/
	 

$dados3[] = array('<b>Disciplina</b>'=>$materiaD,'<b>1� Bim</b>'=>$dep1,'<b>Faltas 1�</b>'=>$faltadep1,'<b>2� Bim</b>'=>$dep2,'<b>Faltas 2�</b>'=>$faltadep2,'<b>3� Bim</b>'=>$dep3,'<b>Faltas 3�</b>'=>$faltadep3,'<b>4� Bim</b>'=>$dep4,'<b>Faltas 4�</b>'=>$faltadep4,'<b>Pontos</b>'=>$totdep,'<b>Media</b>'=>$mostramediaD,'<b>Recup</b>'=>$recupDep);

	

}



$dados2[] = array('<b>FALTAS</b>'=>$totfaltas,'<b>1� Bim</b>'=>$fb1,'<b>2� Bim</b>'=>$fb2,'<b>3� Bim</b>'=>$fb3,'<b>4� Bim</b>'=>$fb4,'<b>NO ANO</b>'=>$ftotal);	



if ($seg == 1){



$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>520,'cols'=>array('Disciplina'=>array('width'=>70),'1� Bim'=>array('width'=>10),'2� Bim'=>array('width'=>10),'3� Bim'=>array('width'=>10),'4� Bim'=>array('width'=>10),'Pontos'=>array('width'=>10),'Media'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));

$pdf->ezText("\n");



}

if ($seg == 2 || $seg == 3){

 

$pdf->ezTable($dados,'','',array('xPos'=>20,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('Disciplina'=>array('width'=>70),'1� Bim'=>array('width'=>10),'Faltas 1�'=>array('width'=>10),'2� Bim'=>array('width'=>10),'Faltas 2�'=>array('width'=>10),'3� Bim'=>array('width'=>10),'Faltas 3�'=>array('width'=>10),'4� Bim'=>array('width'=>10),'Faltas 4�'=>array('width'=>10),'Pontos'=>array('width'=>10),'Media'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>50))));

$pdf->ezText("\n");

$pdf->ezTable($dados2,'','',array('xPos'=>20,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('FALTAS'=>array('width'=>40),'1� Bim'=>array('width'=>10),'2� Bim'=>array('width'=>10),'3� Bim'=>array('width'=>10),'4� Bim'=>array('width'=>10),'NO ANO'=>array('width'=>30))));

}

$pdf->ezText("\n");

if(!empty($dados3))

	$pdf->ezText("<b>DEPEND�NCIA</b>\n");

$pdf->ezTable($dados3,'','',array('xPos'=>20,'xOrientation'=>'right','fontSize' => 8,'width'=>570,'cols'=>array('Disciplina'=>array('width'=>30),'1� Bim'=>array('width'=>10),'F Dep 1�'=>array('width'=>10),'2� Bim'=>array('width'=>10),'F Dep 2�'=>array('width'=>10),'3� Bim'=>array('width'=>10),'F Dep 3�'=>array('width'=>10),'4� Bim'=>array('width'=>10),'F Dep 4�'=>array('width'=>10),'Pontos'=>array('width'=>10),'M�dia Final'=>array('width'=>10),'Resultado'=>array('width'=>10))));


if(!empty($situacao))

   $pdf->ezText("Situacao: $situacao",12,array('justification'=>'center'));

$pdf->ezText("\n");

$pdf->ezText("-----------------------------------------------------------------------------------------------",12,array('justification'=>'center'));

$pdf->ezText("Esta parte devera ser preenchida, destacada e devolvida a coordenacao da escola",10,array('justification'=>'center'));

$pdf->ezText("\n");

$pdf->ezText("Responsavel: _____________________________________________________________\n",12);

$pdf->ezText("Nome do Aluno:  $nome2a\n",12);

$pdf->ezText("Ano de Escolaridade: $turma    Turma: $turmab                        Data recebida  _____/____/____",12);



$pdf->ezStream();



?>