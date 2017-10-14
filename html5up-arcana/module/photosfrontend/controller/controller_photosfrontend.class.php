<?php
class controller_photosfrontend {

    function __construct() {
        
       
        $_SESSION['module'] = "photosfrontend";
    }

    function list_photos() {
        
         require_once(VIEW_PATH_INC . "header.php");
         require_once(VIEW_PATH_INC . "top_page.php");
         require_once(VIEW_PATH_INC . "menu.php");
         
         loadView('module/photosfrontend/view/', 'list_photos.php');
 
         require_once(VIEW_PATH_INC . "footer.php");
     }
 
     function details_photos() {
         require_once(VIEW_PATH_INC . "header.php");
         require_once(VIEW_PATH_INC . "top_page.php");
         require_once(VIEW_PATH_INC . "menu.php");
         
         loadView('module/photosfrontend/view/', 'details_photos.php');
 
         require_once(VIEW_PATH_INC . "footer.php");
     }
//////////////////////////////////////////////////////////////// load

function load(){
if (isset($_POST["load"]) && $_POST["load"] == true) {
  
       // $path_model = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photos_frontend/model/model/';
        $arrValue = loadModel(MODEL_PHOTOS_F, "photosfrontend_model", "list_photo");
       
        echo json_encode($arrValue);
        exit;
}
}

function load_details() {
if (isset($_POST["load_details"])) {
     $detailsjson = array();
     $jsondata = json_decode($_POST["load_details"], true);
    // $path_model = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photos_frontend/model/model/';
     $arrValue = loadModel(MODEL_PHOTOS_F, "photosfrontend_model", "details_photos", $jsondata);
   
     $_SESSION['photodetail'] = $arrValue;
     $callback = "../../photosfrontend/details_photos/load_details1";
     $detailsjson['value'] = $arrValue;
     $detailsjson["redirect"] = $callback;

 echo json_encode($detailsjson);
 exit;
}
}

function get_result(){

if(isset($_POST['getresult'])){
    $no = $_POST['getresult'];
    //$path_model = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/module/photos_frontend/model/model/';
    $arrValue = loadModel(MODEL_PHOTOS_F, "photosfrontend_model", "list_photo_limit", $no);
 
    $list = $arrValue;
    echo json_encode($list);
    exit;
}
}
function load_detail1(){

    $jsondata = array();
    if (isset($_SESSION['photodetail'])) {
        //echo debug($_SESSION['user']);
       
        $jsondata["photodetails"] = $_SESSION['photodetail'];

    echo json_encode($jsondata);
    exit;
    }
   

}




}