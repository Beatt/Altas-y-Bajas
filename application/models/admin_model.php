<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	/**
	 * Objetivo: Obtener una consulta
	 * Nota: Se obtiene una consulta de estatus 0 ó 1
	 * de forma ordenada por los clientes que se atenderan
	 * primero.
	 * @name getQuery
	 * @access public
	 * @return String
	 * @param tabla String, estatus int
	 */
	public function getQuery($tabla, $estatus) {
		if ($estatus == 1)
			return $this -> db -> query("SELECT * FROM $tabla WHERE estatus BETWEEN 1 AND 3 ORDER by bandera ASC");
		else
			return $this -> db -> query("SELECT * FROM $tabla WHERE estatus = 0 ORDER by bandera ASC");
	}//Fin getQuery

	/**
	 * 	Objetivo: Actualiza la base de datos del cliente.
	 * 	Nota: A los Contratados se les asiganara 0
	 *  y a los Despedidos 1.
	 *  La bandera se utiliza para llevar un orden en el cual van
	 *  hacer atendidos los clientes.
	 * @name actualizarDatos
	 * @access public
	 * @return not
	 * @param not param
	 */
	public function actualizarDatos() {
		$cadena = json_decode($_POST['cadena']);
		//Devuelve una subcadena, divida gracias a un delimitador
		$cadenas = explode('/', $cadena);
		//cuenta elementos de una array
		$nro_cadenas = count($cadenas);
		$i = 0;
		$contador = 1;
		$objeto;
		while ($i < $nro_cadenas) {
			$elementos = explode(',', $cadenas[$i]);
			$nro_elementos = count($elementos);
			$j = 0;
			while ($j < $nro_elementos) {
				if ($elementos[$j] != "") {
					switch($i) {
						case 0 :
							$this -> db -> query("UPDATE cliente SET estatus = 0, bandera = $contador WHERE nombre = '$elementos[$j]' ");
							break;
						case 1 :
							$objeto = $this -> db -> query("SELECT * from cliente where nombre = '$elementos[$j]' ");
							if ($objeto -> row() -> estatus > 1)
								$this -> db -> query("UPDATE cliente SET bandera = $contador WHERE nombre = '$elementos[$j]' ");
							else
								$this -> db -> query("UPDATE cliente SET estatus = 1, bandera = $contador WHERE nombre = '$elementos[$j]' ");
							break;
					}
					$contador++;
				}

				$j++;
			}
			$i++;
		}

	}//Fin actualizarDatos

}//Fin class Admin_Model
