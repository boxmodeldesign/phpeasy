<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="all">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
    if ($view == "default") {
        // default homepage meta content
        ?>
        <meta name="keywords" content="phpEasy,Ben Schaefer,php,framework,web development">
        <meta name="description" content="phpEasy by Ben Schaefer">
        <?php
    } else if (include "routes/$view/meta.php") {
        // include custom meta content
    } else {
        // include blank meta content
        ?>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <?php
    }
?>

<title><?php echo $title ?> | phpEasy</title>

<link rel="shortcut icon" href="resources/images/favicon.png">

<link rel="stylesheet" href="resources/css/style.css">

<?php
    if (file_exists("routes/$view/$view.css")) {
        echo '<link rel="stylesheet" href="routes/'.$view.'/'.$view.'.css">';
    }
?>

<?php
    if (file_exists("routes/$view/$view.js")) {
        echo '<script type="text/javascript" src="routes/'.$view.'/'.$view.'.js"></script>';
    }
?>