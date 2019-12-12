$(".DT").on("click", ".EliminarRecepcionista", function(){

    var Rid = $(this).attr("Rid");
    var imgR = $(this).attr("imgR");

    window.location = "index.php?url=recepcionistas&Rid="+Rid+"&imgR="+imgR;

})