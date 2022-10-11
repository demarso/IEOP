<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="include/micoxAjax.js"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png">


<div id="sitemain">
  <div id="topo">
  <? include("head.php"); ?>
  </div>
  <div id="menubox">
    <? include("menu.html"); ?> 
  </div>
<div id="main2">

<?php
include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT id,Matricula,Nome,Segmento,Turma FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

if ($sql == " "){
echo "Este aluno não existe";
}
else{
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$id2 = $linha['id'];
	$nome2 = $linha['Nome'];
	$seg = $linha['Segmento'];
	$matricula = $linha['Matricula'];
	$turma = $linha['Turma'];
}
}
$sql2 = "SELECT Turma1,Turma2 FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";
$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	$turmad1 = $linha2['Turma1'];
	$turmad2 = $linha2['Turma2'];
}
?>
 
     <div id="maintop" >
       <fieldset>
       <legend align="center">Notas de Depend&ecirc;ncia do Aluno</legend>
	<font size="3">Matr&iacute;cula:</font>&nbsp;&nbsp;&nbsp;<input readonly size="20" value="<? echo $matricula ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <font size="3">Nome:</font>&nbsp;&nbsp;&nbsp;<input readonly  size="50" value="<? echo $nome2 ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <font size="3">Ano:</font>&nbsp;&nbsp;&nbsp;<input readonly size="10" value="<? echo $ano ?>"><br />
     <font size="3">Turma Atual:</font>&nbsp;&nbsp;&nbsp;<input readonly size="10" value="<? echo $turma ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
     </fieldset>
     </div>
 	<br />
<center>
 <br /><br />  
<table cellspacing="10" cellpadding="10" border="3"> 
<tr> 
    <td align="center" width="150"> 
   	 Mat&eacute;ria 
   	em Depend&ecirc;ncia</td> 
    <td align="center"> 
       	 <table cellspacing="2" cellpadding="2" border="1"> 
       	  <tr>
			<td colspan=2 align="center">1&ordm; Bim.</td>
            <td colspan=2 align="center">2&ordm; Bim.</td>
            <td colspan=2 align="center">3&ordm; Bim.</td>
            <td colspan=2 align="center">4&ordm; Bim.</td>
           </tr>
		  <tr>
			<td width="50" align="center">Notas</td><td width="50" align="center">Faltas</td>
		  	<td width="50" align="center">Notas</td><td width="50" align="center">Faltas</td>
            <td width="50" align="center">Notas</td><td width="50" align="center">Faltas</td>
		  	<td width="50" align="center">Notas</td><td width="50" align="center">Faltas</td>
           
		  </tr>
       	 </table> 
         <td align="center" width="50" >M&eacute;dia</td>
         <!--<td align="center" >Recupera&ccedil;&atilde;o</td> -->
    </td> 
</tr> 

<?
$sql = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$materia = $linha['Materia'];
	$nota1 = $linha['Bim1'];
	$nota2 = $linha['Bim2'];
	$nota3 = $linha['Bim3'];
	$nota4 = $linha['Bim4'];
	$faltas1 = $linha['Faltas1'];
	$faltas2 = $linha['Faltas2'];
	$faltas3 = $linha['Faltas3'];
	$faltas4 = $linha['Faltas4'];
	$totfalta1 = $totfalta1 + $faltas1;
	$totfalta2 = $totfalta2 + $faltas2;
	$totfalta3 = $totfalta3 + $faltas3;
	$totfalta4 = $totfalta4 + $faltas4;
	$turma1 = $linha['Turma1'];
	$turma2 = $linha['Turma2'];
	if(!empty($turma1))
		$turmam = $turma1;
		else if (!empty($turma2))
			$turmam = $turma2;
?>


<tr> 

    <td align="center" width="150"> 
     <? echo '<b>'.$materia.'</b>'; ?>
   	</td> 
 
    <td align="center"> 
       	 <table cellspacing="2" cellpadding="2" border="1"> 
       	   <tr>
           
		     <td width="50" align="center">
			   <? if( $nota1 < 6 && $materia <> 'Comportamento')
                  echo "<font color='#FF0000'>".$nota1.'</font>';
				  else if( $materia == 'Comportamento')
				  echo "<font color='black'>".$nota1.'</font>';
				  else
				  echo "<font color='#0000FF'>".$nota1.'</font>';
		       ?>
             </td>
             <td width="50" align="center">
			   <? 
			    echo $faltas1;
		  	   ?>
              </td>
             <td width="50" align="center">
			   <? if( $nota2 < 6 && $materia <> 'Comportamento')
                  echo "<font color='#FF0000'>".$nota2.'</font>';
				  else if( $materia == 'Comportamento')
				  echo "<font color='black'>".$nota2.'</font>';
				  else
				  echo "<font color='#0000FF'>".$nota2.'</font>';
		       ?>
             </td>
             <td width="50" align="center">
			   <? 
			    echo $faltas2;
		  	   ?>
              </td>
             <td width="50" align="center">
			   <? if( $nota3 < 6 && $materia <> 'Comportamento')
                  echo "<font color='#FF0000'>".$nota3.'</font>';
				  else if( $materia == 'Comportamento')
				  echo "<font color='black'>".$nota3.'</font>';
				  else
				  echo "<font color='#0000FF'>".$nota3.'</font>';
		       ?>
              </td>
    		  <td width="50" align="center">
			   <? 
			    echo $faltas3;
		  	   ?>
              </td>
              <td width="50" align="center">
			   <? if( $nota4 < 6 && $materia <> 'Comportamento')
                  echo "<font color='#FF0000'>".$nota4.'</font>';
				  else if( $materia == 'Comportamento')
				  echo "<font color='black'>".$nota4.'</font>';
				  else
				  echo "<font color='#0000FF'>".$nota4.'</font>';
		       ?>
             </td>
             <td width="50" align="center">
			   <? 
			    echo $faltas4;
				$soma = $nota1 + $nota2 + $nota3 + $nota4;
		  	   ?>
              </td>
           </tr>
       </table>
          
         
          <td align="center" width="50">
		  <? 
			if($nota1 <> '-'){ 
				$media = $nota1;
			}
			if($nota2 <> '-'){
				$media = ($nota1 + $nota2)/2;
			}
			if($nota3 <> '-'){
				$media = ($nota1 + $nota2 + $nota3)/3;
			}
			if($nota4 <> '-')
				$media = ($nota1 + $nota2 + $nota3 + $nota4)/4;
				
			if($materia == 'Faltas')
				$media = ($nota1 + $nota2 + $nota3 + $nota4);
			
			
		    if( $media < 6 && $materia <> 'Faltas' && $materia <> 'Comportamento')
                  echo "<font color='#FF9900'><b>".number_format($media, 2, '.', '.').'</b></fontt>';
				  else if($materia == 'Faltas')
				  echo "<font color='black'>".$media.'</font>';
				  else if($materia == 'Comportamento')
				  echo "<font color='#FF9900'><b>-</b></font>";
				  else
				  echo "<font color='#0000FF'>".number_format($media, 2, '.', '.').'</fontt>';
			
	       ?>
          </td>
          <td width="50" align="center">
			   <? 
			    echo $turmam;
			   ?>
              </td>
         <? 
		 if($media < 6 && $materia <> 'Faltas' && $materia <> 'Comportamento' && $nota2 <> '-')
	 		echo "<td align='center'><font color='#FF9900'><b>Recuperação</b></fontt></td>";
	 	 else if($materia == 'Faltas')
	 		echo "<td align='center'>< Total de Faltas</td>";
		 else	
			echo " ";
					 
			}
		 ?>
       </td> 
  
  <tr> 
   <td align="center" width="150"> 
     <? echo "Total de Faltas"; ?>
   	</td> 
 
    <td align="center"> 
       	 <table cellspacing="2" cellpadding="2" border="1"> 
       	   <tr>
           
		     <td width="50" align="center" bgcolor="#999999">
			   <? echo " "; ?>
             </td>
             <td width="50" align="center" c>
			   <?  echo $totfalta1; ?>
              </td>
             <td width="50" align="center" bgcolor="#999999">
			   <? echo " "; ?>
             </td>
             <td width="50" align="center">
			   <?  echo $totfalta2; ?>
              </td>
    		 <td width="50" align="center" bgcolor="#999999">
			   <? echo " "; ?>
             </td>
             <td width="50" align="center">
			   <?  echo $totfalta3; ?>
              </td>
              <td width="50" align="center" bgcolor="#999999">
			    <? echo " "; ?>
             </td>
             <td width="50" align="center">
			    <?  echo $totfalta4; ?>
              </td>
           </tr>
       </table>   
</tr> 
</table>
 
</center>
</div>
  <div id='footer'>
  <? include("footer.php"); ?>
  </div>
</div>
</body>
</html>