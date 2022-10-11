<? 
SELECT *, count(`Matricula`) FROM  pagamento WHERE `Ano`=2012 GROUP BY `Matricula` HAVING count( Matricula) > 1
?>