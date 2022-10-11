<?
   session_start();
   include "conexao.php";
    $esteano = date("Y");
    $ano = $_SESSION["AnoLetivo"];


	 $sql="SELECT MAX(id) FROM aluno";
	 $resultado = mysqli_query($conexao, $sql);
		while ($linha = mysqli_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$sql2="SELECT Matricula FROM aluno WHERE id = '$idMat1'";
		$resultado2 = mysqli_query($conexao, $sql2);
		while ($linha1 = mysqli_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}
		$sql3="SELECT DISTINCT Matricula FROM histMatr WHERE Ano = '$ano'";
		$resultado3 = mysqli_query($conexao, $sql3);
		while ($linha1 = mysqli_fetch_array($resultado3)) {
		$nalu = $nalu + 1;
		}
       	$_SESSION[naluno] = $nalu;
		$nalu = 0;
 ?>
<div class="mainlinks"> 
    <div>     
        <p class="links">&copy; Copyright&nbsp;2011-<?echo $esteano; ?> - Todos os direitos reservados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema Desenvolvido por:&nbsp;&nbsp;<a href="http://www.idbras.com.br" target="_blank">IDBRAS</a>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <? echo "N&ordm; de alunos deste Ano Letivo: $_SESSION[naluno]" ?>
    </div> 
</div> 