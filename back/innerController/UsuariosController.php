<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

require_once realpath("../..").'\innerController\GlobalController.php';
require_once realpath("../..").'\dao\interfaz\IFactoryDao.php';
require_once realpath("../..").'\dto\Usuarios.php';
require_once realpath("../..").'\dao\interfaz\IUsuariosDao.php';

class UsuariosController {

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
   * Crea un objeto Usuarios a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param correo
   * @param nombre
   * @param password
   */
  public static function insert( $correo,  $nombre,  $password){
      $usuarios = new Usuarios();
      $usuarios->setCorreo($correo); 
      $usuarios->setNombre($nombre); 
      $usuarios->setPassword($password); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $rtn = $usuariosDao->insert($usuarios);
     $usuariosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Usuarios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param correo
   * @return El objeto en base de datos o Null
   */
  public static function select($correo){
      $usuarios = new Usuarios();
      $usuarios->setCorreo($correo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $result = $usuariosDao->select($usuarios);
     $usuariosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Usuarios  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param correo
   * @param nombre
   * @param password
   */
  public static function update($correo, $nombre, $password){
      $usuarios = self::select($correo);
      $usuarios->setNombre($nombre); 
      $usuarios->setPassword($password); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $usuariosDao->update($usuarios);
     $usuariosDao->close();
  }

  /**
   * Elimina un objeto Usuarios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param correo
   */
  public static function delete($correo){
      $usuarios = new Usuarios();
      $usuarios->setCorreo($correo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $usuariosDao->delete($usuarios);
     $usuariosDao->close();
  }

  /**
   * Lista todos los objetos Usuarios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Usuarios en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $result = $usuariosDao->listAll();
     $usuariosDao->close();
     return $result;
  }

  /**
   * Selecciona un objeto Usuarios de la base de datos a partir de los atributos de inicio de sesión.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param correo
   * @param password
   * @return El objeto en base de datos o Null
   */
  public static function login($correo, $password){
      $usuarios = new Usuarios();
      $usuarios->setCorreo($correo); 
      $usuarios->setPassword($password); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuariosDao =$FactoryDao->getusuariosDao(self::getDataBaseDefault());
     $result = $usuariosDao->login($usuarios);
     $usuariosDao->close();
     return $result;
  }


}
//That´s all folks!