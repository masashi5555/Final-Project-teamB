<?php include './header.php'; ?>
<?php include './config.php'; ?>
<?php 
  $con = mysqli_connect($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
  if($con){ //set connection
    echo "connected";
  }

  if(isset($_POST["import"])){
    $fileName = $_FILES["files"]["tmp_name"];

    if($_FILES["file"]["size"]>0){
        $file = fopen($fileName,"r");

        while(($column = fgetcsv($file,10000,","))!=FALSE){
            $sqlInsert = "Insert into sales_manager (manager,sales) values('" . $column[0]. "','" . $column[1]."')";

            $result = mysqli_query($con,$sqlInsert);
            
            if(!empty($result)){
                echo "Data imported to the data base";
            }else{
                echo "Data not imported to the data base";
            }   
        }
    }
  }
?>

<form class= "form-horizontal" action="" method="POST" name="uploadcsv" enctype="multipart/form-data">
    <div>
        <label>Select csv file</label>
        <input type="file" name="file" accept=".csv">
        <button type="submit" name="import">Import</button>
    </div>
</form>