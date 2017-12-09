<?php

class ControllerDinero{
	public function ctrMostrarDinero(){

		$tabla = "dinero";

		$respuesta = ModelDinero::mdlMostrarDinero($tabla);

		return $respuesta;

	}

	static public function ctrActualizarDinero($datos){

		$respuesta = ModelDinero::mdlActualizarDinero("dinero",$datos);

		return $respuesta;

	}
}