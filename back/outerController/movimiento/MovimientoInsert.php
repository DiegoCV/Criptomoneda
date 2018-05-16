<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Ojos de perro azul  \\
include_once realpath('../../innerController/MovimientoController.php');

$usuario = $_POST['usuario'];
$moneda = $_POST['moneda'];
$cerrado = $_POST['cerrado'];
$pCompra = $_POST['pCompra'];
$pVenta = $_POST['pVenta'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
MovimientoController::insert($usuario, $moneda, $cerrado, $pCompra, $pVenta, $cantidad, $fecha);
echo "true";

//That´s all folks!