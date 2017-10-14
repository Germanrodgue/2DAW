<?php

/*$path = $_SERVER['DOCUMENT_ROOT'] . '/html5up-arcana/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "module/photos_frontend/model/BLL/photo_bll.class.singleton.php");*/

class photosfrontend_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = photosfrontend_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_photo() {
        return $this->bll->list_photo_BLL();
    }
    public function details_photos($id) {
        return $this->bll->detail_photo_BLL($id);
    }
    public function list_photo_limit($no) {
        return $this->bll->list_photo_BLL_limit($no);
    }
}
