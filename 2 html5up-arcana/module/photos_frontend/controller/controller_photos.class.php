<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/2 html5up-arcana/utils/common.inc.php");


//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {
       // $_SESSION['msje'] = "Hola";
       // $jsondata["msje"] = $_SESSION['msje'];
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_frontend/model/model/';
        $arrValue = loadModel($path_model, "photo_model", "list_photo");
    close_session();
    echo json_encode($arrValue);
    exit;
}

function close_session() {
    unset($_SESSION['user']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}



 