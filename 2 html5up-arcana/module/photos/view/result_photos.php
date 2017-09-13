
            <?php
            $user = $_SESSION['user'];


            foreach ($user as $indice => $valor) {
                if ($indice == 'formato') {
                    echo "<br><b>Formato:</b><br>";
                    $photos = $user['formato'];
                    foreach ($photos as $indice => $valor) {
                        echo "<b>---> $indice</b>: $valor<br>";
                    }
                } else {
                    echo "<br><b>$indice</b>: $valor";
                }
            }
            ?>
