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
      <form action="AlunoOK.php" method="post" enctype="multipart/form-data"  name="cadastro" >
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend>Matr&iacute;cula de Aluno</legend>
		<center>------------------ Dados do Aluno --------------------- </center>
        <label for="Id">ID:</label>
		<input type="text" name="Id" id="Id" class="textbox2" tabindex="1" maxlength="12" title="Informe a ID do aluno"/><br />
		<br />
		<label for="Matricula">N� de Matricula:</label>
		<input type="text" name="Matricula" id="Matricula" class="textbox2" tabindex="2" onkeypress="formatar_mascara(this, '####-####-####')" maxlength="14" title="Informe a matricula no Formato: AAAA-TTTT-SSSS"/><br />
		<br />
        <label for="Nome">Nome:</label>
		<input type="text" name="Nome" id="Nome" class="textbox"  tabindex="3"  title="Informe o nome do aluno"/><br />
		<br />
        <label for="Data">Data da Matricula:</label>
		<input type="text" name="Data" id="Data" class="textbox2"  tabindex="4" onKeyUp="Formatadata(this,event);"  size="14" maxlength="10" title="Informe a data da matr�cula"/><br />
		<br />
        <label for="Ano">Ano Letivo:</label>
         <select name="Ano" id="Ano" class="textbox2" tabindex="5" title="Informe o Ano que o aluno vai estudar">
			<option value="">Selecione</option>
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
       	<label for="Nascimento">Data de Nascimento:</label>
		<input type="text" name="Nascimento" id="Nascimento" class="textbox2"  tabindex="6" onKeyUp="Formatadata(this,event);"  size="14" maxlength="10" title="Informe a data de mascimento"/><br />
		<br />
        <label for="Certidao">N&ordm; Certid&atilde;o:</label>
		<input type="text" name="Certidao" id="Certidao" class="textbox2"  tabindex="7"  title="Informe o n� da certid�o de nascimento"/><br />
		<br />
         <label for="Raca">Cor / Ra&ccedil;a:</label>
         <select name="Raca" id="Raca" class="textbox2"  tabindex="8" title="Informe a Ra�a">
			<option value="">Selecione</option>
            <option value="Branco">Branco</option>
            <option value="Negro">Negro</option>
            <option value="Pardo">Pardo</option>
            <option value="Amarelo">Amarelo</option>
             <option value="Ind�gena">Ind&iacute;gena</option>
		 </select><br />
		<br />
        <label for="Sexo">Sexo:</label>
		 <select name="Sexo" id="Sexo" class="textbox2"  tabindex="9" title="Informe o tipo sanguineo">
			<option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
		 </select><br />
		<br />
         <label for="Sangue">Tipo Sangu�neo:</label>
        <select name="Sangue" id="Sangue" class="textbox2"  tabindex="10" title="Informe o tipo sanguineo">
			<option value="">Selecione</option>
            <option value="O Positivo">O Positivo</option>
            <option value="O Negativo">O Negativo</option>
			<option value="A Positivo">A Positivo</option>
			<option value="A Negativo">A Negativo</option>
			<option value="B Positivo">B Positivo</option>
			<option value="B Negativo">B Negativo</option>
			<option value="AB Positivo">AB Positivo</option>
			<option value="AB Negativo">AB Negativo</option>
		</select><br />
		<br />
        <label for="Natural">Naturalidade:</label>
		<input type="text" name="Natural" id="Natural" class="textbox3"  tabindex="11" title="Informe a naturalidade" /><br />
		<br />
         <label for="Nacional">Nacionaliade:</label>
		<input type="text" name="Nacional" id="Nacional" class="textbox3"  tabindex="12" title="Informe a nacionalidade" /><br />
		<br />
		     <!-- Filia��o do Aluno -->  
             <center>------------------ Filia��o do Aluno --------------------- </center> 
		<label for="Pai">Pai:</label>
		<input type="text" name="Pai" id="Pai" class="textbox"  tabindex="19" title="Informe o nome do Pai" /><br />
		<br />
         <label for="CelPai">Cel. Pai:</label>
		<input type="text" name="CelPai" id="CelPai" class="textbox2"  tabindex="18" maxlength="13" onkeypress="return txtBoxFormat(document.Form, 'CelPai', '(99)9999-9999', event);" title="Informe o Celular do Pai" /><br />
		<br />
        <label for="Profpai">Profiss&atilde;o do Pai</label>
		<input type="text" name="Profpai" id="Profpai" class="textbox"   tabindex="20" title="Informe a profiss�o do Pai" /><br />
		<br />
		<label for="Mae">M&atilde;e:</label>
		<input type="text" name="Mae" id="Mae" class="textbox" tabindex="21" title="Informe o nome da Mae" /><br />
		<br />
        <label for="CelMae">Cel. M�e:</label>
		<input type="text" name="CelMae" id="CelMae" class="textbox2"  tabindex="18" maxlength="13" onkeypress="return txtBoxFormat(document.Form, 'CelMae', '(99)9999-9999', event);" title="Informe o Celular da M�e" /><br />
		<br />
        <label for="Profmae">Profiss&atilde;o da M�e:</label>
		<input type="text" name="Profmae" id="Profmae" class="textbox" tabindex="22" title="Informe a profiss�o da Mae" /><br />
		<br />
       <center>------------------ Endere�o do Aluno --------------------- </center> 
      <!-- <label for="Foto">Foto:</label>
		<input type="file" name="Foto" id="Foto" tabindex="19"  size="10" title="Clique aqui para inserir a foto" /><br />
		<br /> -->
       <label for="Endereco">Endere&ccedil;o:</label>
		<input type="text" name="Endereco" id="Endereco" class="textbox" tabindex="13" title="Informe o endere�o" /><br />
		<br />
		<label for="Cep">CEP:</label>
		<input type="text" name="Cep" id="Cep" class="textbox2"  tabindex="14" maxlength="9" onkeypress="formatar_mascara(this, '#####-###')" title="Informe o CEP" /><br />
		<br />		
		<label for="Bairro">Bairro:</label>
		<input type="text" name="Bairro" id="Bairro" class="textbox"  tabindex="15" title="Informe o bairro" /><br />
		<br />
		<label for="Cidade">Cidade:</label>
		<input type="text" name="Cidade" id="Cidade" class="textbox" tabindex="16" title="Informe a cidade" /><br />
		<br />
        <label for="Estado">Estado:</label>
        <select name="Estado" id="Estado" class="textbox4"  tabindex="17" title="Informe o Estado">
			<option value="RJ">RJ</option>
            <option value="AC">AC</option>
			<option value="AL">AL</option>
			<option value="AM">AM</option>
			<option value="AP">AP</option>
			<option value="BA">BA</option>
			<option value="CE">CE</option>
			<option value="DF">DF</option>
			<option value="ES">ES</option>
			<option value="GO">GO</option>
			<option value="MA">MA</option>
			<option value="MG">MG</option>
			<option value="MS">MS</option>
			<option value="MT">MT</option>
			<option value="PA">PA</option>
			<option value="PB">PB</option>
			<option value="PE">PE</option>
			<option value="PI">PI</option>
			<option value="PR">PR</option>
			<option value="RN">RN</option>
			<option value="RO">RO</option>
			<option value="RR">RR</option>
			<option value="RS">RS</option>
			<option value="SC">SC</option>
			<option value="SE">SE</option>
			<option value="SP">SP</option>
			<option value="TO">TO</option>
		</select><br />
		
		<br />
		<label for="Telefone">Telefone:</label>
		<input type="text" name="Telefone" id="Telefone" class="textbox2"  tabindex="18" maxlength="14" onKeyPress="MascaraTelefone(cadastro.Telefone);" onBlur="ValidaTelefone(cadastro.Telefone);"  /><br />
		<br />
		<label for="Mail">Email</label>
		<input type="text" name="Email" id="Email" class="textbox" tabindex="23" onBlur="ValidEmail();" title="Informe um email v�lido" />
		<br /><br />
        <center>------------------ Dados Gerais --------------------- </center>
        <label for="Inclusao">Inclus&atilde;o:</label>
        <select name="Transferencia"  class="textbox3" tabindex="24" title="Informe a origem da inclus�o">
    		<option value"">Selecione...</option>
    		<option value"Matr�cula Inicial">Matr&iacute;cula Inicial</option>
            <option value"Matr�cula Renovada">Matr&iacute;cula Renovada</option>
    		<option value"Transfer�ncia da Rede Particular">Transfer&ecirc;ncia da Rede Particular</option>
    		<option value"Transfer�ncia da Rede P�blica">Transfer&ecirc;ncia da Rede P&uacute;blica</option>
    		<option value"Retorno">Retorno</option>
    	</select><br /><br />
         <label for="Turma">Turma:</label><select name="Turma" id="Turma" class="textbox2" tabindex="25" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Ano FROM turmas";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select><br /><br />
              <label for="Carne">N&ordm; do Carn&ecirc;:</label>
        <input type="text" name="Carne" id="Carne" class="textbox2" tabindex="26"  title="Informe o n� do Carn�" />
        
        <input type="submit" class="button" name="cadastrar" value="Matricular"  />
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
