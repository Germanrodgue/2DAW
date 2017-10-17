<?php
//SITE_ROOT
$path = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/';
define('SITE_ROOT', $path);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/html5up-arcana/');

//CSS
define('CSS_PATH', SITE_PATH . 'view/template/css/');

//JS
define('JS_PATH', SITE_PATH . 'view/template/js/');

//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');



define('PRODUCTION', true);

//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//view
define('VIEW_PATH_INC', SITE_ROOT . 'view/include/');
define('VIEW_PATH_INC_ERROR', SITE_ROOT . 'view/include/templates_error/');
//modules
define('MODULES_PATH', SITE_ROOT . 'module/');
//resources
define('RESOURCES', SITE_ROOT . 'resources/');
//media
define('MEDIA_PATH', SITE_ROOT . 'media/');
//utils
define('UTILS', SITE_ROOT . 'utils/');

//model photos_backend
define('FUNCTIONS_PHOTOS_B', SITE_ROOT . 'module/photosbackend/utils/');
define('MODEL_PATH_PHOTOS_B', SITE_ROOT . 'module/photosbackend/model/');
define('DAO_PHOTOS_B', SITE_ROOT . 'module/photosbackend/model/DAO/');
define('BLL_PHOTOS_B', SITE_ROOT . 'module/photosbackend/model/BLL/');
define('MODEL_PHOTOS_B', SITE_ROOT . 'module/photosbackend/model/model/');
define('PHOTOS_B_JS_PATH', SITE_PATH . 'module/photosbackend/view/js/');

//model photos_frontend
define('UTILS_PHOTOS_F', SITE_ROOT . 'module/photosfrontend/utils/');
define('PHOTOS_F_JS_LIB_PATH', SITE_PATH . 'module/photosfrontend/view/lib/');
define('PHOTOS_F_JS_PATH', SITE_PATH . 'module/photosfrontend/view/js/');
define('MODEL_PATH_PHOTOS_F', SITE_ROOT . 'module/photosfrontend/model/');
define('DAO_PHOTOS_F', SITE_ROOT . 'module/photosfrontend/model/DAO/');
define('BLL_PHOTOS_F', SITE_ROOT . 'module/photosfrontend/model/BLL/');
define('MODEL_PHOTOS_F', SITE_ROOT . 'module/photosfrontend/model/model/');

//amigables
define('URL_AMIGABLES', TRUE);

//module contact
define('CONTACT_JS_PATH', SITE_PATH . 'module/contact/view/js/');
define('CONTACT_CSS_PATH', SITE_PATH . 'module/contact/view/css/');
define('CONTACT_LIB_PATH', SITE_PATH . 'module/contact/view/lib/');
define('CONTACT_IMG_PATH', SITE_PATH . 'module/contact/view/img/'); 
define('CONTACT_VIEW_PATH', 'module/contact/view/');

//classes

define('EMAIL_CLASSES', SITE_ROOT . 'classes/email/');