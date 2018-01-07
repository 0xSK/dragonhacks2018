<?php
include 'database.php';

$sql = "SELECT * FROM reports WHERE resolved = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo json_encode($row);
      }
     }
?>