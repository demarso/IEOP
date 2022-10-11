<?
   session_start();
   include "conexao.php";
	 $resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}
       
 ?>
<div class="mainlinks"> 
    <div>     
        <p class="links">&copy; Copyright 2011 - Todos os direitos reservados
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <? echo "Nº de alunos: $_SESSION[naluno]" ?>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       Última Matrícula: <? echo"$_SESSION[idMat]"; ?></p>
    </div> 
</div> 