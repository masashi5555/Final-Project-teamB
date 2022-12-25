<?php
// session_start();
function existsData(){ //function to know if there is an existent course folder and if it is selected
    if(!file_exists("./data/appo.json")){
        if(!file_exists("./data/")){
        mkdir("./data/",0777,true); // required true when nested cases 
        }
        $file = fopen("./data/appo.json",'w'); //creates file
        $appoArray = [];
        fwrite($file,json_encode($appoArray));
    }else{
        $file = fopen("./data/appo.json",'r');
        $appoArray = json_decode(fread($file,filesize("./data/appo.json")),true);
        $appoArray = array_map("unserialize", array_unique(array_map("serialize", $appoArray))); //eliminate repeated dates
        // print_r($appoArray);
    }
    fclose($file);
    return $appoArray;
}

function makeAppo($day,$month,$year){ //writes down appointment
    $appoArray = existsData();
    $appoArray[] = ['day'=>$day,"month"=>$month,'year'=>$year];
    $file = fopen("./data/appo.json",'w'); //Write down the array 
    fwrite($file,json_encode($appoArray));
    fclose($file);
}

function eliminate($idx,$appoArray){ //here elimantes data from selected item
    // $appoArray = existsData();
    $idx2=-1;
    $newArray=[];
    foreach ($appoArray as $val){
        $idx2++;
        if ($idx2==$idx){
            $date=$val['year']."-".$val['month']."-".$val['day']; //that value is sent to dbfunction to eliminate it
            toDb(1,$date);
            continue;
        }
        $newArray[]=$val;   
    }
    $file = fopen("./data/appo.json",'w'); //Write down the array 
    fwrite($file,json_encode($newArray));
    fclose($file);
}

function toDb($del,$appointment=null){ //here we update and delete data to the db
include './config.php';
include_once './services/dbservices.php';
include_once './services/logservice.php';
include_once './services/jsonService.php';
    $dbService = new dbServices($hostName,$userName,$password,$dbName);
    $jsonDir='./data/appo.json';
    $json = new jsonService($jsonDir);
    if($dbcon = $dbService->dbConnect()){
        //echo 'Connected <br>'; //Here we push database to database in phpmyadmin
        $data= $json->jsontoArray();
       // echo "<br><br><br>*******************<br><br><br>"; //INSERT
        $valuesArray = [];
        // $dbService->delete();
        if ($del==1){
            $dbService->delete($appointment);
        } else {
            if ($data!=null){
                foreach ($data as $val){
                    $date=$val['year']."-".$val['month']."-".$val['day'];
                    $valuesArray=["'".$date."'","'".$val['day']."'","'".$val['month']."'","'".$val['year']."'"];
                    if ($dbService->insert('appo_tb',$valuesArray)){
                    }else{
                        echo 'no';
                    }
                    
                }
                
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <!-- <style>
        td {
            width: 14%;
            height: 5vh;
            /* border-radius: 10px; */
        }
    </style> -->
</head>
<body>

    <form action="">

    <table border="1" style="text-align: center; width:80vh;">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Calendar</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <!-- <td></td> -->
                <td colspan="3"><?php
                date_default_timezone_set('America/Vancouver');
                $today = date("F Y");
                $numday = date("d"); //We get the actual data
                if(isset($_POST['prev'])){ //decrease month and year if needed when prev is pressed
                    $_SESSION['nummonth'] = $_SESSION['nummonth']-1;
                    if ($_SESSION['nummonth']==0){
                        $_SESSION['nummonth'] = 12;
                        $_SESSION['numyear'] = $_SESSION['numyear'] - 1;
                    }
                    // print_r($_SESSION['nummonth']);
                }elseif(isset($_POST['next'])){ //increase month and year if needed when next is pressed
                    $_SESSION['nummonth'] = $_SESSION['nummonth']+1;
                    if ($_SESSION['nummonth']==13){
                        $_SESSION['nummonth'] = 1;
                        $_SESSION['numyear'] = $_SESSION['numyear'] + 1;
                    }
                    // print_r($_SESSION['numyear']);
                }elseif(isset($_POST['ret'])){ //returns to actual date
                        $_SESSION['nummonth'] = date("m");
                        $_SESSION['numyear'] = date("Y");
                        // print_r($_SESSION['nummonth']);
                }else{
                    $_SESSION['nummonth']=date("m");
                    $_SESSION['numyear'] = date("Y");
                }
                $nummonth=$_SESSION['nummonth'];
                $numyear = $_SESSION['numyear'];
                echo date("F Y", mktime(0, 0, 0, $_SESSION['nummonth'], 1, $numyear = $_SESSION['numyear']));  
                ?></td>
                <!-- <td></td> -->
                <td></td>
                <td></td>
            </tr>
            <tr style="background-color: blue; color:white;">
                <td>Sunday</td>
                <td>Monday</td>
                <td>Tuesday</td>
                <td>Wednesday</td>
                <td>Thursday</td>
                <td>Friday</td>
                <td>Saturday</td>
            </tr>
            <?php
                $sumDay = 0;
                // echo "$numyear <br> $nummonth <br> $numday <br>";
                //*********LOGIC BEHIND HOW CALENDAR WORKS IN SPANISH AND ENGLISH**************** */
                // No serán años bisiestos los que sean múltiplos de 100, excepto si también lo son de 400. Por esta razón no fueron bisiestos el año 1800 ni 1900, pero sí que lo fue el año 2000.
                // Those that are multiples of 100 will not be leap years, except if they are also multiples of 400. For this reason, the year 1800 and 1900 were not leap years, but the year 2000 was.
            
                for ($i = 1900; $i <$numyear; $i++) { //Save days from year 1900 to take a reference point
                    if (($i % 4 == 0) && ($i % 100 != 0) || ($i % 400 == 0)) {
                        $sumDay += 366;
                    } else {
                        $sumDay += 365;
                    }
                }
                for ($i = 1; $i < $nummonth; $i++) { //from that year we count also days from months
                    if ($i == 4 || $i == 6 || $i == 9 || $i == 11) {
                        $sumDay += 30;
                    } else if ($i == 2) {
                        if (($numyear % 4 == 0) && ($numyear % 100 != 0) || ($numyear % 400 == 0)) {
                            $sumDay += 29;
                        } else {
                            $sumDay += 28;
                        }
                    } else {
                        $sumDay += 31;
                    }
                }
                $disp = ($sumDay + 1) % 7; // how many spaces are going to be displaced
                $everydaydisp = $sumDay + 1; // Everyday displacement
                $thismonth= 0;
                $prevmonth=0;
                function getdays($monthday,$nummonth,$numyear){ //gets days from a determined year
                    if ($nummonth == 4 || $nummonth == 6 || $nummonth == 9 || $nummonth == 11) {
                        $monthday = 30;
                    } else if ($nummonth == 2) {
                        if (($numyear % 4 == 0) && ($numyear % 100 != 0) || ($numyear % 400 == 0)) {
                            $monthday = 29;
                        } else {
                            $monthday = 28;
                        }
                    } else {
                        $monthday = 31;
                    }
                    return $monthday;
                }
                $thismonth= getdays($thismonth,$nummonth,$numyear); 
                $prevmonth=getdays($prevmonth,$nummonth-1,$numyear);
                // echo $prevmonth-$disp+1;
                $prevdisp= $prevmonth-$disp+1; //take the number of displacements 
                $count=0;
                echo "<tr>";
                for ($i = $prevdisp; $i <= $prevmonth; $i++) { // take the las numbers from the previous month until the displaced spaces
                    echo '<td style="background-color: gray; color:white;">'.$i."</td>";
                    $count++;
                }
                // echo (($everydaydisp+3)%7)."*****<br>";
                $counter=0;
                $change=false;
                // $appoArray=[];
                $appoArray = existsData(); //takes array from json
                // print_r($appoArray);
                for ($i = 1; $i <= $thismonth; $i++) { //starts counting to populate month
                    $count++;
                    foreach ($appoArray as $val){
                        if ($val['day']==$i && $val['month']==$nummonth && $val['year']==$numyear){ //if date exists in json then turn green the button
                            echo '<td><button type="submit" name="appo" value="'."$i-$nummonth-$numyear".'" class="btn btn-primary" style="width: 100%; background-color:green; color:white;">'.$i.'</button></td>';
                            $change=true;
                            break;
                        }
                    }
                    if ($change==false){ //if not give this color to button
                        echo '<td><button type="submit" name="appo" value="'."$i-$nummonth-$numyear".'" class="btn btn-primary" style="width: 100%; background-color:white; color:black;">'.$i.'</button></td>';                  
                    }else{
                        $change=false;
                    }
                    if ($everydaydisp % 7 == 6) { //every saturday jumps to next row starting from sunday
                        echo '</tr><tr>';
                    }
                    if(isset($_GET['appo'])&&$counter==0){
                        $dayAppo = explode("-", $_GET['appo']);
                        // print_r($dayAppo);
                        $counter=1; //to be sure appointment is done only once
                        makeAppo($dayAppo[0],$dayAppo[1],$dayAppo[2]); //makes appoinment
                    }
                    $everydaydisp++;
                }
                $count2=$count;
                for ($i=1;$i<=42-$count;$i++){ //loop to color unitl the last box is colored
                    if($i==42-$count){
                        echo '<td style="background-color: gray; color:white;">'.$i."</td></tr>";
                        continue;
                    }
                    if ($count2 % 7 == 6) {
                        echo '<td style="background-color: gray; color:white;">'.$i."</td> </tr><tr>";
                    }else{
                        echo '<td style="background-color: gray; color:white;">'.$i."</td>";
                    }
                    $count2++;
                }
            ?>
        </tbody>
    </table>
    </form>
    
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //does nothing, just some tests, except POST['ret'] which resets year and month to the actual one
        if(isset($_POST['prev'])){
            // echo 'prev';
        }elseif(isset($_POST['next'])){
            // echo 'next';
        }elseif(isset($_POST['app'])){

        }elseif(isset($_POST['ret'])){
            $_SESSION['nummonth']=date("m");
            $_SESSION['numyear'] = date("Y");
        }
    }
    // if(isset($_POST['appo'])){
    //     print_r("Appointment created".$POST['appo']);
    // }

    ?>
    <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']."?act=month"; ?>">
        <br>
        <!-- Buttons form -->
        <button type="submit" name="prev" class="btn btn-primary">Prev</button> 
        <button type="submit" name="ret" class="btn btn-primary">Return</button> 
        <button type="submit" name="next" class="btn btn-primary">Next</button> 
    </form>
    <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']."?mov=app"; ?>">
        <br>
        <!-- Button to eliminate -->
        <button type="submit" name="app" class="btn btn-primary" style="background-color: firebrick; border-color:white;">Eliminate Appointment</button> 
    </form>
    <form  method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>" style="display: <?php
    if(isset($_POST['app'])) {
        // doesnt show selects and neither elimanate confirmation unless elimante appointment button is pressed
        // $appoArray=existsData();
        // eliminate(1,$appoArray);
        if ($appoArray !=[]){
            echo "block"; 
        }
        else echo "none";
    }
    ?> ;"> 
    <label>Select Date to eliminate</label>
        <div class="mb-3">
            <select class="form-select form-select-lg" name="aday" style="display: <?php
                    if(isset($_GET['mov'])) {
                            echo "block"; 
                        }
                        else{echo "none";
                    }
                    ?> ;"> 
                <option selected disabled>Select Day</option>
                <?php
                if(isset($_GET['mov'])) {
                    $idx=0;
                    // print_r('*<br>*');
                    foreach ($appoArray as $val){
                        $monthNum  = $val['month'];
                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                        $monthName = $dateObj->format('F');
                        echo '<option value="'.$idx.'">'.$val['day'].' - '.$monthName.' - '.$val['year'].'</option>';
                        $idx++;
                    }
                }
                ?>
            </select>
        </div>
        <button type="submit" name="eliminate" class="btn btn-primary" style="background-color: firebrick; border-color:white; display: <?php
                    if(isset($_GET['mov'])) {
                            echo "block"; 
                        }
                        else{echo "none";
                    }
                    ?> ;">Eliminate</button> 
    </form>
    <?php
    toDb(0);
    
    
    if(isset($_GET['aday'])) {
        // print_r ($_GET['aday']);
        eliminate($_GET['aday'],$appoArray);
    }
    // if(isset($_POST['eliminate'])){
    //     eliminate($_GET['aday']);
    // }
    ?>
</body>
</html>