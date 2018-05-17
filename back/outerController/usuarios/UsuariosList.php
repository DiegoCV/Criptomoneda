<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\
include_once realpath('../../innerController/UsuariosController.php');

$list=UsuariosController::listAll();
$rta="";
foreach ($list as $obj => $Usuarios) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Usuarios->getCorreo()."</td>\n";
	$rta.="<td>".$Usuarios->getNombre()."</td>\n";
	$rta.="<td>".$Usuarios->getPassword()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!