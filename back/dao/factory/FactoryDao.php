<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

include_once realpath('../..').'\dao\Conexion\Conexion.php';
include_once realpath('../..').'\dao\interfaz\IFactoryDao.php';

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de FondoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FondoDao
     */
     public function getFondoDao($dbName){
        return new FondoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MonedaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MonedaDao
     */
     public function getMonedaDao($dbName){
        return new MonedaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MovimientoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MovimientoDao
     */
     public function getMovimientoDao($dbName){
        return new MovimientoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuariosDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuariosDao
     */
     public function getUsuariosDao($dbName){
        return new UsuariosDao($this->conn->obtener($dbName));
    }

}
//That´s all folks!