<?php
		class Conectar{
		public static function con(){
			$host = getenv('127.0.0.1');  
    		$user = "root";                     //Your Cloud 9 username
    		//$user = getenv('C9_USER');
    		$pass = "";                             //Remember, there is NO password!
    		$db = "fotografias";                      //Your database name you want to connect to
    		$port = 3306;                           //The port #. It is always 3306
    		$tabla="usuarios";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	


			public static function login(){
			$host = getenv('127.0.0.1');  
    		$user = "root";                     //Your Cloud 9 username
    		//$user = getenv('C9_USER');
    		$pass = "";                             //Remember, there is NO password!
    		$db = "fotografias";                      //Your database name you want to connect to
    		$port = 3306;                           //The port #. It is always 3306
    		$tabla="login";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
		}

		public static function carrito(){
			$host = getenv('127.0.0.1');  
    		$user = "root";                     //Your Cloud 9 username
    		//$user = getenv('C9_USER');
    		$pass = "";                             //Remember, there is NO password!
    		$db = "fotografias";                      //Your database name you want to connect to
    		$port = 3306;                           //The port #. It is always 3306
    		$tabla="carrito";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
		}
		
	}

	