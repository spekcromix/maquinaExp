<?php

require_once "conexion.php";

class ModelMaquina{
	/*=============================================
	MOSTRAR SUB-CATEGORÍAS
	=============================================*/

	static public function mdlMostrarProductos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlActualizarProducto($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock WHERE codigo = :codigo AND id = :id");

		$stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}
}