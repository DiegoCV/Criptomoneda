<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\


class Moneda {

  private $simbolo;
  private $Valor;

    /**
     * Constructor de Moneda
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a simbolo
     * @return simbolo
     */
  public function getSimbolo(){
      return $this->simbolo;
  }

    /**
     * Modifica el valor correspondiente a simbolo
     * @param simbolo
     */
  public function setSimbolo($simbolo){
      $this->simbolo = $simbolo;
  }
    /**
     * Devuelve el valor correspondiente a Valor
     * @return Valor
     */
  public function getValor(){
      return $this->Valor;
  }

    /**
     * Modifica el valor correspondiente a Valor
     * @param Valor
     */
  public function setValor($valor){
      $this->Valor = $valor;
  }


}
//That´s all folks!