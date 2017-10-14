function load_photo() {
  //var jqxhr = $.get("module/photos_frontend/controller/controller_photos.class.php?load=true", function (data) {
  var jqxhr = $.post("../../photosfrontend/load",{load:true},
   function (data) {
    var json = JSON.parse(data);

    pintar_photo(json)

  })
}

$(document).ready(function () {

  load_photo();

});
var timeout;
$(window).scroll(function () {

  var value = true;

  clearTimeout(timeout);
  timeout = setTimeout(function () {
    if ($(window).scrollTop() + $(window).height() + 2 >= $(document).height()) {


      var val = $('#list').attr('value');
      vals = Number(val);

      $.post('../../photosfrontend/get_result/',{getresult:vals},
      function (response) {
        var json = JSON.parse(response);

        pintar_photo(json);
        vali = $('#list').attr('value');
        valis = Number(vali) + 5;
        $("#list").attr('value', valis);
      });
      value = false;


    }
  }, 50);



});





function pintar_photo(data) {

  var ul = document.getElementById("list");

  for (var i = 0; i < data.length; i++) {


    var element = document.createElement("img");
    var button = document.createElement("button");
    var li = document.createElement("li");
    var p = document.createElement("p");
    var p2 = document.createElement("p");
    p2.innerHTML = data[i].id;
    button.setAttribute("id", data[i].id);
    p.innerHTML = '<img height="125" src=../../' + data[i].avatar + '></img>';
    li.appendChild(p);
    li.appendChild(p2);
    li.appendChild(button);
    ul.appendChild(li);

  }

  details();


}


function details() {

  var butt = document.getElementsByTagName('button');

  for (var i = 0; i < butt.length; i++) {
    butt[i].onclick = function (event) {
      id_button = event.target.id;
      var id_det = JSON.stringify(id_button);
      
      $.post('../../photosfrontend/load_details',{load_details: id_button},
       function (response) {
        var json_re = JSON.parse(response);
        
        window.location.href = json_re.redirect;

         //para debuguear
        //}); //para debuguear
        //}, "json").fail(function (xhr) {

      });
    };
  }
}