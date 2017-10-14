<?php

class photosbackend_model {
    private $bll;
    static $_instance;

    private function __construct() {
    
        $this->bll = photosbackend_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_photo($arrArgument) {
        return $this->bll->create_photo_BLL($arrArgument);
    }

    public function obtener_pais($url){
        return $this->bll->obtener_pais_BLL($url);
    }

    public function obtener_provincia(){
        return $this->bll->obtener_provincia_BLL();
    }

    public Function obtener_ciudad($arrArgument){
        return $this->bll->obtener_ciudad_BLL($arrArgument);
    }

}
