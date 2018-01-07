<?php
include 'database.php';

$sql = "SELECT * FROM reports WHERE resolved = 0";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Active Reports</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/JavaScript">
      function get_request(phone, time){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "resolve.php?time=" + time + "&phone=" + phone, true);
        xhr.send();
        location.reload();
      }
    </script>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Dragonhacks Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Active Reports
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="past.php">Past Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="map.php">Map</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <br>
          <h1 class="mt-5">Active Reports</h1>
          <br> 
          <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Severity</th>
                    <th>Time</th>
                    <th>Resolve?</th>
                </tr>
              </thead>
              <?php 
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["cust_name"]."</td>";
                    echo "<td>".$row["cust_address"]."</td>";
                    echo "<td>".$row["cust_phone"]."</td>";
                    echo "<td>".$row["cust_email"]."</td>";
                    echo "<td>".$row["cord_lat"]."</td>";
                    echo "<td>".$row["cord_long"]."</td>";
                    echo "<td>".$row["severity"]."</td>";
                    echo "<td>".date("F j, Y, g:i a", (int)$row["time"])."</td>";
                    echo "<td><button type=\"button\" class=\"btn btn-success\" onclick=\"get_request(".$row["cust_phone"].",".$row["time"].")\" >Resolve</button></a></td>";
                    echo "</tr>";
                  }
              } 
               ?>
          

            
          </table>
          <br> </br>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>