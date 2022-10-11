<form action="NotasOKa.php" method="post" name="form1">
<fieldset>
<legend>Lan&ccedil;amento das Notas do Aluno</legend>
  <label><font size="1" color="#FF0000">Use apenas (.) PONTO. Ex: 10.0</font></label><br /><br /><br />
    <label>Materias&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notas&nbsp;&nbsp;&nbsp;&nbsp;Faltas</label><br /><br />
<?	
include "conexao.php";
$turma = $_SESSION["turma"];
$matricula = $_SESSION["matricula"];
$bimestre2 = $_SESSION["bimestr"];
$ano = $_SESSION["AnoLetivo"];
$cont = 0;

$sql = "SELECT Segmento FROM aluno WHERE Matricula = '$matricula'";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$segmento = $linha['Segmento'];
}

if ($segmento == 2){
$sql2 = "SELECT Materia FROM materia_sex_iot";
$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	$materia = $linha2['Materia'];
	//echo $materia.'<br/ > ';

	
$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia'";
$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3))
{
	$recup = $linha3['Recuperacao'];
	if( $bimestre2 == 1){
	$nota = $linha3['Bim1'];
	$faltas = $linha3['Faltas1'];
	}
	if( $bimestre2 == 2){
	$nota = $linha3['Bim2'];
	$faltas = $linha3['Faltas2'];
	}
	if( $bimestre2 == 3){
	$nota = $linha3['Bim3'];
	$faltas = $linha3['Faltas3'];
	}
	if( $bimestre2 == 4){
	$nota = $linha3['Bim4'];
	$faltas = $linha3['Faltas4'];
	}
	if( $bimestre2 == 5 && $recup == 'Sim'){
	$nota = $linha3['RecFin'];
	$_SESSION[recfin] = $nota;
	}
	if($bimestre2 == 5 && $recup <> 'Sim'){
	$nota = '-'; $materia = '';
	}
	
 	?>
        <input type="text" name="Materias[<? echo $cont; ?>]"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       	<input type="text" name="Notas[<? echo $cont; ?>]"  class="textbox4"  tabindex="$cont" value="<? echo $nota ?>" onblur="virgula(this.value)" />
        
        <? if($materia <> 'Comportamento' && $bimestre2 <> 5 ){?>
        <input type="'text" name="Faltas[<? echo $cont; ?>]"  class="textbox4" value="<? echo $faltas ?>" />
        
        <? } ?> <br /><br />
<?
$cont = $cont + 1;
$_SESSION[conta] =  $cont;
}
}
}

if ($segmento == 3){
$sql2 = "SELECT Materia FROM materia_nono";
$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	$materia = $linha2['Materia'];

$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia'";
$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3))
{
	$recup = $linha3['Recuperacao'];
	if( $bimestre2 == 1){
	$nota = $linha3['Bim1'];
	$faltas = $linha3['Faltas1'];
	}
	if( $bimestre2 == 2){
	$nota = $linha3['Bim2'];
	$faltas = $linha3['Faltas2'];
	}
	if( $bimestre2 == 3){
	$nota = $linha3['Bim3'];
	$faltas = $linha3['Faltas3'];
	}
	if( $bimestre2 == 4){
	$nota = $linha3['Bim4'];
	$faltas = $linha3['Faltas4'];
	}
	if( $bimestre2 == 5 && $recup == 'Sim'){
	$nota = $linha3['RecFin'];
	$_SESSION[recfin] = $nota;
	}
	if($bimestre2 == 5 && $recup <> 'Sim'){
	$nota = '-'; $materia = '';
	}
	
 	?>
 
        <input type="text" name="Materias[<? echo $cont; ?>]"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       	<input type="text" name="Notas[<? echo $cont; ?>]"  class="textbox4"  tabindex="$cont" value="<? echo $nota ?>" />
        
        <? if($materia <> 'Comportamento' && $bimestre2 <> 5 ){?>
        <input type="'text" name="Faltas[<? echo $cont; ?>]"  class="textbox4" value="<? echo $faltas ?>" />
        
        <? } ?> <br /><br />
<?

$cont = $cont + 1;
$_SESSION[conta] =  $cont;
}
}
}
?>
<br />
 <input type="submit" class="button" name="cadastrar" value="Lan&ccedil;ar Notas"  />

	</fieldset>
</form>
