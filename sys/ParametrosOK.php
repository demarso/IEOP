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
	 <div id="palco2">
<?php
// Conexão com o banco de dados
include("conexao.php");

	// Recupera os dados dos campos
	$diasletivos = $_POST['DiasLetivos'];
	$ano2 = $_POST['Ano'];
	$ch6ano = $_POST['Ch6ano'];
	$ch7ano = $_POST['Ch7ano'];
	$ch8ano = $_POST['Ch8ano'];
	$ch9ano = $_POST['Ch9ano'];
	//echo $diasletivos." - ".$ano2." - ".$ch6ano." - ".$ch7ano." - ".$ch8ano." - ".$ch9ano;
	
	if(empty($ano2)){
	  echo"<script>alert('O Ano não foi selecionado'); history.go(-1);</script>";
	  exit;
	}
	if(empty($diasletivos)){
	  echo"<script>alert('Dias Letivos não foram digitado'); history.go(-1);</script>";
	  exit;
	  }
	if(empty($ch6ano)){
	  echo"<script>alert('Carga Horária do 6º Ano não foi digitada'); history.go(-1);</script>";
	  exit;
	}
	if(empty($ch7ano)){
	  echo"<script>alert('Carga Horária do 7º Ano não foi digitada'); history.go(-1);</script>";
	  exit;
	}
	if(empty($ch8ano)){
	  echo"<script>alert('Carga Horária do 8º Ano não foi digitada'); history.go(-1);</script>";
	  exit;
	}
	if(empty($ch9ano)){
	  echo"<script>alert('Carga Horária do 9º Ano não foi digitada'); history.go(-1);</script>";
	  exit;
	}
        $sql = "SELECT Ano FROM parametro WHERE Ano = '$ano2' ";
		$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado))
		{
			$ano1 = $linha['Ano'];
		}
if(!empty($ano1)){
		$query = mysqli_query($conexao,$sql1 = "UPDATE parametro SET DiasLetivos='$diasletivos', Ano='$ano2', Ch6ano='$ch6ano', Ch7ano='$ch7ano', Ch8ano='$ch8ano', Ch9ano='$ch9ano' WHERE Ano='$ano1'") or die(mysql_error());
        echo "Parâmetros atualizados com sucesso";
}
else{
	    $sql2 = "INSERT INTO parametro(DiasLetivos,Ano,Ch6ano,Ch7ano,Ch8ano,Ch9ano) VALUES('$diasletivos','$ano2','$ch6ano','$ch7ano','$ch8ano','$ch9ano')";
  	    $result2 = mysqli_query($conexao,$sql2) or die ("Cadastro de Parâmetos não realizado.");
 	    echo "Parâmetros cadastrados com sucesso";

}

   mysql_close($conexao);
 
?>
   </div> 
  </div>
     
<div id='footer'>
 <? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
