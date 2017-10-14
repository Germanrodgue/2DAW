<?php

class controller_photosbackend {
    
    function __construct() {
        
        include(FUNCTIONS_PHOTOS_B . "functions.inc.php");
        include(UTILS . "upload.php");
        $_SESSION['module'] = "photosbackend";
    }

    function form_photos() {
       
        require_once(VIEW_PATH_INC . "header.php");
		require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "menu.php");
		
        loadView('module/photosbackend/view/', 'create_photos.php');

        require_once(VIEW_PATH_INC . "footer.php");
    }

    function results_photos() {
        require_once(VIEW_PATH_INC . "header.php");
		require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "menu.php");
		
        loadView('module/photosbackend/view/', 'results_photos.php');

        require_once(VIEW_PATH_INC . "footer.php");
    }

function upload_photos(){

    if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
        $result_avatar = upload_files();
        $_SESSION['result_avatar'] = $result_avatar;
        //echo debug($_SESSION['result_avatar']); //se mostraría en alert(response); de dropzone.js
    }
}


function alta_photos() {
    if ((isset($_POST['alta_photos_json']))) {
        
    $jsondata = array();
    $usersJSON = json_decode($_POST["alta_photos_json"], true);
    $result = validate_photo($usersJSON);

    if (empty($_SESSION['result_avatar'])) {
        $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
    }
    $result_avatar = $_SESSION['result_avatar'];

    if (($result['resultado']) && ($result_avatar['resultado'])) {
        $arrArgument = array(
          'link' => $result['datos']['link'],
          'imgnombre' => $result['datos']['imgnombre'],
          'descr' => $result['datos']['descr'],
          'fecha' => $result['datos']['fecha'],
          'tipo' => $result['datos']['tipo'],
          'loc' => $result['datos']['location'],
          'formato' => $result['datos']['formato'],
          'avatar' => $result_avatar['datos'],
          'pais' => $result['datos']['pais'],
          'provincia' => $result['datos']['provincia'],
          'ciudad' => $result['datos']['ciudad']
          );

        $arrValue = false;
        
        //$path_model = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photosbackend/model/model/';
        $arrValue = loadModel(MODEL_PHOTOS_B, "photosbackend_model", "create_photo", $arrArgument);
       // echo json_encode($arrValue);
       // die();

        $mensaje = "Photo has been successfully registered";
       
        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION['user'] = $arrArgument;


        $_SESSION['msje'] = $mensaje;
        $callback = "../../photosbackend/results_photos/";//index.php?module=photosbackend&view=results_photos";

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
        echo json_encode($jsondata);
        exit;
    } else {
        //$error = $result['error'];
        //$error_avatar = $result_avatar['error'];
        $jsondata["success"] = false;
        $jsondata["error"] = $result['error'];
        $jsondata["error_avatar"] = $result_avatar['error'];

        $jsondata["success1"] = false;
        if ($result_avatar['resultado']) {
            $jsondata["success1"] = true;
            $jsondata["img_avatar"] = $result_avatar['datos'];
        }
        header('HTTP/1.0 400 Bad error');
        echo json_encode($jsondata);
        //exit;
    }
}
}

//////////////////////////////////////////////////////////////// delete
function delete_photos(){
    if (isset($_GET["delete"]) && $_GET["delete"] == true) {
        $_SESSION['result_avatar'] = array();
        $result = remove_files();
        if ($result === true) {
            echo json_encode(array("res" => true));
        } else {
            echo json_encode(array("res" => false));
        }
    }
}


//////////////////////////////////////////////////////////////// load
function load_photos(){
    if (isset($_POST["load"]) && $_POST["load"] == true) {
        $jsondata = array();
        if (isset($_SESSION['user'])) {
            //echo debug($_SESSION['user']);
            $jsondata["user"] = $_SESSION['user'];
        }
        if (isset($_SESSION['msje'])) {
            //echo $_SESSION['msje'];
            $jsondata["msje"] = $_SESSION['msje'];
        }
        close_session();
        echo json_encode($jsondata);
        exit;
    }
}




/////////////////////////////////////////////////// load_data
function load_data_photos(){
    if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
        $jsondata = array();
        if (isset($_SESSION['user'])) {
            $jsondata["user"] = $_SESSION['user'];
            echo json_encode($jsondata);
            exit;
        } else {
            $jsondata["user"] = "";
            echo json_encode($jsondata);
            exit;
        }
    }
    

}


  function load_pais_photos(){
    if ((isset($_POST["load_pais"])) && ($_POST["load_pais"] == true)) {

    
        $json = array();
        $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
      //  $path_model=$_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photosbackend/model/model/';

         try {
        $json = loadModel(MODEL_PHOTOS_B, "photosbackend_model", "obtener_pais", $url);
      
         } catch (Exception $e) {
        $json = array();
         }

        if($json){
           
            echo $json;
            exit;
        }else{
            $json = "error";
            echo $json;
            exit;
        }
        
    }
  }

function load_provincia_photos(){
    if(  (isset($_POST["load_provincia"])) && ($_POST["load_provincia"] == true)  ){
        $jsondata = array();
        $json = array();
    
        //$path_model=$_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photosbackend/model/model/';
        $json = loadModel(MODEL_PHOTOS_B, "photosbackend_model", "obtener_provincia");
    
        if($json){
            $jsondata["provincia"] = $json;
            echo json_encode($jsondata);
            exit;
        }else{
            $jsondata["provincia"] = "error";
            echo json_encode($jsondata);
            exit;
        }
    }
}


function load_pueblo_photos(){
    if(  isset($_POST['idPoblac']) ){
        $jsondata = array();
        $json = array();
        $poblacion=$_POST['idPoblac'];
       // $path_model=$_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photosbackend/model/model/';
        $json = loadModel(MODEL_PHOTOS_B, "photosbackend_model", "obtener_ciudad", $poblacion);
    
        if($json){
            $jsondata["ciudad"] = $json;
            echo json_encode($jsondata);
            exit;
        }else{
            $jsondata["ciudad"] = "error";
            echo json_encode($jsondata);
            exit;
        }
    }
}
}