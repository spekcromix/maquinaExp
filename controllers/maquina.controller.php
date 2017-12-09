<?php

class ControllerMaquina{
	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	public function ctrMostrarProductos(){

		$tabla = "productos";

		$respuesta = ModelMaquina::mdlMostrarProductos($tabla);

		return $respuesta;

	}

	static public function ctrActualizarProducto($datos){

		$tabla = "productos";

		$respuesta = ModelMaquina::mdlActualizarProducto($datos,"productos");

		return $respuesta;

	}
}