<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

require_once realpath("../..").'\innerController\GlobalController.php';
require_once realpath("../..").'\dao\interfaz\IFactoryDao.php';
require_once realpath("../..").'\dto\Fondo.php';
require_once realpath("../..").'\dao\interfaz\IFondoDao.php';
require_once realpath("../..").'\dto\Usuarios.php';
require_once realpath("../..").'\dto\Moneda.php';

class FondoController {

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
   * Crea un objeto Fondo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuarios
   * @param moneda
   * @param cant
   */
  public static function insert( $usuarios,  $moneda,  $cant){
      $fondo = new Fondo();
      $fondo->setUsuarios($usuarios); 
      $fondo->setMoneda($moneda); 
      $fondo->setCant($cant); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $rtn = $fondoDao->insert($fondo);
     $fondoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fondo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuarios
   * @param moneda
   * @return El objeto en base de datos o Null
   */
  public static function select($usuarios, $moneda){
      $fondo = new Fondo();
      $fondo->setUsuarios($usuarios); 
      $fondo->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $result = $fondoDao->select($fondo);
     $fondoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fondo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuarios
   * @param moneda
   * @param cant
   */
  public static function update($usuarios, $moneda, $cant){
      $fondo = self::select($usuarios, $moneda);
      $fondo->setCant($cant); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $fondoDao->update($fondo);
     $fondoDao->close();
  }

  /**
   * Elimina un objeto Fondo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuarios
   * @param moneda
   */
  public static function delete($usuarios, $moneda){
      $fondo = new Fondo();
      $fondo->setUsuarios($usuarios); 
      $fondo->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $fondoDao->delete($fondo);
     $fondoDao->close();
  }

  /**
   * Lista todos los objetos Fondo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fondo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $result = $fondoDao->listAll();
     $fondoDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Fondo de la base de datos a partir de usuarios.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuarios
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByUsuarios($usuarios){
      $fondo = new Fondo();
      $fondo->setUsuarios($usuarios); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $result = $fondoDao->listByUsuarios($fondo);
     $fondoDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Fondo de la base de datos a partir de moneda.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param moneda
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByMoneda($moneda){
      $fondo = new Fondo();
      $fondo->setMoneda($moneda); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fondoDao =$FactoryDao->getfondoDao(self::getDataBaseDefault());
     $result = $fondoDao->listByMoneda($fondo);
     $fondoDao->close();
     return $result;
  }


}
//That´s all folks!