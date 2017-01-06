<?php
 
    if (isset($_POST) && !empty($_POST)) {
        echo 'POST ';
        print_r($_POST);
    } else {
        echo 'GET ';
        print_r($_GET);
    }
?>
