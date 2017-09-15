//Crear un plugin

jQuery.fn.fill_or_clean = function () {
    this.each(function () {


        if ($("#link").attr("value") == "") {
            $("#link").attr("value", "Introduce link");
            $("#link").focus(function () {
                if ($("#link").attr("value") == "Introduce link") {
                    $("#link").attr("value", "");
                }
            });
        }
        $("#link").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#link").attr("value") == "") {
                $("#link").attr("value", "Introduce link");
            }
        });


        if ($("#imgnombre").attr("value") == "") {
            $("#imgnombre").attr("value", "Introduce un nombre de imagen");
            $("#imgnombre").focus(function () {
                if ($("#imgnombre").attr("value") == "Introduce un nombre de imagen") {
                    $("#imgnombre").attr("value", "");
                }
            });
        }
        $("#imgnombre").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#imgnombre").attr("value") == "") {
                $("#imgnombre").attr("value", "Introduce un nombre de imagen");
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


        if ($("#fecha").attr("value") == "") {
            $("#fecha").attr("value", "Introduce una fecha");
            $("#fecha").focus(function () {
                if ($("#fecha").attr("value") == "Introduce una fecha") {
                    $("#fecha").attr("value", "");
                }
            });
        }
        $("#fecha").blur(function () { //Onblur se activa cuando el usuario retira el foco
            if ($("#fecha").attr("value") == "") {
                $("#fecha").attr("value", "Introduce una fecha");
            }
        });
    });//each
    return this;
};//function

$(document).ready(function () {
    $(this).fill_or_clean(); //siempre que creemos un plugin debemos llamarlo, sino no funcionará

    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var descr_reg = /^[a-zA-Z ]*$/;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var imgname_reg = /^[A-Za-z]{3,8}$/;
    var link_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;

    $("#submit").click(function () {
        $(".error").remove();
        if ($("#link").val() == "" || $("#link").val() == "Introduce link") {

            $("#link").focus().before("<span class='error'>Introduce link</span>");
            return false;
        }


        if ($("#imgnombre").val() == "" || $("#imgnombre").val() == "Introduce un nombre de imagen") {

            $("#imgnombre").focus().before("<span class='error'>Introduce un nombre de imagen</span>");
            return false;

        } else if (!imgname_reg.test($("#imgnombre").val())) {
           $("#imgnombre").focus().before("<span class='error'>Name must be 3 to 8 letters</span>");
           return false;
        }
        if ($("#descr").val() == "" || $("#descr").val() == "Introduce una descripcion") {

            $("#descr").focus().before("<span class='error'>Introduce una descripcion</span>");
            return false;

        }
        if ($("#fecha").val() == "" || $("#fecha").val() == "Introduce una fecha") {

            $("#fecha").focus().before("<span class='error'>Introduce una fecha</span>");
            return false;
        }


        $("#form_photos").submit();
        $("#form_photos").attr("action", "index.php?module=photos");



    });

    //realizamos funciones para que sea más práctico nuestro formulario

    $("#imgnombre").keyup(function () {
        if ($(this).val() != "" && imgname_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


});
