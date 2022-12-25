<!-- <?php include './header.php'; ?> -->
<?php include './config.php'; ?>
<?php 
  $con = mysqli_connect($dbConfig[0],$dbConfig[1],$dbConfig[2],$dbConfig[3]);
  if($con){ //set connection
    // echo "connected";
  }
?>
<!-- <html> -->
<section>
  <div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['month', 'sales'], //two fields 

          <?php 
            $sql = "SELECT * FROM sales_month"; //Which table
            $fire = mysqli_query($con,$sql); //Performs a query on data base
            while ($result = mysqli_fetch_assoc($fire)){ //Fetch a result row as an associative array
              echo "['".$result["month"]."',".$result["sales"]."],";
            }
          ?>
          
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales by month',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <style>
        #columnchart_material{
            position: relative; left:30vh; top:10vh;          
        }
    </style>
  </div>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 400px; position:relative"></div>
  </body>
<!-- </html> -->
</section>
