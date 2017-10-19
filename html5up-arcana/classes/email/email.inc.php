<?php
        
	
		
		function send_mailgun($arr){
			$html = '';
			$subject = '';
			$body = '';
			$ruta = '';
			$return = '';
			
			switch ($arr['type']) {
			   /* case 'alta':
					$subject = 'Tu Alta en ';
					$ruta = "<a href='" . amigable("?module=login&function=activar&aux=A" . $arr['token'], true) . "'>aqu&iacute;</a>";
					$body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
					break;
		
				case 'modificacion':
					$subject = 'Tu Nuevo Password en<br>';
					$ruta = '<a href="' . amigable("?module=login&function=activar&aux=F" . $arr['token'], true) . '">aqu&iacute;</a>';
					$body = 'Para recordar tu password pulsa ' . $ruta;
					break;
					*/
				case 'contact':
					$subject = 'Tu Petici&oacute;n a  ha sido enviada<br>';
					$ruta = '<a href=' . '127.0.0.1/html5up-arcana'. '>aqu&iacute;</a>';
					$body = 'Para visitar nuestra web, pulsa ' . $ruta;
					break;
		
				/*case 'admin':
					$subject = $arr['inputSubject'];
					$body = 'inputName: ' . $arr['inputName']. '<br>' .
					'inputEmail: ' . $arr['inputEmail']. '<br>' .
					'inputSubject: ' . $arr['inputSubject']. '<br>' .
					'inputMessage: ' . $arr['inputMessage'];
					break;*/
			}

			$html .= "<html>";
			$html .= "<body>";
			   $html .= "<h4>". $subject ."</h4>";
			   $html .= $body;
			   $html .= "<br><br>";
			   $html .= "<p>Sent by </p>";
			$html .= "</body>";
			$html .= "</html>";



			$email = $arr['inputEmail'];
			$name = $arr['inputName'];
	
			$config = array();
			$config['api_key'] = ""; //API Key
			$config['api_url'] = ""; //API Base URL
		
			$message = array();
			$message['from'] = "germanrodgue@gmail.com";
			$message['to'] = $email;
			$message['h:Reply-To'] = "germanrodgue@gmail.com";
			$message['subject'] = 'Hello,' . $name . ' this is a test';
			$message['html'] = 'Hello ' . $email . ',</br></br> This is a test';
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $config['api_url']);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
			$result = curl_exec($ch);
			curl_close($ch);
			return $html;
		}

