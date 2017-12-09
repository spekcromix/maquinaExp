$(document).ready( function() {
	$(".mb").click(function(){
		$(".dinero").toggle("fast");
	})
	$("#vali").change(function() {


	var int = new RegExp("^[A-E]{1}[1-5]{1}$");
	var datos = Array();
		datos= $("#vali").val();
		
		if ((datos.match(int))) {
			alert("Bien");
			for(var i in datos) {
			console.log(datos[i]);
		}
		}else {
			alert("Error");
		}
		})
	$(".din").click(function(){
		$(this).addClass("selected");
		var credit = $(this).attr("cantidadD");
		var numeroD = $(this).attr("numeroD");
		$(".d").html("$"+credit+"<br>Elige el codigo del producto!");

		$(".prod").attr("numeroD",numeroD);
		$(".inCoin").attr("credito",credit);
	})

		var arrayCodigos = [];
	$(".cod").click(function(){
		var codigo = $(this).html();

		for(var i = 0; i < codigo.length; i++){

			arrayCodigos.push(codigo[i]);
			
			var lista =arrayCodigos.toString().replace(new RegExp(',', 'g'),"");
			console.log("lista", lista);
			$("#vali").val(lista);
			
		}
		var producto = $(".prod");
		var credito = 0;
		for(var i = 0; i < producto.length; i++){
			var codigo = $(producto[i]).attr("codigoP");
			var productoArray = $(producto[i]).attr("precioP");
			if($(".inCoin").attr("credito")){
				credito = $(".inCoin").attr("credito");
				nMonedas = $(".prod").attr("numeroD");
				idD = $(".prod").attr("numeroD");
				if($(".c").html()==$(producto[i]).attr("codigoP")){

					var idProducto = $(producto[i]).attr("idProducto");
					var precio = $(producto[i]).attr("precioP");
					var cambio = credito-precio;
					var stock = $(producto[i]).attr("stockP");
					var stockA = stock-1;
					var codigo = $(producto[i]).attr("codigoP");
					var imagen = $(producto[i]).attr("src");
					$(".reProduct").append("<img src='"+imagen+"'>");
					var datos = new FormData();
					datos.append("idProducto", idProducto);
					datos.append("stockA", stockA);
					datos.append("codigo", codigo);
					$.ajax({
						url: "ajax/maquina.ajax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
					    success:function(respuesta){
					    	console.log("respuesta", respuesta);
					    	$(".cam").html(cambio);
					    	
					    }

					})
					myFunction();
					function myFunction() {
					    setInterval(alertFunc, 3000);
					}

					function alertFunc() {
					  window.location.href = "index.php";
					}
				}
			}
			
		}
		
	})

	jQuery(document).on('submit','#formL',function(event){
		event.preventDefault();
		jQuery.ajax({
			url: 'models/usuario.model.php',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function(){
				$('.btnL').val('Validando...');
			}
		})
		.done(function(respuesta) {
			console.log(respuesta);
			window.location.href = "index.php";
		})
		.fail(function(resp) {
			console.log(resp.responseText);
		})
		.always(function() {
			console.log("complete");
		});
	});
})