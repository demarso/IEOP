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
<meta http-equiv="content-type" content="text/html; charset=utf-8iso-8859-1">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="include/micoxAjax.js"></script>

<script type="text/javascript">
function seg(se){
   var S = eval("document.cadastro.Segmento");
    
   if( se < 0 || se > 3){
	  alert('Os Segmentos são:\n0 - Maternal ao 3º Período\n1 - 1º Ano ao 5º Ano\n2 - 6º Ano ao 8º Ano\n3 - 9º Ano');
	  S.value ="";
	  S.focus();
	 }
	 return true;
}
function seg2(){
	alert('Os Segmentos são:\n0 - Maternal ao 3º Período\n1 - 1º Ano ao 5º Ano\n2 - 6º Ano ao 8º Ano\n3 - 9º Ano');
}


function ValidaSemPreenchimento(form)
{
 for (i=0;i<form.length;i++){
     var obg = form[i].obrigatorio;
     if (obg==1){
        if (form[i].value == ""){
           var nome = form[i].name
           alert("O campo " + nome + " é obrigatório.")
           form[i].focus();
           return false
        }
	 }
 }
return true
}

function checa(){
     if (document.cadastro.Matricula.value != "" && document.cadastro.Nome.value != "" && document.cadastro.Nascimento.value != "" && document.cadastro.Turma.value != "" && document.cadastro.Segmento.value != ""){
         document.cadastro.submit();
    }else{
        alert("Os Campos com * não podem ficar vazios");
}
}


</script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
.formata { /* esta classe é somente
para formatar a fonte */
font: 12px arial, verdana, helvetica, sans-serif;
}
a.dcontexto{
position:relative;
font:12px arial, verdana, helvetica, sans-serif;
padding:0;
color:#039;
text-decoration:none;
border-bottom:2px dotted #039;
cursor:help;
z-index:24;
}
a.dcontexto:hover{
background:transparent;
color:#f00;
z-index:25;
}
a.dcontexto span{display: none}
a.dcontexto:hover span{
display:block;
position:absolute;
width:230px;
top:3em;
right-align:justify;
left:0;
font: 12px arial, verdana, helvetica, sans-serif;
padding:5px 10px;
border:1px solid #999;
background:#e0ffff;
color:#000;
}
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

   <div id="palco2"><br /><br />
     <?php

include "conexao.php";

$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];
$data = date("d/m/Y"); 
if(empty($nome2)){
	$nome2 = $_POST["Nome2"];
	$nasc = $_POST["NascEx2"];
}


$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

if ($sql == " "){
echo "Este aluno não existe";
}
else{
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$nascimento = $linha['iNascimento'];
	$endereco = $linha['Endereco'];
	$certidao = $linha['Certidao'];
	$raca = $linha['Raca'];
	$sangue = $linha['Sangue'];
	$natural = $linha['Naturalidade'];
	$nacional = $linha['Nacionalidade'];
	$bairro = $linha['Bairro'];
	$cidade = $linha['Cidade'];
	$estado = $linha['Estado'];
	$cep = $linha['Cep'];
	$pai = $linha['Pai'];
	$profpai = $linha['Profpai'];
	$mae = $linha['Mae'];
	$profmae = $linha['Profmae'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$transferencia = $linha['Transferencia'];
	$segmento = $linha['Segmento'];
	
	$sql = "SELECT Matricula FROM histMatr WHERE Matricula = '$matricula' && Ano = '$ano'";
    $resultado = mysqli_query($conexao,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado))
    {
	$matr = $linha['Matricula'];
	 if(!empty($matr)){
	  echo "<script>alert('Aluno já matriculado para este ano!');history.back(-1);</script>";
	  exit; 
	 }
	}
	
	
	
}
}
?>
 <cente>
        <form action="RematriculaAlunoOK.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return ValidaSemPreenchimento(this)">
	<fieldset id="forms">
		<legend>Dados para Matrícula do Aluno</legend>
				<br /><br />
            <label for="Matricula">*Matricula:</label>
		<input type="text" name="Matricula" id="Matricula" class="textbox2" tabindex="1"  value="<? echo "$matricula" ?>" onkeypress="formatar_mascara(this, '####-####-####')" maxlength="14" obrigatorio="1" title="Informe a matricula no Formato: AAAA-TTTT-SSSS"/><br />
		<br />
        <label for="Nome">*Nome:</label>
		<input type="text" name="Nome" id="Nome" class="textbox"  tabindex="2" onkeypress="return Onlychars(event)"  value="<? echo "$nome2" ?>" obrigatorio="1" title="Informe o nome do aluno"/><br />
		<br />
        <label for="Nascimento">*Nascimento:</label>
		<input type="text" name="Nascimento" id="Nascimento" class="textbox2"  tabindex="3" onKeyUp="Formatadata(this,event);"  size="14" maxlength="10" value="<? echo "$nascimento" ?>" obrigatorio="1" title="Informe a Data de Nascimento"/><br />
		<br />
        <label for="Data">*Data:</label>
		<input type="text" name="Data" id="Data" class="textbox2"  tabindex="4" onKeyUp="Formatadata(this,event);"  size="14" maxlength="10" value="<? echo "$data" ?>" title="Informe a data da renovação da matrícula"/><br />
		<br />
        <label for="Ano">*Ano:</label>
         <select name="Ano" id="Ano" class="textbox2" tabindex="5" obrigatorio="1" title="Informe o Ano que o aluno vai estudar">
			<option value="<? echo "$ano" ?>"><? echo "$ano" ?></option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
             <option value="2015">2015</option>
             <option value="2016">2016</option>
             <option value="2017">2017</option>
             <option value="2018">2018</option>
             <option value="2019">2019</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
             <option value="2025">2025</option>
             <option value="2026">2026</option>
             <option value="2027">2027</option>
             <option value="2028">2028</option>
             <option value="2029">2029</option>
             <option value="2030">2030</option>
		 </select>
		<br />
        <br />
        <label for="Inclusao">Inclus&atilde;o:</label>
        <select name="Transferencia"  class="textbox3" accesskey="s" tabindex="6" title="Informe a origem da inclusão">
    		<option value""><? echo $transferencia; ?></option>
    		<option value"Matricula Inicial">Matr&iacute;cula Inicial</option>
            <option value"Matrícula Renovada">Matr&iacute;cula Renovada</option>
    		<option value"Transferência da Rede Particular">Transfer&ecirc;ncia da Rede Particular</option>
    		<option value"Transferência da Rede Pública">Transfer&ecirc;ncia da Rede P&uacute;blica</option>
    		<option value"Retorno">Retorno</option>
    	</select><br /><br />
         <label for="Turma">*Turma:</label><select name="Turma" id="Turma" class="textbox2" tabindex="7" onChange="ajaxGet('processConsultaSeg.php?Turma='+this.value, document.getElementById('Segmento'), true)" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Ano FROM turmas";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select><br /><br />
              <label for="Segmento">*Segmento:</label>
		<input type="text" name="Segmento" id="Segmento" class="textbox4" tabindex="-1" obrigatorio="1" readonly >
        

        <br /><br />
        <label for="Carne">Carn&ecirc;:</label>
		<input type="text" name="Carne" id="Carne" class="textbox4"  accesskey="s" tabindex="8" onkeypress="return Onlynumbers(event)" obrigatorio="1" title="Informe o nº do carnê novo" /><br /><br /><br /><br />
        
         <!--     <input type="submit" class="button" name="cadastrar" value="Consulta"  />-->
                  <input type="button" onClick="checa()" value="REMATRICULAR">
                   
	</fieldset>
</form>
   </div> 
   </div>
     
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
