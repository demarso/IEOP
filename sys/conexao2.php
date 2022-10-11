<?php

$conexao = mysqli_connect("localhost","ieopcom","ieop2011","ieopcom_ieop2");
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
mysqli_set_charset($conexao,"utf8");
if (!$conexao) {
   die('Não conseguiu conectar: ' . mysql_error());
}

/* seleciona o banco demarso
$db_selected = mysql_select_db('ieopcom_ieop', $conexao);
if (!$db_selected) {
   die ('Não pode selecionar o banco diario : ' . mysql_error());
}*/
?>