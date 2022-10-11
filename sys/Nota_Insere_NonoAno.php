<?php
 include("conexao.php");
 $ano = date("Y");
 $matricula = "2021-0002-0191";
 $sql3 = "SELECT Materia FROM materia_nono";
  $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
  while ($linha3 = mysqli_fetch_array($resultado3))
  {
	$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$ano','$materia','-','-','-','-','-','-','-','-')";
 $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro Materias para Notas não realizado.");
 }
 ?>