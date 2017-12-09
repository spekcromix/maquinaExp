<?php

require_once "../controllers/maquina.controller.php";
require_once "../models/maquina.model.php";

class AjaxDinero{

	public $credito;
	public $id;
	public $codigo;

	public function ajaxActualizarDinero(){

		$datos = array("id"=>$this->id,"credito"=>$this->credito);

		$respuesta = ControllerDinero::ctrActualizarDinero($datos);


		echo $respuesta;


	}


}

if(isset($_POST["credito"])) {
$vista = new AjaxDinero();
$vista -> id = $_POST["id"];
$vista -> credito = $_POST["credito"];
$vista -> ajaxActualizarDinero();
}
