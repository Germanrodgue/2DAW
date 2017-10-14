<?php
class controller_homepage {

    function __construct() {
        //include(UTILS . "common.inc.php");
    }

    function index() {
		require_once(VIEW_PATH_INC . "header.php");
		require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "menu.php");
		
        loadView('module/homepage/view/', 'homepage.php');

        require_once(VIEW_PATH_INC . "footer.php");
    }

}
