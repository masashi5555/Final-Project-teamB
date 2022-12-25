<!-- <?php include './header.php'; ?> -->
<?php include './config.php'; ?>
<?php 
  $con = mysqli_connect($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
  if($con){
    // echo "connected";
  }
?>
<!-- <html> -->
<section>
  <div>
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
    <style>
      #piechart {
        position:relative; left: 30vh;
      }
    </style>
  </div>
  <div>
    <div id="piechart" style="width: 900px; height: 600px;"></div>    
  </div>
<section>
<!-- </html> -->
