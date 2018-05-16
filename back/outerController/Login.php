<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\
include_once realpath('../innerController/UsuariosController.php');

$Correo = $_POST['Correo'];
$Password = $_POST['Password'];
$usuarios = UsuariosController::login($Correo, $Password);
if($usuarios!=null){
$Correo=$usuarios->getCorreo();
setcookie("Correo","$Correo");
echo '<script language="javascript">window.location="../../front/Main.html"</script>';
}else{
echo '<script language="javascript">window.location="../../index.html"</script>';
}

//That´s all folks!