<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<title>Upload</title>
</head>
<body bgcolor = "#FFFFFF" text = "#000000">

<form name = "form1" method = "post" action = "Fotos_up.php" enctype = "multipart/form-data">
<label for="Nome">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				<?php
						include ("conexao.php");
			            //Busco os estados
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' && Turma = 'Maternal' ORDER BY Nome";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />

<input type = "file" name = "arquivo">
<input type = "submit" name = "Submit" value = "Enviar">
</form>
</body>
</html>
