<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/';
//define('SITE_ROOT', $path);
define('MODEL_PATH', SITE_ROOT . 'model/');

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "module/photos/model/DAO/photo_dao.class.singleton.php");

class photo_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = photoDAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_photo_BLL($arrArgument) {
        return $this->dao->create_photo_DAO($this->db, $arrArgument);
    }
}
