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

$matri = $_GET['Matr'];


$pdf->addJpegFromFile('img/logo_ieop2.jpg',40,$pdf->y-20,50,40,"left");


//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>               INSTITUTO EDUCACIONAL OLIVEIRA PESSOA</b>",14);// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>               Jardim Escola Pedacinho do Céu     CNPJ: 86.737.210/0001-82</b>",12);
$pdf->ezText("               Rua Dona Castorina, nº 93 - Vila Operária - Nova Iguaçu - RJ - Tel: (21)2695-6355",12);
$pdf->ezText("<b>\nFICHA DE MATRÍCULA</b>",14,array('justification'=>'center'));

$sql1 = "SELECT *, DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno WHERE Matricula = '$matri'";

$resultado1 = mysqli_query($conexao, $sql1) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado1))
{
	$id = $linha['id'];
	$matricula = $linha['Matricula'];
	$data1 = $linha['iData'];
	$nome2 = $linha['Nome'];
	$nascimento = $linha['iNascimento'];
	$endereco = $linha['Endereco'];
	$certidao = $linha['Certidao'];
	$raca = $linha['Raca'];
	$sangue = $linha['Sangue'];
	$natural = $linha['Naturalidade'];
	$nacional = $linha['Nacionalidade'];
	$bairro = $linha['Bairro'];
	$cidade = $linha['Cidade'];
	$estado = $linha['Estado'];
	$cep = $linha['Cep'];
	$pai = $linha['Pai'];
	$profpai = $linha['Profpai'];
	$mae = $linha['Mae'];
	$profmae = $linha['Profmae'];
	$email = $linha['Email'];
	$turma = $linha['Turma'];
	$telefone = $linha['Telefone'];
	$transferencia = $linha['Transferencia'];

$pdf->ezText("\n<b>ID:</b> $id    <b>Matrícula:</b> $matricula",12);
$pdf->ezText("\n<b>Nome:</b> $nome2",14);
$pdf->ezText("\n<b>Nascimento:</b> $nascimento    <b>Certidão:</b> $certidao    <b>Sangue:</b> $sangue    <b>Cor/Raça:</b> $raca",12);
$pdf->ezText("\n<b>Naturalidade:</b> $natural    <b>Nacionalidade:</b> $nacional",12);
$pdf->ezText("\n<b>Pai:</b> $pai    <b>Profissão:</b> $profpai",12);
$pdf->ezText("\n<b>Mãe:</b> $mae    <b>Profissão:</b> $profmae",12);
$pdf->ezText("\n<b>Endereço:</b> $endereco    <b>CEP</b> $cep    <b>Telefone:</b> $telefone",12);
$pdf->ezText("\n<b>Bairro:</b> $bairro    <b>Cidade:</b> $cidade    <b>Estado:</b> $estado",12);
$pdf->ezText("\n<b>O Aluno foi matriculado na turma:</b> $turma                              <b>Em:</b> $data1",12);
};

$pdf->ezText("\n\n");
$pdf->ezText("______________________________              _________________________________",12);
$pdf->ezText("              Responsável                                          Instituto Educacional Oliveira Pessoa",12);
$pdf->ezText("__________________________________________________________________________",12);
$pdf->ezText("\n");

$pdf->ezText("<b>RENOVAÇÃO DE MATRÍCULA\n</b>",14,array('justification'=>'center'));

for ($n=0;$n<12;$n++){
$dados[] = array('<b>Ano Letivo</b>'=>'' ,'<b>Série</b>'=>'','<b>Turma</b>'=>'','<b>Assinatura do Responsável</b>'=>'','<b>Data</b>'=>'','<b>Rubrica IEOP</b>'=>'');
};
$pdf->ezTable($dados,$cols,'',array('xPos'=>25,'xOrientation'=>'right','fontSize' => 10,'width'=>550,'cols'=>array('Ano Letivo'=>array('width'=>30),'Série'=>array('width'=>60),'Turma'=>array('width'=>60),'Assinatura do Responsável'=>array('width'=>150),'Data'=>array('width'=>120),'Rubrica IEOP'=>array('width'=>100))));
$pdf->ezText("\nObs: Caso o responsável desista da matrícula a taxa da mesma não será devolvida.");

$pdf->ezStream();

?>