<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
</head>
<body>
    Register Page<br/>
    <br/>
    <!-- action specifies where to jump to -->
    <form method="post" action="http://localhost/final-project-teamB/info_check.php">
    <br/>
    <input type="text" placeholder="id" name="id" style="width:100px;"><br />
    <br/>
    <input type="text" placeholder="first_name" name="first_name" style="width:100px;"><br />
    <br/>
    <input type="text" placeholder="last_name" name="last_name" style="width:100px;"><br />
    <br/>
    <input type="email" placeholder="email" name="email" style="width:100px;"><br />
    <br/>
    <input type="phone" placeholder="phone" name="phone" style="width:100px;"><br />
    <br/>
    <input type="password" placeholder="password" name="pass" style="width:100px;"> <br/>
    <br/>
    <input type="password" placeholder="password again"name="pass2" style="width:100px;"> <br/>
    <br/>
    <input type="age" placeholder="age" name="age" style="width:100px;"> <br/>
    <br/>
    <input type="role" placeholder="role"name="role" style="width:100px;"> <br/>
    <br/>
    <input type="button" onclick="history.back()" value="BACK">
    <input type="submit" value="REGISTER">
    </form>
</body>
</html>