<?php
            include './apply.php';
            // $staff_name=$_POST['newInfo'];
            $staff_pass=$_POST['password'];
            print_r($staff_pass);
            // echo $staff_name;
            echo $staff_pass;

        // $file = fopen('./use_Info.json','r');
        // $applyArray = json_decode(fread($file,filesize('./use_Info.json')),true);
        // fclose($file);
        $box = [];
        
        $apply = new applier($staff_id,$staff_fname,$staff_lname,$staff_email,$staff_phone,$staff_pass,$staff_age,$staff_role);
        array_push($box,$apply->convert_info());
        // print_r($box);
        $file = fopen('./data/user_info.json','w');
        fwrite($file,json_encode($box));
        fclose($file);
        echo "hi";
                // header("Location: http://localhost/final-project-teamB/salesPage.php");
?>