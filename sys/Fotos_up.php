<?php
include ("conexao.php");
//se existir o arquivo
if(isset($_FILES["arquivo"])){

$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$arquivo = $_FILES["arquivo"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}

$arquivo_nome = $pasta_dir . $arquivo["name"];
//echo $arquivo_nome.'<br />';
// Faz o upload da imagem
move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);

//aqui salva no banco o path da foto

 $sql2 = "UPDATE aluno SET Foto = '$arquivo_nome' WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc'";
 
 $result2 = mysqli_query($conexao,$sql2) or die ("Registro no BD nao realizado.");

mysql_close($conexao);

echo "<script type = 'text/javascript'> location.href = 'AlteraFotoSelTurma.php'</script>";

}

?>
