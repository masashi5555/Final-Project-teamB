<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="./css/style.css">
    <css>
    <style class="css"></style>
</head>
<body>
    <div id="login">
        <!-- <form name='form-login' action="http://localhost/finalproject/login.php" method="POST"> -->
            <!-- This action above is depending on person. just in case i didnt delete it. -->
        <form name='form-login' action="./login.php" method="POST">
        <!-- <form name='form-login' action="http://localhost:8080/finalAssignment/login.php" method="POST"> -->
            <!-- This action above is Riku's path. you can delete it if you need!!! -->
        <span class="fontawesome-user"></span>
            <input type="text" id="user" placeholder="Username" name="email" value="cdiceye@ca.gov">
            
        <span class="fontawesome-lock"></span>
            <input type="password" id="pass" placeholder="Password" name="pass" value="QricFlM">
        
        <input type="submit" value="Login">
        
</form>
    
</body>
</html>