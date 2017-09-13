<!DOCTYPE HTML>
<!--
  Arcana by HTML5 UP
  html5up.net | @n33co
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <!-- Logo -->

  <title>Alta de fotografias</title>
  <link rel="stylesheet" href="view/css/style.css" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
  <script src="view/template/js/jquery.min.js"></script>
  <script src="view/template/js/jquery.dropotron.min.js"></script>
  <script src="view/template/js/skel.min.js"></script>
  <script src="view/template/js/skel-layers.min.js"></script>
  <script src="view/template/js/init.js"></script>

    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
  <script type="text/javascript" src="module/photos/view/js/photos.js"></script>
  <script type="text/javascript">

    $(function() {
      $('#demo1').datepicker({
        minDate: new Date(1900,1-1,1), maxDate: '-18Y',
        dateFormat: 'dd/mm/yy',
        defaultDate: new Date(1970,1-1,1),
        changeMonth: true,
        changeYear: true,
        yearRange: '-90:-18'

      });

    });
  </script>

  <link rel="stylesheet" href="view/template/css/skel.css" />
  <link rel="stylesheet" href="view/template/css/style.css" />
  <link rel="stylesheet" href="view/template/css/style-wide.css" />



  <script>
    function Funcion_Buscador() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("Lista");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }

</script>

<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>
