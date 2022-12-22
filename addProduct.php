<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $logCustomer = $_SESSION['logCustomer'];
        // print_r($logCustomer[0][0]); check out why this is two di
        // print_r($logUser["id"]);
        // print_r($logCustomer);
        $productName = $_POST['productName'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $appointmentDate = $_POST['appointmentDate'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];


        // var_dump($productName);
        // var_dump($amount);
        // var_dump($appointmentDate);
        // var_dump($location);
        // var_dump($comment);
        // var_dump($logUser["id"]);
        // var_dump($logCustomer[0]);
        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
        $cmd = "INSERT INTO product2 (cid, uid, productName, amount, price, appointmentDate, times, location, comment) VALUES ('".$logCustomer[0]."', '".$logUser['id']."', '$productName', '$amount', '$price', '$appointmentDate', 0, '$location', '$comment')";

        $search = $dbcon -> query($cmd);
        var_dump($dbcon -> close());

    }
?>



<!-- SELECT * FROM テーブル1の名前 INNER JOIN テーブル2の名前 ON テーブル1のカラム名 = テーブル2のカラム名;tbname.columnname -->