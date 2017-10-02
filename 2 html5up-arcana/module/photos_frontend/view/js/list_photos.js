
function load_photo() {
    var jqxhr = $.get("module/photos_frontend/controller/controller_photos.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        
        pintar_photo(json)
   
    })
}

$(document).ready(function () {

load_photo();
   


});



function pintar_photo(data) {
    //alert(typeof(data));
    
    /*  document.getElementById("formato").innerHTML = "Formato: "
    
      for(var i =0;i < data.user.formato.length;i++){
    alert(data.user.formato[i]);
        document.getElementById("formato").innerHTML = document.getElementById("formato").innerHTML + data.user.formato[i] ;
    
      }*/
      var ul = document.getElementById("list");
      
      
      var cont=0;
      for(var i=0;i < data.length;i++){
        var av = "avatar"+cont;
        var element = document.createElement("img");
        var li = document.createElement("li");
        var p = document.createElement("p");
        //element.setAttribute("id", "avatar"+cont);
       // element.setAttribute("height", "125");
       // element.src=data[i].avatar;
        p.innerHTML = '<img height="125" src=' + data[i].avatar + '></img>';
        li.appendChild(p);
       
        ul.appendChild(li);
        
        
        //document.getElementById("link").innerHTML = "Nombre: " + data[i].imgnombre;
          cont++;
          }
          
     
      /*document.getElementById("imgnombre").innerHTML = "Nombre de la imagen: " + data.user.imgnombre ;
      document.getElementById("fecha").innerHTML = "Fecha: " + data.user.fecha ;
      document.getElementById("descr").innerHTML = "Descripcion: " + data.user.descr ;
    //  document.getElementById("formato").innerHTML = "Formato: " + data.user.formato;
      document.getElementById("tipo").innerHTML = "Tipo: " + data.user.tipo;
      document.getElementById("location").innerHTML = "Localizacion: " + data.user.loc;
      document.getElementById("avatar").src=data.user.avatar;
      document.getElementById("formato").innerHTML = "Formato: ";
      for(var i =0;i < data.user.formato.length;i++){
      document.getElementById("formato").innerHTML += " - "+data.user.formato[i];
        }
      document.getElementById("paises").innerHTML = "Pais: " + data.user.pais;
      document.getElementById("provincias").innerHTML = "Provincia: " + data.user.provincia ;
      document.getElementById("ciudades").innerHTML = "Ciudad: " + data.user.ciudad ;*/
    
    
    }
    