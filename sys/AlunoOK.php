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
ieop
<div id="sitemain">
<div id="topo">
<? include("head.php"); ?> 
</div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">

			
	 <div id="palco2">
       <?php
// Conexão com o banco de dados
include("conexao.php");

	// Recupera os dados dos campos
	$id = $_POST['Id'];
	$matricula = $_POST['Matricula'];
          if(empty($matricula)) {echo "<script>alert('A matr&iacute;cula deve ser preenchida!!  ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$data1 = $_POST['Data'];
          if(empty($data1)) {echo "<script>alert('A data da matr&iacute;cula deve ser preenchida!!   ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$nome2 = $_POST['Nome'];
          if(empty($nome2)) {echo "<script>alert('O Nome deve ser preenchido!!   ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$nascimento = $_POST['Nascimento'];
          if(empty($nascimento)) {echo "<script>alert('A data de nascimento deve ser preenchida!!   ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$ano = $_POST['Ano'];
          if(empty($ano)) {echo "<script>alert('O ano deve ser preenchido!!   ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
        $endereco = $_POST['Endereco'];
	$certidao = $_POST['Certidao'];
	$raca = $_POST['Raca'];
	$sexo = $_POST['Sexo'];
	$sangue = $_POST['Sangue'];
	$natural = $_POST['Natural'];
	$nacional = $_POST['Nacional'];
	$bairro = $_POST['Bairro'];
	$cidade = $_POST['Cidade'];
	$estado = $_POST['Estado'];
	$cep = $_POST['Cep'];
	$pai = $_POST['Pai'];
	$profpai = $_POST['Profpai'];
	$mae = $_POST['Mae'];
	$profmae = $_POST['Profmae'];
	$email = $_POST['Email'];
	$telefone = $_POST['Telefone'];
	$celpai = $_POST['CelPai'];
	$celmae = $_POST['CelMae'];
	$transferencia = $_POST['Transferencia'];
	$turma = $_POST['Turma'];
          if(empty($turma)) {echo "<script>alert('A Turma deve ser preenchida!!   ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$carne = $_POST['Carne'];
	$status = "Ativo";
	$foto = $_FILES["Foto"];
     	
    	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 150;
		// Altura máxima em pixels
		$altura = 180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000;
 
    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
	}
}

	
	$sql = "SELECT * FROM turmas WHERE Ano = '$turma'";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$segmento = $linha['Segmento'];
		
}
	
	/*$sql = "UPDATE aluno SET Matricula='$matricula', Nome='$nome2', Nascimento=STR_TO_DATE('$nascimento','%d/%m/%Y'), Certidao='$certidao',Raca='$raca', Sangue='$sangue', Natural='$natural',Nacional='$nacional', Telefone='$telefone', Bairro='$bairro', Cidade='$cidade', Estado='$estado', Cep='$cep', Pai='$pai', ProfPai='$profpai', Mae='$mae', ProfMae='$profmae', Email='$email', Transferencia='$transferencia', Status='$status'";*/
	
	$sql = "INSERT INTO aluno(id,Matricula,Data,Ano,Nome,Nascimento,Certidao,Raca,Sexo,Sangue,
	Naturalidade,Nacionalidade,Endereco,Telefone,CelPai,CelMae,Bairro,Cidade,Estado,Cep,Pai,Profpai,Mae,Profmae,Email,Foto,Transferencia,Turma,Segmento,Status)
	VALUES('$id','$matricula',STR_TO_DATE('$data1','%d/%m/%Y'),'$ano','$nome2',STR_TO_DATE('$nascimento','%d/%m/%Y'),'$certidao','$raca','$sexo','$sangue','$natural',
	'$nacional','$endereco','$telefone','$celpai','$celmae','$bairro','$cidade','$estado','$cep','$pai','$profpai','$mae','$profmae',
	'$email','$nome_imagem','$transferencia','$turma', '$segmento','$status')";

 $result = mysqli_query($conexao, $sql) or die ("Cadastro Aluno não realizado.");
 
 $sql = "INSERT INTO histMatr(Matricula,Nome,Nascimento,Data,Ano,Turma,Transferencia,Segmento)	VALUES('$matricula','$nome2',STR_TO_DATE('$nascimento','%d/%m/%Y'),STR_TO_DATE('$data1','%d/%m/%Y'),'$ano','$turma','$transferencia','$segmento')";
 
 $result = mysqli_query($conexao, $sql) or die ("Histórico do Aluno não realizado.");
 
 $sql2 = "INSERT INTO pagamento(Matricula,Ano,Carne,Jan,Fev,Mar,Abr,Mai,Jun,Jul,Ago,Sete,Outu,Nove,Deze,Status) VALUES('$matricula','$ano','$carne','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','$status')";
 
 $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro carnê não realizado.");
 
 if ($segmento == 1){
 $sql3 = "SELECT Materia FROM materia_pri_qui";
 
 $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

 while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$ano','$materia','-','-','-','-','-','-','-','-')";
 
 $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro Materias para Notas não realizado.");
}}
if ($segmento == 2){
 $sql3 = "SELECT Materia FROM materia_sex_iot";
 
 $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

 while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$ano','$materia','-','-','-','-','-','-','-','-')";
 
 $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro Materias para Notas não realizado.");
}}
if ($segmento == 3){
 $sql3 = "SELECT Materia FROM materia_nono";
 
 $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

 while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$ano','$materia','-','-','-','-','-','-','-','-')";
 
 $result2 = mysqi_query($conexao, $sql2) or die ("Cadastro Materias para Notas não realizado.");
}}
			echo "<font face=verdana size=1>O cadastro foi realizado com sucesso.</font>";
echo "\n";

	
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
		
   mysql_close($conexao);
  /*echo "<script type = 'text/javascript'> location.href = 'Aluno.php'</script>";*/
  echo "<script type = 'text/javascript' >  window.open('FichaMatricula.php?Matr=$matricula', '_blank');</script>";			
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
