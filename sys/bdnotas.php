<?
include "conexao.php";
$ano2 = date("Y");
$sql = "SELECT Matricula,Segmento FROM aluno";
$resultado = mysql_query($sql) or die (mysql_error());
while ($linha = mysql_fetch_array($resultado))
{
	$matr = $linha['Matricula'];
	$segmento = $linha['Segmento'];

  if($segmento == 1){
	 $sql2 = "SELECT Materia FROM materia_pri_qui";
		$resultado2 = mysql_query($sql2) or die (mysql_error());
		while ($linha2 = mysql_fetch_array($resultado2))
		{
			$mater = $linha2['Materia'];
			$sql3 = "INSERT INTO notas(Matricula,Ano,Materia) VALUES('$matr','$ano2','$mater')";
 			$result3 = mysql_query($sql3,$conexao) or die ("Cadastro não realizado.");
 		}

  }
  if($segmento == 2){
	 $sql2 = "SELECT Materia FROM materia_sex_iot";
		$resultado2 = mysql_query($sql2) or die (mysql_error());
		while ($linha2 = mysql_fetch_array($resultado2))
		{
			$mater = $linha2['Materia'];
			$sql3 = "INSERT INTO notas(Matricula,Ano,Materia) VALUES('$matr','$ano2','$mater')";
 			$result3 = mysql_query($sql3,$conexao) or die ("Cadastro não realizado.");
 		}

  }
  if($segmento == 3){
	 $sql2 = "SELECT Materia FROM materia_nono";
		$resultado2 = mysql_query($sql2) or die (mysql_error());
		while ($linha2 = mysql_fetch_array($resultado2))
		{
			$mater = $linha2['Materia'];
			$sql3 = "INSERT INTO notas(Matricula,Ano,Materia) VALUES('$matr','$ano2','$mater')";
 			$result3 = mysql_query($sql3,$conexao) or die ("Cadastro não realizado.");
 		}

  }
}
?>