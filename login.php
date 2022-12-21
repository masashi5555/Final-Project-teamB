<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $file = fopen('./data/user_info.json','r');
        $userArray = json_decode(fread($file,filesize('./data/user_info.json')),true);
        foreach($userArray as $user){
            if($user['email']==$email && $user['pass']==$pass){
                session_start();
                $_SESSION['logUser'] = $user;
                // header("Location: http://localhost/finalproject/example.php");
                // This header above is past code. just in case i didnt delete it.
                header("Location: ./sellsPage.php");
                // This header above is Riku's path. you can delete it if you need!!!
                exit();
                break;
            }else{
                echo "try again";
            }
        }
    }
?>