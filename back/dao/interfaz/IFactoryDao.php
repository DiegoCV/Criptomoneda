<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\

include_once realpath('../..').'\dao\entities\FondoDao.php';
include_once realpath('../..').'\dao\entities\MonedaDao.php';
include_once realpath('../..').'\dao\entities\MovimientoDao.php';
include_once realpath('../..').'\dao\entities\UsuariosDao.php';


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de FondoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FondoDao
     */
     public function getFondoDao($dbName);
     /**
     * Devuelve una instancia de MonedaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MonedaDao
     */
     public function getMonedaDao($dbName);
     /**
     * Devuelve una instancia de MovimientoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MovimientoDao
     */
     public function getMovimientoDao($dbName);
     /**
     * Devuelve una instancia de UsuariosDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuariosDao
     */
     public function getUsuariosDao($dbName);

}
//That´s all folks!