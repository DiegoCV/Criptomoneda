<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Un tequila, antes de que empiecen los trancazos  \\


interface IMovimientoDao {

    /**
     * Guarda un objeto Movimiento en la base de datos.
     * @param movimiento objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($movimiento);
    /**
     * Modifica un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($movimiento);
    /**
     * Elimina un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($movimiento);
    /**
     * Busca un objeto Movimiento en la base de datos.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($movimiento);
    /**
     * Lista todos los objetos Movimiento en la base de datos.
     * @return Array<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Lista todos los objetos Movimiento en la base de datos que coincidan con la llave primaria.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuario($movimiento);
    /**
     * Lista todos los objetos Movimiento en la base de datos que coincidan con la llave primaria.
     * @param movimiento objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Movimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByMoneda($movimiento);
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!