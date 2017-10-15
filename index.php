<?php
    
    $base = "/phpeasy"; // change or remove depending on domain path
    $view = ""; // the page view to load; set in route definition
    $title = ""; // title element for a particular page; set in defaultHTML or in a route definition

    function currentURI() {
        $uri = substr($_SERVER['REQUEST_URI'], 0);
        $lastChar = substr($uri, -1);
        if ($lastChar == '/') {
            $uri = substr($uri, 0, -1);
        }
        return $uri;
    }

    function defaultHTML() {
        global $base, $title;
        $title = "Home";
        ?>
        <h2><?php echo "Hello World!"; ?></h2>
        <h3><?php echo currentURI(); ?></h3>
        <a href="<?php echo $base ?>">Home</a> | <a href="<?php echo $base . '/test' ?>">Test</a>
        <?php
    }

    function loadView($route) {
        global $base, $view, $title;
        if (strpos($route, $base) !== false) {
            $baseLen = strlen($base) + 1;
            $route = '/' . substr($route, $baseLen);
            /* troubleshooting the route
            ?><p><?php echo $route; ?></p><?php
            */
            
            // ADD ROUTES HERE
            // FORMAT:
                // case {{URL}} :
                // $view = {{name of folder in 'routes'}} ;
                // $title = {{page title, if not defined in custom head.php}} ;
                // break;
            switch($route) {
                case "/test":
                    $view = "test";
                    $title = "Test Page";
                    break;
                case "/new-page":
                    $view = "new-page";
                    $title = "New Page";
                    break;
                case "/nest/nested-page":
                    $view = "nested-page";
                    $title = "Nested Page";
                    break;
                default:
                    $view = "default";
            }
        }
    }

    loadView(currentURI());

?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            if (include "routes/$view/head.php") {
                // include the specified head
            } else {
                include "head.php";
            }
        ?>
    </head>
    <body>
        <?php
            if (include "routes/$view/header.php") {
                // include the specified header
            } else {
                include "header.php";
            }

            if (include "routes/$view/$view.php") {
                // include the page body
            } else {
                defaultHTML();
            }

            if (include "routes/$view/footer.php") {
                // include the specified footer
            } else {
                include "footer.php";
            }
        ?>
    </body>
</html>