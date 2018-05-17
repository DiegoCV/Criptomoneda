<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\
include_once realpath('../../innerController/MonedaController.php');

$list=MonedaController::listAll();
$rta="";
foreach ($list as $obj => $Moneda) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Moneda->getsimbolo()."</td>\n";
	$rta.="<td>".$Moneda->getValor()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!