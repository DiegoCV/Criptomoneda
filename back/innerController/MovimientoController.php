<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\

require_once realpath("../..").'\innerController\GlobalController.php';
require_once realpath("../..").'\dao\interfaz\IFactoryDao.php';
require_once realpath("../..").'\dto\Movimiento.php';
require_once realpath("../..").'\dao\interfaz\IMovimientoDao.php';
require_once realpath("../..").'\dto\Usuarios.php';
require_once realpath("../..").'\dto\Moneda.php';

class MovimientoController {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Movimiento a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario
   * @param moneda
   * @param cerrado
   * @param pCompra
   * @param pVenta
   * @param cantidad
   * @param fecha
   */
  public static function insert( $usuario,  $moneda,  $cerrado,  $pCompra,  $pVenta,  $cantidad,  $fecha){
      $movimiento = new Movimiento();
      $movimiento->setUsuario($usuario); 
      $movimiento->setMoneda($moneda); 
      $movimiento->setCerrado($cerrado); 
      $movimiento->setPCompra($pCompra); 
      $movimiento->setPVenta($pVenta); 
      $movimiento->setCantidad($cantidad); 
      $movimiento->setFecha($fecha); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $rtn = $movimientoDao->insert($movimiento);
     $movimientoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Movimiento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario
   * @param moneda
   * @return El objeto en base de datos o Null
   */
  public static function select($usuario, $moneda){
      $movimiento = new Movimiento();
      $movimiento->setUsuario($usuario); 
      $movimiento->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $result = $movimientoDao->select($movimiento);
     $movimientoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Movimiento  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario
   * @param moneda
   * @param cerrado
   * @param pCompra
   * @param pVenta
   * @param cantidad
   * @param fecha
   */
  public static function update($usuario, $moneda, $cerrado, $pCompra, $pVenta, $cantidad, $fecha){
      $movimiento = self::select($usuario, $moneda);
      $movimiento->setCerrado($cerrado); 
      $movimiento->setPCompra($pCompra); 
      $movimiento->setPVenta($pVenta); 
      $movimiento->setCantidad($cantidad); 
      $movimiento->setFecha($fecha); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $movimientoDao->update($movimiento);
     $movimientoDao->close();
  }

  /**
   * Elimina un objeto Movimiento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario
   * @param moneda
   */
  public static function delete($usuario, $moneda){
      $movimiento = new Movimiento();
      $movimiento->setUsuario($usuario); 
      $movimiento->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $movimientoDao->delete($movimiento);
     $movimientoDao->close();
  }

  /**
   * Lista todos los objetos Movimiento de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Movimiento en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $result = $movimientoDao->listAll();
     $movimientoDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Movimiento de la base de datos a partir de usuario.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByUsuario($usuario){
      $movimiento = new Movimiento();
      $movimiento->setUsuario($usuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $result = $movimientoDao->listByUsuario($movimiento);
     $movimientoDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Movimiento de la base de datos a partir de moneda.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param moneda
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByMoneda($moneda){
      $movimiento = new Movimiento();
      $movimiento->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $movimientoDao =$FactoryDao->getmovimientoDao(self::getDataBaseDefault());
     $result = $movimientoDao->listByMoneda($movimiento);
     $movimientoDao->close();
     return $result;
  }


}
//That´s all folks!