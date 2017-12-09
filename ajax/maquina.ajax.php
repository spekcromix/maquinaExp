<?php

require_once "../controllers/maquina.controller.php";
require_once "../models/maquina.model.php";

class AjaxProducto{

	public $idProducto;
	public $stockA;
	public $codigo;

	public function ajaxActualizarProducto(){

		$datos = array("id"=>$this->idProducto,"stock"=>$this->stockA,"codigo"=>$this->codigo);

		$respuesta = ControllerMaquina::ctrActualizarProducto($datos, "productos");


		echo json_encode($respuesta);


	}


}

if(isset($_POST["idProducto"])) {
$vista = new AjaxProducto();
$vista -> idProducto = $_POST["idProducto"];
$vista -> stockA = $_POST["stockA"];
$vista -> codigo = $_POST["codigo"];
$vista -> ajaxActualizarProducto();
}
