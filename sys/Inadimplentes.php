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
  <fieldset>
     		<legend>Rela&ccedil;&atilde;o de Inadimplentes</legend>
   
  <center> 
  <table align="center" width="75%">
        	<tr>
            	<td align="center" style="width: 5%" bgcolor=""><b>N&ordm;</b></td>
                <td align="center" style="width: 20%" bgcolor=""><b>MATR&Iacute;CULA</b></td>
                <td align="left" style="width: 45%"><b>NOME</b></td>
                <td align="center" style="width: 15%"><b>NASCIMENTO</b></td>
                <td align='center' style='width: 15%'><b>TURMA</b></td>
                <td align='center' style='width: 15%'><b>STATUS</b></td>
            </tr>
	<? 
			include "conexao.php";
			$ano = $_SESSION["AnoLetivo"];
			$cont = 1;
			$sql = "SELECT * FROM pagamento WHERE  Ano = '$ano'";
			$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
			$con = 2; $n = 1;
			while ($linha = mysqli_fetch_array($resultado))
			{ 
				if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
				else
				 $bgcolor = "bgcolor='#FFFFCC'";
				 $inad = '';
				 
			if(date('Y') == $ano){	
				if ($linha['Jan'] == 'Nao' && date('m') > 1)
					$inad = $linha['Matricula'];
				if ($linha['Fev'] == 'Nao' && date('m') > 2)
					$inad = $linha['Matricula'];
				if ($linha['Mar'] == 'Nao' && date('m') > 3)
					$inad = $linha['Matricula'];
				if ($linha['Abr'] == 'Nao' && date('m') > 4)
					$inad = $linha['Matricula'];	
				if ($linha['Mai'] == 'Nao' && date('m') > 5)
					$inad = $linha['Matricula'];
				if ($linha['Jun'] == 'Nao' && date('m') > 6)
					$inad = $linha['Matricula'];	
				if ($linha['Jul'] == 'Nao' && date('m') > 7)
					$inad = $linha['Matricula'];	
				if ($linha['Ago'] == 'Nao' && date('m') > 8)
					$inad = $linha['Matricula'];
				if ($linha['Sete'] == 'Nao' && date('m') > 9)
					$inad = $linha['Matricula'];	
				if ($linha['Outu'] == 'Nao' && date('m') > 10)
					$inad = $linha['Matricula'];
				if ($linha['Nove'] == 'Nao' && date('m') > 11)
					$inad = $linha['Matricula'];
				if ($linha['Deze'] == 'Nao' && date('m') == 12)
					$inad = $linha['Matricula'];
			  }
			  else{
			    if ($linha['Jan']== 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Fev'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Mar'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Abr'] == 'Nao')
					$inad = $linha['Matricula'];	
				if ($linha['Mai'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Jun'] == 'Nao')
					$inad = $linha['Matricula'];	
				if ($linha['Jul'] == 'Nao')
					$inad = $linha['Matricula'];	
				if ($linha['Ago'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Sete'] == 'Nao')
					$inad = $linha['Matricula'];	
				if ($linha['Outu'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Nove'] == 'Nao')
					$inad = $linha['Matricula'];
				if ($linha['Deze'] == 'Nao')
					$inad = $linha['Matricula'];
			  }
			/*	if ($linha['Dez'] == 0 && date('m')=12 && date('d')>10)
					$inad = $linha['Matricula']; */
			
			$sql2 = "SELECT Nome, Matricula, DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento, Turma, Status FROM aluno WHERE Matricula ='$inad' && Status = 'Ativo' ORDER BY Turma, Nome";
			$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());
			while ($linha2 = mysqli_fetch_array($resultado2))
			{
				$Matr = $linha2['Matricula'];
				$Nome3 = $linha2['Nome'];
				$Nasc = $linha2['iNascimento'];
				$status = $linha2['Status'];
				$turma = $linha2['Turma'];
			
	/*		$sql2 = "SELECT Turma FROM histMatr WHERE Matricula ='$inad' && Ano = '$ano'";
			$resultado2 = mysql_query($sql2) or die (mysql_error());
			while ($linha2 = mysql_fetch_array($resultado2))
			{
				$turma = $linha2['Turma'];	*/
				
			echo "<tr $bgcolor>
				  <td align='center' style='width: 5%' b>".$n."</td>
				  <td align='center' style='width: 20%' b>".$Matr."</td>
				  <td align='left' style='width: 45%'>".$Nome3."</td>
				  <td align='center' style='width: 15%'>".$Nasc."</td>
				  <td align='center' style='width: 15%'>".$turma."</td>
				  <td align='center' style='width: 15%'>".$status."</td>
				  </tr>";  
            $con = $con + 1; $n = $n +1;
		    }}//}
		    mysqli_close($conexao);
		   ?>
    </table>
    </center>
 </fieldset> 
    </div> 

<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
