<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

include_once realpath('../..').'\dao\interfaz\IMovimientoDao.php';
include_once realpath('../..').'\dto\Movimiento.php';
include_once realpath('../..').'\dto\Usuarios.php';
include_once realpath('../..').'\dto\Moneda.php';

class MovimientoDao implements IMovimientoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Movimiento en la base de datos.
     * @param movimiento objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($movimiento){
      $usuario=$movimiento->getUsuario()->getCorreo();
$moneda=$movimiento->getMoneda()->getSimbolo();
$cerrado=$movimiento->getCerrado();
$pCompra=$movimiento->getPCompra();
$pVenta=$movimiento->getPVenta();
$cantidad=$movimiento->getCantidad();
$fecha=$movimiento->getFecha();

      try {
          $sql= "INSERT INTO `movimiento`( `usuario`, `moneda`, `cerrado`, `pCompra`, `pVenta`, `cantidad`, `fecha`)"
          ."VALUES ('$usuario','$moneda','$cerrado','$pCompra','$pVenta','$cantidad','$fecha')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($movimiento){
      $usuario=$movimiento->getUsuario()->getCorreo();
$moneda=$movimiento->getMoneda()->getSimbolo();

      try {
          $sql= "SELECT `usuario`, `moneda`, `cerrado`, `pCompra`, `pVenta`, `cantidad`, `fecha`"
          ."FROM `movimiento`"
          ."WHERE `usuario`='$usuario' AND`moneda`='$moneda'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuario']);
           $movimiento->setUsuario($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $movimiento->setMoneda($moneda);
          $movimiento->setCerrado($data[$i]['cerrado']);
          $movimiento->setPCompra($data[$i]['pCompra']);
          $movimiento->setPVenta($data[$i]['pVenta']);
          $movimiento->setCantidad($data[$i]['cantidad']);
          $movimiento->setFecha($data[$i]['fecha']);

          }
      return $movimiento;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($movimiento){
      $usuario=$movimiento->getUsuario()->getCorreo();
$moneda=$movimiento->getMoneda()->getSimbolo();
$cerrado=$movimiento->getCerrado();
$pCompra=$movimiento->getPCompra();
$pVenta=$movimiento->getPVenta();
$cantidad=$movimiento->getCantidad();
$fecha=$movimiento->getFecha();

      try {
          $sql= "UPDATE `movimiento` SET`usuario`='$usuario' ,`moneda`='$moneda' ,`cerrado`='$cerrado' ,`pCompra`='$pCompra' ,`pVenta`='$pVenta' ,`cantidad`='$cantidad' ,`fecha`='$fecha' WHERE `usuario`='$usuario' ,`moneda`='$moneda'";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($movimiento){
      $usuario=$movimiento->getUsuario()->getCorreo();
$moneda=$movimiento->getMoneda()->getSimbolo();

      try {
          $sql ="DELETE FROM `movimiento` WHERE `usuario`='$usuario' AND`moneda`='$moneda'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Movimiento en la base de datos.
     * @return ArrayList<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `usuario`, `moneda`, `cerrado`, `pCompra`, `pVenta`, `cantidad`, `fecha`"
          ."FROM `movimiento`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $movimiento= new Movimiento();
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuario']);
           $movimiento->setUsuario($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $movimiento->setMoneda($moneda);
          $movimiento->setCerrado($data[$i]['cerrado']);
          $movimiento->setPCompra($data[$i]['pCompra']);
          $movimiento->setPVenta($data[$i]['pVenta']);
          $movimiento->setCantidad($data[$i]['cantidad']);
          $movimiento->setFecha($data[$i]['fecha']);

          array_push($lista,$movimiento);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuario($movimiento){
      $lista = array();
      $usuario=$movimiento->getUsuario()->getCorreo();

      try {
          $sql ="SELECT `usuario`, `moneda`, `cerrado`, `pCompra`, `pVenta`, `cantidad`, `fecha`"
          ."FROM `movimiento`"
          ."WHERE `usuario`='$usuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuario']);
           $movimiento->setUsuario($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $movimiento->setMoneda($moneda);
          $movimiento->setCerrado($data[$i]['cerrado']);
          $movimiento->setPCompra($data[$i]['pCompra']);
          $movimiento->setPVenta($data[$i]['pVenta']);
          $movimiento->setCantidad($data[$i]['cantidad']);
          $movimiento->setFecha($data[$i]['fecha']);

          array_push($lista,$movimiento);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByMoneda($movimiento){
      $lista = array();
      $moneda=$movimiento->getMoneda()->getSimbolo();

      try {
          $sql ="SELECT `usuario`, `moneda`, `cerrado`, `pCompra`, `pVenta`, `cantidad`, `fecha`"
          ."FROM `movimiento`"
          ."WHERE `moneda`='$moneda'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuarios = new Usuarios();
           $usuarios->setCorreo($data[$i]['usuario']);
           $movimiento->setUsuario($usuarios);
           $moneda = new Moneda();
           $moneda->setSimbolo($data[$i]['moneda']);
           $movimiento->setMoneda($moneda);
          $movimiento->setCerrado($data[$i]['cerrado']);
          $movimiento->setPCompra($data[$i]['pCompra']);
          $movimiento->setPVenta($data[$i]['pVenta']);
          $movimiento->setCantidad($data[$i]['cantidad']);
          $movimiento->setFecha($data[$i]['fecha']);

          array_push($lista,$movimiento);
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