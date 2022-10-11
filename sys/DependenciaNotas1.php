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
<center>
<div id="sitemain">
<div id="topo">
<? include("head.php"); ?> 
</div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">

 
<form action="DependenciaNotasOK.php" method="post" name="form1">
<fieldset>
<legend>Lançamento das Notas do Aluno</legend>
	  
     <!-- <label>Materias&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notas&nbsp;&nbsp;&nbsp;&nbsp;Faltas</label> -->
      
	<br />
<?	
include ("conexao.php");
$nome2 = $_POST["Nome"];
$nasc2 = $_POST["NascEx"];

$ano = $_SESSION["AnoLetivo"];


$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM notasDepend WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc2'";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$matricula2 = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$ano2 = $linha['Ano'];
	$materia = $linha['Materia'];
	$bim1 = $linha['Bim1'];
	$bim2 = $linha['Bim2'];
	$bim3 = $linha['Bim3'];
	$bim4 = $linha['Bim4'];
	$faltas1 = $linha['Faltas1'];
	$faltas2 = $linha['Faltas2'];
	$faltas3 = $linha['Faltas3'];
	$faltas4 = $linha['Faltas4'];

 	?>
       Matrícula:<input type="text" name="Matricula"  class="textbox3"  readonly  tabindex="-1" value="<? echo $matricula2 ?>"/>&nbsp;&nbsp;
       	Nome:<input type="text" name="Nome"  class="textbox4"  readonly tabindex="-1" value="<? echo $nome2 ?>" />&nbsp;&nbsp;
       	Nascimento:<input type="text" name="Nascimento"  class="textbox4"  readonly tabindex="-1" value="<? echo $nasc2 ?>" />&nbsp;&nbsp;
        Ano:<input type="text" name="Ano"  class="textbox4"  readonly tabindex="-1" value="<? echo $ano2 ?>" />
         <br /><br />
        <input type="text" name="Materia"  class="textbox4"  readonly tabindex="-1" value="<? echo $materia ?>" />&nbsp;&nbsp;
         <input type="text" name="Bim1"  class="textbox4"   tabindex="1" value="<? echo $bim1 ?>" />&nbsp;&nbsp;
         <input type="text" name="Bim2"  class="textbox4"   tabindex="2" value="<? echo $bim2 ?>" />&nbsp;&nbsp;
         <input type="text" name="Bim3"  class="textbox4"   tabindex="3" value="<? echo $bim3 ?>" />&nbsp;&nbsp;
         <input type="text" name="Bim4"  class="textbox4"   tabindex="4" value="<? echo $bim4 ?>" />&nbsp;&nbsp;
         <input type="text" name="Faltas1"  class="textbox4"   tabindex="5" value="<? echo $faltas1 ?>" />&nbsp;&nbsp;
       	 <input type="text" name="Faltas2"  class="textbox4"   tabindex="6" value="<? echo $faltas2 ?>" />&nbsp;&nbsp;
         <input type="text" name="Faltas3"  class="textbox4"   tabindex="7" value="<? echo $faltas3 ?>" />&nbsp;&nbsp;
         <input type="text" name="Faltas4"  class="textbox4"   tabindex="8" value="<? echo $faltas4 ?>" />&nbsp;&nbsp;
         <br /><br />
 <? } ?> <br /><br />


 <input type="submit" class="button" name="cadastrar" value="Lançar Notas de Dependência"  />
	</fieldset>
</form>

</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
