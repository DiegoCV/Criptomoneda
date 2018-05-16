<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\

include_once realpath('../..').'\dao\interfaz\IFondoDao.php';
include_once realpath('../..').'\dto\Fondo.php';
include_once realpath('../..').'\dto\Usuarios.php';
include_once realpath('../..').'\dto\Moneda.php';

class FondoDao implements IFondoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fondo en la base de datos.
     * @param fondo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fondo){
      $usuarios=$fondo->getUsuarios()->getCorreo();
$moneda=$fondo->getMoneda()->getSimbolo();
$cant=$fondo->getCant();

      try {
          $sql= "INSERT INTO `fondo`( `usuarios`, `moneda`, `cant`)"
          ."VALUES ('$usuarios','$moneda','$cant')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fondo){
      $usuarios=$fondo->getUsuarios()->getCorreo();
$moneda=$fondo->getMoneda()->getSimbolo();

      try {
          $sql= "SELECT `usuarios`, `moneda`, `cant`"
          ."FROM `fondo`"
          ."WHERE `usuarios`='$usuarios' AND`moneda`='$moneda'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuarios']);
           $fondo->setUsuarios($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $fondo->setMoneda($moneda);
          $fondo->setCant($data[$i]['cant']);

          }
      return $fondo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fondo en la base de datos.
     * @param fondo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fondo){
      $usuarios=$fondo->getUsuarios()->getCorreo();
$moneda=$fondo->getMoneda()->getSimbolo();
$cant=$fondo->getCant();

      try {
          $sql= "UPDATE `fondo` SET`usuarios`='$usuarios' ,`moneda`='$moneda' ,`cant`='$cant' WHERE `usuarios`='$usuarios' ,`moneda`='$moneda'";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fondo){
      $usuarios=$fondo->getUsuarios()->getCorreo();
$moneda=$fondo->getMoneda()->getSimbolo();

      try {
          $sql ="DELETE FROM `fondo` WHERE `usuarios`='$usuarios' AND`moneda`='$moneda'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fondo en la base de datos.
     * @return ArrayList<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `usuarios`, `moneda`, `cant`"
          ."FROM `fondo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fondo= new Fondo();
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuarios']);
           $fondo->setUsuarios($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $fondo->setMoneda($moneda);
          $fondo->setCant($data[$i]['cant']);

          array_push($lista,$fondo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuarios($fondo){
      $lista = array();
      $usuarios=$fondo->getUsuarios()->getCorreo();

      try {
          $sql ="SELECT `usuarios`, `moneda`, `cant`"
          ."FROM `fondo`"
          ."WHERE `usuarios`='$usuarios'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuarios']);
           $fondo->setUsuarios($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $fondo->setMoneda($moneda);
          $fondo->setCant($data[$i]['cant']);

          array_push($lista,$fondo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByMoneda($fondo){
      $lista = array();
      $moneda=$fondo->getMoneda()->getSimbolo();

      try {
          $sql ="SELECT `usuarios`, `moneda`, `cant`"
          ."FROM `fondo`"
          ."WHERE `moneda`='$moneda'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuarios']);
           $fondo->setUsuarios($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $fondo->setMoneda($moneda);
          $fondo->setCant($data[$i]['cant']);

          array_push($lista,$fondo);
          }
      return $lista;
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