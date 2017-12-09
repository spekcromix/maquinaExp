<?php
try {
		require 'conexion.php';
		sleep(1);
		session_start();
		$statement = Conexion::conectar()->prepare("SELECT usuario,tipo,password FROM usuarios WHERE usuario='".$_POST['usuario']."' AND password ='".$_POST['password']."'");
		$statement->execute();
		   $result = $statement->fetchAll();
		   if($statement->rowCount() > 0) {
		     foreach($result as $row){
		     	
		      echo json_encode(array('error'=>false, 'tipo'=>$row['tipo']));
		      	$_SESSION['user']=$row;
		     }
		     if($row["tipo"]==1) {
		     		$statement2 = Conexion::conectar()->prepare("UPDATE productos SET stock = 15");
					$statement2->execute();
		     	}
		} else {
			echo json_encode(array('error'=> true));
		}
			
		$statement->closeCursor();
		$conexion = null;
	} catch (Exception $e) {
		echo "Error".$e->errorMessage();
	}