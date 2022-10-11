<?php
$conexao = mysqli_connect('bdhost0066.servidorwebfacil.com',"ieopcom","Ieop@2018","ieopcom_ieop");
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
mysqli_set_charset($conexao,"utf8");
if (!$conexao) {
   die('Não conseguiu conectar: ' . mysql_error());
}
?>