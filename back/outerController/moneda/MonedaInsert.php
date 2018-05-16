<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\
include_once realpath('../../innerController/MonedaController.php');

$simbolo = $_POST['simbolo'];
$Valor = $_POST['Valor'];
MonedaController::insert($simbolo, $Valor);
echo "true";

//That´s all folks!