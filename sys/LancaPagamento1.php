<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/frameset.dtds">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
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

   <div id="palco3">
   <fieldset>
     		<legend>Pagamentos Efetuados</legend>
   
  <?php
include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT Matricula, Nome FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

if ($sql == " "){
echo "Este aluno nao existe";
}
else{
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$nome2 = $linha['Nome'];
	$matricula = $linha['Matricula'];
	
	$_SESSION[matricula] = $matricula;
}
}
mysqli_close($conexao);
?>
     
            
            <label for="Matricula" class="textbox3" >Matr&iacute;cula:<? echo ' '.$matricula ?></label>
            <label for="Ano" class="textbox2" >Ano:<? echo ' '.$ano ?></label><br /><br /><br />
 </fieldset>    		
    <center>
        <table align="center" width="400">
        	<tr>
            	<td align="center"><b>M&ecirc;s</b></td><td align="center"><b>Pagamento</b></td>
            </tr>
            <?
			include "conexao.php";
			$cont = 1;
			$sql = "SELECT * FROM pagamento WHERE Matricula = '$matricula' AND Ano = '$ano'";
			$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
			while ($linha = mysqli_fetch_array($resultado))
			{
				$carne = $linha['Carne'];
				$valor1 = $linha['Jan'];
				//$data1 = $linha['iData1'];
				$valor2 = $linha['Fev'];
				//$data2 = $linha['iData2'];
				$valor3 = $linha['Mar'];
				//$data3 = $linha['iData3'];
				$valor4 = $linha['Abr'];
				//$data4 = $linha['iData4'];
				$valor5 = $linha['Mai'];
				//$data5 = $linha['iData5'];
				$valor6 = $linha['Jun'];
				//$data6 = $linha['iData6'];
				$valor7 = $linha['Jul'];
				//$data7 = $linha['iData7'];
				$valor8 = $linha['Ago'];
				//$data8 = $linha['iData8'];
				$valor9 = $linha['Sete'];
				//$data9 = $linha['iData9'];
				$valor10 = $linha['Outu'];
				//$data10 = $linha['iData10'];
				$valor11 = $linha['Nove'];
				//$data11 = $linha['iData11'];
				$valor12 = $linha['Deze'];
				//$data12 = $linha['iData12'];
			
			
            if ($valor1 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue'; 
             echo "<tr><td align='center'>"."JANEIRO"."</td><td align='center'><font color=$cor>".$valor1."</font></td></tr>"; 
            if ($valor2 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue';  
             echo "<tr><td align='center'>"."FEVEREIRO"."</td><td align='center'><font color=$cor>".$valor2."</font></td</tr>"; 
           	if ($valor3 == 'Nao') 
			$cor = 'Red'; else $cor = 'Blue';
             echo "<tr><td align='center'>"."MAR&Ccedil;O"."</td><td align='center'><font color=$cor>".$valor3."</font></td</tr>";
			if ($valor4 =='Nao')
			$cor = 'Red'; else $cor = 'Blue'; 
             echo "<tr><td align='center'>"."ABRIL"."</td><td align='center'><font color=$cor>".$valor4."</font></td</tr>";
			if ($valor5 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue';
             echo "<tr><td align='center'>"."MAIO"."</td><td align='center'><font color=$cor>".$valor5."</font></td</tr>";
			if ($valor6 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue'; 
             echo "<tr><td align='center'>"."JUNHO"."</td><td align='center'><font color=$cor>".$valor6."</font></td</tr>";
			if ($valor7 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue'; 
             echo "<tr><td align='center'>"."JULHO"."</td><td align='center'><font color=$cor>".$valor7."</font></td</tr>";
			if ($valor8 == 'Nao') 
            $cor = 'Red'; else $cor = 'Blue';
			 echo "<tr><td align='center'>"."AGOSTO"."</td><td align='center'><font color=$cor>".$valor8."</font></td</tr>";
			if ($valor9 == 'Nao') 
            $cor = 'Red'; else $cor = 'Blue';
			 echo "<tr><td align='center'>"."SETEMBRO"."</td><td align='center'><font color=$cor>".$valor9."</font></td</tr>";
			if ($valor10 == 'Nao')
			$cor = 'Red'; else $cor = 'Blue'; 
             echo "<tr><td align='center'>"."OUTUBRO"."</td><td align='center'><font color='$cor'>".$valor10."</font></td</tr>";
			if ($valor11 == 'Nao') 
            $cor = 'Red'; else $cor = 'Blue';
			 echo "<tr><td align='center'>"."NOVEMBRO"."</td><td align='center'><font color=$cor>".$valor11."</font></td</tr>";
			if ($valor12 == 'Nao') 
            $cor = 'Red'; else $cor = 'Blue';
			 echo "<tr><td align='center'>"."DEZEMBRO"."</td><td align='center'><font color=$cor>".$valor12."</font></td</tr>";   	  	     
		    }
		    mysqli_close($conexao);
		   ?>
        </table></center>    
   </div> 
   
   <div id="palco4">
   <fieldset>
   		<legend>Lan&ccedil;ar Pagamentos</legend>
		<label for="Nome">Nome:</label><label for="Nome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Carn&ecirc;:</label>
      	<label for="Nome" class="textbox"><? echo $nome2 ?></label>
        <label for="Carne" class="textbox5" ><? echo ' '.$carne ?></label>
        <br /><br /><br /> <br />
    </fieldset>   
       <form action="LancaPagamento2.php" method="post">
        <label for="MesPg">M&ecirc;s:</label>
        <select name="MesPg" id="MesPg" class="textbox2"  accesskey="s" tabindex="6" title="Informe o mes do pagamento">
			<option value="">Selecione</option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
			<option value="3">Mar&ccedil;o</option>
			<option value="4">Abril</option>
			<option value="5">Maio</option>
			<option value="6">Junho</option>
			<option value="7">Julho</option>
			<option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
		</select><br />
		<br />
        
       <!-- <label for="DataPg">Data do Pg:</label>
        <input type="text" name="DataPg" id="DataPg" class="textbox2" accesskey="n" tabindex="3" onKeyUp="Formatadata(this,event);"  size="14" maxlength="10" title="Informe a data do pagamento"/><br /><br /> -->
        
        <label for="ValorPg">Pagamento:</label>
        <select name="ValorPg" id="ValorPg" class="textbox4"  accesskey="s" tabindex="6" title="Informe o pagamento">
			<option value="Sim">Sim</option>
            <option value="Nao">N&atilde;o</option>
            <option value="xxx">xxx</option>
         </select><br /><br /><br />
        <input type="submit" class="button" name="cadastrar" value="Lan&ccedil;a"  />
        </form>
   </div> 

</div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
