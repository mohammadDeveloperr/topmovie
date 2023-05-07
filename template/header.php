<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>
        <?php
        if (!function_exists('get_title')) {

            function get_title()
            {

                return APP_TITLE;
            }
        }
        echo get_title()
        ?>
    </title>
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/includes/css/bootstrap.min.css ">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/style.css">
    <script src="<?php echo SITE_URL . '/includes/js/jquery-3.3.1.min.js'; ?>"></script>
    <script src='<?php echo SITE_URL; ?>/script.js'></script>

</head>

<body>
    <?php include('nav.php'); ?>