<?php

$string = (float) '1.75cm';
var_dump( $string ); // float(1.75)

echo '<br />' . PHP_EOL;

$string2 = (float) 'Ele possuia 1.75cm';

var_dump( $string2 ); // float(0) 

?>
 
