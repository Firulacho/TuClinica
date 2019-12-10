$(".DT").on("click", ".EditarProfesional", function(){

    var Pid = $(this).attr("Pid");
    var datos = new FormData();

    datos.append("Pid", Pid);

    $.ajax({

        url: "Ajax/profesionalesA.php",
        method:"POST", 
        data: datos,
        dataType: "json",
        contentType: false,
        cache: false,
        processData:false,

        success: function(resultado){

            $("#Pid").val(resultado["id"]);
            $("#apellidoEditar").val(resultado["apellido"]);
            $("#nombreEditar").val(resultado["nombre"]);
            $("#usuarioEditar").val(resultado["usuario"]);
            $("#claveEditar").val(resultado["clave"]);
            
            $("#sexoEditar").html(resultado["sexo"]);
            $("#sexoEditar").val(resultado["sexo"]);
            
        }

    })


})

$(".DT").on("click", ".EliminarProfesional", function(){

    var Pid = $(this).attr("Pid");
    var imgP = $(this).attr("imgP");

    window.location = "index.php?url=profesionales&Pid="+Pid+"&imgP="+imgP;

})