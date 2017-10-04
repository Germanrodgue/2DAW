function load_photo() {
  var jqxhr = $.get("module/photos_frontend/controller/controller_photos.class.php?load=true", function (data) {

    var json = JSON.parse(data);

    pintar_photo(json)

  })
}

$(document).ready(function () {

  load_photo();



});
$(window).scroll(function () {

  /*var position = $(window).scrollTop();
  var bottom =  $(window).height() - $(document).height();

  if( position == bottom ){*/ //funciona pero del reves



  //if( ($(window).scrollTop() + $(window).height() == $(document).height()   )) { problemes al mostrar els datos



  var val = $('#list').attr('value');
  alert(val);
  $.post('module/photos_frontend/controller/controller_photos.class.php?getresult=true', {

    getresult: val

  }, function (response) {

    var json = JSON.parse(response);
    var ul = document.getElementById("list");
    pintar_photo(json);
    $("#list").attr('value', Number(val) + 2);




  });


});

function pintar_photo(data) {




  var ul = document.getElementById("list");


  for (var i = 0; i < data.length; i++) {


    var element = document.createElement("img");
    var button = document.createElement("button");
    var li = document.createElement("li");
    var p = document.createElement("p");
    button.setAttribute("id", data[i].id);
    p.innerHTML = '<img height="125" src=' + data[i].avatar + '></img>';
    li.appendChild(p);
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
      $.post('module/photos_frontend/controller/controller_photos.class.php?load_details=true', {

        details_id: id_button
      }, function (response) {
        var json_re = JSON.parse(response);
        window.location.href = json_re.redirect;

        console.log(); //para debuguear
        //}); //para debuguear
        //}, "json").fail(function (xhr) {

      });
    };
  }
}