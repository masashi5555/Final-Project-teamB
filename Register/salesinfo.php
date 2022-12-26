<?php
    include './registerClass.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $age = $_POST['age'];
        $role = $_POST['role'];
        $apply = new applyer($fname,$lname,$email,$phone,$pass,$age,$role);
        $file = fopen('../data/user_info.json','r');
        $applyArray = json_decode(fread($file,filesize('../data/user_info.json')),true);
        fclose($file);
        $num = count($applyArray)+1;
        array_push($applyArray,$apply->convert_info($num));
        // print_r($applyArray);
        $file = fopen('../data/user_info.json','w');
        fwrite($file,json_encode($applyArray));
        fclose($file);
        header("Location:http://localhost/final-project-teamb/sellsPage.php");
        exit();
    }
?>