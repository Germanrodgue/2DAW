
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
        
         function send_contact() {
            require_once(EMAIL_CLASSES."email.inc.php"); 
            if ($_POST['token'] === "contact_form") {

               $arrArgument = array(
                'type' => 'contact',
                'token' => '',
                'inputName' => $_POST['inputName'],
                'inputEmail' => $_POST['inputEmail']
            );
           
           
           
            try {
                sleep(2);
                echo "<div class='alert alert-success'>". send_mailgun($arrArgument). "</div>";
            } catch( Exception $e){
                echo "<div class='alert alert-error'>Server error. Try later...</div>";
            }
             
            }
        }

      
    }