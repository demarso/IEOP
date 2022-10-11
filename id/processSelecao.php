<?
require_once("conexao.php");

$turma = $_GET['Turma'];

$sql = "SELECT Matricula, Nome, Nascimento FROM aluno WHERE Turma = '$turma' ORDER BY Nome";
	$results = mysql_query($sq);
		while ( $row = mysql_fetch_array($results) ) {
			$matricula2 = $row['Matricula'];
			$nome2 = $row['Nome'];
			$nascimento2 = $row['Nascimento'];				
		
	$sql2 = "INSERT INTO selecao(Matricula,Nome,Nascimento) VALUES('$matricula2','$nome2',STR_TO_DATE('$nascimento2','%d/%m/%Y'))";
 
    $result2 = mysql_query($sql2,$conexao) or die ("");
		
		
}
?>