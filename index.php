<?php

require_once "controllers/maquina.controller.php";
require_once "controllers/dinero.controller.php"; 
require_once "models/maquina.model.php"; 
require_once "models/dinero.model.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maquina Expendedora</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  	<script src="views/js/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="views/css/main.css">
</head>
<body>
	<?php 
		$maquina = ControllerMaquina::ctrMostrarProductos();
		$dinero = ControllerDinero::ctrMostrarDinero();
		
	?>
	<div class="maquina">
		<div class="mBody">
			<?php
				foreach ($maquina as $key => $value) {
					echo '<img idProducto="'.$value["id"].'" class="prod" src="'.$value["imagen"].'" nombreP="'.$value["nombre"].'" precioP="'.$value["precio"].'" stockP="'.$value["stock"].'" codigoP="'.$value["codigo"].'"><span class="coP">'.$value["codigo"].' $'.$value["precio"].' | <strong class="badge">'.$value["stock"].'</strong></span>';
				}
			?>
			<div class="reca" data-toggle="modal" data-target="#myModal"></div><center><div class="reProduct"></div></center>
		</div>
		<div class="mSide">
			<div class="tablero">
				<p>Ingrese su dinero</p>
				<div class="d"></div>
				<div class="c"></div>
			</div>
			<div class="codigos">
				<div class="cod">A</div>
				<div class="cod">B</div>
				<div class="cod">C</div>
				<div class="cod">D</div>
				<div class="cod">E</div>

				<div class="cod">0</div>
				<div class="cod">1</div>
				<div class="cod">2</div>
				<div class="cod">3</div>
				<div class="cod">4</div>
				<div class="cod">5</div>
				<div class="cod">6</div>
				<div class="cod">7</div>
				<div class="cod">8</div>
				<div class="cod">9</div>
				<input type="text" id="vali" max="2">
			</div>
			<div class="inCoin"></div>
			<center><div class="cam"></div><div class="mb">$</div></center>
		
		</div>
	</div>
	<div class="dinero">
			<?php
				foreach ($dinero as $key => $value2) {
					echo '<img  class="din" src="'.$value2["img"].'" cantidadD="'.$value2["cantidad"].'" tipoD="'.$value2["tipo"].'" numeroD="'.$value2["numeroD"].'">';
				}
			?>
		</div>
	
	<script src="views/js/maquinaExp.js"></script>
</body>
</html>

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingresar Productos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="formL">
			  <div class="form-group">
			    <label for="usuario">Usuario:</label>
			    <input type="text" class="form-control" id="usuario" name="usuario">
			  </div>
			  <div class="form-group">
			    <label for="password">Contraseña:</label>
			    <input type="password" class="form-control" id="password" name="password">
			  </div>
			  <button type="submit" class="btn btn-primary">Enviar</button>
			</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>