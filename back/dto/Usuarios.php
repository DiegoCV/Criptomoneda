<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\


class Usuarios {

  private $Correo;
  private $Nombre;
  private $Password;

    /**
     * Constructor de Usuarios
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a Correo
     * @return Correo
     */
  public function getCorreo(){
      return $this->Correo;
  }

    /**
     * Modifica el valor correspondiente a Correo
     * @param Correo
     */
  public function setCorreo($correo){
      $this->Correo = $correo;
  }
    /**
     * Devuelve el valor correspondiente a Nombre
     * @return Nombre
     */
  public function getNombre(){
      return $this->Nombre;
  }

    /**
     * Modifica el valor correspondiente a Nombre
     * @param Nombre
     */
  public function setNombre($nombre){
      $this->Nombre = $nombre;
  }
    /**
     * Devuelve el valor correspondiente a Password
     * @return Password
     */
  public function getPassword(){
      return $this->Password;
  }

    /**
     * Modifica el valor correspondiente a Password
     * @param Password
     */
  public function setPassword($password){
      $this->Password = $password;
  }


}
//That´s all folks!