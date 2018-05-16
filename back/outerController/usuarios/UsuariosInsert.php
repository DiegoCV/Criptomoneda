<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\
include_once realpath('../../innerController/UsuariosController.php');

$Correo = $_POST['Correo'];
$Nombre = $_POST['Nombre'];
$Password = $_POST['Password'];
UsuariosController::insert($Correo, $Nombre, $Password);
echo "true";

//That´s all folks!