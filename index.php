<!DOCTYPE html>
<html>
    <body>
        <?php

            $base = "/phpeasy"; // change or remove depending on domain path

            function currentURI() {
                $uri = substr($_SERVER['REQUEST_URI'], 0);
                $lastChar = substr($uri, -1);
                if ($lastChar == '/') {
                    $uri = substr($uri, 0, -1);
                }
                return $uri;
            }

            function defaultHTML() {
                global $base;
                ?>
                <h1><?php echo "Hello World!"; ?></h1>
                <h2><?php echo currentURI(); ?></h2>
                <a href="<?php echo $base ?>">Home</a> | <a href="<?php echo $base . '/test' ?>">Test</a>
                <?php
            }

            function loadView($route) {
                global $base;
                if (strpos($route, $base) !== false) {
                    $baseLen = strlen($base) + 1;
                    $route = '/' . substr($route, $baseLen);
                    ?><p><?php echo $route; ?></p><?php
                    switch($route) {
                        case "/test":
                            include "routes/test.php";
                            break;
                        case "/new-page":
                            $page_var = "I got this variable from the page call";
                            include "routes/new-page.php";
                            break;
                        default:
                            defaultHTML();
                    }
                } else {
                    defaultHTML();
                }
            }

            loadView(currentURI());
        ?>
    </body>
</html>