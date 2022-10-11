<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>Cosulta de Membros</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="micoxAjax.js"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png">
 
     <?php
// require_once("../include/arruma_link.php");
 include ("conexao.php");

$nome2 = $_POST["nomeMemb"];
$nasc = $_POST["nascMemb"];

echo $nome2.'  '.$nasc;

$sql = "SELECT *,DATE_FORMAT(datacadMemb,'%d/%m/%Y') as idatacadMemb FROM tblMembros WHERE nomeMemb = '$nome2' && DATE_FORMAT(nascMemb, '%d/%m/%Y') = '$nasc'";

$resultado = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_array($resultado)) {


	$membMemb = $linha['membMemb'];
	$datacadMemb = $linha['idatacadMemb'];
	$nomeMemb = $linha['nomeMemb'];
	$nascMemb = $linha['nascMemb'];
	$endMemb = $linha['endMemb'];
	$cepMemb = $linha['cepMemb'];
	$bairroMemb = $linha['bairroMemb'];
	$cidadeMemb = $linha['cidadeMemb'];
	$ufMemb = $linha['ufMemb'];
	$telMemb = $linha['telMemb'];
	$celMemb = $linha['celMemb'];
	$telcomMemb = $linha['telcomMemb'];
	$emailMemb = $linha['emailMemb'];
	$NatuMemb = $linha['NatuMemb'];
	$cpfMemb = $linha['cpfMemb'];
	$rgMemb = $linha['rgMemb'];
	$orgrgMemb = $linha['orgrgMemb'];
	$paiMemb = $linha['paiMemb'];
	$maeMemb = $linha['maeMemb'];
	$estcivMemb = $linha['estcivMemb'];
	$escolMemb = $linha['escolMemb'];
	$profMemb = $linha['profMemb'];
	$situacaoMemb = $linha['situacaoMemb'];
	$empresaMemb = $linha['empresaMemb'];
	$conjugeMemb = $linha['conjugeMemb'];
	$nascconjMemb = $linha['nascconjMemb'];
	$conjmembMemb = $linha['conjmembMemb'];
	$datacasamMemb = $linha['datacasamMemb'];
	$numfilhosMemb = $linha['numfilhosMemb'];
	$integracaoMemb = $linha['integracaoMemb'];
	$dataintegMemb = $linha['dataintegMemb'];
	$igrejabatisMemb = $linha['igrejabatisMemb'];
	$localigrbatMemb = $linha['localigrbatMemb'];
	$databatMemb = $linha['databatMemb'];
	$pastorbatMemb = $linha['pastorbatMemb'];
	$dizMemb = $linha['dizMemb'];
	$ebdMemb = $linha['ebdMemb'];
	$fotoMemb = $linha['fotoMemb'];
?>
<center>
 		<? echo "<img src=\"$fotoMemb\" width='95' height='120' border='3'>".'<br /><br />'; ?>

	

<table align="center" width="90%" border="1">

		 <tr> 
           	 <td style="width: 20%">É Membro?:</td> 
           	 <td style="width: 80%" align="left"> <? echo $membMemb; ?></td> 
       	 </tr> 
         <tr> 
           	 <td style="width: 20%">Nome:</td> 
           	 <td style="width: 80%" align="left"> <? echo $nomeMemb; ?></td> 
       	 </tr> 
       	 <tr> 
           	<td style="width: 20%">Nascimento:</td> 
           	<td style="width: 80%" align="left"><? echo $nascMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Endere&ccedil;o:</td> 
           	 <td style="width: 80%" align="left"><? echo $endMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Bairro:</td> 
           	 <td style="width: 80%" align="left"><? echo $bairroMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Cidade:</td> 
           	<td style="width: 80%" align="left"><? echo $cidadeMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Estado:</td> 
           	 <td style="width: 80%" align="left"><? echo $ufMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">CEP:</td> 
           	 <td style="width: 80%" align="left"><? echo $cepMemb; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Telefone:</td> 
           	 <td style="width: 80%" align="left"><? echo $telMemb; ?></td> 
       	 </tr> 
         <tr> 
           	 <td style="width: 20%">Celular:</td> 
           	 <td style="width: 80%" align="left"><? echo $celMemb; ?></td> 
       	 </tr>
         
 
</table>
</center>
<?
} 
?>
<br /><br />
 <input type="button" value="PRÓXIMO" onClick="ajaxGetRecord($next)"> 
<br /><br />

</body>
</html>
