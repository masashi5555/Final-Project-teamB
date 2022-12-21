<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productName = $_POST['productName'];
        $amount = $_POST['amount'];
        $appointmentDate = $_POST['appointmentDate'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];

        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
        $cmd = "SELECT INTO product (id, uid, productName, amount, appointmentDate, times, location, comment) VALUES () ";
        $search = $dbcon -> query($cmd);
        $data = $search -> fetch_all();

    }
?>