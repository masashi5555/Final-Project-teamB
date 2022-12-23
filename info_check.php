<?php
    $staff_id=$_POST['id'];
    $staff_fname=$_POST['first_name'];
    $staff_lname=$_POST['last_name'];
    $staff_email=$_POST['email'];
    $staff_phone=$_POST['phone'];
    $staff_pass=$_POST['pass'];
    $staff_pass2=$_POST['pass2'];
    $staff_age=$_POST['age'];
    $staff_role=$_POST['role'];

    $staff_id = htmlspecialchars($staff_id,ENT_QUOTES,'UTF-8');
    $staff_fname = htmlspecialchars($staff_fname,ENT_QUOTES,'UTF-8');
    $staff_lname = htmlspecialchars($staff_lname,ENT_QUOTES,'UTF-8');
    $staff_email = htmlspecialchars($staff_email,ENT_QUOTES,'UTF-8');
    $staff_phone = htmlspecialchars($staff_phone,ENT_QUOTES,'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
    $staff_pass2 = htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');
    $staff_age = htmlspecialchars($staff_age,ENT_QUOTES,'UTF-8');
    $staff_role = htmlspecialchars($staff_role,ENT_QUOTES,'UTF-8');

    if($staff_id==''){
        print'id is not entered<br/>';

    }else{
        print 'id:';
        print $staff_id;
        print '<br/>';
    }
    if($staff_id==''){
        print'user name is not entered<br/>';

    }else{
        print 'name:';
        print $staff_fname;
        print $staff_lname;
        print '<br/>';
    }
    if($staff_email==''){
        print'email is not entered<br/>';

    }else{
        print 'Your email:';
        print $staff_email;
        print '<br/>';
    }
    if($staff_phone==''){
        print'email is not entered<br/>';

    }else{
        print 'Your phone:';
        print $staff_phone;
        print '<br/>';
    }
    if($staff_pass=='')
    print'password is not entered<br/>';
    
    if($staff_pass!=$staff_pass2){
        print 'password does not match<br/>';
    }

    if($staff_id==''||$staff_fname==''||$staff_lname==''||$staff_email==''||$staff_phone==''||$staff_pass==''||$staff_pass!=$staff_pass2||$staff_age==''||$staff_role==''){
        print'<form>';
        print'<input type="button" onclick="history.back()"value="BACK">';
        print'</form>';
    }
    else{
        //Encrypt the contents of $staff_pass and copy
        $staff_pass=md5($staff_pass);
        print'<form method="post" action="salesinfo.php">';
        echo "<input type='hidden' name='id' value='$staff_id'>";
        echo "<input type='hidden' name='fname' value='$staff_fname'>";
        echo "<input type='hidden' name='lname' value='$staff_lname'>";
        echo "<input type='hidden' name='email' value='$staff_email'>";
        echo "<input type='hidden' name='phone' value='$staff_phone'>";
        echo "<input type='hidden' name='pass' value='$staff_pass'>";
        echo "<input type='hidden'name='age' value='$staff_age'>";
        echo "<input type='hidden' name='role' value='$staff_role'>";
        print'<input type="hidden" name=".$staff_pass.">';
        print'<br/>';
        print'<input type="button" onclick="history.back()" value="BACK">';
        print'<input type="submit" value="OK">';
        print '</form>';
    }
?>