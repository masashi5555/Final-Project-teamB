<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $logUser = $_SESSION['logUser'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $uid = 0; //just initialize.

        $file = fopen('./data/user_info.json', 'r');
        $decodedData = json_decode(fread($file, filesize('./data/user_info.json')), true);
        foreach ($decodedData as $data) {
            if ($data['pass'] == $logUser['pass'] && $data['email'] == $logUser['email']) {
                $uid = $data['id'];
            }
        }


        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
        //check out database name and table name if this code doesnt work.

        $cmd = "INSERT INTO customer (uid, fname, lname, email, phone) VALUES ('$uid', '$fname', '$lname', '$email', '$phone')";
        $dbcon -> query($cmd);

        $search = $dbcon -> query("SELECT * FROM customer");
        $data = $search -> fetch_all();
     }
?>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>user id</th>
            <th>fname</th>
            <th>lname</th>
            <th>email</th>
            <th>phone</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $eachData) {
                echo "<tr>";
                    foreach ($eachData as $eachElement) {
                        echo "<td>$eachElement</td>";
                    }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>