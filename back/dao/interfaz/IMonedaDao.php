<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\


interface IMonedaDao {

    /**
     * Guarda un objeto Moneda en la base de datos.
     * @param moneda objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($moneda);
    /**
     * Modifica un objeto Moneda en la base de datos.
     * @param moneda objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($moneda);
    /**
     * Elimina un objeto Moneda en la base de datos.
     * @param moneda objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($moneda);
    /**
     * Busca un objeto Moneda en la base de datos.
     * @param moneda objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($moneda);
    /**
     * Lista todos los objetos Moneda en la base de datos.
     * @return Array<Moneda> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!