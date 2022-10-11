<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
header('Content-Type: text/html; charset=utf-8');
include_once 'Cezpdf.php';
$pdf = new Cezpdf('a4','portrait');

//===================================================================================

// ==================================================================================
set_include_path('src/'.PATH_SEPARATOR.get_include_path());
date_default_timezone_set('UTC');
class Creport extends Cezpdf
{
    public function __construct($p, $o)
    {
        parent::__construct($p, $o, 'none', array());
        $this->isUnicode = true;
        $this->allowedTags .= '|uline';
        // always embed the font for the time being
        //$this->embedFont = false;
    }
}
$pdf = new Creport('a4', 'portrait');
// to test on windows xampp
if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}
$pdf->ezSetMargins(20, 20, 20, 20);
//$pdf->rtl = true; // all text output to "right to left"
//$pdf->setPreferences('Direction','R2L'); // optional: set the preferences to "Right To Left"
$pdf->selectFont('src/fonts/Helvetica.afm');

//===================================================================================

include "conexao.php";

$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$recup1 = $_POST["Recup1"];
$ano = $_SESSION["AnoLetivo"];
$mes = date("m");;
$cont = 0;
$contDep = 0;


$pdf->addJpegFromFile('img/logo_ieop.jpg',35,$pdf->y-60,60,60,"center");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');


$pdf->ezText(" INSTITUTO EDUCACIONAL OLIVEIRA PESSOA",11,array('justification'=>'center'));// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("Jardim Escola Pedacinho do Ceu",11,array('justification'=>'center'));

$pdf->ezText("CNPJ: 86.737.210/0001-82  ",11,array('justification'=>'center'));

$pdf->ezText("Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",11,array('justification'=>'center'));



$pdf->ezText(" \nFICHA INDIVIDUAL  -  ENSINO FUNDAMENTAL   - $ano\n",14,array('justification'=>'center'));



$sql1 = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc'";



$resultado1 = mysqli_query($conexao, $sql1) or die (mysql_error());

//$ano2 = $_SESSION["AnoLetivo"];

while ($linha1 = mysqli_fetch_array($resultado1))

{

	$id = $linha1['id'];

	$nome2 = $linha1['Nome'];

	$seg = $linha1['Segmento'];

	$matricula = $linha1['Matricula'];

	$nascimento = $linha1['iNascimento'];

	$endereco = $linha1['Endereco'];

	$cep = $linha1['Cep'];

	$pai = $linha1['Pai'];

	$mae = $linha1['Mae'];

	$bairro = $linha1['Bairro'];

	$cidade = $linha1['Cidade'];

	$estado = $linha1['Estado'];

	$turma = $linha1['Turma'];

	$foto = $linha1['Foto'];
    if($seg == 3){
	    $seg =2;
    }

	$sqlRes = "SELECT Resultado, Turma FROM histMatr WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc' && Ano = '$ano'";

$resultadoRes = mysqli_query($conexao, $sqlRes) or die (mysql_error());

while ($linhaRes = mysqli_fetch_array($resultadoRes))

{

	$turma = $linhaRes['Turma'];

	$resultado = $linhaRes['Resultado'];

    if(empty($resultado))

	   $query = mysqli_query($conexao, $sql = "UPDATE histMatr SET Resultado='$situacao' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc' && Ano = '$ano'") or die(mysql_error()); 

	

	if($turma == "1 Ano") { $turmaS = "1º"; $turma2 = "111";}

	if($turma == "2 Ano") { $turmaS = "2º"; $turma2 = "121";}

	if($turma == "3 Ano") { $turmaS = "3º"; $turma2 = "131";}

	if($turma == "4 Ano") { $turmaS = "4º"; $turma2 = "141";}

	if($turma == "5 Ano") { $turmaS = "5º"; $turma2 = "151";}

	if($turma == "6 Ano") { $turmaS = "6º"; $turma2 = "161";}

	if($turma == "7 Ano") { $turmaS = "7º"; $turma2 = "171";}

	if($turma == "8 Ano") { $turmaS = "8º"; $turma2 = "181";}

	if($turma == "9 Ano") { $turmaS = "9º"; $turma2 = "191";}



//$pdf->addJpegFromFile($foto,480,$pdf->y-75,70,85,"right");

	

$pdf->ezText("Nome: $nome2     Nascimento:   $nascimento",10);

$pdf->ezText("\n Pai:   $pai",10);

$pdf->ezText("\n Mae:   $mae",10);

$pdf->ezText("\n Endereco:   $endereco     CEP:    $cep",10);

$pdf->ezText("\n Bairro:   $bairro     Cidade:   $cidade     Estado:   $estado",10);



//$pdf->ezText(" RENOVAÇÃO DE MATRÍCULA\n  ",14,array('justification'=>'center'));

}

};



$sql3 = "SELECT * FROM parametro WHERE Ano = '$ano'";

$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

while ($linha3 = mysqli_fetch_array($resultado3))

{

	$dias = $linha3['DiasLetivos'];

	$ano2 = $linha3['Ano'];

	$ch6ano = $linha3['Ch6ano'];

	$ch7ano = $linha3['Ch7ano'];

	$ch8ano = $linha3['Ch8ano'];

	$ch9ano = $linha3['Ch9ano'];

	if($turma == "6 Ano") $dias = $ch6ano;

	if($turma == "7 Ano") $dias = $ch7ano;

	if($turma == "8 Ano") $dias = $ch8ano;

	if($turma == "9 Ano") $dias = $ch9ano;

};



$cont = 0;

$sql2 = "SELECT * FROM notas WHERE Matricula = '$matricula' AND Ano = '$ano' ORDER BY id";

$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());



while ($linha2 = mysqli_fetch_array($resultado2))

{

	$cont = $cont + 1;

	$materia = $linha2['Materia'];

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
		
	$mostramedia = number_format(round($media * 2 )/ 2,1);

	$recfin = $linha2['RecFin'];

		if($materia <> "Comportamento" && $materia <> "Faltas" && $nota2 <> '-'){

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

	//$media = '-';
/*
	if($nota1 <> '-') 

		$media = $nota1;

	if($nota2 <> '-')

		$media = ($nota1 + $nota2)/2;

	if($nota3 <> '-')

		$media = ($nota1 + $nota2 + $nota3)/3;

	if($nota4 <> '-')

		$media = ($nota1 + $nota2 + $nota3 + $nota4)/4;

	*/	

	if($recfin == '-'){

		$mediaf = $mediaf + $media;	

	//	$mediafinal = $mediaf / ($cont-1);

		}

		else if($recfin <> '-'){

		$mediaf = $mediaf + $recfin;	

		//$mediafinal = $mediaf / ($cont-1);

		}

		else

		$mediafinal = '-';

		
	//	$mostramedia = number_format($media,1, '.', '');
		

		if($mostramedia<6)

		  $mostramediaa = " $mostramedia  ";

		  else

		  $mostramediaa = $mostramedia;

		$mediafinal = number_format(round($mediafinal * 2 )/ 2,1);

	

	$sqlDep = "SELECT Recuperacao FROM notas WHERE Matricula = '$matricula' AND Ano = '$ano'";

     $resultadoDep = mysqli_query($conexao, $sqlDep) or die (mysql_error());

	 $Depend = 0;

     while ($linhaDep = mysqli_fetch_array($resultadoDep))

     {

		$recup = $linhaDep['Recuperacao'];

		if($recup == 'Dep')

		  $Depend = $Depend + 1;

	 }

	

if($recup1 == 'Sim'){	 		

	// if($mediafinal < 6 && $materia <> 'Faltas' && $nota2 <> '-' && $materia <> 'Comportamento' && empty($recfin))

	 //       $recup = 'Recuperação';

	 if(($media < 6 || $recfin < 6) && $materia <> 'Faltas' && $materia <> 'Comportamento' && $Depend < 3 && $mes == 12 && $nota4 == '-'){

	        // $query = mysql_query($sql = "UPDATE notas SET Dependencia='SIM' WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia'") or die(mysql_error());

			$recup = 'Dependência';

	        $contDep = $contDep + 1;

			$recfina = $recfin;

	      }

	 else if(($media >= 6 || $recfin >= 6) && $materia <> 'Faltas' && $nota2 <> '-' && $materia <> 'Comportamento' && $nota4 <> '-'){

	      $recup = 'Aprovado';

		  $recfina = $recfin;

	 }

	 else if(($media < 6 || $recfin < 6) && $mes == 12 && $nota4 <> '-'){

		  $recup = 'Reprovado';

		  $recfina = '-';

	 }

}

else{

	$recup = '-';}



	  if($nota1<6)

		  $nota1a = " $nota1  ";

		  else

		  $nota1a = "$nota1";

	  if($nota2<6)

		  $nota2a = " $nota2  ";

		  else

		  $nota2a = "$nota2";

	  if($nota3<6)

		  $nota3a = " $nota3  ";

		  else

		  $nota3a = "$nota3";

	  if($nota4<6)

		  $nota4a = " $nota4  ";

		  else

		  $nota4a = "$nota4";

	if($recfin<6)

		  $recfina = " $recfin  ";

		  else

		  $recfina = "$recfin"; 

		   

	  if($materia == 'Faltas'){

	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";

	   $mostramedia = $ftotal; 

	   $ftotal = $nota1 + $nota2 + $nota3 + $nota4;

	   $mostramediaa = $ftotal;

	   $recup = '-';

	   }

	   if($materia == 'Comportamento'){

	   $nota1a = "$nota1"; $nota2a = "$nota2"; $nota3a = "$nota3"; $nota4a = "$nota4";

	   $mostramediaa = '-';

	   $media = '-';

	   $recup = '-';

	   }

	   
	   

       if ($seg == 2 || $seg == 3){

	   $dados[] = array(' Disciplina  '=>$materia,' 1º Bim  '=>$nota1a,' Faltas 1º  '=>$faltas1,' 2º Bim  '=>$nota2a,' Faltas 2º  '=>$faltas2,' 3º Bim  '=>$nota3a,' Faltas 3º  '=>$faltas3,' 4º Bim  '=>$nota4a,' Faltas 4º  '=>$faltas4,' Media  '=>$mostramediaa,'Recup.'=>$recfina,'Status'=>$recup);

	   $totfaltas = ' Total de Faltas ';

 }

 	 

      if ($seg == 1){

	

	  $dados[] = array(' Disciplina  '=>$materia,' 1º Bim  '=>$nota1a,' 2º Bim  '=>$nota2a,' 3º Bim  '=>$nota3a,' 4º Bim  '=>$nota4a,' Media  '=>$mostramediaa,'Recup.'=>$recfina,'Status'=>$recup);

	  }

}



$sql3 = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";

$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());



while ($linha3 = mysqli_fetch_array($resultado3))

{

	$cont = $cont + 1;

	$materiaD = $linha3['Materia'];

	$turmad1 = $linha3['Turma1'];

	$turmad2 = $linha3['Turma2'];

	$dep1 = $linha3['Bim1'];

	$dep2 = $linha3['Bim2'];

	$dep3 = $linha3['Bim3'];

	$dep4 = $linha3['Bim4'];

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

	if($mes <= 12){

		$mediaD = $mediaD + $mediaDep;	


		$mediaFD = $mediaD / ($cont-1);
		$mostramediaD = number_format(round($mediaDep * 2 )/ 2,1);

	}

	else{

		$mediafinal = '-';

		$mediadep = '';

		$resultDep = '';

	}

if($recup1 == 'Sim'){

 if($mediaDep < 6 && $dep2 <> '-' && $dep4 == '-'){

	   $recupDep = 'Recuperação';}

  else if($mediaDep < 6 && $dep4 <> '-'){

	   $recupDep = 'Reprovado';}

  else if($mediaDep >= 6 && $dep4 <> '-'){

	   $recupDep = 'Aprovado';}

  else {

	   $recupDep = '';}

}

else{

	$recupDep = '';}



	   if($dep2 == '-'){

	   $mostramediaD = '-';

	   $mediadep = '-';

	   $recup = '-';

	  }

 



     $dados3[] = array('Disciplina'=>$materiaD,'1º Bim'=>$dep1,'Faltas 1º'=>$faltadep1,'2º Bim'=>$dep2,'Faltas 2º'=>$faltadep2,'3º Bim'=>$dep3,'Faltas 3º'=>$faltadep3,'4º Bim'=>$dep4,'Faltas 4º'=>$faltadep4,'Media'=>$mostramediaD,'Recup'=>$recupDep);

}



    $dados2[] = array(' FALTAS '=>$totfaltas,' 1º Bim '=>$fb1,' 2º Bim '=>$fb2,' 3º Bim '=>$fb3,' 4º Bim '=>$fb4,' ANUAL '=>$ftotal);	





if ($seg == 1){

    $diaslet = $dias - $ftotal;

	$cargah = $diaslet * 4;

	$freq = $diaslet * 100 / $dias;
   $freq = number_format(round($freq * 2 )/ 2,1);
	$segm = '1º Segmento';

	$dlf = 'D. L. Frequentado:';

	$dl = 'Dias Letivos:';

	$assinatura = '                  Professor(a)                                                                                   Direcao';


$pdf->ezText("\n Ano de Escolaridade: $turmaS     Turma: $turma2     $dl $dias     Ano: $ano - $segm\n",10, array('justification'=>'center'));

$pdf->ezTable($dados,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Media'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>55))));

}



if ($seg == 2 || $seg == 3){

	$diaslet = $dias - $ftotal;

	$cargah = $dias;

    $freq = $diaslet * 100 / $dias;

	$freq = number_format($freq, 1, ',', '.');
    
    if($seg == 2) $segm = '2º Segmento';
    if($seg == 3) $segm = '2º Segmento';

	$dlf = 'Hora Aula Frequentada:';

	$dl = 'Carga Horaria:';  

	$assinatura = '            Coordenacao Pedagogica                                                                      Direcao';

$pdf->ezText("\n Ano de Escolaridade: $turmaS     Turma: $turma2     $dl $dias     Ano: $ano - $segm\n",10);



$pdf->ezTable($dados,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'Faltas 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'Faltas 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'Faltas 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Faltas 4º'=>array('width'=>10),'Media'=>array('width'=>10),'Nota Recup'=>array('width'=>55),'Status'=>array('width'=>45))));

$pdf->ezText("\n");

$pdf->ezTable($dados2,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('FALTAS'=>array('width'=>40),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'NO ANO'=>array('width'=>30))));

}



$sqlRes = "SELECT Resultado FROM histMatr WHERE Matricula = '$matricula' AND Ano = '$ano' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc'";

$resultadoRes = mysqli_query($conexao, $sqlRes) or die (mysql_error());

while ($linhaRes = mysqli_fetch_array($resultadoRes))

{

	$situacao = $linhaRes['Resultado'];

}
/*
 if($mediafinal < 6 && $mediafinal <> -1 && $nota4 <> '-' && $contDep < 3)

	  $situacao = 'REPROVADO(A)';

	  else if($freq < 75)

	  $situacao = 'REPROVADO(A)';

	  else if($contDep >= 3)

	  $situacao = 'REPROVADO(A)';

	  else if ($mediafinal >= 6 && $nota4 <> '-' && $contDep == 0)

	  $situacao = 'APROVADO(A)';

	  else

	  $situacao = 'APROVADO(A) COM DEPENDÊNCIA'; */

			  	

$pdf->ezText("\n");

if(!empty($dados3)){

	$pdf->ezText(" DEPENDENCIA - Ano:  $turmad1 $turmad2  \n");

$pdf->ezTable($dados3,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>30),'1º Bim'=>array('width'=>10),'F Dep 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'F Dep 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'F Dep 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'F Dep 4º'=>array('width'=>10),'Media Final'=>array('width'=>10),'Resultado'=>array('width'=>10))));

}

$pdf->ezText("\n $dlf  $diaslet     Carga Horaria: $cargah    Frequencia: $freq % \n",10, array('justification'=>'center'));

$pdf->ezText("Situacao: $situacao\n",14,array('justification'=>'center'));

$pdf->ezText("-----------------------------------------------------------------------------------------------",12,array('justification'=>'center'));



$pdf->ezText("OBS:",12);

$pdf->ezText("________________________________________________________________________");



$pdf->ezText("________________________________________________________________________");

$pdf->ezText("\n");

$pdf->ezText("________________________________                                 _________________________________",10);

$pdf->ezText("$assinatura",10);

$pdf->ezStream();

?>