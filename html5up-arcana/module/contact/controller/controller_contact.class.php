
<?php   

    class controller_contact { 
        
        public function __construct() {
            $_SESSION['module'] = "contact";
        }

        public function contact() {
            require_once(VIEW_PATH_INC."header.php"); 
            require_once(VIEW_PATH_INC."top_page.php");
			require_once(VIEW_PATH_INC."menu.php");
            
            loadView(CONTACT_VIEW_PATH, 'contact.php');
            
            require_once(VIEW_PATH_INC."footer.php");
        }
        
        public function send_contact() {
			require_once(EMAIL_CLASSES."email.inc.php");
			if ((isset($_POST['alta_photos_json']))) {
				echo "a";
			};
			/*$json = array();
				
			$json = $_POST['data'];*/
			send_mailgun($_GET['data']);
			
		//	echo json_encode($_POST['data']);
			
        }
    }