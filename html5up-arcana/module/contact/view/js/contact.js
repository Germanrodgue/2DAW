function amigable(url) {
  var link="";
  url = url.replace("?", "");
  url = url.split("&");

  for (var i=0;i<url.length;i++) {
      var aux = url[i].split("=");
      link +=  "/"+aux[1];
  }
  return "http://127.0.0.1/html5up-arcana" + link;
}

function paint(dataString) {
  $("#resultMessage").html(dataString).fadeIn("slow");
                  
  setTimeout(function() {
      $("#resultMessage").fadeOut("slow")
  }, 5000);
                          
  //reset the form
  $('#contact_form')[0].reset();
                          
  // hide ajax loader icon
  $('.ajaxLoader').fadeOut("fast");
                          
  // Enable button after processing
  $('#submitBtn').attr('disabled', false);
                  
  /*if (dataString == "<div class='alert alert-success'>Your message has been sent </div>"){
      alert(dataString);
  }else{
      alert(dataString);
  }*/
}
$(document).ready(function () {
  $(function(){
    $('#submitBtn').attr('disabled', false);
});

$("#contact_form").validate({
  rules:{
    inputName:{
                  required: true
    },
    inputEmail:{
                  required: true,
                  email: true
    },
              inputMessage:{
                  required: true
              }
  },
  highlight: function(element) {
      $(element).closest('.control-group').removeClass('success').addClass('error');},
  success: function(element) {
      $(element).closest('.control-group').removeClass('error').addClass('success');
      $(element).closest('.control-group').find('label').remove();
  },
  errorClass: "help-inline"
});
  $("#contact_form").submit(function(){
  
    if ($("#contact_form").valid()){
        
        // Disable button while processing
        $('#submitBtn').attr('disabled', true);

        // show ajax loader icon
        $('.ajaxLoader').fadeIn("fast");

       
        var dataString = $("#contact_form").serialize();
        $.ajax({
          type: "POST",
          url: amigable("?module=contact&function=send_contact"),
          data: dataString,
          success: function (dataString) {
             
            /*  var content = document.getElementById("content");
              content.innerHTML = dataString;*/
              paint(dataString);
          }
      })
      .fail(function () {
          paint("<div class='alert alert-error'>Error en el servidor. Intentelo más tarde...</div>");
      });
      
    }
    return false;
});
        
  
   
  

});



function send_data(name, email, message){
  
  var dataString = {
    "name": name,
    "email": email,
    "mess": message
  };


$.post("../../contact/send_contact/",{'data':dataString}, 
function(response) {
alert(response);
});

}
// Validate the email address
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
