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
//$pdf -> ezSetMargins(140,70,50,50);

require_once("conexao.php");

$fantasia = $_POST["fantasia"];
$codobra = $_POST["codobra"];
$master = $_SESSION['cnpj'];

$sql1 = "SELECT * FROM clientemaster WHERE cnpj = '$master'";

$resultado1 = mysqli_query($conexao,$sql1) or die (mysql_error());

while ($linha1 = mysqli_fetch_array($resultado1))
{

$logo = $linha1["logo"];
$pdf->addJpegFromFile('$logo',40,$pdf->y-20,50,40,"left");
};


$sql = "SELECT *,DATE_FORMAT(data,'%d/%m/%Y') as idata FROM diario WHERE fantasia = '$fantasia' AND codobra = '$codobra' ORDER BY data";

//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>                                         Relatorio diario do Cliente: $fantasia  Obra: $codobra</b>\n",12);// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("\n");

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{

$codobra = $linha["codobra"];
$data = $linha["idata"];
$hora = $linha["hora"];
$horaf = $linha["horaf"];
$tempo = $linha["tempo"];
$func1 = $linha["func1"];
$quant1 = $linha["quant1"];
$func2 = $linha["func2"];
$quant2 = $linha["quant2"];
$func3 = $linha["func3"];
$quant3 = $linha["quant3"];
$func4 = $linha["func4"];
$quant4 = $linha["quant4"];
$func5 = $linha["func5"];
$quant5 = $linha["quant5"];
$func6 = $linha["func6"];
$quant6 = $linha["quant6"];
$func7 = $linha["func7"];
$quant7 = $linha["quant7"];
$func8 = $linha["func8"];
$quant8 = $linha["quant8"];
$func9 = $linha["func9"];
$quant9 = $linha["quant9"];
$func10 = $linha["func10"];
$quant10 = $linha["quant10"];
$func11 = $linha["func11"];
$quant11 = $linha["quant11"];
$func12 = $linha["func12"];
$quant12 = $linha["quant12"];
$equipamento = $linha["equipamento"];
$servico = $linha["servico"];
$obs = $linha["obs"];

$pdf->ezText("Data: $data | Hora Início: $hora | Hora Fim: $horaf | Tempo: $tempo",12);
if ( !empty($func1) ) {
$func1="$func1 : $quant1 | ";
}
if ( !empty($func2) ) {
$func2="$func2 : $quant2 | ";
}
if ( !empty($func3) ) {
$func3="$func3 : $quant3 | ";
}
if ( !empty($func4) ) {
$func4="$func4 : $quant4 | ";
}
if ( !empty($func5) ) {
$func5="$func5 : $quant5 | ";
}
if ( !empty($func6) ) {
$func6="$func6 : $quant6 | ";
}
if ( !empty($func7) ) {
$func7="$func7 : $quant7 | ";
}
if ( !empty($func8) ) {
$func8="$func8 : $quant8 | ";
}
if ( !empty($func9) ) {
$func9="$func9 : $quant9 | ";
}
if ( !empty($func10) ) {
$func10= "$func10 : $quant10 | ";
}
if ( !empty($func11) ) {
$func11="$func11 : $quant11 | ";
}
if ( !empty($func12) ) {
$func12="$func12 : $quant12";
}
$pdf->ezText("$func1$func2$func3$func4$func5$func6$func7$func8$func9$func10$func11$func12",12);
$pdf->ezText("Equipamentos: $equipamento",12);
$pdf->ezText("Serviço: $servico",12);
$pdf->ezText("Observação: $obs",12);
$pdf->ezText("______________________________________________________________________",12);
$pdf->ezText("                                                                      ");
$pdf->ezText("______________________________________________________________________",12);
$pdf->ezText("                                                                      ");
   
};

//$dados[] = array('Obra'=>$codobra ,'Data'=>$data,'Hora'=>$hora,'Tempo'=>$tempo,'Equip'=>$equipamento,'Serviço'=>$servico,'Observação'=>$obs);

$pdf->ezTable($dados,$cols,'',array('xPos'=>25,'xOrientation'=>'right','fontSize' => 12,'width'=>550,'cols'=>array()));

$pdf->ezStream();

?>