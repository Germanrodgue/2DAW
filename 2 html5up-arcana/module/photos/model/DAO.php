<?php
   
     include ("model/connect.php");
	class DAO{
		function nuevo_user($user){
			
		//	print_r($user['formato']);
			//die();
			$form=' ';
		foreach ($user['formato'] as $indice) {
        	    $form=$form."$indice:";
        	}
        		$form = ltrim($form);
			$loc=' ';
		
        		
			 $sql = "INSERT INTO usuarios(nombre, email, fecha, tipo, link, imgnombre, Descripcion, formato, Localizacion) VALUES ('$user[nombre]' , '$user[email]', '$user[fecha]', '$user[tipo]', '$user[link]', '$user[imgnombre]', '$user[descr]','$form', '$user[loc]')";
            
            $conexion = Conectar::con();

            $res = mysqli_query($conexion, $sql);

            Conectar::close($conexion);
			return $res;
		}
		function select_all_user(){
			$sql = "SELECT * FROM usuarios ORDER BY id ASC";
			
			$conexion =  Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);

            return $res;
		}
		function select_count(){
			$sql = "SELECT COUNT(*) FROM usuarios";
			
			$conexion =  Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}
		function select_user($user){
			$sql = "SELECT * FROM usuarios WHERE id='$user'";
				try {
					$conexion = Conectar::con();
		            $res = mysqli_query($conexion, $sql)->fetch_object();
		            Conectar::close($conexion);
	            } catch (Exception $e) {
				    $callback = 'index.php?page=503';
				    die('<script>window.location.href="' . $callback . '";</script>');
				}
            return $res;
		}
		function select_user_id($user){
			$sql = "SELECT id FROM usuarios WHERE id='$user'";
			
			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            Conectar::close($conexion);
            return $res;
		}
		function update_user($user){
			$form=' ';

			foreach ($user['formato'] as $indice) {
        	    $form=$form."$indice:";
        	}
        	$form = ltrim($form);
        	
			 $sql = "UPDATE usuarios SET nombre='$user[nombre]', email='$user[email]', fecha='$user[fecha]', tipo='$user[tipo]', link='$user[link]', imgnombre='$user[imgnombre]', Descripcion='$user[descr]' ,formato='$form', Localizacion='$user[loc]'  WHERE id='$user[id]'";  
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
			return $res;
		}
		function delete_user($user){
			$sql = "DELETE FROM usuarios WHERE id='$user'";
			
			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}
		function delete_all_user(){
			$sql = "DELETE FROM usuarios";
			
			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}

		function check_login($login){

			$sql = "SELECT * FROM login WHERE usuario='$login'";


			$conexion = Conectar::login();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            Conectar::close($conexion);
            return $res;
		}


	}