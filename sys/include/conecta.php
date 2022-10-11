<?php
	//include com os dados para conectar com o mysql

	
	@ $base = mysql_connect('localhost','demarso','dm2009');
	if (mysql_errno()){
	echo "ERRO : " . mysql_errno() . "</body></html>";
	exit;
	}
	
	mysql_select_db("demarso_estoque", $base);

?>















