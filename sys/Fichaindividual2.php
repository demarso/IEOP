<?php

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


include "conexao.php";

$nome2 = "Abner Zimbão Loyola";
$nasc = "08/08/2003";
//$recup1 = $_POST["Recup1"];
$ano = date("Y");
$mes = date("m");
$cont = 0;
$contDep = 0;



//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->Image('img/logo_ieop2.jpg',35,60,60);
$pdf->Text("INSTITUTO EDUCACIONAL OLIVEIRA PESSOA");// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->Text("Jardim Escola Pedacinho do Céu");

$pdf->Text("CNPJ: 86.737.210/0001-82");

$pdf->Text("Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355");



$pdf->Text("FICHA INDIVIDUAL  -  ENSINO FUNDAMENTAL</b> - $ano");



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

    

    $sqlRes = "SELECT Resultado, Turma FROM histMatr WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc' && Ano = '$ano'";

$resultadoRes = mysqli_query($conexao, $sqlRes) or die (mysql_error());

while ($linhaRes = mysqli_fetch_array($resultadoRes))

{

    $turma = $linhaRes['Turma'];

    $resultado = $linhaRes['Resultado'];

    if(empty($resultado))

       $query = mysqli_query($conexao, $sql = "UPDATE histMatr SET Resultado='$situacao' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc' && Ano = '$ano'") or die(mysql_error()); 

    

    if($turma == "1º Ano") { $turmaS = "1º"; $turma2 = "111";}

    if($turma == "2º Ano") { $turmaS = "2º"; $turma2 = "121";}

    if($turma == "3º Ano") { $turmaS = "3º"; $turma2 = "131";}

    if($turma == "4º Ano") { $turmaS = "4º"; $turma2 = "141";}

    if($turma == "5º Ano") { $turmaS = "5º"; $turma2 = "151";}

    if($turma == "6º Ano") { $turmaS = "6º"; $turma2 = "161";}

    if($turma == "7º Ano") { $turmaS = "7º"; $turma2 = "171";}

    if($turma == "8º Ano") { $turmaS = "8º"; $turma2 = "181";}

    if($turma == "9º Ano") { $turmaS = "9º"; $turma2 = "191";}



//$pdf->addJpegFromFile($foto,480,$pdf->y-75,70,85,"right");
$pdf->SetFont('Arial','B',10);

    

$pdf->Text("<b>Nome:</b> $nome2    <b>Nascimento:</b> $nascimento");

$pdf->Text("\n<b>Pai:</b> $pai");

$pdf->Text("\n<b>Mãe:</b> $mae");

$pdf->Text("\n<b>Endereço:</b> $endereco    <b>CEP:</b>  $cep");

$pdf->Text("\n<b>Bairro:</b> $bairro    <b>Cidade:</b> $cidade    <b>Estado:</b> $estado");



//$pdf->Text("<b>RENOVAÇÃO DE MATRÍCULA\n</b>",14,array('justification'=>'center'));

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

    if($turma == "6º Ano") $dias = $ch6ano;

    if($turma == "7º Ano") $dias = $ch7ano;

    if($turma == "8º Ano") $dias = $ch8ano;

    if($turma == "9º Ano") $dias = $ch9ano;

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

    //  $mediafinal = $mediaf / ($cont-1);

        }

        else if($recfin <> '-'){

        $mediaf = $mediaf + $recfin;    

        //$mediafinal = $mediaf / ($cont-1);

        }

        else

        $mediafinal = '-';

        
    //  $mostramedia = number_format($media,1, '.', '');
        

        if($mostramedia<6)

          $mostramediaa = "<b>$mostramedia</b>";

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

    if($recfin<6)

          $recfina = "<b>$recfin</b>";

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

       $dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>Faltas 1º</b>'=>$faltas1,'<b>2º Bim</b>'=>$nota2a,'<b>Faltas 2º</b>'=>$faltas2,'<b>3º Bim</b>'=>$nota3a,'<b>Faltas 3º</b>'=>$faltas3,'<b>4º Bim</b>'=>$nota4a,'<b>Faltas 4º</b>'=>$faltas4,'<b>Média</b>'=>$mostramediaa,'Recup.'=>$recfina,'Status'=>$recup);

       $totfaltas = ' Total de Faltas ';

 }

     

      if ($seg == 1){

    

      $dados[] = array('<b>Disciplina</b>'=>$materia,'<b>1º Bim</b>'=>$nota1a,'<b>2º Bim</b>'=>$nota2a,'<b>3º Bim</b>'=>$nota3a,'<b>4º Bim</b>'=>$nota4a,'<b>Média</b>'=>$mostramediaa,'Recup.'=>$recfina,'Status'=>$recup);

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

 



     $dados3[] = array('<b>Disciplina</b>'=>$materiaD,'<b>1º Bim</b>'=>$dep1,'<b>Faltas 1º</b>'=>$faltadep1,'<b>2º Bim</b>'=>$dep2,'<b>Faltas 2º</b>'=>$faltadep2,'<b>3º Bim</b>'=>$dep3,'<b>Faltas 3º</b>'=>$faltadep3,'<b>4º Bim</b>'=>$dep4,'<b>Faltas 4º</b>'=>$faltadep4,'<b>Média</b>'=>$mostramediaD,'Recup'=>$recupDep);

}



    $dados2[] = array('<b>FALTAS</b>'=>$totfaltas,'<b>1º Bim</b>'=>$fb1,'<b>2º Bim</b>'=>$fb2,'<b>3º Bim</b>'=>$fb3,'<b>4º Bim</b>'=>$fb4,'<b>ANUAL</b>'=>$ftotal); 





if ($seg == 1){

    $diaslet = $dias - $ftotal;

    $cargah = $diaslet * 4;

    $freq = $diaslet * 100 / $dias;

    $segm = '1º Segmento';

    $dlf = 'D. L. Frequentado:';

    $dl = 'Dias Letivos:';

    $assinatura = '                  Professor(a)                                                                                   Direção';


$pdf->Text("\n<b>Ano de Escolaridade:</b> $turmaS    <b>Turma:</b> $turma2    <b>$dl</b> $dias    <b>Ano:</b> $ano   -  $segm\n",10, array('justification'=>'center'));

$pdf->ezTable($dados,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'2º Bim'=>array('width'=>10),'3º Bim'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Média'=>array('width'=>10),'Recup'=>array('width'=>10),'Status'=>array('width'=>55))));

}



if ($seg == 2 || $seg == 3){

    $diaslet = $dias - $ftotal;

    $cargah = $dias;

    $freq = $diaslet * 100 / $dias;

    $freq = number_format($freq, 1, ',', '.');

    $segm = '2º Segmento';

    $dlf = 'Hora Aula Frequentada:';

    $dl = 'Carga Horaria:';  

    $assinatura = '            Coordenação Pedagógica                                                                      Direção';

$pdf->Text("\n<b>Ano de Escolaridade:</b> $turmaS    <b>Turma:</b> $turma2    <b>$dl</b> $dias    <b>Ano:</b> $ano   -  $segm\n",10);



$pdf->ezTable($dados,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>70),'1º Bim'=>array('width'=>10),'Faltas 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'Faltas 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'Faltas 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'Faltas 4º'=>array('width'=>10),'Médial'=>array('width'=>10),'Nota Recup'=>array('width'=>55),'Status'=>array('width'=>65))));

$pdf->Text("\n");

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

                

$pdf->Text("\n");

if(!empty($dados3)){

    $pdf->Text("<b>DEPENDÊNCIA  -  Ano:  $turmad1 $turmad2</b>\n");

$pdf->ezTable($dados3,'','',array('xPos'=>40,'xOrientation'=>'right','fontSize' => 8,'width'=>530,'cols'=>array('Disciplina'=>array('width'=>30),'1º Bim'=>array('width'=>10),'F Dep 1º'=>array('width'=>10),'2º Bim'=>array('width'=>10),'F Dep 2º'=>array('width'=>10),'3º Bim'=>array('width'=>10),'F Dep 3º'=>array('width'=>10),'4º Bim'=>array('width'=>10),'F Dep 4º'=>array('width'=>10),'Média Final'=>array('width'=>10),'Resultado'=>array('width'=>10))));

}

$pdf->Text("\n<b>$dlf</b> $diaslet    <b>Carga Horária:</b> $cargah   <b>Frequência:</b> $freq % \n");

$pdf->Text("Situação: $situacao\n");

$pdf->Text("-----------------------------------------------------------------------------------------------");



$pdf->Text("OBS:");

$pdf->Text("________________________________________________________________________");



$pdf->Text("________________________________________________________________________");

$pdf->Text("\n");

$pdf->Text("________________________________                                 _________________________________");

$pdf->Text("$assinatura");

$pdf->Output();
?>