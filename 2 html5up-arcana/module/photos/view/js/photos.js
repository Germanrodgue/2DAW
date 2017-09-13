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
    });//each
    return this;
};//function

$(document).ready(function () {
    $(this).fill_or_clean(); //siempre que creemos un plugin debemos llamarlo, sino no funcionará

    var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;

    $("#submit").click(function () {
        $(".error").remove();
        if ($("#link").val() == "" || $("#link").val() == "Introduce link") {

            $("#link").focus().before("<span class='error'>Introduce link</span>");
            return false;
        }
        /* else if (!string_reg.test($("#link").val())) {
            $("#link").focus().after("<span class='error'>Name must be 2 to 30 letters</span>");
            return false;
        }*/

        $("#form_photos").submit();
        $("#form_photos").attr("action", "index.php?module=photos");

    });

    //realizamos funciones para que sea más práctico nuestro formulario
    $("#link").keyup(function () {
        if ($(this).val() != "" && string_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });



});
