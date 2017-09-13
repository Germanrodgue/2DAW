<?php
include("module/photos/model/functions.inc.php");


    if ($_POST) {
        $result = validate_user();

        if ($result['resultado']) {
            $arrArgument = array(
                'link' => $result['datos']['link'],
                'imgnombre' => $result['datos']['imgnombre'],
                'descr' => $result['datos']['descr'],
                'tipo' => $result['datos']['tipo'],
                'loc' => $result['datos']['location'],
                'formato' => $_POST['formato']
                );

            $_SESSION['user'] = $arrArgument;

            $callback = "index.php?module=photos&view=result_photos";
                    redirect($callback);

        } else {
            $error = $result['error'];
                //debug($error);
        }

    }
    include("module/photos/view/create_photos.php");
