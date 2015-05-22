    $(document).ready(function() {
		$("#btn-agregar").click(function() {
		var razon = $("input#razon").val();
		var cantidad = $("input#cantidad").val();
		var codigoproducto = $("input#codigoproducto").val();
		var fecha= $("input#fecha").val();
		var dataString = 'razon=' + razon + '&cantidad=' + cantidad +'&codigoproducto=' + codigoproducto+'&fecha='+fecha;
		$.ajax({
			type: "POST",
			url: "insertarregistro.php",
			data: dataString,
			success: function() {
					$("input#razon").val("");
					$("input#cantidad").val("");
					$("input#codigoproducto").val("");
					$("input#fecha").val("");
		    	$('#Exito').html("<div id='message'></div>");
		        $('#message').html("<h2>Tus datos han sido guardados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
				 $('#message').append("");
		        });
		    }
		});
		return false;
	   });
    
    	$("#btn-modificar").click(function() {
		var id = $("input#id").val();
		var razonbusqueda = $("input#razonbusqueda").val();
		var cantidadbusqueda = $("input#cantidadbusqueda").val();
		var codigoproductobusqueda = $("input#codigoproductobusqueda").val();
		var fechabusqueda= $("input#fechabusqueda").val();
            
        if ((razonbusqueda&&cantidadbusqueda&&codigoproductobusqueda&&fechabusqueda&&id)== "") {
            alert("Se debe buscar primero un registro");
			$("input#numero").focus();
			return false;
		}
		var dataString = 'id=' + id + '&razonbusqueda=' + razonbusqueda +'&cantidadbusqueda=' + cantidadbusqueda+ '&codigoproductobusqueda=' + codigoproductobusqueda+'&fechabusqueda='+fechabusqueda;
        
		$.ajax({
			type: "POST",
			url: "actualizarregistro.php",
			data: dataString,
			success: function() {
					$("input#id").val("");
					$("input#razonbusqueda").val("");
					$("input#cantidadbusqueda").val("");
					$("input#codigoproductobusqueda").val("");
					$("input#fechabusqueda").val("");
		    	$('#Exito1').html("<div id='message'></div>");
		        $('#message').html("<h2>Tus datos han sido actualizados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
				 $('#message').append("");
		        });
		    }
		});
		return false;
	});
});
