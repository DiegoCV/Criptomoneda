<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ?~ ?? ?°)  \\

include_once realpath('../..').'\dao\interfaz\IMonedaDao.php';
include_once realpath('../..').'\dto\Moneda.php';

class MonedaDao implements IMonedaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Moneda en la base de datos.
     * @param moneda objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($moneda){
      $simbolo=$moneda->getSimbolo();
$valor=$moneda->getValor();

      try {
          $sql= "INSERT INTO `moneda`( `simbolo`, `Valor`)"
          ."VALUES ('$simbolo','$valor')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Moneda en la base de datos.
     * @param moneda objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($moneda){
      $simbolo=$moneda->getSimbolo();

      try {
          $sql= "SELECT `simbolo`, `Valor`"
          ."FROM `moneda`"
          ."WHERE `simbolo`='$simbolo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $moneda->setSimbolo($data[$i]['simbolo']);
          $moneda->setValor($data[$i]['Valor']);

          }
      return $moneda;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Moneda en la base de datos.
     * @param moneda objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($moneda){
      $simbolo=$moneda->getSimbolo();
$valor=$moneda->getValor();

      try {
          $sql= "UPDATE `moneda` SET`simbolo`='$simbolo' ,`Valor`='$valor' WHERE `simbolo`='$simbolo'";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Moneda en la base de datos.
     * @param moneda objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($moneda){
      $simbolo=$moneda->getSimbolo();

      try {
          $sql ="DELETE FROM `moneda` WHERE `simbolo`='$simbolo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Moneda en la base de datos.
     * @return ArrayList<Moneda> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `simbolo`, `Valor`"
          ."FROM `moneda`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $moneda= new Moneda();
          $moneda->setSimbolo($data[$i]['simbolo']);
          $moneda->setValor($data[$i]['Valor']);

          array_push($lista,$moneda);
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