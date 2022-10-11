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

   <div id="palco2"><br /><br />
<?
   include("conexao.php");
   $conta = $_SESSION['conta'];
   $matricula = $_SESSION['matricula'];
   $bimestre2 = $_SESSION["bimestr"];
   //$RecFin = $_SESSION["recfin"];
   //$RecFin = number_format(round($RecFin * 2 )/ 2,1);
   $turmaatual = $_SESSION['turmanota'];
  $ano = $_SESSION["AnoLetivo"];
   //echo $conta; echo "<br />";
     	  
  for ($n=0;$n<$conta;$n++){
	   $materia2 = $_POST['Materias'];
	   	
$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia2[$n]'";
       $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
       while ($linha3 = mysqli_fetch_array($resultado3))
       {
	        $bim1 = $linha3['Bim1'];  
			$bim2 = $linha3['Bim2'];
			$bim3 = $linha3['Bim3'];		
		    $bim4 = $linha3['Bim4'];
	   
	   //echo $bim1.'  '.$bim2.'  '.$bim3.'  '.$bim4.'  '.$bimestre2.'<br />';
	  if ($bimestre2 == 1){
	   $notas1 = $_POST['Notas'];
	     
	      $query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim1='$notas1[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 2){
	    $notas2 = $_POST['Notas'];
		$media = ($bim1 + $notas2[$conta]) / 2;
		$media = number_format(round($media * 2 ) / 2,1);
		if($media[$n] < 6)
	      $rec = 'Sim';
		 else
		  $rec = '-'; 
	   $query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim2='$notas2[$n]', Media='$media[$n]', Recuperacao = '$rec' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 3){
	   $notas3 = $_POST['Notas'];
	   $media = ($bim1 + $bim2 + $notas3[$conta])/3;
	   $media = number_format(round($media * 2 )/ 2,1);
	   if($media[$n] < 6)
	      $rec = 'Sim';
		 else
		  $rec = '-'; 
	   $query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim3='$notas3[$n]', Media='$media[$n]', Recuperacao = '$rec' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 4){
	   $notas4 = $_POST['Notas'];
	   $media = ($bim1 + $bim2 + $bim3 + $notas4[$conta])/4;
	   $media = number_format(round($media * 2 )/ 2,1);
	   if($media[$n] < 6)
	      $rec = 'Sim';
		 else
		  $rec = '-'; 
	   $query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim4='$notas4[$n]', Media='$media[$n]', Recuperacao = '$rec' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error()); 
	   }
	   if ($bimestre2 == 5){
	   $notas5 = $_POST['Notas'];
	   $media = $notas5;
	   $retorno = 'r';
	   //if($media[$n] < 6.0)
	   //   $rec = 'Dep';
	  // else
		  $rec = '-';
	   $query = mysqli_query($conexao, $sql = "UPDATE notas SET RecFin='$notas5[$n]', Media='$media[$n]', Recuperacao='$rec' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error()); 
	   }
 } }
 echo "<font face=verdana size=1>O lançamento das notas foi realizado com sucesso.</font>";
 echo "<br />";
 
 if ($turmaatual == '1ano')
   	 echo "<script type = 'text/javascript'> location.href = 'Notas1ano.php'</script>";
  if ($turmaatual == '2ano')
      echo "<script type = 'text/javascript'> location.href = 'Notas2ano.php'</script>";
  if ($turmaatual == '3ano')
       echo "<script type = 'text/javascript'> location.href = 'Notas3ano.php'</script>";
  if ($turmaatual == '4ano')
	   echo "<script type = 'text/javascript'> location.href = 'Notas4ano.php'</script>"; 
  if ($turmaatual == '5ano')
  	 echo "<script type = 'text/javascript'> location.href = 'Notas5ano.php'</script>";	 
  if ($turmaatual == '6ano')
    echo "<script type = 'text/javascript'> location.href = 'Notas6ano.php'</script>";	
  if ($turmaatual == '7ano')
  	echo "<script type = 'text/javascript'> location.href = 'Notas7ano.php'</script>";
  if ($turmaatual == '8ano')
    echo "<script type = 'text/javascript'> location.href = 'Notas8ano.php'</script>";
  if ($turmaatual == '9ano')
  	echo "<script type = 'text/javascript'> location.href = 'Notas9ano.php'</script>";	
 
 /*
  if ($turmaatual == '1ano' && $retorno == 'r')
     echo "<script type = 'text/javascript'> location.href = 'NotasRec1ano.php'</script>";
  else if ($turmaatual == '1ano' && $retorno <> 'r')
  	 echo "<script type = 'text/javascript'> location.href = 'Notas1ano.php'</script>";
  if ($turmaatual == '2ano' && $retorno == 'r')
     echo "<script type = 'text/javascript'> location.href = 'NotasRec2ano.php'</script>";
  else if ($turmaatual == '2ano' && $retorno <> 'r')
  	 echo "<script type = 'text/javascript'> location.href = 'Notas2ano.php'</script>";
  if ($turmaatual == '3ano' && $retorno == 'r')
      echo "<script type = 'text/javascript'> location.href = 'NotasRec3ano.php'</script>";
  else if ($turmaatual == '3ano' && $retorno <> 'r')
  	  echo "<script type = 'text/javascript'> location.href = 'Notas3ano.php'</script>";
  if ($turmaatual == '4ano' && $retorno == 'r')
	  echo "<script type = 'text/javascript'> location.href = 'NotasRec4ano.php'</script>";
  else if ($turmaatual == '4ano' && $retorno <> 'r')
  	 echo "<script type = 'text/javascript'> location.href = 'Notas4ano.php'</script>"; 
  if ($turmaatual == '5ano' && $retorno == 'r')
  	 echo "<script type = 'text/javascript'> location.href = 'NotasRec5ano.php'</script>";
  else if ($turmaatual == '5ano' && $retorno <> 'r')
  	echo "<script type = 'text/javascript'> location.href = 'Notas5ano.php'</script>";	 
  if ($turmaatual == '6ano' && $retorno == 'r')
    echo "<script type = 'text/javascript'> location.href = 'NotasRec6ano.php'</script>";
  else if ($turmaatual == '6ano' && $retorno <> 'r')
  	echo "<script type = 'text/javascript'> location.href = 'Notas6ano.php'</script>";	
  if ($turmaatual == '7ano' && $retorno == 'r')
  	echo "<script type = 'text/javascript'> location.href = 'NotasRec7ano.php'</script>";
  else if ($turmaatual == '7ano' && $retorno <> 'r')
  	echo "<script type = 'text/javascript'> location.href = 'Notas7ano.php'</script>";
  if ($turmaatual == '8ano' && $retorno == 'r')
    echo "<script type = 'text/javascript'> location.href = 'NotasRec8ano.php'</script>";
  else if ($turmaatual == '8ano' && $retorno <> 'r')
  	echo "<script type = 'text/javascript'> location.href = 'Notas8ano.php'</script>";
  if ($turmaatual == '9ano' && $retorno == 'r')
  	echo "<script type = 'text/javascript'> location.href = 'NotasRec9ano.php'</script>";
  else if ($turmaatual == '9ano' && $retorno <> 'r')
  	echo "<script type = 'text/javascript'> location.href = 'Notas9ano.php'</script>";	*/

?>
   </div> 
   </div>
  	<div id="footer">
  		<? include("footer.php"); ?>
	</div>
</div>
</center>
</body>
</html>