//Crear un plugin

jQuery.fn.fill_or_clean = function () {
    this.each(function () {


        if ($("#link").val() == "") {
            $("#link").val("Introduce un link");

            $("#link").focus(function () {
                if ($("#link").val("") == "Introduce un link") {
                    $("#link").val("");
                }
            });
        }
        $("#link").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#link").val() == "") {
                $("#link").val("Introduce un link");
            }
        });


        if ($("#imgnombre").val() == "") {
            $("#imgnombre").val("Introduce un nombre de imagen");

            $("#imgnombre").focus(function () {
                if ($("#imgnombre").val("") == "Introduce un nombre de imagen") {
                    $("#imgnombre").val("");
                }
            });
        }
        $("#imgnombre").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#imgnombre").val() == "") {
                $("#imgnombre").val("Introduce un nombre de imagen");
            }
        });


        if ($("#descr").val() == "") {
            $("#descr").val("Introduce una descripcion");

            $("#descr").focus(function () {
                if ($("#descr").val("") == "Introduce una descripcion") {
                    $("#descr").val("");
                }
            });
        }
        $("#descr").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#descr").val() == "") {
                $("#descr").val("Introduce una descripcion");
            }
        });


        if ($("#fecha").val() == "") {
            $("#fecha").val("Introduce una fecha");

            $("#fecha").focus(function () {
                if ($("#fecha").val("") == "Introduce una fecha") {
                    $("#fecha").val("");
                }
            });
        }
        $("#fecha").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#fecha").val() == "") {
                $("#fecha").val("Introduce una fecha");
            }
        });
    });
    return this;
}; //function
//Solution to : "Uncaught Error: Dropzone already attached."
Dropzone.autoDiscover = false;
$(document).ready(function () {


    //Datepicker///////////////////////////
    $('#fecha').datepicker({
        minDate: new Date(1900, 1 - 1, 1),
        maxDate: '-18Y',
        dateFormat: 'dd/mm/yy',
        defaultDate: new Date(1970, 1 - 1, 1),
        changeMonth: true,
        changeYear: true,
        yearRange: '-90:-18'

    });

    //Valida users /////////////////////////
    $('#submit_photo').click(function () {
        validate_photos();
    });

    //Control de seguridad para evitar que al volver atrás de la pantalla results a create, no nos imprima los datos
    $.get("module/photos/controller/controller_photos.class.php?load_data=true",
        function (response) {
            //alert(response.user);
            if (response.user === "") {
                $("#link").val('');
                $("#imgnombre").val('');
                $("#descr").val('');
                $("#fecha").val('');

                //siempre que creemos un plugin debemos llamarlo, sino no funcionará
                $(this).fill_or_clean();
            } else {
                $("#link").val(response.user.link);
                $("#imgnombre").val(response.user.imgnombre);
                $("#descr").val(response.user.descr);
            }
        }, "json");

    //Dropzone function //////////////////////////////////
    $("#dropzone").dropzone({
        url: "module/photos/controller/controller_photos.class.php?upload=true",
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "Ha ocurrido un error en el server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
        init: function () {
            this.on("success", function (file, response) {
                //alert(response);
                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({
                    'right': '300px'
                }, 300);
            });
        },
        complete: function (file) {
            //if(file.status == "success"){
            //alert("El archivo se ha subido correctamente: " + file.name);
            //}
        },
        error: function (file) {
            //alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "module/photos/controller/controller_photos.class.php?delete=true",
                data: "filename=" + name,
                success: function (data) {
                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    if (json.res === true) {
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element;
                        if ((element = file.previewElement) != null) {
                            element.parentNode.removeChild(file.previewElement);
                        } else {
                            false;
                        }
                    }
                }
            });
        }
    });

    load_countries_v1();
    
    $("#province").empty();
    $("#province").append('<option value="" selected="selected">Select province</option>');
    $("#province").prop('disabled', true);
    $("#city").empty();
    $("#city").append('<option value="" selected="selected">Select city</option>');
    $("#city").prop('disabled', true);

    $("#country").change(function() {
		var country = $(this).val();
		var province = $("#province");
		var city = $("#city");

		if(country !== 'ES'){
	         province.prop('disabled', true);
	         city.prop('disabled', true);
	         $("#province").empty();
		     $("#city").empty();
		}else{
	         province.prop('disabled', false);
	         city.prop('disabled', false);
	         load_provinces_v1();
		}//fi else
	});

	$("#province").change(function() {
		var prov = $(this).val();
		if(prov > 0){
			load_cities_v1(prov);
		}else{
			$("#city").prop('disabled', false);
		}
	});


});


function validate_photos() {
    var result = true;

    var link = document.getElementById('link').value;
    var imgnombre = document.getElementById('imgnombre').value;
    var descr = document.getElementById('descr').value;
    var fecha = document.getElementById('fecha').value;
    var tipo = document.getElementById('tipo').value;
    var location = document.getElementById('location').value;
    var formato = [];
    var formatos = document.getElementsByClassName('checkbox2');
    var j = 0;
    for (var i = 0; i < formatos.length; i++) {
        if (formatos[i].checked) {
            formato[j] = formatos[i].value;

            j++;
        }
    }
    var country = document.getElementById('country').value;
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    


    //Utilizamos las expresiones regulares para la validación de errores JS
    var descr_reg = /^[a-zA-Z ]*$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var imgname_reg = /^[A-Za-z]{3,8}$/;
    var link_reg = /^[A-Za-z]{2,30}$/;

    $(".error").remove();

    if ($("#link").val() == "" || $("#link").val() == "Introduce link") {
        $("#link").focus().after("<span class='error'>Introduce link</span>");
        result = false;
        return false;
    } else if ($("#imgnombre").val() == "" || $("#imgnombre").val() == "Introduce un nombre") {
        $("#imgnombre").focus().after("<span class='error'>Introduce un nombre</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#imgnombre").val())) {
        $("#imgnombre").focus().after("<span class='error'>El nombre debe ser mayor de 3 y menor de 30 caracteres</span>");
        result = false;
        return false;
    } else if ($("#descr").val() == "" || $("#descr").val() == "Introduce una descripcion") {
        $("#descr").focus().after("<span class='error'>Introduce una descripcion</span>");
        result = false;
        return false;
    } else if (!descr_reg.test($("#descr").val())) {
        $("#descr").focus().after("<span class='error'>error format date (mm/dd/yyyy)</span>");
        result = false;
        return false;
    } else if ($("#fecha").val() == "" || $("#descr").val() == "Fecha de la foto") {
        $("#descr").focus().after("<span class='error'>Introduce una fecha</span>");
        result = false;
        return false;
    }
    if ($("#country").val() === "" || $("#country").val() === "Select country" || $("#country").val() === null) {
        $("#country").focus().after("<span class='error'>Select one country</span>");
        return false;
    }

    if ($("#province").val() === "" || $("#province").val() === "Select province") {
        $("#province").focus().after("<span class='error'>Select one province</span>");
        return false;
    }

    if ($("#city").val() === "" || $("#city").val() === "Select city") {
        $("#city").focus().after("<span class='error'>Select one city</span>");
        return false;
    }


    //Si ha ido todo bien, se envian los datos al servidor
    if (result) {

        if (province === null) {
            province = 'default_province';
        }else if (province.length === 0) {
            province = 'default_province';
        }else if (province === 'Select province') {
            return 'default_province';
        }

        if (city === null) {
            city = 'default_city';
        }else if (city.length === 0) {
            city = 'default_city';
        }else if (city === 'Select city') {
            return 'default_city';
        }

        var data = {
            "link": link,
            "imgnombre": imgnombre,
            "descr": descr,
            "fecha": fecha,
            "formato": formato,
            "tipo": tipo,
            "formato": formato,
            "location": location,
            "country": country,
            "province": province,
            "city": city
        };

        var data_photos_JSON = JSON.stringify(data);

        $.post('module/photos/controller/controller_photos.class.php', {
                alta_photos_json: data_photos_JSON
            },
            function (response) {
                if (response.success) {
                    window.location.href = response.redirect;
                }
                //alert(response);  //para debuguear
                //}); //para debuguear
                //}, "json").fail(function (xhr) {

            }, "json").fail(function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(xhr.responseJSON);

            if (xhr.responseJSON.error.link)
                $("#link").focus().after("<span  class='error1'>" + xhr.responseJSON.error.link + "</span>");

            if (xhr.responseJSON.error.imgnombre)
                $("#imgnombre").focus().after("<span  class='error1'>" + xhr.responseJSON.error.imgnombre + "</span>");

            if (xhr.responseJSON.error.descr)
                $("#descr").focus().after("<span  class='error1'>" + xhr.responseJSON.error.descr + "</span>");
            if (xhr.responseJSON.error_avatar)
                $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");


            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/2 html5up-arcana/media/default-avatar.png") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({
                    'right': '300px'
                }, 300);
            }
        });
    }
}

function load_countries_v2(cad) {
    $.getJSON( cad, function(data) {
      $("#country").empty();
      $("#country").append('<option value="" selected="selected">Select country</option>');

      $.each(data, function (i, valor) {
        $("#country").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
      });
    })
    .fail(function() {
        alert( "error load_countries" );
    });
}

function load_countries_v1() {
    $.get( "module/photos/controller/controller_photos.class.php?load_country=true",
        function( response ) {
           // console.log(response);
            if(response === 'error'){
                
                load_countries_v2("resources/ListOfCountryNamesByName.json");
            }else{
                load_countries_v2("module/photos/controller/controller_photos.class.php?load_country=true"); //oorsprong.org
            }
    })
    .fail(function(response) {
        
        load_countries_v2("resources/ListOfCountryNamesByName.json");
    });
}

function load_provinces_v2() {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
	    $("#province").empty();
	    $("#province").append('<option value="" selected="selected">Select province</option>');

        $(xml).find("provincia").each(function () {
            var id = $(this).attr('id');
            var name = $(this).find('nombre').text();
            $("#province").append("<option value='" + id + "'>" + name + "</option>");
        });
    })
    .fail(function() {
        alert( "error load_provinces" );
    });
}

function load_provinces_v1() { //provinciasypoblaciones.xml - xpath
    $.get( "module/photos/controller/controller_photos.class.php?load_provinces=true",
        function( response ) {
          $("#province").empty();
	        $("#province").append('<option value="" selected="selected">Select province</option>');

            //alert(response);
        var json = JSON.parse(response);
		    var provinces=json.provinces;
		    //alert(provinces);
		    //console.log(provinces);

		    //alert(provinces[0].id);
		    //alert(provinces[0].nombre);

            if(provinces === 'error'){
                load_provinces_v2();
            }else{
                for (var i = 0; i < provinces.length; i++) {
        		    $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
    		    }
            }
    })
    .fail(function(response) {
        load_provinces_v2();
    });
}

function load_cities_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function (xml) {
		$("#city").empty();
	    $("#city").append('<option value="" selected="selected">Select city</option>');

		$(xml).find('provincia[id=' + prov + ']').each(function(){
    		$(this).find('localidad').each(function(){
    			 $("#city").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
    		});
        });
	})
	.fail(function() {
        alert( "error load_cities" );
    });
}

function load_cities_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = { idPoblac : prov  };
	$.post("module/photos/controller/controller_photos.class.php", datos, function(response) {
	    //alert(response);
        var json = JSON.parse(response);
		var cities=json.cities;
		//alert(poblaciones);
		//console.log(poblaciones);
		//alert(poblaciones[0].poblacion);

		$("#city").empty();
	    $("#city").append('<option value="" selected="selected">Select city</option>');

        if(cities === 'error'){
            load_cities_v2(prov);
        }else{
            for (var i = 0; i < cities.length; i++) {
        		$("#city").append("<option value='" + cities[i].poblacion + "'>" + cities[i].poblacion + "</option>");
    		}
        }
	})
	.fail(function() {
        load_cities_v2(prov);
    });
}