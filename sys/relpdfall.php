<?php
 require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}

include ('class.ezpdf.php');
$pdf =& new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);

include "conexao.php";

/*$sql = "SELECT formulario,solicitante,ramal,descricao,DATE_FORMAT(solicitacao,'%d/%m/%Y') as isolicitacao,executante,DATE_FORMAT(conclusao,'%d/%m/%Y') as iconclusao,observacao,status FROM solicitacao ORDER BY solicitacao desc";

//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

if (date(m) == 1){ $Tmes = 'Janeiro';}
if (date(m) == 2){ $Tmes = 'Fevereiro';}
if (date(m) == 3){ $Tmes = 'Março';}
if (date(m) == 4){ $Tmes = 'Abril';}
if (date(m) == 5){ $Tmes = 'Maio';}
if (date(m) == 6){ $Tmes = 'Junho';}
if (date(m) == 7){ $Tmes = "Julho";}
if (date(m) == 8){ $Tmes = "Agosto";}
if (date(m) == 9){ $Tmes = "Setembro";}
if (date(m) == 10){ $Tmes = "Outubro";}
if (date(m) == 11){ $Tmes = "Novembro";}
if (date(m) == 12){ $Tmes = "Dezembro";}

$pdf->ezText("Escola Alemã Corcovado\n<b>Relatório de todas as Solicitações de Manutenção</b>\n",16);// Define o texto do seu pdf, e o tamanho da fonte;

$resultado = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_array($resultado))
{
$conta = $conta + 1;
$formulario = $linha["formulario"];
$solicitante = $linha["solicitante"];
$ramal = $linha["ramal"];
$descricao = $linha["descricao"];
$solicitacao = $linha["isolicitacao"];
$executante = $linha["executante"];
$conclusao = $linha["iconclusao"];
$observacao = $linha["observacao"];
$status = $linha["status"];*/

$data[] = array('Formulario'=>$formulario ,'Solicitante'=>$solicitante,'Ramal'=>$ramal,'Descricao'=>$descricao,'Solicitacao'=>$solicitacao,'Executante'=>$executante,'Conclusao'=>$conclusao,'Observacao'=>$observacao,'Stataus'=>$status);
//};

$pdf->ezTable($data,$cols,'',array('xPos'=>25,'xOrientation'=>'right','width'=>550,'cols'=>array('formulario'=>array('width'=>50),'solicitante'=>array('width'=>80),'ramal'=>array('width'=>40),'descricao'=>array('width'=>90),'observacao'=>array('width'=>70),'solicitacao'=>array('width'=>70),'executante'=>array('width'=>80),'conclusao'=>array('width'=>70),'status'=>array('width'=>70))));
$pdf->ezText("\n*** Até $Tmes, foram efetuadas $conta solicitações de manutenção. ***",12);
$pdf->ezStream();
?>