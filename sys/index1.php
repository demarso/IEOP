<?php
	session_start();
	if (! isset($_SESSION['id'])){
	header("Location: index.php?erro=1");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
var ieBlink = (document.all)?true:false;
function doBlink(){
	if(ieBlink){
		obj = document.getElementsByTagName('BLINK');
		for(i=0;i<obj.length;i++){
			tag=obj[i];
			tag.style.visibility=(tag.style.visibility=='hidden')?'visible':'hidden';
		}
	}
}
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png" onLoad="if(ieBlink){setInterval('doBlink()',450)}">
<center>
<div id="sitemain">
<div id="topo">
<?php
  include "conexao.php";
  $mes = date('m');
  $dia = date('d');
  $ano1 = date('Y');
  $ano = $_SESSION["AnoLetivo"];
    
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
		
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
      {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
         else
         {
           $ip=$_SERVER['REMOTE_ADDR'];
         }
	  
	 $data = date("Y-m-d - H:i:s");
     $addr = $ip;
	 $self = $_SERVER['PHP_SELF'];
     $usu = $_SESSION['nome'];
     
	 
	 $sql_cad = "insert into acesso(usu,addr,data) values ('$usu','$addr','$data')";

     $result_cad = mysqli_query($conexao,$sql_cad) or die ("Cadastro de acesso não realizado.");
     	  
     include("head.php");
	 
 ?>
  
</div>
 <div id="menubox">
    <?
	 include("menu.php");
	 ?> 
 </div>
 
<div id="main">
    <div id="conteudoEsqTr">
      <br />
      <a href="AlteraSenha.php">Alterar Senha</a> <br /><br />
     
 	</div>
 <?
 $sql = "SELECT * FROM parametro WHERE Ano = '$ano'";
  $resultado = mysqli_query($conexao,$sql) or die (mysql_error());
  while ($linha = mysqli_fetch_array($resultado)) {
	$ano2 = $linha['Ano'];
  }
	if($ano2 <> $ano){
	 echo "<br /><br /><br />";
	 echo "<font size='4' color='#FF0000'>*** <blink>A T E N &Ccedil; &Atilde; O!</blink> ***</font>";
	 echo "<br /><br />";
	 echo "<font size='4' color='#FF0000'>Ainda n&atilde;o foram definidas as Cargas Hor&aacute;rias para este ano!</font>";
	 echo "<br /><br />";
	 echo "<font size='4' color='#FF0000'>Acesse o menu <blink>Par&acirc;metros/Dias Letivos</blink></font>"; 
	}
	mysqli_close($conexao);
 ?> 
</div>    
<div id='footer'>
 <? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>