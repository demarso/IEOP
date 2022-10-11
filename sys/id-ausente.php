<?

include "conexao.php";

$sql = "SELECT id FROM notas order by id";

$resultado = mysqli_query($conexao, $sql) or die (mysql_error());

$idd = 1; $cont=1;

while ($linha = mysqli_fetch_array($resultado))
{
	$id2 = $linha['id'];

      if ($idd <> $id2)}
  	  echo $cont." - ".$idd."<br />";
      $cont = $cont +1;
      }
$idd = $idd + 1; 
}

?>