<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pid = $_POST['pid'];
        $productName = $_POST['productName'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $appointmentDate = $_POST['appointmentDate'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];
        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
    
        $cmd = "UPDATE product2 SET 
        productName = '$productName',
        amount = '$amount',
        price = '$price',
        appointmentDate = '$appointmentDate',
        location = '$location',
        comment = '$comment' 
        WHERE pid = '$pid'";
    
        if ($dbcon -> query($cmd)) {
            header('Location: ./customerPage.php?msg=succeeded!');
        }
    } else if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
        $cmd = "DELETE FROM product2 WHERE pid = $pid";
        if ($dbcon -> query($cmd)) {
            header('Location: ./customerPage.php?msg=deleted');
        }

    }
?>