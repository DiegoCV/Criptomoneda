<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Para entender la recursividad, primero debes entender la recursividad  \\

include_once realpath('../..').'\dao\interfaz\IUsuariosDao.php';
include_once realpath('../..').'\dto\Usuarios.php';

class UsuariosDao implements IUsuariosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Usuarios en la base de datos.
     * @param usuarios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuarios){
      $correo=$usuarios->getCorreo();
$nombre=$usuarios->getNombre();
$password=$usuarios->getPassword();

      try {
          $sql= "INSERT INTO `usuarios`( `Correo`, `Nombre`, `Password`)"
          ."VALUES ('$correo','$nombre','$password')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuarios){
      $correo=$usuarios->getCorreo();

      try {
          $sql= "SELECT `Correo`, `Nombre`, `Password`"
          ."FROM `usuarios`"
          ."WHERE `Correo`='$correo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuarios->setCorreo($data[$i]['Correo']);
          $usuarios->setNombre($data[$i]['Nombre']);
          $usuarios->setPassword($data[$i]['Password']);

          }
      return $usuarios;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuarios){
      $correo=$usuarios->getCorreo();
$nombre=$usuarios->getNombre();
$password=$usuarios->getPassword();

      try {
          $sql= "UPDATE `usuarios` SET`Correo`='$correo' ,`Nombre`='$nombre' ,`Password`='$password' WHERE `Correo`='$correo'";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuarios){
      $correo=$usuarios->getCorreo();

      try {
          $sql ="DELETE FROM `usuarios` WHERE `Correo`='$correo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuarios en la base de datos.
     * @return ArrayList<Usuarios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `Correo`, `Nombre`, `Password`"
          ."FROM `usuarios`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuarios= new Usuarios();
          $usuarios->setCorreo($data[$i]['Correo']);
          $usuarios->setNombre($data[$i]['Nombre']);
          $usuarios->setPassword($data[$i]['Password']);

          array_push($lista,$usuarios);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Usuarios en la base de datos.
     * @param usuarios objeto con los atributos de inicio de sesión
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function login($usuarios){
      $correo=$usuarios->getCorreo();
$password=$usuarios->getPassword();

      $usuarios = new Usuarios();
      try {
          $sql= "SELECT `Correo`, `Nombre`, `Password`"
          ."FROM `usuarios`"
          ."WHERE `Correo`='$correo' AND`Password`='$password'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuarios->setCorreo($data[$i]['Correo']);
          $usuarios->setNombre($data[$i]['Nombre']);
          $usuarios->setPassword($data[$i]['Password']);

      return $usuarios;
          }
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!