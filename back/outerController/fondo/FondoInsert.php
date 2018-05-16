<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\
include_once realpath('../../innerController/FondoController.php');

$usuarios = $_POST['usuarios'];
$moneda = $_POST['moneda'];
$cant = $_POST['cant'];
FondoController::insert($usuarios, $moneda, $cant);
echo "true";

//That´s all folks!