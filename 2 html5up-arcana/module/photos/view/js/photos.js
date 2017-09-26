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

    //Si ha ido todo bien, se envian los datos al servidor
    if (result) {

        var data = {
            "link": link,
            "imgnombre": imgnombre,
            "descr": descr,
            "fecha": fecha,
            "formato": formato,
            "tipo": tipo,
            "formato": formato,
            "location": location
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