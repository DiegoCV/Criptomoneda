<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\

require_once realpath("../..").'\innerController\GlobalController.php';
require_once realpath("../..").'\dao\interfaz\IFactoryDao.php';
require_once realpath("../..").'\dto\Moneda.php';
require_once realpath("../..").'\dao\interfaz\IMonedaDao.php';

class MonedaController {

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
   * Crea un objeto Moneda a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param simbolo
   * @param valor
   */
  public static function insert( $simbolo,  $valor){
      $moneda = new Moneda();
      $moneda->setSimbolo($simbolo); 
      $moneda->setValor($valor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $monedaDao =$FactoryDao->getmonedaDao(self::getDataBaseDefault());
     $rtn = $monedaDao->insert($moneda);
     $monedaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Moneda de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param simbolo
   * @return El objeto en base de datos o Null
   */
  public static function select($simbolo){
      $moneda = new Moneda();
      $moneda->setSimbolo($simbolo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $monedaDao =$FactoryDao->getmonedaDao(self::getDataBaseDefault());
     $result = $monedaDao->select($moneda);
     $monedaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Moneda  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param simbolo
   * @param valor
   */
  public static function update($simbolo, $valor){
      $moneda = self::select($simbolo);
      $moneda->setValor($valor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $monedaDao =$FactoryDao->getmonedaDao(self::getDataBaseDefault());
     $monedaDao->update($moneda);
     $monedaDao->close();
  }

  /**
   * Elimina un objeto Moneda de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param simbolo
   */
  public static function delete($simbolo){
      $moneda = new Moneda();
      $moneda->setSimbolo($simbolo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $monedaDao =$FactoryDao->getmonedaDao(self::getDataBaseDefault());
     $monedaDao->delete($moneda);
     $monedaDao->close();
  }

  /**
   * Lista todos los objetos Moneda de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Moneda en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $monedaDao =$FactoryDao->getmonedaDao(self::getDataBaseDefault());
     $result = $monedaDao->listAll();
     $monedaDao->close();
     return $result;
  }


}
//That´s all folks!