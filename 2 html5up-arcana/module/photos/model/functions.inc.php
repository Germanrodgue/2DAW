<?php

 function isImage($file)
  {

$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 500 Internal Server Error') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 403') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    return false;

}else {
    $size = getimagesize($file);
		return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? $file : false);
}
}

	function validate_user(){
		$error='';
		$filtro = array(
			'link' => array(
				'filter'=>FILTER_CALLBACK,
				'options'=>'isImage'
			),
			'imgnombre' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/^\D{3,30}$/')
			),
			'descr' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|')
			),
			'tipo' => array(

			),
			'location' => array(

			),
			'id' => array(

			),

		);

		$resultado=filter_input_array(INPUT_POST,$filtro);


		/*if(isset($resultado['link'])){

			$link = isImage($resultado['link']);
		}*/

		if(!$resultado['link']){
			$error='El link debe ser correcto';
		}elseif(!$resultado['imgnombre']){
			$error='El nombre de la imagen debe ser correcto';
		}elseif(!$resultado['tipo']){
			$error='El tipo debe ser correcto';
		}elseif(!$resultado['descr']){
			$error='La descripcion debe tener entre 5 y 20 caracteres';
		}else{

			 return $return=array('resultado'=>true,'error'=>$error,'datos'=>$resultado);
		};
		return $return=array('resultado'=>false , 'error'=>$error,'datos'=>$resultado);
	};


	function debug($array){
		echo "<pre>";
		print_r($array);
		echo "</pre><br>";
	}
?>
