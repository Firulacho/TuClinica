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

$(".DT").DataTable({

    "language":{
        "sSearch"       : "Buscar:",
        "sEmpty"        : "No hay datos en la Tabla",
        "sZeroRecords"  : "No se encontraron coincidencias",
        "sInfo"         : "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
        "sInfoEmpty"    : "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered" : "(Filtrando de un total de _MAX_ registros)",
        "oPaginate"     :{
            "sFirst"    :"Primero",
            "sLast"     :"Último",
            "sNext"     :"Siguiente",
            "sPrevious" :"Anterios"

        },
    "sLoadingRecords"   :"Cargando...",
    "sLengthMenu"       :"Mostrar _MENU_ registros"

    }


})