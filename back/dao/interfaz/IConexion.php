<?php
/*
              -------Creado por-------
             \(°u° )/ Anarchy \( °u°)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\

interface IConexion {

    /**     
     * Crea una conexión si no se ha establecido antes; en caso contrario, devuelve la ya existente
     * @param dbName Nombre de la base de datos que se desea conectar.
     * @return Conexión a base de datos dependiente del gestor en uso
     */
     public function obtener($dbName);
     /**
     * Cierra la conexión a la base de datos
     */
     public function cerrar();

}
//That´s all folks!