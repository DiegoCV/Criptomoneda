<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\


class Fondo {

  private $usuarios;
  private $moneda;
  private $cant;

    /**
     * Constructor de Fondo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a usuarios
     * @return usuarios
     */
  public function getUsuarios(){
      return $this->usuarios;
  }

    /**
     * Modifica el valor correspondiente a usuarios
     * @param usuarios
     */
  public function setUsuarios($usuarios){
      $this->usuarios = $usuarios;
  }
    /**
     * Devuelve el valor correspondiente a moneda
     * @return moneda
     */
  public function getMoneda(){
      return $this->moneda;
  }

    /**
     * Modifica el valor correspondiente a moneda
     * @param moneda
     */
  public function setMoneda($moneda){
      $this->moneda = $moneda;
  }
    /**
     * Devuelve el valor correspondiente a cant
     * @return cant
     */
  public function getCant(){
      return $this->cant;
  }

    /**
     * Modifica el valor correspondiente a cant
     * @param cant
     */
  public function setCant($cant){
      $this->cant = $cant;
  }


}
//That´s all folks!