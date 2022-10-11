<?php
  session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/frameset.dtds">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
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
</head>
<body onLoad="if(ieBlink){setInterval('doBlink()',450)}">
<?

  include 'conexao.php';
  $ano = $_SESSION["AnoLetivo"];
  $mes = date('m');
   $sql = "SELECT * FROM parametro WHERE Ano = '$ano'";
    $resultado = mysqli_query($conexao,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
  	$ano2 = $linha['Ano'];
    }
  	if($ano2 <> $ano && $mes > 2)
  	 $pisca = 1;
      else
       $pisca = 0;
	
	
?> 
<center>

<div id="menu2">
<ul>
   <li><a href="#" onmouseover="setshw(this,'menu2sub2',30);" onmouseout="hidlay('menu2sub2');">Professor</a></li>
  <li><a href="#" onmouseover="setshw(this,'menu2sub3',30);" onmouseout="hidlay('menu2sub3');">Aluno</a></li>
  <li><a href="#" onmouseover="setshw(this,'menu2sub4',30);" onmouseout="hidlay('menu2sub4');">Pagamento</a></li>
  <li><a href="#" onmouseover="setshw(this,'menu2sub5',30);" onmouseout="hidlay('menu2sub5');">Notas</a></li>
   <li><a href="#" onmouseover="setshw(this,'menu2sub10',30);" onmouseout="hidlay('menu2sub10');">Dependência</a></li>
   <li><a href="#" onmouseover="setshw(this,'menu2sub6',30);" onmouseout="hidlay('menu2sub6');">Impressões</a></li>
  <? if($pisca == 1){ ?>
  <li><a href="#" onmouseover="setshw(this,'menu2sub7',30);" onmouseout="hidlay('menu2sub7');"><blink>Parâmetros</blink></a></li>
  <? } else { ?>
  <li><a href="#" onmouseover="setshw(this,'menu2sub7',30);" onmouseout="hidlay('menu2sub7');">Parâmetros</a></li> 
  <? } ?> 
  <li><a href="sair.php" onmouseover="setshw(this,'menu2sub8',30);" onmouseout="hidlay('menu2sub8');">Sair</a></li>
  <li><a href="#" onmouseover="setshw(this,'menu2sub9',30);" onmouseout="hidlay('menu2sub9');">&nbsp;</a></li>
  <li>Usu&aacute;rio:</li>
  <li>&nbsp;&nbsp;<? echo"$_SESSION[nome]"; ?>&nbsp;&nbsp;</li>
  <li>Ano Letivo:</li>
  <li>&nbsp;&nbsp;<font color="#FF0000"><b><? echo"$_SESSION[AnoLetivo]"; ?></b></font>&nbsp;&nbsp;</li>
</ul>
         <div id="menu2sub1" class="SubMenu" onmouseover="shwlay('menu2sub1');" onmouseout="hidlay('menu2sub1');">
          <ul>
            <li><a href="#">Cadastrar</a></li>
            <li><a href="#">Consultar</a></li>
            <li><a href="#">Alterar</a></li>
            <li><a href="#">Excluir</a></li>
          </ul>
          </div>                    
          
          <div id="menu2sub2" class="SubMenu" onmouseover="shwlay('menu2sub2');" onmouseout="hidlay('menu2sub2');">
          <ul>
            <li><a href="Professor.php">Cadastrar</a></li>
            <li><a href="ConsProfessorAtivo.php">Consulta Ativo</a></li>
            <li><a href="ConsProfessorInativo.php">Consulta Inativo</a></li>
            <li><a href="AlteraProfessorAtivo.php">Alterar Ativo</a></li>
            <li><a href="AlteraProfessorInativo.php">Alterar Inativo</a></li>
            <li><a href="ExcluiProfessor.php">Excluir</a></li>
          </ul>
          </div>
          
          <div id="menu2sub3" class="SubMenu" onmouseover="shwlay('menu2sub3');" onmouseout="hidlay('menu2sub3');">
          <ul>
            <li><a href="Aluno.php">Matrícula Nova</a></li>
            <li><a href="RematriculaAluno.php">Rematricular</a></li><li>
            <li><a href="ChamadaSelTurma.php">Lança Chamada</a></li><li>
            <li><a href="ConsultaSelTurma.php">Consulta Ativo</a></li>
            <li><a href="ConsAlunoInativo.php">Consulta Inativo</a></li>
             <li><a href="ConsAlunoLista.php">Lista Completa</a></li>
             <li><a href="ListaCompletaSelTurma.php">Lista Turma</a></li>
            <li><a href="AlteraSelTurma.php">Alterar Dados</a></li>
             <li><a href="AlteraFotoSelTurma.php">Alterar Foto</a></li>
            <li><a href="ExcluiAluno.php">Excluir</a></li>
            <li><a href="AniversarioLista.php">Aniversariantes</a></li><li>
          </ul>
          </div>
          <div id="menu2sub4" class="SubMenu" onmouseover="shwlay('menu2sub4');" onmouseout="hidlay('menu2sub4');">
          <ul>
            <li><a href="LancaPgSelTurma.php">Lançar</a></li>
            <li><a href="Inadimplentes.php">Inadimplentes</a></li>
          </ul>
          </div>
         
          <div id="menu2sub5" class="SubMenu" onmouseover="shwlay('menu2sub5');" onmouseout="hidlay('menu2sub5');">
          <ul>
            <li><a href="NotasSelcTurma.php">Lançar</a></li>
            <li><a href="ConsNotasSelTurma.php">Consultar</a></li>
            <li><a href="AlteraNotas.php">Alterar</a></li>
            <li><a href='NotasRecSelcTurma.php'>Recuperção Final</a></li>
            <li><a href='RecupSelTurma.php'>Altera Recuperção</a></li>
            <li><a href="AlteraResSelTurma.php">Altera Resultado Final</a></li>
            <li><a href="BolTurma.php">Notas Por Turma</a></li>
          </ul>
          </div>
          <div id="menu2sub6" class="SubMenu" onmouseover="shwlay('menu2sub6');" onmouseout="hidlay('menu2sub6');">
          <ul>
            <li><a href="BoletimSelTurma.php">Boletim</a></li>
            <li><a href="FMSelTurma.php">Ficha de Matrícula</a></li>
            <li><a href="FISelTurma.php">Ficha Individual</a></li>
            <li><a href="RISelTurma.php">Inadimplentes</a></li>
          </ul>
          </div>
          <div id="menu2sub7" class="SubMenu" onmouseover="shwlay('menu2sub7');" onmouseout="hidlay('menu2sub7');">
         	 <ul>
             <? if($pisca == 1){ ?>
            	<li><a href="Parametros.php"><blink>Dias Letivos</blink></a></li>
             <? } else { ?>
                <li><a href="Parametros.php">Dias Letivos</a></li>
             <? } ?> 
             <li><a href="anoLetivo.php">Ano Letivo</a></li> 
          	</ul>
          </div>
          <div id="menu2sub10" class="SubMenu" onmouseover="shwlay('menu2sub10');" onmouseout="hidlay('menu2sub10');">
          <ul>
            <li><a href="DependenciaSelTurma.php">Cad. Aluno</a></li>
            <li><a href="NotasDepend.php">Lança Nota</a></li>
            <li><a href="ConsDependenciaLista.php">Lista</a></li>
            <li><a href="ConsNotasDepend1.php">Consulta</a></li>
          </ul>
          </div>
 </div>     
</center>
</body>
</html