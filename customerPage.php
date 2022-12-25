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
    } else if ($_GET['msg'] == 'success') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $cid = $_SESSION['logCustomer'][0];

        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');

        $cmdCustomer = "SELECT * FROM customer WHERE id = $cid";
        $searchCustomer = $dbcon -> query($cmdCustomer);
        $dataCustomer = $searchCustomer -> fetch_all();
        $_SESSION['logCustomer'] = $dataCustomer[0];
        $logCustomer = $_SESSION['logCustomer'];

        $dbcon -> close();
    }
 
?>

<?php include './config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
    <?php include './component/header.php'; ?>
    <main class="main">
        <section class="above" id="above">
            <form action="addProduct.php" method="POST">
                <h2>add new product</h2>
                <input type="text" name="productName" placeholder="product name" value="apple" required>
                <input type="number" name="amount" placeholder="amount" value=5 required>
                <input type="number" name="price" placeholder="price" value=500 required>
                <label for="appointmentDate">appointment date</label>
                <input type="date" name="appointmentDate" id="appointmentDate" required>
                <input type="text" name="location" placeholder="location" value="here" required>
                <textarea name="comment" placeholder="comment here" required></textarea>
                <input type="submit" value="submit">
            </form> 
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>product name</th>
                        <th>amount</th>
                        <th>price</th>
                        <th>appointment date</th>
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
                            echo "<tr class='tr'>";
                                for ($i = 3 ; $i < 10 ; $i++) {
                                    echo "<td>$eachData[$i]</td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <div>
            <?php 
                $con = mysqli_connect($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
                if($con){
                    // echo "connected";
                }
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['manager', 'sales'],
                    <?php 
                        $sql = "SELECT * FROM sales_manager";
                        $fire = mysqli_query($con,$sql);
                        while ($result = mysqli_fetch_assoc($fire)){
                            echo "['".$result["manager"]."',".$result["sales"]."],";
                        }
                    ?>
                ]);

                var options = {
                    title: 'Sales by Manager'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
            </script>
            <div id="piechart" style="width: 500px; height: 300px;"></div>     -->
        <!-- </div>
    </main>
</body>
</html>



