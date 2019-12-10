$(".DT").on("click", ".EliminarPaciente", function(){

    var PAid = $(this).attr("PAid");
    var imgPA = $(this).attr("imgPA");

    window.location = "index.php?url=pacientes&PAid="+PAid+"&imgPA="+imgPA;

})


$(".DT").on("click", ".EditarPaciente", function(){

    var PAid = $(this).attr("PAid");
    var datos = new FormData();

    datos.append("PAid", PAid);

    $.ajax({

        url: "Ajax/pacientesA.php",
        method:"POST", 
        data: datos,
        dataType: "json",
        contentType: false,
        cache: false,
        processData:false,

        success: function(resultado){

            $("#PAid").val(resultado["id"]);
            $("#apellidoEditar").val(resultado["apellido"]);
            $("#nombreEditar").val(resultado["nombre"]);
            $("#rutEditar").val(resultado["rut"]);
            $("#usuarioEditar").val(resultado["usuario"]);
            $("#claveEditar").val(resultado["clave"]);
           
        }

    })


})

$("#usuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				$("#usuario").parent().after('<div class="alert alert-danger">El Usuario ya existe.</div>');

				$("#usuario").val("");

			}

		}

	})

})


$("#usuarioEditar").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				$("#usuarioEditar").parent().after('<div class="alert alert-danger">El Usuario ya existe.</div>');

				$("#usuarioEditar").val("");

			}

		}

	})

})








