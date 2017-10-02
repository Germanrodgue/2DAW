<?php
class photoDAO {
    static $_instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_photo_DAO($db) {
       
            $sql = "SELECT * FROM fotografia";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
            
    
    }

   
}
