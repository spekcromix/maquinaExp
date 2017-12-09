<?php

require_once "conexion.php";

class ModelDinero{
	static public function mdlMostrarDinero($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlActualizarDinero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroD = :numeroD WHERE cantidad = :cantidad AND id = :id");

		$stmt -> bindParam(":stock", $datos["credito"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
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