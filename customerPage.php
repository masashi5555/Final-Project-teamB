<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $cid = $_POST['customer'];

        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');

        $cmdCustomer = "SELECT * FROM customer WHERE id = $cid";
        $searchCustomer = $dbcon -> query($cmdCustomer);
        $dataCustomer = $searchCustomer -> fetch_all();
        $_SESSION['logCustomer'] = $dataCustomer[0];
        $logCustomer = $_SESSION['logCustomer'];

        $dbcon -> close();
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
        <input type="number" name="amount" placeholder="amount" value=5 required>
        <input type="number" name="price" placeholder="price" value=500 required>
        <label for="appointmentDate">appointment date</label>
        <input type="date" name="appointmentDate" id="appointmentDate" required>
        <input type="text" name="location" placeholder="location" value="here" required>
        <textarea name="comment" placeholder="comment here" required></textarea>
        <input type="submit" value="submit product data">
    </form> 
    <table border="1">
        <thead>
            <tr>
                <th>pid</th>
                <th>cid</th>
                <th>uid</th>
                <th>product name</th>
                <th>amount</th>
                <th>price</th>
                <th>appointment data</th>
                <th>time</th>
                <th>location</th>
                <th>comment</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
                $cmd = "SELECT * FROM product2 WHERE cid = $cid AND uid = ". $logUser['id']." ";
                $tmpReturn = $dbcon -> query($cmd);
                $data = $tmpReturn -> fetch_all();

                foreach ($data as $eachData) {
                    echo "<tr>";
                        foreach ($eachData as $eachElament) {
                            echo "<td>$eachElament</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>