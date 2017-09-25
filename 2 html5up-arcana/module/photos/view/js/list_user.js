function load_users() {
    var jqxhr = $.get("module/photos/controller/controller_photos.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        console.log(json);
        pintar_user(json);
        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });
    jqxhr.always(function () {
        //alert( "second finished" );
    });
}

$(document).ready(function () {
    load_users();
});

function pintar_user(data) {


/*  document.getElementById("formato").innerHTML = "Formato: "

  for(var i =0;i < data.user.formato.length;i++){
alert(data.user.formato[i]);
    document.getElementById("formato").innerHTML = document.getElementById("formato").innerHTML + data.user.formato[i] ;

  }*/
  document.getElementById("link").innerHTML = "Link: " + data.user.link;
  document.getElementById("imgnombre").innerHTML = "Nombre de la imagen: " + data.user.imgnombre ;
  document.getElementById("descr").innerHTML = "Descripcion: " + data.user.descr ;
//  document.getElementById("formato").innerHTML = "Formato: " + data.user.formato;
  document.getElementById("tipo").innerHTML = "Tipo: " + data.user.tipo;
  document.getElementById("location").innerHTML = "Localizacion: " + data.user.loc;
  document.getElementById("avatar").src=data.user.avatar;
  document.getElementById("formato").innerHTML = "Formato: ";
  for(var i =0;i < data.user.formato.length;i++){
  document.getElementById("formato").innerHTML += " - "+data.user.formato[i];
    }

  /*  var content = document.getElementById("content");
    var div_user = document.createElement("div");
    var parrafo = document.createElement("p");

    var link = document.createElement("div");
    link.innerHTML = "link = ";
    link.innerHTML += data.user.link;

    var imgnombre = document.createElement("div");
    imgnombre.innerHTML = "imgnombre = ";
    imgnombre.innerHTML += data.user.imgnombre;

    var descr = document.createElement("div");
    descr.innerHTML = "descr = ";
    descr.innerHTML += data.user.descr;


    //arreglar ruta IMATGE!!!!!

    var cad = data.user.avatar;
    //console.log(cad);
    //var cad = cad.toLowerCase();
    var img = document.createElement("div");
    var html = '<img src="' + cad + '" height="75" width="75"> ';
    img.innerHTML = html;
    //alert(html);

    div_user.appendChild(parrafo);
    parrafo.appendChild(link);
    parrafo.appendChild(imgnombre);
    parrafo.appendChild(descr);*/
}
