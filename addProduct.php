<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $logCustomer = $_SESSION['logCustomer'];
        $productName = $_POST['productName'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $appointmentDate = $_POST['appointmentDate'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];

        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
        $cmd = "INSERT INTO product2 (cid, uid, productName, amount, price, appointmentDate, times, location, comment) VALUES ('".$logCustomer[0]."', '".$logUser['id']."', '$productName', '$amount', '$price', '$appointmentDate', 0, '$location', '$comment')";

        $search = $dbcon -> query($cmd);
        var_dump($dbcon -> close());

        header('Location: ./customerPage.php?msg=post data');

    }
?>



<!-- SELECT * FROM テーブル1の名前 INNER JOIN テーブル2の名前 ON テーブル1のカラム名 = テーブル2のカラム名;tbname.columnname -->
