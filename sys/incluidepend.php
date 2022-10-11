<?
$sql = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$cont = $cont + 1;
	$matricula2 = $linha['Materia'];
	

SELECT * FROM notasDepend WHERE Matricula = '$matricula' AND Ano = '$ano'";
$resultado3 = mysql_query($sql3) or die (mysql_error());

?>