<?php



class photosbackend_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = photosbackend_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_photo_BLL($arrArgument) {
        return $this->dao->create_photo_DAO($this->db, $arrArgument);
    }

    public function obtener_pais_BLL($url){
        return $this->dao->obtener_pais_DAO($url);
      }
  
      public function obtener_provincia_BLL(){
        return $this->dao->obtener_provincia_DAO();
      }
  
      public function obtener_ciudad_BLL($arrArgument){
        return $this->dao->obtener_ciudad_DAO($arrArgument);
      }
}
