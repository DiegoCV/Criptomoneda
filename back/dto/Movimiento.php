<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\


class Movimiento {

  private $usuario;
  private $moneda;
  private $cerrado;
  private $pCompra;
  private $pVenta;
  private $cantidad;
  private $fecha;

    /**
     * Constructor de Movimiento
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a usuario
     * @return usuario
     */
  public function getUsuario(){
      return $this->usuario;
  }

    /**
     * Modifica el valor correspondiente a usuario
     * @param usuario
     */
  public function setUsuario($usuario){
      $this->usuario = $usuario;
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
     * Devuelve el valor correspondiente a cerrado
     * @return cerrado
     */
  public function getCerrado(){
      return $this->cerrado;
  }

    /**
     * Modifica el valor correspondiente a cerrado
     * @param cerrado
     */
  public function setCerrado($cerrado){
      $this->cerrado = $cerrado;
  }
    /**
     * Devuelve el valor correspondiente a pCompra
     * @return pCompra
     */
  public function getPCompra(){
      return $this->pCompra;
  }

    /**
     * Modifica el valor correspondiente a pCompra
     * @param pCompra
     */
  public function setPCompra($pCompra){
      $this->pCompra = $pCompra;
  }
    /**
     * Devuelve el valor correspondiente a pVenta
     * @return pVenta
     */
  public function getPVenta(){
      return $this->pVenta;
  }

    /**
     * Modifica el valor correspondiente a pVenta
     * @param pVenta
     */
  public function setPVenta($pVenta){
      $this->pVenta = $pVenta;
  }
    /**
     * Devuelve el valor correspondiente a cantidad
     * @return cantidad
     */
  public function getCantidad(){
      return $this->cantidad;
  }

    /**
     * Modifica el valor correspondiente a cantidad
     * @param cantidad
     */
  public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
  }
    /**
     * Devuelve el valor correspondiente a fecha
     * @return fecha
     */
  public function getFecha(){
      return $this->fecha;
  }

    /**
     * Modifica el valor correspondiente a fecha
     * @param fecha
     */
  public function setFecha($fecha){
      $this->fecha = $fecha;
  }


}
//That´s all folks!