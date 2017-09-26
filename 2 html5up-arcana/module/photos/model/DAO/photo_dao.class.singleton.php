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

    public function create_photo_DAO($db, $arrArgument) {
        $link = $arrArgument['link'];
        $imgnombre = $arrArgument['imgnombre'];
        $descr = $arrArgument['descr'];
        $tipo = $arrArgument['tipo'];
        $loc = $arrArgument['loc'];
        $formato = $arrArgument['formato'];
        $avatar = $arrArgument['avatar'];
        $fecha = $arrArgument['fecha'];
        $form = "";
        
    
        foreach ($formato as $indice) {
            $form=$form."$indice:";
        }
        $sql = "INSERT INTO usuarios (fecha, tipo, link, imgnombre,"
                . " Descripcion, formato, Localizacion, avatar"
                . " ) VALUES ('$fecha', '$tipo', '$link',"
                . " '$imgnombre', '$descr', '$form', '$loc', '$avatar')";

        return $db->ejecutar($sql);
    }
}
