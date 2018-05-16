<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../../innerController/MovimientoController.php');

$list=MovimientoController::listAll();
$rta="";
foreach ($list as $obj => $Movimiento) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Movimiento->getusuario()->getCorreo()."</td>\n";
	$rta.="<td>".$Movimiento->getmoneda()->getsimbolo()."</td>\n";
	$rta.="<td>".$Movimiento->getcerrado()."</td>\n";
	$rta.="<td>".$Movimiento->getpCompra()."</td>\n";
	$rta.="<td>".$Movimiento->getpVenta()."</td>\n";
	$rta.="<td>".$Movimiento->getcantidad()."</td>\n";
	$rta.="<td>".$Movimiento->getfecha()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!