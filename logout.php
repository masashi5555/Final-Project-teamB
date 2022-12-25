<?php
    if ($_GET['errcheck']) {
        session_destroy();
        header('Location: ./login2.php');
    } else {
        echo "something happen";
    }