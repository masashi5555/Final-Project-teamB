<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        echo $fname;
        header("Location: ./sellsPage.php?msg=done");
    }
?>