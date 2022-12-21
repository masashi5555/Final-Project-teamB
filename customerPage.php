<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $cid = $_POST['customer'];

        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');

        $cmdCustomer = "SELECT * FROM customer WHERE id = $cid";
        $searchCustomer = $dbcon -> query($cmdCustomer);
        $dataCustomer = $searchCustomer -> fetch_all();
        $_SESSION['logCustomer'] = $dataCustomer;
        $logCustomer = $_SESSION['logCustomer'];
        //stored data of customer in session.

        // $cmd = "SELECT * FROM product WHERE id = '$cid'";
        // $search = $dbcon -> query($cmd);
        // $data = $search -> fetch_all();
        // var_dump($data);
    
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="addProduct.php" method="POST">
        <input type="text" name="productName" placeholder="product name" value="apple" required>
        <input type="number" name="amount" placeholder="amount" value=5> required
        <label for="appointmentDate">appointment  date</label>
        <input type="date" name="appointmentDate" id="appointmentDate" required>
        <input type="text" name="location" placeholder="location" value="here" required>
        <textarea name="comment" placeholder="comment here" required></textarea>
        <input type="submit" value="submit product data">
    </form> 
    <!-- <table>
        <thead>
            <tr>
                <th>pid</th>
                <th>id</th>
                <th>uid</th>
                <th>product name</th>
                <th>amount</th>
                <th>appointment data</th>
                <th>time</th>
                <th>location</th>
                <th>comment</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table> -->
</body>
</html>