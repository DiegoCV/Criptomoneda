<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\


interface IFondoDao {

    /**
     * Guarda un objeto Fondo en la base de datos.
     * @param fondo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fondo);
    /**
     * Modifica un objeto Fondo en la base de datos.
     * @param fondo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fondo);
    /**
     * Elimina un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fondo);
    /**
     * Busca un objeto Fondo en la base de datos.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fondo);
    /**
     * Lista todos los objetos Fondo en la base de datos.
     * @return Array<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Lista todos los objetos Fondo en la base de datos que coincidan con la llave primaria.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuarios($fondo);
    /**
     * Lista todos los objetos Fondo en la base de datos que coincidan con la llave primaria.
     * @param fondo objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Fondo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByMoneda($fondo);
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!