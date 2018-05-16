<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\
include_once realpath('../../innerController/FondoController.php');

$list=FondoController::listAll();
$rta="";
foreach ($list as $obj => $Fondo) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Fondo->getusuarios()->getCorreo()."</td>\n";
	$rta.="<td>".$Fondo->getmoneda()->getsimbolo()."</td>\n";
	$rta.="<td>".$Fondo->getcant()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!