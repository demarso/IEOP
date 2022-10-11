<?php

//conecta no banco
include ("conexao.php");

//seleciona a tabela

$sql = "Select * from fotos"; $query = mysqli_query($conexao,$sql);

while($row = mysqli_fetch_array($query)){

$fotos = $row["fotos"];

echo "<img src=\"$fotos\"><br><br>";
}

?>
